@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dosen.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>KRS</h1>
        <div class="dosen-table">
            <div class="action-buttons">
                <a href="{{ route('krs.create') }}"><i class="fa-solid fa-plus"></i> Tambah KRS</a>
                <a href="{{ route('krs.export') }}"><i class="fa-solid fa-file-arrow-up"></i> Export PDF</a>
            </div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Matakuliah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKrs as $krs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $krs->npm }}</td>
                                <td>{{ $krs->mahasiswa ? $krs->mahasiswa->nama : '-' }}</td>
                                <td>{{ $krs->matakuliah ? $krs->matakuliah->nama_matakuliah : '-' }}</td>
                                <td>
                                    <form action="{{ route('krs.destroy', $krs->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection