<?php

namespace Database\Seeders;

use App\Models\LedgerGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LedgerGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['Current Assets','CURRENT-ASSETS','ASSETS',null,null,'GENERAL'],
            ['Fixed Assets','FIXED-ASSETS','ASSETS',null,null,'GENERAL'],
            ['Investments','INVESTMENTS','ASSETS',null,null,'GENERAL'],
            ['Other Assets','OTHER-ASSETS','ASSETS',null,null,'GENERAL'],

            ['Current Liabilities','CURRENT-LIABILITIES','LIABILITIES',null,null,'GENERAL'],
            ['Non Current Liabilities','NON-CURRENT-LIABILITIES','LIABILITIES',null,null,'GENERAL'],
            ['Other Liabilities','OTHER-LIABILITIES','LIABILITIES',null,null,'GENERAL'],
            ['Equity','EQUITY','LIABILITIES',null,null,'GENERAL'],

            ['Sales','SALES','INCOME',null,null,'SALES'],
            ['Service Revenue','SERVICE-REVENUE','INCOME',null,null,'SALES'],
            ['Rental Income','RENTAL-INCOME','INCOME',null,null,'SALES'],
            ['Other Revenue','OTHER-REVENUE','INCOME',null,null,'SALES'],

            ['Cost of Goods Sold','COST-OF-GOODS-SOLD','EXPENSES',null,null,'GENERAL'],
            ['Salaries and Wages','SALARIES-AND-WAGES','EXPENSES',null,null,'GENERAL'],
            ['Rent Expense','RENT-EXPENSE','EXPENSES',null,null,'EXPENSE'],
            ['Utilities Expense','UTILITIES-EXPENSE','EXPENSES',null,null,'EXPENSE'],
            ['Advertising and Marketing Expenses','ADVERTISING-AND-MARKETING-EXPENSES','EXPENSES',null,null,'EXPENSE'],
            ['Depreciation Expense','DEPRECIATION-EXPENSE','EXPENSES',null,null,'EXPENSE'],
            ['Interest Expense','INTEREST-EXPENSE','EXPENSES',null,null,'EXPENSE'],
            ['Taxes and Licenses','TAXES-AND-LICENSES','EXPENSES',null,null,'EXPENSE'],
            ['Miscellaneous Expenses','MISCELLANEOUS-EXPENSES','EXPENSES',null,null,'EXPENSE'],

            //Children Groups
            ['Share Capital','SHARE-CAPITAL',null,'EQUITY',null,'GENERAL'],
            ['Retained Earnings','RETAINED-EARNINGS',null,'EQUITY',null,'GENERAL'],
            ['Reserves and Surplus','RESERVES-AND-SURPLUS',null,'EQUITY',null,'GENERAL'],

            ['Cash and Cash Equivalents','CASH-AND-CASH-EQUIVALENTS',null,'CURRENT-ASSETS',null,'CASH-BANK'],
            ['Trade Receivable','TRADE-RECEIVABLE',null,'CURRENT-ASSETS','TRADE-PAYABLE','DEBTOR-CREDITOR'],
            ['Other Receivable','OTHER-RECEIVABLE',null,'CURRENT-ASSETS','OTHER-PAYABLE','DEBTOR-CREDITOR'],
            ['Inventory','INVENTORY',null,'CURRENT-ASSETS',null,'PURCHASE'],
            ['Prepaid Expenses','PREPAID-EXPENSES',null,'CURRENT-ASSETS',null,'EXPENSE'],

            ['Land','LAND',null,'FIXED-ASSETS',null,'GENERAL'],
            ['Buildings','BUILDINGS',null,'FIXED-ASSETS',null,'GENERAL'],
            ['Plant and Machinery','PLANT-AND-MACHINERY',null,'FIXED-ASSETS',null,'GENERAL'],
            ['Vehicles','VEHICLES',null,'FIXED-ASSETS',null,'GENERAL'],
            ['Furniture and Fixtures','FURNITURE-AND-FIXTURES',null,'FIXED-ASSETS',null,'GENERAL'],

            ['Trade Payable','TRADE-PAYABLE',null,'CURRENT-LIABILITIES','TRADE-RECEIVABLE','DEBTOR-CREDITOR'],
            ['Other Payable','OTHER-PAYABLE',null,'CURRENT-LIABILITIES','OTHER-RECEIVABLE','DEBTOR-CREDITOR'],
            ['Short-term Loans','SHORT-TERM-LOANS',null,'CURRENT-LIABILITIES',null,'GENERAL'],
            ['Accrued Expenses','ACCRUED-EXPENSES',null,'CURRENT-LIABILITIES',null,'GENERAL'],
            ['Current Loans Liabilities','CURRENT-LOANS-LIABILITIES',null,'CURRENT-LIABILITIES',null,'GENERAL'],
            ['Current Portion of Long Term Loan','CURRENT-PORTION-OF-LONG-TERM-LOAN',null,'CURRENT-LIABILITIES',null,'GENERAL'],

            ['Long-term Loans','LONG-TERM-LOANS',null,'NON-CURRENT-LIABILITIES',null,'GENERAL'],
            ['Bonds Payable','BONDS-PAYABLE',null,'NON-CURRENT-LIABILITIES',null,'GENERAL'],
            ['Non-Current Loans Liabilities','NON-CURRENT-LOANS-LIABILITIES',null,'NON-CURRENT-LIABILITIES',null,'GENERAL'],

            //Trade Receivable(Sundry Debtors), Other Receivable, Advance Receivable
    ];

        foreach ($data as $datum)
        {
            $lg = new LedgerGroup();
            $lg->title = $datum[0];
            $lg->identifier = $datum[1];
            $lg->classification_identifier = $datum[2];
            $lg->parent_identifier = $datum[3];
            $lg->negative_identifier = $datum[4];
            $lg->ledger_type = $datum[5];
            $lg->save();
        }
    }

}
