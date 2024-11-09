@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1>Submitted Reports</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Petugas</th>
                    <th>Kloter Keberangkatan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->nama_petugas }}</td>
                    <td>{{ $report->kloter_keberangkatan }}</td>
                    <td>
                        <a href="{{ route('admin.reports.show', $report->id) }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
