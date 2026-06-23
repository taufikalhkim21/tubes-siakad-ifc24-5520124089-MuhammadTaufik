@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dosen.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>Matakuliah</h1>
        <div class="dosen-table">
            <a href="{{ route('matakuliah.create') }}"><i class="fa-solid fa-plus"></i> Tambah Matakuliah</a>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Matakuliah</th>
                            <th>SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataMatakuliah as $matakuliah)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $matakuliah->kode_matakuliah }}</td>
                                <td>{{ $matakuliah->nama_matakuliah }}</td>
                                <td>{{ $matakuliah->sks }}</td>
                                <td>
                                    <a href="{{ route('matakuliah.edit', $matakuliah->kode_matakuliah) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('matakuliah.destroy', $matakuliah->kode_matakuliah) }}" method="POST">
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
