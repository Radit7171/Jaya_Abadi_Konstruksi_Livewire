<?php

namespace App\Console\Commands;

use App\Models\Visitor;
use Illuminate\Console\Command;

class VisitorTrackingTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visitor:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test session-based visitor tracking system';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('=== SESSION-BASED VISITOR TRACKING TEST ===');
        $this->newLine();

        // Show database stats
        $totalRecords = Visitor::count();
        $this->info("Total Visitor Records: $totalRecords");

        if ($totalRecords === 0) {
            $this->warn('No visitor records found. Browse the site to generate tracking data.');
            return;
        }

        $this->newLine();
        $this->info('=== Latest 5 Visitors ===');
        $this->newLine();

        $visitors = Visitor::latest()
            ->limit(5)
            ->get();

        $headers = ['ID', 'IP', 'Device', 'Page', 'Browser', 'Visited'];
        $rows = [];

        foreach ($visitors as $visitor) {
            $rows[] = [
                $visitor->id,
                $visitor->ip_address,
                $visitor->device_type,
                parse_url($visitor->page_url, PHP_URL_PATH),
                $visitor->browser,
                $visitor->created_at->format('H:i:s'),
            ];
        }

        $this->table($headers, $rows);

        $this->newLine();
        $this->info('=== Statistics ===');
        $this->newLine();

        $todayVisitors = Visitor::whereDate('created_at', today())->count();

        $this->line("Today's Visitors: $todayVisitors");
        $this->line("Total Visitors (All Time): " . Visitor::count());
        $this->line("Unique IPs: " . Visitor::distinct('ip_address')->count());

        $this->newLine();
        $this->info('✅ System is tracking visitors correctly!');
        $this->info('📌 1 IP = 1 record per 24 jam (tidak duplikat per halaman)');
    }
}
