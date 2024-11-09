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
    .icon-button {
        border: none; /* Remove button border */
        background: none; /* Remove button background */
        cursor: pointer; /* Change cursor to pointer */
        padding: 0; /* Remove padding */
    }
    .icon-button i {
        font-size: 1.5rem; /* Increase icon size */
    }
    .btn-danger {
        color: red; /* Red text for delete icon */
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary mb-3">Add Agenda</a>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Jadwal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($agendas as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->kegiatan }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->schedule }}</td> <!-- Pastikan ini mengacu pada field jadwal di model -->
                        <td class="text-center">
                            <!-- Edit Icon -->
                            <a href="{{ route('admin.agenda.edit', $item->id) }}" class="icon-button" title="Edit">
                                <i class="fas fa-edit" style="color: purple;"></i>
                            </a>
                            <!-- Delete Icon -->
                            <form action="{{ route('admin.agenda.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="icon-button" onclick="return confirm('Are you sure you want to delete this agenda?');" title="Delete">
                                    <i class="fas fa-trash" style="color: red;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada agenda tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
