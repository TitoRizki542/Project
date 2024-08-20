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
                            <option value="pesanan">Terbanyak Dipesan</option>
                            {{-- <option value="rating">Rating</option> --}}
                        </select>
                        <button type="submit" class="btn btn-primary mb-0">Sorting</button>
                        <a href="{{ route('wisata.index') }}" class="btn btn-warning mb-0">Hapus</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($paketwisata as $i => $item)
            <div class="col-lg-4 mt-4 mb-4">
                <a href="{{ route('wisata.detail', ['id' => $item->id]) }}">
                    <div class="popular__card mb-2" data-aos="zoom-in">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="">
                        <div class="popular__content">
                            <div class="popular__card__header">
                                <h3>{{ $item->nama_paket }}</h3>
                            </div>
                            {{-- <div class="">
                                <h4>@currency($item->harga)</h4>
                            </div> --}}
                            <div class="popular__card__header">
                                <p>{{ $item->alamat }}</p>
                            </div>
                            <div class="d-flex gap-2">
                                <input class="rating mb-0" max="5" step="0.5"
                                    style="--value:{{ $avgRate[$i] }}" type="range" value="{{ $avgRate[$i] }}">
                                </label>
                                <h5 class="py-1" style="color: black">
                                    (<i class="fa-sharp fa-solid fa-star fa-lg" style="color: gold;"></i>
                                    {{ number_format($avgRate[$i], 1) }})
                                </h5>
                            </div>

                            @auth
                                <div class="d-flex justify-content-between mt-2">

                                    <div class="mt-2">
                                        <h5>@currency($item->harga)</h5>
                                    </div>
                                    <div class="mb-0 ">
                                        <a href="{{ route('wisata.detail', ['id' => $item->id]) }}"
                                            class="btn btn-primary">Reservasi</a>
                                    </div>
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

<script>
    AOS.init();
</script>

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
