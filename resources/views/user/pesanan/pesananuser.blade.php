@include('layout.header')
@include('layout.navbar')

<section class="section__container popular__container">
    <div class="container">
        <div class="row justify-content-left">
            @foreach ($pesanan as $pesanan)
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            Pesanan Paket Wisata
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="{{ asset('storage/' . $pesanan->paketwisata->thumbnail) }}" width="50">
                                </div>
                                <div class="col-lg-8">
                                    <div class="">
                                        {{ $pesanan->paketwisata->nama_paket }}
                                    </div>
                                    <div class="">
                                        <i class=""></i>{{ $pesanan->jumlah_orang }} orang
                                    </div>
                                    <div class="">
                                        <strong> @currency($pesanan->total_harga)</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            @if ($pesanan->rating)
                                <div class="d-flex justify-content-left gap-2">
                                    <a href="{{ route('wisata.detail', $pesanan->paketwisata->id) }}"
                                        class="btn btn-warning  btn-sm">Detail Penilaian <i
                                            class="fa-solid fa-eye"></i></a>
                                    {{-- <a href="{{ route('rating.index') }}?export=pdf" class="btn btn-danger btn-sm">Bukti
                                        Pembayaran<i class="fa-solid fa-download"></i></a> --}}
                                </div>
                            @else
                                <div class="d-flex justify-content-left gap-4">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Beri Penilaian <i
                                            class="fa-solid fa-star"></i></button>
                                    {{-- <a href="{{ route('rating.index') }}?export=pdf""
                                        class="btn btn-danger btn-sm">Bukti
                                        Pembayaran <i class="fa-solid fa-download"></i></a> --}}
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Rating Paket Wisata</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('rating.simpan', $pesanan->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input name="rating" class="rating" max="5"
                                                        oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)"
                                                        step="1" style="--value:0" type="range" value=""
                                                        min="0" max="5">
                                                    <div class="form-floating mt-3 mb-3">
                                                        <textarea name="komentar" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">Komentar</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>









                {{-- <div class="col-lg-8 mb-3">
                    <div class="card card shadow">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="{{ asset('storage/' . $pesanan->paketwisata->thumbnail) }}" width="50">
                            </div>
                            <div class="col-lg-8">
                                <div class="h6 mt-3">
                                    {{ $pesanan->paketwisata->nama_paket }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}




                {{-- @if ($pesanan->rating)
                            <div class="px-0 ">
                                <a href="{{ route('wisata.detail', $pesanan->paketwisata->id) }}"
                                    class="btn btn-secondary btn-sm mb-2 py-2">Detail Penilaian <i
                                        class="fa-solid fa-eye"></i></a>
                            </div>
                        @else
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Beri Penilaian <i class="fa-solid fa-star"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Rating Paket Wisata</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('rating.simpan', $pesanan->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <input name="rating" class="rating" max="5"
                                                    oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)"
                                                    step="1" style="--value:0" type="range" value=""
                                                    min="0" max="5">
                                                <div class="form-floating mt-3 mb-3">
                                                    <textarea name="komentar" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                    <label for="floatingTextarea">Komentar</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Kembali</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif --}}
            @endforeach

        </div>
    </div>

</section>
@include('layout.footer')
