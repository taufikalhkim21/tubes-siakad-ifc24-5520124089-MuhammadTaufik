@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dosen.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>Mahasiswa</h1>
        <div class="dosen-table">
            <a href="{{ route('mahasiswa.create') }}"><i class="fa-solid fa-plus"></i> Tambah Mahasiswa</a>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Wali Dosen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataMahasiswa as $mahasiswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mahasiswa->npm }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->dosen ? $mahasiswa->dosen->nama : '-' }}</td>
                                <td>
                                    <a href="{{ route('mahasiswa.edit', $mahasiswa->npm) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->npm) }}" method="POST">
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
