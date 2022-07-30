<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'store_name' => 'DW Experience Center',
            'store_code' => 'dw00000000001'
        ]);

        Store::create([
            'store_name' => 'DW Ikeja',
            'store_code' => 'dw00000000002'
        ]);

        Store::create([
            'store_name' => 'DW Lekki',
            'store_code' => 'dw00000000003'
        ]);

        Store::create([
            'store_name' => 'DW Lakowe',
            'store_code' => 'dw00000000004'
        ]);

        Store::create([
            'store_name' => 'DW Abuja 1',
            'store_code' => 'dw00000000005'
        ]);

        Store::create([
            'store_name' => 'DW Abuja 2',
            'store_code' => 'dw00000000006'
        ]);

        Store::create([
            'store_name' => 'DW Ibadan 1',
            'store_code' => 'dw00000000007'
        ]);

        Store::create([
            'store_name' => 'DW Ibadan 2',
            'store_code' => 'dw00000000008'
        ]);

        Store::create([
            'store_name' => 'DW Surulere',
            'store_code' => 'dw00000000009'
        ]);

        Store::create([
            'store_name' => 'DW Festac',
            'store_code' => 'dw00000000010'
        ]);

        Store::create([
            'store_name' => 'DW Aromire',
            'store_code' => 'dw00000000011'
        ]);

        Store::create([
            'store_name' => 'DW Ogudu',
            'store_code' => 'dw00000000012'
        ]);

        Store::create([
            'store_name' => 'DW Asaba',
            'store_code' => 'dw00000000013'
        ]);

        Store::create([
            'store_name' => 'DW Phortharcourt 1',
            'store_code' => 'dw00000000014'
        ]);

        Store::create([
            'store_name' => 'DW Phortharcourt 2',
            'store_code' => 'dw00000000015'
        ]);

        Store::create([
            'store_name' => 'DW Phortharcourt Annex',
            'store_code' => 'dw00000000016'
        ]);

    }
}
