<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteOldNotifications extends Command
{
    protected $signature = 'notifications:delete-old';
    protected $description = 'Delete notifications older than 24 hours';

    public function handle()
    {
        DB::table('notifications')
            ->where('created_at', '<', now()->subHours(72))
            ->delete();

        $this->info('Old notifications deleted successfully.');
    }
}
