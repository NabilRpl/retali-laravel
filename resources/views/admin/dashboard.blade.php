@extends('layouts.admin')

@section('content')
<style>
    /* Custom styles for purple and white theme */
    body {
        background-color: white; /* Set the background to white */
    }
    .container {
        color: purple; /* Set text color to purple */
    }
    .table {
        background-color: white; /* Ensure table background is white */
        border: 1px solid purple; /* Table border */
    }
    .table thead {
        background-color: purple; /* Table header background */
        color: white; /* Table header text color */
    }
    .table th, .table td {
        border: 1px solid purple; /* Cell border color */
    }
    .btn-primary {
        background-color: purple; /* Primary button background */
        border-color: purple; /* Primary button border */
    }
    .btn-primary:hover {
        background-color: darkviolet; /* Darker shade on hover */
        border-color: darkviolet; /* Darker border on hover */
    }
    .alert-success {
        background-color: lightpurple; /* Light purple background for success messages */
        color: purple; /* Dark purple text for success messages */
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            @section('page_title', 'Dashboard')

            <!-- Schedule selection form -->
            <form action="{{ route('admin.dashboard') }}" method="GET" class="mb-4 d-flex justify-content-start">
                <label for="schedule" class="mr-2">Pilih Jadwal:</label>
                <select id="schedule" name="schedule" class="form-control" style="width: 200px;">
                    <option value="" disabled {{ is_null(request()->input('schedule')) ? 'selected' : '' }}>Pilih Jadwal</option>
                    <option value="jadwal_1" {{ request()->input('schedule') == 'jadwal_1' ? 'selected' : '' }}>Jadwal 1</option>
                    <option value="jadwal_2" {{ request()->input('schedule') == 'jadwal_2' ? 'selected' : '' }}>Jadwal 2</option>
                    <option value="jadwal_3" {{ request()->input('schedule') == 'jadwal_3' ? 'selected' : '' }}>Jadwal 3</option>
                    <option value="jadwal_4" {{ request()->input('schedule') == 'jadwal_4' ? 'selected' : '' }}>Jadwal 4</option>
                    <option value="jadwal_5" {{ request()->input('schedule') == 'jadwal_5' ? 'selected' : '' }}>Jadwal 5</option>
                </select>
                <button type="submit" class="btn btn-primary ml-3 mt-0">Filter</button>
            </form>

            <!-- Display Agenda Table -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kegiatan</th>
                            <th scope="col">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($agendas as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>{{ $item->deskripsi }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data tersedia untuk jadwal yang dipilih.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
