@include('layout.header')
@include('layout.navbar')
<style>
    .header__image__container {

        position: relative;
        min-height: 500px;
        background-image: linear-gradient(to right,
                rgba(52, 53, 90, 0.9),
                rgba(223, 223, 223, 0)), url("user/image/candi.jpg");
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 2rem;
    }
</style>
<header class="section__container header__container">
    <div class="header__image__container">
        <div class="header__content">
            <h2 class="mb-0" data-aos="fade-up" data-aos-duration="1500">Sistem Reservasi Paket
                wisata</h2>
            <h2 class="mb-0" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1000">Desa Wisata
                Candirejo</h2>
            <h1 data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">Nagari Wayang Kertas</h1>

        </div>

    </div>
</header>

<section class="section__container blog__container">
    <h2 class="section__header" data-aos="fade-up">Perlu Ditanyakan?</h2>
    <p class="text-center mb-3" data-aos="fade-up">Informasi yang mungkin paling sering cari</p>
    <div class="row">
        <div class="col-lg-5 mb-3">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-aos="zoom-in">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="{{ URL::asset('user/image/foto (1).jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ URL::asset('user/image/foto (2).jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ URL::asset('user/image/foto (3).jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ URL::asset('user/image/foto (4).jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ URL::asset('user/image/foto (5).jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ URL::asset('user/image/foto (6).jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="accordion" id="accordionExample" data-aos="zoom-in">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Apa itu Nagari Wayang Kertas?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Nagari Wayang Kertas</strong> merupakan destinasi yang didalamnya ialah sebuah ruang
                            edikuasi untuk
                            belajar dan sekaligus untuk melestarikan
                            wayang.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Apa yang menarik dari Nagari Wayang Kertas?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Nagari Wayang Kertas</strong> menawarkan beberapa pilihan, diantaranya seperti
                            pertunjukan wayang, pameran kerajinan tangan tradisional,
                            serta tempat belajar membuat wayang dari bahan dasar kertas.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Di mana lokasi Nagari Wayang Kertas?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Nagari Wayang Kertas</strong> tepatnya terletak di Dusun Sangen, Desa Candirejo,
                            Kecamatan Borobudur, Kabupaten Magelang.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                            Sejak kapan destinasi Nagari Wayang Kertas?
                        </button>
                    </h2>
                    <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Nagari Wayang Kertas</strong> Sudah ada sejak tahun 2017
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapseThree">
                            Siapa pendiri Nagari Wayang Kertas?
                        </button>
                    </h2>
                    <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Nagari Wayang Kertas</strong> didirikan oleh Bapak Sukoco
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- <section>
    <div class="container">
        <h2 class="text-center mb-3">Periksa Jadwal</h2>
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-4">
                <form action="{{ route('cek-jadwal') }}" method="GET">
                    <div class="d-flex justify-content-center gap-3">
                        <input type="date" name='jadwal' class="form-control">
                        <button class="btn btn-primary" type="submit"> Periksa</button>
                    </div>
                </form>
            </div>
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Antrian</th>
                        <th scope="col" class="text-center">Nama Pemesan</th>
                        <th scope="col" class="text-center">Tanggal Kedatangan</th>
                        <th scope="col" class="text-center">Durasi</th>
                        <th scope="col" class="text-center">Jam Kedatangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filter as $data)
                        <tr>
                            <th style="text-align: center">{{ $loop->iteration }}</th>
                            <td style="text-align: center">{{ $data->user->nama }}</td>
                            <td style="text-align: center">{{ $data->tanggal_kedatangan }}</td>
                            <td style="text-align: center">{{ $data->paketwisata->durasi }}</td>
                            <td style="text-align: center">{{ $data->jam_pesanan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> --}}

<section class="section__container blog__container">
    <h2 class="section__header" data-aos="fade-up">Blog</h2>
    <p class="text-center mb-3" data-aos="fade-up">Informasi Seputar destinasi</p>
    <div class="row">
        @foreach ($blog as $item)
            <div class="col-lg-4 mb-4" data-aos="fade-up">
                <a href="{{ route('blog.detail', ['id' => $item->id]) }}">
                    <div class="card rounded shadow">
                        <img src="{{ URL::asset('storage/' . $item->gambar) }}" class="card-img-top" alt="...">
                </a>
                <div class="card-header">
                    <p class="card-text"> <strong> {{ $item->judul }}</strong></p>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ Str::limit(strip_tags($item->deskripsi)), 20 }}
                </div>


            </div>
    </div>
    @endforeach
    </div>
</section>




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
            title: "Done",
            text: ('{{ $message }}'),
        });
    </script>
@endif
