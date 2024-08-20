<section class="section__container">
    <main>
        <div class="row">
            <div class="col mx-auto">
                @foreach ($pesanan as $pesanan)
                    <div class="row mt-4 mb-4 ">
                        <div class="col-lg-8">
                            <div class="card bg bg-light border-0">
                                <h4 class="text-center mt-2 mb-2">
                                    Detail Pesanan
                                </h4>
                                <div class="row mt-3 mb-4">
                                    <div class="col-lg-4">
                                        <div class="px-3">
                                            <img src="{{ asset('storage/' . $pesanan->paketwisata->thumbnail) }}"
                                                width="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex justify-content-between align-items-center mb-3 px-5">
                                            <h6 class="mb-0">Nama Paket Wisata</h6>
                                            <p class="mb-0">{{ $pesanan->paketwisata->nama_paket }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3 px-5">
                                            <h6 class="mb-0">Nama Pemesan </h6>
                                            <p class="mb-0">{{ auth()->user()->nama }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3 px-5">
                                            <h6 class="mb-0">Tanggal Kedatangan</h6>
                                            <p class="mb-0">{{ $pesanan->tanggal_kedatangan }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 ">
                            <div class="card bg bg-light border-0">
                                <h5 class="text-center mt-2 mb-2">
                                    Total Pembayaran
                                </h5>
                                <div class="px-3 py-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0">Kode Pesanan</h6>
                                        <p class="mb-0">{{ $pesanan->kode_pesanan }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0">Harga Paket Wisata</h6>
                                        <p class="mb-0">@currency($pesanan->paketwisata->harga)</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0">Jumlah Orang</h6>
                                        <p class="mb-0">{{ $pesanan->jumlah_orang }} Orang</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row px-3 mt-3">
                                <div class="card bg-light border-0">
                                    <div class="d-flex justify-content-between alig-items-center">
                                        <h5 class="mb-2 mt-3">Total Harga</h5>
                                        <h5 class="mb-2 mt-3">@currency($pesanan->total_harga)</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </main>
</section>
