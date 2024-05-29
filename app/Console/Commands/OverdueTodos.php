<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OverdueTodos extends Command
{
     
    protected $signature = 'todos:overdue';

    protected $description = 'Command description';

    public function handle()
    {
       $this->line('Overdue todos!');
    }
}
