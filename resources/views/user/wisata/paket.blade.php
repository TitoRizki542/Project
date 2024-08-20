@include('layout.header')
@include('layout.navbar')
<section class="section__container">
    <div class="row">

        {{-- Bagian Detail Paket --}}
        <div class="col-lg-6">
            <div class="detail__content">
                <div class="detail__card mb-3">
                    <img src="{{ asset('storage/' . $paketwisata->thumbnail) }}" alt="destinasi1" />
                </div>
                <div class="row">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h5>{{ $paketwisata->nama_paket }}</h5>
                            <h5 style="color: rgb(255, 153, 0)"><i class="fa-solid fa-location-dot"></i><strong>
                                    {{ $paketwisata->alamat }}
                                </strong> </h5>
                        </div>
                        <div class="">
                            <h5>Jam Operasional</h5>
                            <h5 style="color: rgb(255, 153, 0)"><strong>
                                    <i class="fa-solid fa-clock"></i> 08:00 - 16:00
                                </strong> </h5>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        <div class="mb-3">
                            <h5 class="">Harga</h5>
                            <div style="color: rgb(255, 153, 0)" class="text-start">
                                <h5><strong>@currency($paketwisata->harga)</strong></h5>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5 class="">Informasi</h5>
                            <div style="color: rgb(255, 153, 0)" class="text-start">
                                <h5><strong> <i class="fa-solid fa-phone"></i> 085728006071</strong></h5>
                            </div>
                        </div>
                    </div>




                    {{-- <div class="col-lg-8 mt-4 mb-4">
                        <div class="mb-4">
                            <h4>{{ $paketwisata->nama_paket }}</h4>
                            <h5 style="color: rgb(255, 153, 0)"><i class="fa-solid fa-location-dot"></i><strong>
                                    {{ $paketwisata->alamat }}
                                </strong> </h5>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4">
                        <div class="">
                            <h4 class="text-start">Mulai dari</h4>
                            <div style="color: rgb(255, 153, 0)" class="text-start">
                                <h5><strong>@currency($paketwisata->harga)</strong></h5>
                            </div>
                        </div>
                    </div> --}}




                    <div class="row mb-3">
                        <div class="text-left">
                            <a href="{{ route('wisata.index') }}" class="btn btn-secondary"><i
                                    class="fa-solid fa-arrow-left-long"></i> Kembali</a>

                            @if ($paketwisata->ketersediaan == 0)
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Paket Habis
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Stok ketersediaan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="mb-4">
                                                    Mohon maaf, untuk saat ini paket wisata yang akan anda pesan ini
                                                    belum
                                                    melakukan re-stok ketersediaan paket. Tunggu pihak pengelola
                                                    menyediakan
                                                    paket pemesanan selanjutnya. Mohon maaf atas ketidaknyamananya.</p>

                                                <p class="text-end ">
                                                    ttd </br>
                                                    Pengelola Destinasi
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('wisata.form', $paketwisata->id) }}" class="btn btn-primary"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Untuk membuat pesanan."><i
                                        class="fa-solid fa-user-pen"></i> Buat
                                    Pesanan </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Bagian Reservasi Paket --}}
        <div class="col-lg-6">
            <div class="detail__content">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <h5>Deskripsi</h5>
                            <p style="text-align: justify">{!! strip_tags($paketwisata->deskripsi) !!}</p>
                        </div>
                        <div>
                            <h5>Fasilitas</h5>
                            <p style="text-align: justify">{!! strip_tags($paketwisata->fasilitas) !!}</p>
                        </div>
                        <h5>Rating</h5>
                        <div class="row mb-2">
                            <div class="d-flex gap-2">
                                <input class="rating" max="5"step="0.5" style="--value:{{ $avgRate }}"
                                    type="range" value="{{ $avgRate }}">
                                <h5 class="py-1">
                                    ( <i class="fa-sharp fa-solid fa-star fa-lg" style="color: gold;"></i>
                                    {{ number_format($avgRate, 1) }} )
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <h5>Stok Ketersediaan</h5>
                            <p style="text-align: justify">Tersedia untuk
                                <strong>{{ $paketwisata->ketersediaan }}</strong> pemesanan
                            </p>
                        </div>
                        <h5>Jumlah Dipesan</h5>
                        <div class="">
                            <p>
                                <strong> {{ count($rating) }}</strong> Kali Dipesan
                            </p>
                        </div>
                        <div>
                            <h5>Durasi</h5>
                            <p style="text-align: justify"><strong>{{ $paketwisata->durasi }}</strong> Jam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 text-center mb-3">
        <h4>
            Hasil Ulasan Pesanan
        </h4>
    </div>

    <div class="row mb-4">
        @foreach ($rating as $rating)
            <div class="col-lg-3 mx-left">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        {{ $rating->pesanan->user->nama }}
                    </div>
                    <div class="card-body">
                        <input class="rating mb-0" max="5" step="0.5" style="--value:{{ $rating->rating }}"
                            type="range" value="{{ $rating->rating }}">
                        </label>
                        <p>{{ $rating->komentar }}</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-end">
                            {{ $rating->created_at }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@include('layout.footer')
