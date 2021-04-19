<?php

use Illuminate\Database\Seeder;
use App\KindProcurement;

class KindProcurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $procurement_name = new KindProcurement();
        $procurement_name->kind_procurement_name = 'Direct procurement without quotation';
        $procurement_name->save();

        $procurement_name = new KindProcurement();
        $procurement_name->kind_procurement_name = 'Direct procurement with atleast 1 quotation';
        $procurement_name->save();

        $procurement_name = new KindProcurement();
        $procurement_name->kind_procurement_name = 'Competitive Negotiation with atleast 3 quotation';
        $procurement_name->save();

        $procurement_name = new KindProcurement();
        $procurement_name->kind_procurement_name = 'Tender';
        $procurement_name->save();
    }
}
