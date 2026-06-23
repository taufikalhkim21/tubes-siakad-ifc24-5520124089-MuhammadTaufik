@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dosen.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>Jadwal</h1>
        <div class="dosen-table">
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('jadwal.create') }}"><i class="fa-solid fa-plus"></i> Tambah Jadwal</a>
            @endif
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Mata Kuliah</th>
                            <th>Nama Dosen</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            @if (auth()->user()->role === 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataJadwal as $jadwal)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jadwal->kode_matakuliah }}</td>
                                <td>{{ $jadwal->matakuliah ? $jadwal->matakuliah->nama_matakuliah : '-' }}</td>
                                <td>{{ $jadwal->dosen ? $jadwal->dosen->nama : '-' }}</td>
                                <td>{{ $jadwal->kelas }}</td>
                                <td>{{ $jadwal->hari }}</td>
                                <td>{{ $jadwal->jam }}</td>
                                @if (auth()->user()->role === 'admin')
                                    <td>
                                        <a href="{{ route('jadwal.edit', $jadwal->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
