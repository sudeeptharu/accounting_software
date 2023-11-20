<?php

namespace Database\Seeders;

use App\Models\VoucherType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
          ['Contra','CT',true],
          ['Credit Note','CN',true],
          ['Debit Note','DN',true],
          ['Journal','JV',true],
          ['Payment','PY',true],
          ['Purchase','PC',true],
          ['Receipt','RC',true],
          ['Sales','SL',true],
        ];

        foreach ($data as $datum)
        {
            $vt = new VoucherType();
            $vt->title = $datum[0];
            $vt->identifier = $datum[1];
            $vt->active = $datum[2];
            $vt->save();
        }
    }
}
