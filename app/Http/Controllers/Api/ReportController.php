<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all(); // Fetch all reports from the database
        return response()->json($reports); // Return as JSON
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'namaPetugas' => 'required|string|max:255',
            'kloterKeberangkatan' => 'required|string|max:255',
            'tasks' => 'required|string', // Expecting tasks to be a single string with task status
        ]);

        // Save to database
        $report = Report::create([
            'nama_petugas' => $validated['namaPetugas'],
            'kloter_keberangkatan' => $validated['kloterKeberangkatan'],
            'tasks' => $validated['tasks'],
        ]);

        return response()->json(['message' => 'Data berhasil dikirim', 'report' => $report], 200);
    }
}
