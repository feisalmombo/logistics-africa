<?php

use Illuminate\Database\Seeder;
use App\BudgetExpenditure;

class BudgetExpendituresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expenditure_name = new BudgetExpenditure();
        $expenditure_name->budget_expenditure_name = 'TZS';
        $expenditure_name->save();

        $expenditure_name = new BudgetExpenditure();
        $expenditure_name->budget_expenditure_name = 'USD';
        $expenditure_name->save();

        $expenditure_name = new BudgetExpenditure();
        $expenditure_name->budget_expenditure_name = 'EUR';
        $expenditure_name->save();

        $expenditure_name = new BudgetExpenditure();
        $expenditure_name->budget_expenditure_name = 'Other';
        $expenditure_name->save();
    }
}
