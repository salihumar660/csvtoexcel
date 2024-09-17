<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use App\Exports\StockExport;
use Maatwebsite\Excel\Facades\Excel;

class UploadFileController extends Controller
{
    public function showForm()
    {
        return view('fileform');
    }

    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $data = array_map('str_getcsv', file($file->getRealPath()));
        array_shift($data); 

        DB::transaction(function () use ($data) {
            foreach ($data as $row) {
                Stock::updateOrCreate(
                    ['sku' => $row[0]], 
                    ['quantity' => $row[1]] 
                );
            }
        });
        return redirect()->route('upload-form')->with('success', 'Stock imported successfully!');
    }
    public function export()
{
    return Excel::download(new StockExport, 'stocks.xlsx');
}
}
