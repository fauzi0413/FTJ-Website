@extends('layouts.head')

@section('title', 'Status')

@section('konten')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container py-5" style="min-height: 70vh">
    <div class="d-flex justify-content-between mb-3">
        <a href="/karyatulis" class="btn btn-outline-danger fw-bold">Kembali</a>
        <form action="/status/search" method="get" class="w-50">
            <input class="form-control" style="background-color: rgba(0, 0, 0, 0.1)" type="text" name="cari" value="{{ old('cari') }}"  placeholder="Cari artikel ..." aria-label="Search">
        </form>
    </div>
    <table class="table table-hover table-bordered">
        <thead class="table-light">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Id</th>
                <th>Preview Artikel</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($status as $item)
                <tr>
                    <th class="text-center">{{ $loop->iteration }}</th>
                    <td class="text-center">{{ $item->id }}</td>
                    <td>
                        <div class="row">
                            {{-- <img src="{{ asset('./storage/posts/'.$item->gambar_artikel) }}" alt="{{ $item->judul }}" style="width: 200px"> --}}
                            <div class="col-8">
                                <span class="fw-bold"><a href="/detailartikel/{{ $item->id }}" class="text-dark">{{ $item->judul }}</a></span>
                                <br>
                                {{-- <span>{{ $item->cuplikan }}</span> --}}
                            </div>
                        </div>
                    </td>
                    <td>
                        @if ($item->status_artikel == 'Menunggu')
                            <span class="btn btn-warning text-white" style="cursor: default">{{ $item->status_artikel }}</span>
                        @elseif ($item->status_artikel == 'Disetujui')
                            <span class="btn btn-success" style="cursor: default">{{ $item->status_artikel }}</span>
                        @elseif ($item->status_artikel == 'Ditolak')
                            <span class="btn btn-danger" style="cursor: default">{{ $item->status_artikel }}</span>
                            <br>
                            <span class="text-danger">*<a type="button" class="text-danger" data-bs-toggle="modal" data-bs-target="#catatan{{ $item->id }}">Catatan</a></span>
                        @elseif ($item->status_artikel == 'Disimpan')
                            <span class="">Draft</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($item->status_artikel == 'Menunggu')
                            <span class="text-warning"><i class="fa-regular fa-clock"></i></span>
                        @elseif ($item->status_artikel == 'Disetujui')
                            <span class="text-success ms-0"><i class="fa-regular fa-circle-check"></i></span>
                            <a href="/hapustulisan/{{ $item->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                        @else
                            <a href="{{ url('./ubahtulisan/'.$item->id) }}"><span class="text-dark"><i class="fa-regular fa-pen-to-square"></i></span></a>
                            <a href="/hapustulisan/{{ $item->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="text-danger ms-lg-3"><i class="fa-regular fa-trash-can"></i></span></a>
                        @endif
                    </td>
                </tr>
                
                <!-- Modal Catatan -->
                <div class="modal fade" id="catatan{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Catatan Artikel Anda</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $item->catatan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

@endsection