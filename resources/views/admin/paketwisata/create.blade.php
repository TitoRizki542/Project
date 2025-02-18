@extends('admin.master.layout')
@section('judul halaman', 'Halaman Tambah Data')
@section('content')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('paketwisata.index') }}">Paket Wisata</a></li>
                <li class="breadcrumb-item">Tambah Data</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <form method="POST" action="{{ route('paketwisata.store') }}" class="mt-6 space-y-6"
                enctype="multipart/form-data">
                @csrf
                {{-- Kolom 1 --}}
                <div class="col-lg-12">
                    <div class="card">

                        {{-- Card Form --}}
                        <div class="card-body">
                            <h5 class="card-title">Lengkapi Data</h5>
                            <!-- Multi Columns Form -->

                            {{-- Form Nama Paket --}}
                            <form method="POST" action="{{ route('paketwisata.store') }}" class="mt-6 space-y-6"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <label for="nama_paket" class="form-label">Nama Paket </label>
                                    <input name="nama_paket" type="text"
                                        class="form-control @error('Nama Paket') is-invalid @enderror" id="nama_paket"
                                        placeholder="Masukan Nama Paket">
                                </div>

                                {{-- Form Harga --}}
                                <div class="col-12 mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input name="harga" type="number"
                                        class="form-control @error('Harga') is-invalid @enderror" id="harga"
                                        placeholder="Masukan Harga Cth. 60000" min="1">
                                    @error('harga')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="ketersediaan" class="form-label">Stok Ketersediaan Paket</label>
                                    <input name="ketersediaan" type="number"
                                        class="form-control @error('ketersediaan') is-invalid @enderror" id="ketersediaan"
                                        placeholder="Masukan Stok Ketersediaan Paket" min="1">
                                    @error('ketersediaan')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="durasi" class="form-label">Durasi Paket Wisata</label>
                                    <input name="durasi" type="number"
                                        class="form-control @error('durasi') is-invalid @enderror" id="durasi"
                                        placeholder="Masukan Durasi Paket Wisata">
                                    @error('durasi')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Form Editor Deskripsi --}}
                                <div class="col-md-12 mb-3">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-12">
                                        <textarea name="deskripsi" class="form-control @error('Deskripsi') is-invalid @enderror" id="deskripsi" rows="5"
                                            placeholder="Masukan Deskripsi Destinasi Wisata..."></textarea>
                                        @error('deskirpsi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <script>
                                        // editor1 adalah value attribute name dari textarea yang mau dipasangkan ckeditor4
                                        CKEDITOR.replace('deskripsi');
                                    </script>
                                </div>

                                {{-- Form Fasilitas --}}
                                <div class="col-md-12 mb-3">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Fasilitas</label>
                                    <div class="col-sm-12">
                                        <textarea name="fasilitas" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas" rows="5"
                                            placeholder="Masukan Deskripsi Destinasi Wisata..."></textarea>
                                        @error('deskirpsi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <script>
                                        // editor1 adalah value attribute name dari textarea yang mau dipasangkan ckeditor4
                                        CKEDITOR.replace('fasilitas');
                                    </script>
                                </div>

                                {{-- Form Alamat --}}
                                <div class="col-md-12 mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input name="alamat" type="text"
                                        class="form-control @error('Alamat') is-invalid @enderror" id="alamat"
                                        placeholder="Masukan Alamat">
                                    @error('alamat')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Form thumbnail --}}
                                <div class="col-md-12 mb-3">
                                    <label for="thumbnail" class="form-label">Tambahkan Gambar</label>
                                    <input name="thumbnail" type="file"
                                        class="form-control  @error('thumbnail') is-invalid @enderror" id="thumbnail"
                                        onchange="previewImage()">
                                    <img class="img-preview mt-4" width="400">
                                    @error('thumbnail')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Button --}}
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('paketwisata.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                            <!-- End Multi Columns Form -->
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <script>
        function previewImage() {

            const thumbnail = document.querySelector('#thumbnail');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(thumbnail.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
