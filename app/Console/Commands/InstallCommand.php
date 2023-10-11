<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'store:install';

    protected $description = 'Command description';

    public function handle():int
    {
        $this->call('storage:link');
        $this->call('migrate');
        return self::SUCCESS;
    }
}
