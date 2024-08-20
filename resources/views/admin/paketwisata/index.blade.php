@extends('admin.master.layout')
@section('judul halaman', 'Paket Wisata')
@section('content')
    {{-- Judul Halaman --}}
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Paket wisata</li>
            </ol>
        </nav>
    </div>
    {{-- Akhir Judul Halaman --}}
    @include('include.flash')
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card top-selling overflow-auto">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Paket Wisata <span>| Nagari Wayang Kertas</span></h5>
                        <div class="mb-4">
                            <a class="btn btn-primary" href="{{ route('paketwisata.create') }}">Tambah Data</a>
                        </div>
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Thumbnail</th>
                                    <th scope="col">Nama Paket</th>
                                    {{-- <th scope="col">Deskripsi</th> --}}
                                    {{-- <th scope="col">Alamat</th> --}}
                                    <th scope="col">Harga</th>
                                    <th class="text-center" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paketwisata as $i => $d)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/' . $d->thumbnail) }}">
                                        </td>
                                        <td>{{ $d->nama_paket }}</td>
                                        <td> @currency($d->harga) </td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <div class="">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modal{{ $i }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modal{{ $i }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Detail
                                                                    Pesanan Paket Wisata
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-5">
                                                                        <h6>Nama Paket</h6>
                                                                        <h6>Harga Paket</h6>
                                                                        <h6>ketersediaan</h6>
                                                                    </div>
                                                                    <div class="col-lg-7">
                                                                        <h6>: {{ $d->nama_paket }}</h6>
                                                                        <h6>: @currency($d->harga)</h6>
                                                                        <h6> <strong>: {{ $d->ketersediaan }}</strong>
                                                                            Pemesanan</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="">
                                                <a href="{{ route('paketwisata.edit', $d->id) }}"
                                                    class="btn btn-warning btn-sm"><i
                                                        class="bi bi-pencil-square"></i></a></br>
                                            </div>
                                            <div class="">
                                                <form action="{{ route('paketwisata.delete', $d->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                        id="{{ $d->id }}"><i class="bi bi-trash-fill"></i></button>
                                                </form>
                                            </div>
                                            <div class="">



                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Selling -->
    </section>
@endsection
