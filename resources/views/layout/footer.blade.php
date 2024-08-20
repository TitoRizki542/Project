<footer class="footer">
    <div class="section__container footer__container">
        <div class="footer__col">
            <h3>Nagari Wayang Kertas</h3>
            <p>
                Merupakan destinasi wisata yang didalamnya dapat belajar membuat Wayang
                dan sebagai tempat melesatatarikan budaya dalam seni wayang.
            </p>
        </div>
        <div class="footer__col">
            <h4>Jelajahi Kami</h4>
            <div class="mb-3">
                <a href="{{ route('user.index') }}" style="color: #767268">Beranda</a><br>
            </div>
            <div class="mb-3">
                <a href="{{ route('wisata.index') }}" style="color: #767268">Paket Wisata</a><br>
            </div>
            <div class="mb-3">
                <a href="{{ route('blog.index') }}" style="color: #767268">Blog</a><br>
            </div>
            <div class="mb-3">
                <a href="{{ route('tentang.index') }}" style="color: #767268">Tentang</a>
            </div>

        </div>
        <div class="footer__col">
            <h4>Temukan Kami</h4>
            <div class="mb-3">
                <a href="" style="color: #767268">Whatsapp</a><br>
            </div>
            <div class="mb-3">
                <a href="" style="color: #767268">Instagram</a><br>
            </div>
            <div class="mb-3">
                <a href="" style="color: #767268">Facebook</a><br>
            </div>
            <div class="mb-3">
                <a href="" style="color: #767268">Youtube</a>
            </div>
        </div>
        <div class="footer__col">
            <h4>Kunjungi</h4>
            <div class="mb-3">
                <a href="" style="color: #767268">Maps</a><br>
            </div>
        </div>
    </div>
    <div class="footer__bar">
        Copyright © 2023 Nagari Wayang Kertas.
    </div>
</footer>

@stack('js')
