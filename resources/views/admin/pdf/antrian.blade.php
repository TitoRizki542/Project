<div class="card-body">
    <h2 style="text-align: center">Daftar Antrian</h2>
    <h2 style="text-align: center">Sistem Reservasi Nagari Wayang Kertas</h2>
    <table class="table" style="width: 100%;" border="1">
        <thead>
            <tr>
                <th scope="col" class="text-center">Antrian</th>
                <th scope="col" class="text-center">Nama Paket</th>
                <th scope="col" class="text-center">Nama Pemesan</th>
                <th scope="col" class="text-center">Tanggal Kedatangan</th>
                <th scope="col" class="text-center">Durasi</th>
                <th scope="col" class="text-center">Jam Kedatangan</th>
                <th scope="col" class="text-center">Paraf Reservasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($antrian as $data)
                <tr>
                    <th style="text-align: center">{{ $loop->iteration }}</th>
                    <td style="text-align: center">{{ $data->paketwisata->nama_paket }}</td>
                    <td style="text-align: center">{{ $data->user->nama }}</td>
                    <td style="text-align: center">{{ $data->tanggal_kedatangan }}</td>
                    <td style="text-align: center">{{ $data->paketwisata->durasi }}</td>
                    <td style="text-align: center">{{ $data->jam_pesanan }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
