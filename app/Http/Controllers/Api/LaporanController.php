<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LaporanController extends Controller
{
    // Validasi data yang masuk
    public function store(Request $request)
    {
        Log::info('Received request data: ', $request->all());

        // Validasi data yang masuk
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255', // Validasi nama yang diperlukan
            'no_hp' => 'nullable|string|max:15', // Nomor HP opsional
            'tanggal' => 'required|date', // Pastikan tanggal dalam format yang benar
            'cloter' => 'nullable|string|max:50', // Cloter opsional
            'waktu' => 'required|date_format:H:i:s', // Pastikan waktu dengan format jam:menit:detik
        ]);

        Log::info('Validated data: ', $validatedData);

        return response()->json([
            'message' => 'Data validasi berhasil',
            'data' => $validatedData,
        ], 200);
    }
}
