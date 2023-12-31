<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\LedgerClassification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LedgerClassificationSeeder::class);
        $this->call(LedgerGroupSeeder::class);
        $this->call(LedgerSeeder::class);
        $this->call(VoucherTypeSeeder::class);
        $this->call(LedgerTypeSeeder::class);
//        $this->call(TransactionSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
