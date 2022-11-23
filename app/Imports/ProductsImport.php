<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithBatchInserts, WithChunkReading,WithUpserts, WithUpsertColumns, WithHeadingRow
{

    public function collection(Collection $rows){

    foreach ($rows as $row)
      {
        Product::where('sku', $row['sku'])
            ->update([
                'regular_price'     => $row['regular_price'],
                'stock_quantity'    => $row['stock_quantity'],
            ]);
      }
    }

    // public function model(array $row)
    // {
    //     return new Product([
    //         'sku'               => $row['sku'],
    //         'post_title'        => $row['post_title'],
    //         'category'          => $row['category'],
    //         'regular_price'     => $row['regular_price'],
    //         'stock_quantity'    => $row['stock_quantity']
    //     ]);
    // }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function uniqueBy()
    {
        return 'sku';
    }

    public function upsertColumns()
    {
        return ['regular_price', 'stock_quantity'];
    }
}
