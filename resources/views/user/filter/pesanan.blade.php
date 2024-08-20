@include('layout.header')
@include('layout.navbar')

{{-- Package Section --}}
<section class="section__container popular__container">
    <h2 class="section__header mb-4">Paket Wisata Nagari Wayang Kertas</h2>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="row mb-4">
                <form action="{{ route('wisata.filter') }}" method="GET">
                    <div class="col-lg-12 d-flex gap-2">
                        <select class="form-select mb-0" id="validationCustom04" name="paketwisata" required>
                            <option value="">Filter Berdasarkan</option>
                            <option value="harga">Harga</option>
                            <option value="pesanan" selected>Terbanyak Dipesan</option>
                            {{-- <option value="rating">Rating</option> --}}
                        </select>
                        <button type="submit" class="btn btn-primary mb-0">Sorting</button>
                        <a href="{{ route('wisata.index') }}" class="btn btn-warning mb-0">Reset</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($paketwisata as $i => $item)
            <div class="col-lg-4 mt-4 mb-4">
                <a href="{{ route('wisata.detail', ['id' => $item->id]) }}">
                    <div class="popular__card mb-2">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="img-blur-shadow">
                        <div class="popular__content">
                            <div class="popular__card__header">
                                <h4>{{ $item->nama_paket }}</h4>
                            </div>
                            <div class="mb-0">
                                <h4>@currency($item->harga)</h4>
                            </div>
                            <div class="mb-0">
                                <p>{{ $item->alamat }}</p>
                            </div>
                            <div class="d-flex gap-4">
                                <input class="rating mb-0" max="5" step="0.5"
                                    style="--value:{{ $avgRate[$i] }}" type="range" value="{{ $avgRate[$i] }}">
                                </label>
                                <h5 class="py-1" style="color: black">
                                    (<i class="fa-sharp fa-solid fa-star fa-lg" style="color: gold;"></i>
                                    {{ number_format($avgRate[$i], 1) }})
                                </h5>
                            </div>
                            <div class="">
                                <p>{{ $item->pesanan_count }} Kali Dipesan</p>
                            </div>
                            @auth
                                <div class="">
                                    <a href="{{ route('wisata.detail', ['id' => $item->id]) }}"
                                        class="btn btn-primary">Reservasi</a>
                                </div>
                            @else
                                <div class="">
                                    <a href="{{ route('login') }}" class="btn btn-primary">Reservasi</a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>
@include('layout.footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: ('{{ $message }}'),
        });
    </script>
@endif
