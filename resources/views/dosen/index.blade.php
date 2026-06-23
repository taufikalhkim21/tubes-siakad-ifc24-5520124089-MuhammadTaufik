@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dosen.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>Dosen</h1>
        <div class="dosen-table">
            <a href="{{ route('dosen.create') }}"><i class="fa-solid fa-plus"></i> Tambah Dosen</a>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nidn</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataDosen as $dosen)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dosen->nidn }}</td>
                                <td>{{ $dosen->nama }}</td>
                                <td>
                                    <a href="{{ route('dosen.edit', $dosen->nidn) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('dosen.destroy', $dosen->nidn) }}" method="POST">
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
