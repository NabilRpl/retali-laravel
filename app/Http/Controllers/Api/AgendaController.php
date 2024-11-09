<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;
use Illuminate\Support\Facades\Validator;

class AgendaController extends Controller
{
    // Get all agendas
    public function index()
    {
        $agendas = Agenda::all();
        return response()->json($agendas, 200); // Return all agendas as JSON
    }

    // Store a new agenda
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'kegiatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jadwal' => 'required|string|max:255', // Assuming jadwal is a string
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Create a new agenda
        $agenda = Agenda::create($request->all());
        return response()->json([
            'message' => 'Agenda successfully created',
            'data' => $agenda
        ], 201);
    }

    // Get a single agenda by ID
    public function show($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json([
                'message' => 'Agenda not found'
            ], 404);
        }

        return response()->json($agenda, 200);
    }

    // Update an existing agenda
    public function update(Request $request, $id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json([
                'message' => 'Agenda not found'
            ], 404);
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'kegiatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jadwal' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Update agenda
        $agenda->update($request->all());
        return response()->json([
            'message' => 'Agenda successfully updated',
            'data' => $agenda
        ], 200);
    }

    // Delete an agenda
    public function destroy($id)
    {
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json([
                'message' => 'Agenda not found'
            ], 404);
        }

        $agenda->delete();
        return response()->json([
            'message' => 'Agenda successfully deleted'
        ], 200);
    }
}
