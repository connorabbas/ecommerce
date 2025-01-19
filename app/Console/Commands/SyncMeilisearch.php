<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncMeilisearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meilisearch:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Meilisearch data and settings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Meilisearch sync...');

        $this->call('scout:sync-index-settings');
        $this->call('scout:import', [
            'model' => 'App\Models\Product',
        ]);

        $this->info('Meilisearch sync completed successfully.');

        return 0;
    }
}
