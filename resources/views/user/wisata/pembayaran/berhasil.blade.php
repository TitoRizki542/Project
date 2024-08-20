@include('layout.header')
@include('layout.navbar')

<section class="section__container popular__container min-vh-30">
    <main class="flex-shrink-0">
        <div class="container text-center">
            <h1 class="mt-5">Pembayaran Berhasil</h1>
            {{-- <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and
                CSS.</p> --}}
            <p>Kembali <a href="{{ route('wisata.index') }}">Daftar Paket Wisata</p>
        </div>
    </main>

</section>

@include('layout.footer')
