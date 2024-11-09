<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda; // Make sure you have an Agenda model

class AgendaController extends Controller
{
    // Display a listing of the agenda
    public function index()
    {
        $page_title = 'Agenda';
        $agendas = Agenda::all(); // Retrieve all agenda items
        return view('admin.agenda.index', compact('agendas', 'page_title'));
    }

    // Show the form for creating a new agenda
    public function create()
    {
        $page_title = 'Add Agenda';
        return view('admin.agenda.create', compact('page_title')); // Show the create form
    }

    // Store a newly created agenda in the database
    public function store(Request $request)
    {
        // Manual handling of form data
        $agenda = new Agenda();
        $agenda->kegiatan = $request->input('kegiatan'); // Field names should match your form
        $agenda->deskripsi = $request->input('deskripsi');
        $agenda->schedule = $request->schedule;
        
        $agenda->save(); // Save the agenda

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda created successfully.');
    }

    // Show the form for editing the specified agenda
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id); // Find the agenda by ID
        $page_title = 'Edit Agenda';
        return view('admin.agenda.edit', compact('agenda', 'page_title')); // Pass agenda data to the edit form
    }

    // Update the specified agenda in the database
    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id); // Find the agenda by ID
        $agenda->kegiatan = $request->input('kegiatan'); // Field names should match your form
        $agenda->deskripsi = $request->input('deskripsi');
        $agenda->tanggal = $request->input('tanggal');
        
        $agenda->save(); // Update the agenda

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda updated successfully.');
    }

    // Remove the specified agenda from the database
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
        
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda deleted successfully.');
    }

    public function dashboard(Request $request)
    {
        $selectedSchedule = $request->input('schedule');

        // Filter agendas based on the selected schedule
        if ($selectedSchedule) {
            $agendas = Agenda::where('schedule', $selectedSchedule)->get();
        } else {
            $agendas = Agenda::all(); // Show all agendas if no schedule is selected
        }

        return view('admin.dashboard', compact('agendas', 'selectedSchedule'));
    }

}
