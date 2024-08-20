@include('layout.header')
@include('layout.navbar')
<section class="section__container">
    @push('link')
    @endpush
    <main>
        <div class="text-center">
            <h2>Halaman Pembayaran</h2>
            <p class="lead">Seleseika proses pembayaran untuk menyelesaikan proses pemesanan. </p>
        </div>
        <div class="row">
            <div class="col mx-auto">
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
                        <div class="row px-3 mt-3">
                            <button class="btn btn-primary mb-3" type="submit" id="pay-button"> Bayar Sekarang <i
                                    class="fa-solid fa-cart-shopping"></i></button>

                        </div>
                        <form action="{{ route('pembayaran.destroy', $pesanan->id) }}" method="POST">
                            @csrf
                            <div class="row px-3">
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin akan membatalkan pesanan?')">Batalkan
                                    Pesanan <i class="fa-solid fa-ban"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
@include('layout.footer')

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script type="text/javascript">
    const paybutton = document.getElementById('pay-button')
    paybutton.addEventListener('click', function() {
        // SnapToken acquired from previous step
        window.snap.pay('{{ $snapToken }}', {
            // Optional
            onSuccess: function(result) {
                window.location.href = '{{ route('rating.index') }}'
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    });
</script>
