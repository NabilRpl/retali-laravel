<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Method untuk menampilkan daftar laporan
    public function index()
{
    // Mengganti all() dengan paginate() untuk mendukung pagination
    $laporans = Laporan::paginate(10); // 10 laporan per halaman
    return view('admin.laporan.index', compact('laporans'));
}

    // Method untuk menampilkan form tambah laporan
    public function create()
    {
        return view('admin.laporan.create');  // Menampilkan form create
    }

    // Method untuk menyimpan data laporan yang baru
    public function store(Request $request)
{
    \Log::info('Received request data: ', $request->all()); // Log incoming request data

    // Validate the request
    $validatedData = $request->validate([
        'barcode_data' => 'required|string',
        'timestamp' => 'required|date',
    ]);

    // Log validated data
    \Log::info('Validated data: ', $validatedData);

    // Create laporan record
    Laporan::create($validatedData);

    return response()->json(['message' => 'Laporan created successfully'], 200);
}

    // Method untuk menampilkan form edit berdasarkan id laporan
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);  // Mengambil data berdasarkan ID atau gagal jika tidak ditemukan
        return view('admin.laporan.edit', compact('laporan'));  // Mengirimkan data laporan ke view edit
    }

    // Method untuk mengupdate data laporan berdasarkan ID
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'barcode_data' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $laporan = Laporan::findOrFail($id);  // Mengambil data berdasarkan ID
        $laporan->update($validatedData);  // Update data laporan

        // Redirect ke halaman daftar laporan dengan pesan sukses
        return redirect()->route('admin.laporan.index')->with('success', 'Laporan updated successfully!');
    }

    // Method untuk menghapus laporan berdasarkan ID
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);  // Mengambil data berdasarkan ID
        $laporan->delete();  // Menghapus data

        // Redirect ke halaman daftar laporan dengan pesan sukses
        return redirect()->route('admin.laporan.index')->with('success', 'Laporan deleted successfully!');
    }
}
