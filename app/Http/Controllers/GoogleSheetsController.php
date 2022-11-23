<?php

namespace App\Http\Controllers;

// use Google\Service\Sheets;
use Illuminate\Http\Request;
use SheetDB\SheetDB;
// use App\Http\Services\GoogleSheetsServices;

class GoogleSheetsController extends Controller
{

    public function sheetOperation(){

        $sheetdb = new SheetDB('832xror5om6j2','ALL');
        dd($sheetdb->get());
        return view('pos.add_sale')->with('all_products', $sheetdb);
    }

    // public function sheetOperation(Request $request)
    // {
    //     $data = (new GoogleSheetsServices())->readSheet();

    //     return response()->json($data);
    // }
}
