@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.agenda.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kegiatan">Kegiatan</label>
                    <input type="text" name="kegiatan" class="form-control" placeholder="Enter Kegiatan" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" placeholder="Enter Deskripsi" required></textarea>
                </div>
                <div class="form-group">
                    <label for="schedule">Pilih Jadwal</label>
                    <select name="schedule" class="form-control" required>
                        <option value="" disabled selected>Select a Schedule</option>
                        <option value="jadwal_1">Jadwal 1</option>
                        <option value="jadwal_2">Jadwal 2</option>
                        <option value="jadwal_3">Jadwal 3</option>
                        <option value="jadwal_4">Jadwal 4</option>
                        <option value="jadwal_5">Jadwal 5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
