<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil jadwal dari request, default ke null
        $schedule = $request->input('schedule', null);

        // Query agendas berdasarkan jadwal yang dipilih
        $agendas = Agenda::when($schedule, function ($query) use ($schedule) {
            return $query->where('schedule', $schedule);
        })->get();

        // Pass jadwal yang dipilih dan data agenda ke view
        return view('admin.dashboard', [
            'agendas' => $agendas,
            'selectedSchedule' => $schedule,
        ]);
    }
}
