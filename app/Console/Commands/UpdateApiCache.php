<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class UpdateApiCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:clear-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear API Cache and Re-Run';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Cache::clear();
        Artisan::call("test");
    }
}
