@include('layout.header')
@include('layout.navbar')
<section class="section__container">
    <div class="detail__content">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="detail__card mb-3">
                            <img src="{{ asset('storage/' . $blog->gambar) }}" alt="img-blur-shadow">
                        </div>

                    </div>
                    <div class="text-center">
                        <h3>{{ $blog->judul }}</h3>
                        <p>{{ $blog->created_at }}</p>
                        <div>
                            <a href="{{ route('user.blog') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <div>
                        <p style="text-align: justify">
                        <div class="card-body">
                            <p class="card-text">{{ strip_tags($blog->deskripsi) }}
                        </div>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@include('layout.footer')
