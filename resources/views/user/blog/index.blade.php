@include('layout.header')
@include('layout.navbar')

{{-- Blog  --}}
<section class="section__container blog__container">
    <h2 class="section__header mb-3">Blog</h2>
    <div class="row">
        <div class="col-lg-4">
            {{-- <div class="row">
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Cari Judul">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary mb-3">Cari</button>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="row">
        @foreach ($blog as $item)
            <div class="col-lg-4 mb-4">
                <a href="{{ route('blog.detail', ['id' => $item->id]) }}">
                    <div class="card rounded shadow">
                        <img src="{{ URL::asset('storage/' . $item->gambar) }}" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
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
@include('layout.footer')
