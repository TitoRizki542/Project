@include('layout.header')
@include('layout.navbar')
{{-- FORM RESERVASi --}}
<section class="section__container">
    <h4 class="text-center mt-3">Lengkapi Data Pemesanan Paket Wisata</h4>
    <h4 class="text-center" style="color: blue">Jenis {{ $paketwisata->nama_paket }}</h4>

    <p class="text-center" style="color: red"><i>*Pastikan semua formulir telah diisi</i></p>
    <form action="{{ route('pesanan.store', $paketwisata->id) }}" method="POST">
        @csrf
        <div class="row mt-4">
            <div class="col-lg-6 mt-4">
                <div class="mb-3">
                    <label for="tgl_pesan" class="form-label">Tanggal Pemesanan</label>
                    <input type="text" class="form-control" id="tgl_pesan" name="tanggal_pesanan"
                        value="{{ now() }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama Pemesan</label>
                    <input type="nama" class="form-control" id="nama" name="nama"
                        placeholder="{{ auth()->user()->nama }}"readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="{{ auth()->user()->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nomorhp" class="form-label">Nomor Handphone</label>
                    <input type="text" class="form-control" id="nomorhp" name="nomor_hp"
                        placeholder="{{ auth()->user()->nomor_hp }}" readonly>
                </div>

            </div>
            <div class="col-lg-6 mt-4">
                <div class="mb-3">
                    <label for="tgl_datang" class="form-label">Tanggal Kedatangan</label>
                    <input type="date" class="form-control" id="tgl_datang" name="tanggal_kedatangan">
                </div>
                <div class="mb-1">
                    <label for="jam_datang" class="form-label">Jam Kedatangan</label>
                    <input type="time" min="08:00" max="15:00" class="form-control" id="jam_datang"
                        name="jam_kedatangan" aria-describedby="jam_datanginfo" required>
                    <div id="jam_datanginfo" class="form-text" style="color: red">Jam Operasional dari pukul
                        08:00 - 16:00</div>
                </div>
                <div class="mb-2">
                    <label for="catatan" class="form-label">Catatan Pesanan</label>
                    <textarea class="form-control" id="catatan" rows="1" name="catatan"
                        placeholder="Kosongkan jika tidak membutuhkan tambahan"></textarea>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Orang</label>
                    <input type="number" class="form-control" id="jumlah_orang" min="0" name="jumlah_orang"
                        placeholder="Masukan jumlah orang" onchange="hitungTotal(this.value)">
                </div>
                <div class="mb-3">
                    <label for="total_harga" class="form-label" hidden>Total Harga</label>
                    <input type="text" class="form-control" id="total_harga" name="total_harga" hidden readonly>
                </div>
            </div>
            <div class="text-center mt-4 mb-4">
                <a href="{{ route('wisata.index') }}" class="btn btn-primary ">Kembali</a>
                <button type="submit" class="btn btn-warning">Simpan</button>
            </div>
    </form>
</section>
<script>
    if (document.querySelector(".datepicker")) {
        flatpickr(".datepicker", {});
    }
</script>
<script>
    const harga = {{ $paketwisata->harga }}
    const total_hargaElement = document.getElementById("total_harga");

    function hitungTotal(jmlOrang) {
        total_hargaElement.value = jmlOrang * harga
    }
</script>
@include('layout.footer')
