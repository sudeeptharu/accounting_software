<?php

namespace Database\Seeders;

use App\Models\LedgerClassification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LedgerClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['Assets','ASSETS'],
            ['Liabilities','LIABILITIES'],
            ['Equity','EQUITY'],
            ['Income','INCOME'],
            ['Expenses','EXPENSES'],
        ];

        foreach ($data as $datum)
        {
            $lc = new LedgerClassification();
            $lc->title = $datum[0];
            $lc->identifier = $datum[1];
            $lc->save();
        }
    }
}
