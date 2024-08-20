<div class="card-body">
    <h2 style="text-align: center">Daftar Pesanan</h2>
    <h2 style="text-align: center">Sistem Reservasi Nagari Wayang Kertas</h2>
    <table class="table" style="width: 100%;" border="0.5">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Waktu Pesanan</th>
                <th scope="col" class="text-center">Nama Paket</th>
                <th scope="col" class="text-center">Nama Pemesan</th>
                <th scope="col" class="text-center">Durasi</th>
                <th scope="col" class="text-center">Jam Kedatangan</th>
                {{-- <th scope="col">Jumlah Orang</th>
                <th scope="col">Total Harga</th> --}}
                {{-- <th scope="col">Tanggal Kedatangan</th> --}}
                <th scope="col" class="text-center ">Status Pembayaran</th>
                {{-- <th scope="col">Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
                <tr>
                    <th class="text-center">{{ $loop->iteration }}</th>
                    <td style="text-align: center">{{ $data->tanggal_pesanan }}</td>
                    <td style="text-align: center">{{ $data->paketwisata->nama_paket }}</td>
                    <td style="text-align: center">{{ $data->user->nama }}</td>
                    <td style="text-align: center">{{ $data->paketwisata->durasi }} Jam</td>
                    <td style="text-align: center">{{ $data->jam_pesanan }}</td>
                    {{-- <td class="text-left">{{ $data->jumlah_orang }} Orang</td> --}}
                    {{-- <td class="text-left">@currency($data->total_harga)</td> --}}
                    {{-- <td class="text-left">{{ $data->tanggal_kedatangan }}</td> --}}
                    @if ($data->status == 'lunas')
                        <td style="text-align: center">
                            <p><span class="badge bg-success text-center">Sudah Lunas</span></p>
                        </td>
                    @else
                        <td style="text-align: center">
                            <p><span class="badge bg-warning text-center">Masih Proses</span></p>
                        </td>
                    @endif
                    {{-- <th><button class="btn btn-info btn-sm"><i class="fa-solid fa-eye">

                            </i>
                        </button>
                    </th> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
