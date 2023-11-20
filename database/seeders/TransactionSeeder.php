<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $voucherTypes = ['CT', 'CN', 'DN', 'JV', 'PY', 'PC', 'RC', 'SL'];

        for ($i = 1; $i <= 500; $i++) {
            $voucherType = $voucherTypes[array_rand($voucherTypes)];
            $transactionDate = now()->subDays($i);
            $narration = 'Transaction ' . $i;
            $remarks = 'Remarks for Transaction ' . $i;

            $transaction = Transaction::create([
                'transaction_no' => 'TXN' . $i,
                'voucher_type_identifier' => $voucherType,
                'transaction_date' => $transactionDate,
                'narration' => $narration,
                'remarks' => $remarks,
            ]);

            $totalDebit = 0;
            $totalCredit = 0;

            for ($j = 1; $j <= 10; $j++) {
                $particular = 'Particular ' . $j;
                $isCredit = rand(0, 1);
                $amount = rand(100, 1000);

                $transaction->transaction_entries()->create([
                    'particular' => $particular,
                    'dc' => $isCredit,
                    'amount' => $amount,
                ]);

                if ($isCredit) {
                    $totalCredit += $amount;
                } else {
                    $totalDebit += $amount;
                }
            }

            // Ensure total debit equals total credit
            if ($totalDebit != $totalCredit) {
                $adjustmentAmount = abs($totalDebit - $totalCredit);
                $adjustmentIsCredit = $totalDebit > $totalCredit;

                $transaction->transaction_entries()->create([
                    'particular' => 'Adjustment',
                    'dc' => $adjustmentIsCredit,
                    'amount' => $adjustmentAmount,
                ]);
            }
        }
    }
}
