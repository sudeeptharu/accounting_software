<?php

namespace Database\Seeders;

use App\Models\LedgerType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LedgerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['Debtor/Creditor','DEBTOR-CREDITOR'],
            ['Expense','EXPENSE'],
            ['Cash','CASH'],
            ['Bank','BANK'],
            ['Sales','SALES'],
            ['Purchase','PURCHASE'],
            ['Taxes','TAX'],
            ['General','GENERAL'],
        ];

        foreach ($data as $datum)
        {
            $lt = new LedgerType();
            $lt->title = $datum[0];
            $lt->identifier = $datum[1];
            $lt->save();
        }
    }
}
