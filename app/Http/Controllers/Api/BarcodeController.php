<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'barcode_data' => 'required|string',
        ]);

        // Proses data barcode
        $barcodeData = $request->input('barcode_data');
        
        // Simpan ke database, atau lakukan proses lain
        // Contoh:
        // $barcode = Barcode::create(['data' => $barcodeData]);

        return response()->json(['message' => 'Data barcode berhasil disimpan'], 200);
    }
}
