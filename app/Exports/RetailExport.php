<?php

namespace App\Exports;

use App\Models\Retail;
use Maatwebsite\Excel\Concerns\FromCollection;

class RetailExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Retail::all();
    }
}
