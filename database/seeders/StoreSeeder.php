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
            'code_name' => 'November',
            'store_name' => 'DW Lekki',
            'store_code' => 'dw0001'
        ]);

        Store::create([
            'code_name' => 'Romeo',
            'store_name' => 'DW Surulere',
            'store_code' => 'dw0002'
        ]);

        Store::create([
            'code_name' => 'papa',
            'store_name' => 'DW Ogudu',
            'store_code' => 'dw0003'
        ]);

        Store::create([
            'code_name' => 'Oscar 2',
            'store_name' => 'HQ GROUND FLOOR',
            'store_code' => 'dw0004'
        ]);

        Store::create([
            'code_name' => 'Oscar 1',
            'store_name' => 'HQ FIRST FLOOR',
            'store_code' => 'dw0005'
        ]);

        Store::create([
            'code_name' => 'India',
            'store_name' => 'DW AROMIRE',
            'store_code' => 'dw0006'
        ]);

        Store::create([
            'code_name' => 'Kilo',
            'store_name' => 'DW FESTAC',
            'store_code' => 'dw0007'
        ]);

        Store::create([
            'code_name' => 'Juliet',
            'store_name' => 'DW IBADAN 1',
            'store_code' => 'dw0008'
        ]);

        Store::create([
            'code_name' => 'Lima',
            'store_name' => 'DW IBADAN 2',
            'store_code' => 'dw0009'
        ]);

        Store::create([
            'code_name' => 'Mike',
            'store_name' => 'DW Lakowe',
            'store_code' => 'dw00010'
        ]);

        Store::create([
            'code_name' => 'Hotel 1',
            'store_name' => 'DW Abuja 1',
            'store_code' => 'dw00011'
        ]);

        Store::create([
            'code_name' => 'Hotel 2',
            'store_name' => 'DW Abuja 2',
            'store_code' => 'dw00012'
        ]);

        Store::create([
            'code_name' => 'Victor',
            'store_name' => 'DW Portharcourt 1',
            'store_code' => 'dw00013'
        ]);

        Store::create([
            'code_name' => 'Xray',
            'store_name' => 'DW Portharcourt 2',
            'store_code' => 'dw00014'
        ]);

        Store::create([
            'code_name' => 'Uniform',
            'store_name' => 'DW Asaba',
            'store_code' => 'dw00015'
        ]);
    }
}
