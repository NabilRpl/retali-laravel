@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Laporan</h1>

    @if($laporans->isEmpty())
        <div class="alert alert-info">Tidak ada laporan yang tersedia.</div>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Tanggal</th>
                    <th>Cloter</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporans as $laporan)
                    <tr>
                        <td>{{ $laporan->nama }}</td>
                        <td>{{ $laporan->no_hp }}</td>
                        <td>{{ $laporan->tanggal }}</td>
                        <td>{{ $laporan->cloter }}</td>
                        <td>{{ $laporan->waktu }}</td>
                        <td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $laporans->links() }} <!-- Menampilkan pagination -->
    @endif
</div>
@endsection
