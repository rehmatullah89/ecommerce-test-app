<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\DatabaseSeeder;

class SeedDatabase extends Command
{
    protected $signature = 'db:seed';
    protected $description = 'Seed the database';

    public function handle()
    {
        $this->info("Seeding database...");
        $seeder = new DatabaseSeeder();
        $seeder->run();
        $this->info("Database seeded.");
    }
}
