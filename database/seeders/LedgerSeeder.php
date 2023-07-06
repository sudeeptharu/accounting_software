<?php

namespace Database\Seeders;

use App\Models\Ledger;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LedgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['Purchase A/c','PURCHASE-ACCOUNTS'],
            ['Sales A/c', 'SALES-ACCOUNTS'],
            ['Cash','CASH-AND-CASH-EQUIVALENTS'],
            ['Cash','CASH-AND-CASH-EQUIVALENTS'],
        ];

        foreach ($data as $datum)
        {
            $ledger = new Ledger();
            $ledger->title = $datum[0];
            $ledger->group_identifier = $datum[1];
            $ledger->save();
        }
    }
}
