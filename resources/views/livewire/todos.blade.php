<?php

use App\Mail\TodoCreated;
use App\Models\Todo;
use Illuminate\Support\Facades\Mail;

use function Livewire\Volt\{state, with};

state(['task']);

with([
    'todos' => fn() => auth()->user()->todos

    // \App\Models\Todo::all()
]);

$add = function () {

    $todo = auth()->user()->todos()->create([
        'task' => $this->task
    ]);

    Mail::to(auth()->user())->queue(new TodoCreated($todo));

    // \App\Models\Todo::create([
    //     'user_id' => auth()->id(),
    //     'task' => $this->task,
    // ]);

    $this->task = '';
};

$delete = fn(Todo $todo) => $todo->delete();
 
?>

<div>
    <form wire:submit='add'>
        <input type='text' wire:model='task'>
        <button type="submit">Add</button>
    </form>
    <div>
        @foreach ($todos as $todo)
            <div>
                {{
            $todo->task
                }}
                <button wire:click='delete({{ $todo->id }})'>
                    X
                </button>
            </div>
        @endforeach 
    </div>
</div>