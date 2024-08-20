@extends('admin.master.layout')
@section('judul halaman', 'Daftar Pesanan')
@section('content')
    {{-- Judul Halaman --}}
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Administrasi</li>
                <li class="breadcrumb-item">Daftar Pesanan</li>
            </ol>
        </nav>
    </div>
    {{-- Akhir Judul Halaman --}}

    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li>
                                <a href="{{ route('daftarpesanan.index') }}?export=pdf" class="dropdown-item">
                                    <i class="bi bi-download">
                                    </i> Cetak Laporan
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Pesanan <span>| Terbaru</span></h5>

                        <form action="{{ route('pesanan.filter') }}" method="GET">
                            <div class="row">
                                <div class="mb-3 d-flex justify-content-left gap-3">
                                    <div class="col-lg-1">
                                        <p>Filter PerTanggal</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="date" class="form-control" name="pesanan">
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-primary" type="submit">Filter Tanggal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    {{-- <th scope="col" class="text-center">Id Pesanan</th> --}}
                                    <th scope="col" class="text-center">Tanggal Pesanan</th>
                                    <th scope="col" class="text-center">Kode Pesanan</th>
                                    <th scope="col" class="text-center">Nama Paket</th>
                                    <th scope="col" class="text-center">Nama Pemesan</th>
                                    <th scope="col">Tanggal Datang</th>
                                    {{-- <th scope="col" class="text-center">Durasi</th> --}}
                                    {{-- <th scope="col">Jumlah Orang</th>
                                    <th scope="col">Total Harga</th> --}}
                                    {{-- <th scope="col" class="text-center">Jam Kedatangan</th> --}}
                                    <th scope="col" class="text-center ">Status Pembayaran</th>
                                    <th scope="col">Detail</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $i => $d)
                                    <tr>
                                        <th class="text-center">{{ $loop->iteration }}</th>
                                        {{-- <th class="text-center">{{ $d->id }}</th> --}}
                                        <td class="text-center">{{ $d->tanggal_pesanan }}</td>
                                        <td class="text-center">{{ $d->kode_pesanan }}</td>
                                        <td class="text-center">{{ $d->paketwisata->nama_paket }}</td>
                                        <td class="text-center">{{ $d->user->nama }}</td>
                                        <td class="text-center">{{ $d->tanggal_kedatangan }}</td>
                                        {{-- <td class="text-center">{{ $data->paketwisata->durasi }} Jam</td> --}}
                                        {{-- <td class="text-left">{{ $data->jumlah_orang }} Orang</td> --}}
                                        {{-- <td class="text-left">@currency($data->total_harga)</td> --}}
                                        {{-- <td class="text-center">{{ $data->jam_pesanan }}</td> --}}
                                        @if ($d->status == 'lunas')
                                            <td class="text-center">
                                                <h5><span class="badge bg-success text-center">Lunas</span></h5>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <h5><span class="badge bg-warning text-center">Proses</span></h5>
                                            </td>
                                        @endif
                                        <th>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
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
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <h6>Tanggal Pesanan</h6>
                                                                    <h6>Kode Pesanan</h6>
                                                                    <h6>Nama Pemesan</h6>
                                                                    <h6>Nama Paket</h6>
                                                                    <h6>Durasi Paket</h6>
                                                                    <h6>Total Harga</h6>
                                                                    <h6>Jumlah Orang</h6>
                                                                    <h6>Tanggal Kedatangan</h6>
                                                                    <h6>Jam Kedatangan</h6>
                                                                    <h6>Catatan Pesanan</h6>
                                                                    <h6>Status Pembayaran</h6>
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <h6>: {{ $d->tanggal_pesanan }}</h6>
                                                                    <h6>: {{ $d->kode_pesanan }}</h6>
                                                                    <h6>: a/n {{ $d->user->nama }}</h6>
                                                                    <h6>: {{ $d->paketwisata->nama_paket }}</h6>
                                                                    <h6>: {{ $d->paketwisata->durasi }} Jam</h6>
                                                                    <h6>: @currency($d->total_harga)</h6>
                                                                    <h6>: {{ $d->jumlah_orang }} Orang</h6>
                                                                    <h6>: {{ $d->tanggal_kedatangan }}</h6>
                                                                    <h6>: {{ $d->jam_kedatangan }}</h6>
                                                                    <h6>: "{{ $d->catatan }}"</h6>
                                                                    <h6>
                                                                        @if ($d->status == 'lunas')
                                                                            <h5><span
                                                                                    class="badge bg-success text-center">Lunas</span>
                                                                            </h5>
                                                                        @else
                                                                            <h5><span
                                                                                    class="badge bg-warning text-center">Proses</span>
                                                                            </h5>
                                                                        @endif
                                                                    </h6>
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
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
