@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kegiatan">Kegiatan</label>
                    <input type="text" name="kegiatan" class="form-control"  required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" placeholder="Enter Deskripsi" required></textarea>
                </div>
                <div class="form-group">
                    <label for="schedule">Pilih Jadwal</label>
                    <select name="schedule" class="form-control" required>
                        <option value="" disabled selected>Select a Schedule</option>
                        <option value="jadwal_1" {{ $agenda->jadwal == 'jadwal_1' ? 'selected' : '' }}>Jadwal 1</option>
                        <option value="jadwal_2" {{ $agenda->jadwal == 'jadwal_2' ? 'selected' : '' }}>Jadwal 2</option>
                        <option value="jadwal_3" {{ $agenda->jadwal == 'jadwal_3' ? 'selected' : '' }}>Jadwal 3</option>
                        <option value="jadwal_4" {{ $agenda->jadwal == 'jadwal_4' ? 'selected' : '' }}>Jadwal 4</option>
                        <option value="jadwal_5" {{ $agenda->jadwal == 'jadwal_5' ? 'selected' : '' }}>Jadwal 5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
