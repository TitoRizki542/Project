@extends('admin.master.layout')
@section('judul halaman', 'Daftar Antrian')
@section('content')
    {{-- Judul Halaman --}}
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Administrasi</li>
                <li class="breadcrumb-item">Daftar Antrian</li>
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
                            <li><a class="dropdown-item" href="{{ route('antrian.index') }}?export=pdf"><i
                                        class="bi bi-filetype-pdf"></i> Unduh PDF
                                    (.pdf)</a>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-filetype-xls""></i> Unduh EXCEL
                                    (.xlsx)</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Antrian <span>| Terbaru</span></h5>

                        {{-- filter tanggal --}}
                        <form action="{{ route('antrian.filter') }}" method="GET">
                            <div class="row">
                                <div class="mb-3 d-flex justify-content-left gap-3">
                                    <div class="col-lg-1">
                                        <p>Filter PerTanggal</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="date" class="form-control" name="antrian">
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
                                    <th scope="col" class="text-center">Antrian</th>
                                    <th scope="col" class="text-center">Nama Paket</th>
                                    <th scope="col" class="text-center">Nama Pemesan</th>
                                    <th scope="col" class="text-center">Tanggal Kedatangan</th>
                                    <th scope="col" class="text-center">Durasi</th>
                                    <th scope="col" class="text-center">Jam Kedatangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($antrian as $data)
                                    <tr>
                                        <th style="text-align: center">{{ $loop->iteration }}</th>
                                        <td style="text-align: center">{{ $data->paketwisata->nama_paket }}</td>
                                        <td style="text-align: center">{{ $data->user->nama }}</td>
                                        <td style="text-align: center">{{ $data->tanggal_kedatangan }}</td>
                                        <td style="text-align: center">{{ $data->paketwisata->durasi }} Jam</td>
                                        <td style="text-align: center">{{ $data->jam_pesanan }}</td>
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
