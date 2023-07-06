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
            ['Current Assets','CURRENT-ASSETS','ASSETS',null,null,'GENERAL', false],
            ['Fixed Assets','FIXED-ASSETS','ASSETS',null,null,'GENERAL', false],
            ['Investments','INVESTMENTS','ASSETS',null,null,'GENERAL', false],
            ['Misc. Expenses (Asset)','MISC-EXPENSES-ASSET','ASSETS',null,null,'GENERAL', false],
            ['Other Assets','OTHER-ASSETS','ASSETS',null,null,'GENERAL', false],

            ['Current Liabilities','CURRENT-LIABILITIES','LIABILITIES',null,null,'GENERAL', false],
            ['Non Current Liabilities','NON-CURRENT-LIABILITIES','LIABILITIES',null,null,'GENERAL', false],
            ['Branch / Divisions','BRANCH-DIVISIONS','LIABILITIES',null,null,'GENERAL', false],
            ['Loans (Liability)','LOANS-LIABILITY','LIABILITIES',null,null,'GENERAL', false],
            ['Suspense A/c','SUSPENSE-ACCOUNT','LIABILITIES',null,null,'GENERAL', false],
            ['Other Liabilities','OTHER-LIABILITIES','LIABILITIES',null,null,'GENERAL', false],
            ['Equity','EQUITY','LIABILITIES',null,null,'GENERAL', false],

            ['Sales Accounts','SALES','INCOME',null,null,'SALES', true],
            ['Direct Income','DIRECT-INCOME','INCOME',null,null,'SALES', true],
            ['Indirect Income','INDIRECT-INCOME','INCOME',null,null,'SALES', false],

            ['Purchase Accounts','PURCHASE','EXPENSES',null,null,'GENERAL', true],
            ['Direct Expenses','DIRECT-EXPENSES','EXPENSES',null,null,'GENERAL',true],
            ['Indirect Expenses','INDIRECT-EXPENSES','EXPENSES',null,null,'GENERAL', false],

            //Children Groups
            ['Share Capital','SHARE-CAPITAL',null,'EQUITY',null,'GENERAL',false],
            ['Retained Earnings','RETAINED-EARNINGS',null,'EQUITY',null,'GENERAL',false],
            ['Reserves and Surplus','RESERVES-AND-SURPLUS',null,'EQUITY',null,'GENERAL',false],

            ['Cash and Cash Equivalents','CASH-AND-CASH-EQUIVALENTS',null,'CURRENT-ASSETS',null,'CASH', false],
            ['Bank Accounts','BANKS',null,'CURRENT-ASSETS',null,'BANK', false],
            ['Trade Receivable','TRADE-RECEIVABLES',null,'CURRENT-ASSETS','TRADE-PAYABLE','DEBTOR-CREDITOR', false],
            ['Other Receivable','OTHER-RECEIVABLES',null,'CURRENT-ASSETS','OTHER-PAYABLE','DEBTOR-CREDITOR', false],
            ['Inventory','INVENTORY',null,'CURRENT-ASSETS',null,'PURCHASE', false],
            ['Prepaid Expenses','PREPAID-EXPENSES',null,'CURRENT-ASSETS',null,'EXPENSE', false],

            ['Land','LAND',null,'FIXED-ASSETS',null,'GENERAL', false],
            ['Buildings','BUILDINGS',null,'FIXED-ASSETS',null,'GENERAL', false],
            ['Plant and Machinery','PLANT-AND-MACHINERY',null,'FIXED-ASSETS',null,'GENERAL', false],
            ['Vehicles','VEHICLES',null,'FIXED-ASSETS',null,'GENERAL', false],
            ['Furniture and Fixtures','FURNITURE-AND-FIXTURES',null,'FIXED-ASSETS',null,'GENERAL', false],

            ['Trade Payable','TRADE-PAYABLE',null,'CURRENT-LIABILITIES','TRADE-RECEIVABLE','DEBTOR-CREDITOR', false],
            ['Other Payable','OTHER-PAYABLE',null,'CURRENT-LIABILITIES','OTHER-RECEIVABLE','DEBTOR-CREDITOR', false],
            ['Short-term Loans','SHORT-TERM-LOANS',null,'CURRENT-LIABILITIES',null,'GENERAL', false],
            ['Accrued Expenses','ACCRUED-EXPENSES',null,'CURRENT-LIABILITIES',null,'GENERAL', false],
            ['Current Loans Liabilities','CURRENT-LOANS-LIABILITIES',null,'CURRENT-LIABILITIES',null,'GENERAL', false],
            ['Current Portion of Long Term Loan','CURRENT-PORTION-OF-LONG-TERM-LOAN',null,'CURRENT-LIABILITIES',null,'GENERAL', false],

            ['Long-term Loans','LONG-TERM-LOANS',null,'NON-CURRENT-LIABILITIES',null,'GENERAL', false],
            ['Bonds Payable','BONDS-PAYABLE',null,'NON-CURRENT-LIABILITIES',null,'GENERAL', false],
            ['Non-Current Loans Liabilities','NON-CURRENT-LOANS-LIABILITIES',null,'NON-CURRENT-LIABILITIES',null,'GENERAL', false],

            ['Cost of Goods Sold','COST-OF-GOODS-SOLD','DIRECT-EXPENSES',null,null,'GENERAL', false],
            ['Direct Wages','DIRECT-WAGES','DIRECT-EXPENSES',null,null,'GENERAL', false],
            ['Direct Materials','DIRECT-MATERIALS','DIRECT-EXPENSES',null,null,'GENERAL', false],
            ['Direct Subcontracting Expenses','DIRECT-SUBCONTRACTING-EXPENSES','DIRECT-EXPENSES',null,null,'GENERAL', false],
            ['Other Direct Expenses','OTHER-DIRECT-EXPENSES','DIRECT-EXPENSES',null,null,'GENERAL', false],

            ['Administrative Expenses','ADMINISTRATIVE-EXPENSES','INDIRECT-EXPENSES',null,null,'GENERAL', false],
            ['Advertising and Marketing Expenses','ADVERTISING-AND-MARKETING-EXPENSES','INDIRECT-EXPENSES',null,null,'EXPENSE', false],
            ['Depreciation Expense','DEPRECIATION-EXPENSE','INDIRECT-EXPENSES',null,null,'EXPENSE', false],
            ['Interest Expense','INTEREST-EXPENSE','INDIRECT-EXPENSES',null,null,'EXPENSE', false],
            ['Duties & Taxes','DUTIES-TAXES','INDIRECT-EXPENSES',null,null,'TAX', false],
            ['Licenses','LICENSES','INDIRECT-EXPENSES',null,null,'EXPENSE', false],
            ['Miscellaneous Expenses','MISCELLANEOUS-EXPENSES','INDIRECT-EXPENSES',null,null,'EXPENSE', false],

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
            $lg->affects_gross_profit = $datum[6];
            $lg->save();
        }
    }

}
