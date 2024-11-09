@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1>Report Details</h1>
        <p>ID: {{ $report->id }}</p>
        <p>Nama Petugas: {{ $report->nama_petugas }}</p>
        <p>Kloter Keberangkatan: {{ $report->kloter_keberangkatan }}</p>
        <!-- Add more details as needed -->
    </div>
@endsection