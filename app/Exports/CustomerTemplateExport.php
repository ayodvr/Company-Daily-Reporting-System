<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerTemplateExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::Select('id','customer_name','customer_phone','customer_email','created_at')->get();

    }

    public function headings(): array
    {
        return ['S/N','NAME','PHONE','EMAIL','DATE'];
    }

}
