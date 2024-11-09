<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all(); // Fetch all reports
        return view('admin.reports.index', compact('reports'));
    }

    // Show a specific report by ID
    public function show($id)
    {
        $report = Report::findOrFail($id); // Find the report
        return view('admin.reports.show', compact('report'));
    }
}
