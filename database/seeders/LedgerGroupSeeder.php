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
            ['Current Assets','CURRENT-ASSETS','ASSETS',null,null],
            ['Fixed Assets','FIXED-ASSETS','ASSETS',null,null],
            ['Investments','INVESTMENTS','ASSETS',null,null],
            ['Other Assets','OTHER-ASSETS','ASSETS',null,null],

            ['Current Liabilities','CURRENT-LIABILITIES','LIABILITIES',null,null],
            ['Non Current Liabilities','NON-CURRENT-LIABILITIES','LIABILITIES',null,null],
            ['Other Liabilities','OTHER-LIABILITIES','LIABILITIES',null,null],

            ['Share Capital','SHARE-CAPITAL','EQUITY',null,null],
            ['Retained Earnings','RETAINED-EARNINGS','EQUITY',null,null],
            ['Reserves and Surplus','RESERVES-AND-SURPLUS','EQUITY',null,null],

            ['Sales','SALES','INCOME',null,null],
            ['Service Revenue','SERVICE-REVENUE','INCOME',null,null],
            ['Rental Income','RENTAL-INCOME','INCOME',null,null],
            ['Other Revenue','OTHER-REVENUE','INCOME',null,null],

            ['Cost of Goods Sold','COST-OF-GOODS-SOLD','EXPENSES',null,null],
            ['Salaries and Wages','SALARIES-AND-WAGES','EXPENSES',null,null],
            ['Rent Expense','RENT-EXPENSE','EXPENSES',null,null],
            ['Utilities Expense','UTILITIES-EXPENSE','EXPENSES',null,null],
            ['Advertising and Marketing Expenses','ADVERTISING-AND-MARKETING-EXPENSES','EXPENSES',null,null],
            ['Depreciation Expense','DEPRECIATION-EXPENSE','EXPENSES',null,null],
            ['Interest Expense','INTEREST-EXPENSE','EXPENSES',null,null],
            ['Taxes and Licenses','TAXES-AND-LICENSES','EXPENSES',null,null],
            ['Miscellaneous Expenses','MISCELLANEOUS-EXPENSES','EXPENSES',null,null],

            //Children Groups

            ['Cash and Cash Equivalents','CASH-AND-CASH-EQUIVALENTS',null,'CURRENT-ASSETS',null],
            ['Trade Receivable','TRADE-RECEIVABLE',null,'CURRENT-ASSETS','TRADE-PAYABLE'],
            ['Other Receivable','OTHER-RECEIVABLE',null,'CURRENT-ASSETS','OTHER-PAYABLE'],
            ['Inventory','INVENTORY',null,'CURRENT-ASSETS',null],
            ['Prepaid Expenses','PREPAID-EXPENSES',null,'CURRENT-ASSETS',null],

            ['Land','LAND',null,'FIXED-ASSETS',null],
            ['Buildings','BUILDINGS',null,'FIXED-ASSETS',null],
            ['Plant and Machinery','PLANT-AND-MACHINERY',null,'FIXED-ASSETS',null],
            ['Vehicles','VEHICLES',null,'FIXED-ASSETS',null],
            ['Furniture and Fixtures','FURNITURE-AND-FIXTURES',null,'FIXED-ASSETS',null],

            ['Trade Payable','TRADE-PAYABLE',null,'CURRENT-LIABILITIES','TRADE-RECEIVABLE'],
            ['Other Payable','OTHER-PAYABLE',null,'CURRENT-LIABILITIES','OTHER-RECEIVABLE'],
            ['Short-term Loans','SHORT-TERM-LOANS',null,'CURRENT-LIABILITIES',null],
            ['Accrued Expenses','ACCRUED-EXPENSES',null,'CURRENT-LIABILITIES',null],
            ['Current Loans Liabilities','CURRENT-LOANS-LIABILITIES',null,'CURRENT-LIABILITIES',null],
            ['Current Portion of Long Term Loan','CURRENT-PORTION-OF-LONG-TERM-LOAN',null,'CURRENT-LIABILITIES',null],

            ['Long-term Loans','LONG-TERM-LOANS',null,'NON-CURRENT-LIABILITIES',null],
            ['Bonds Payable','BONDS-PAYABLE',null,'NON-CURRENT-LIABILITIES',null],
            ['Non-Current Loans Liabilities','NON-CURRENT-LOANS-LIABILITIES',null,'NON-CURRENT-LIABILITIES',null],

            //Trade Receivable(Sundry Debtors), Other Receivable, Advance Receivable
    ];

        foreach ($data as $datum)
        {
            $lc = new LedgerGroup();
            $lc->title = $datum[0];
            $lc->identifier = $datum[1];
            $lc->classification_identifier = $datum[2];
            $lc->parent_identifier = $datum[3];
            $lc->negative_identifier = $datum[4];
            $lc->save();
        }
    }
}
