<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pesanan;
use App\Models\Paketwisata;
use App\Models\Pengunjung;
use Barryvdh\DomPDF\Facade\Pdf;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $pesanan = Pesanan::orderBy('id', 'ASC')->get();
        // $pesanan = Pesanan::latest()->get();

        if($request->get('export') == 'pdf')
        {
            $pdf = Pdf::loadView('admin.pdf.pesanan', ['data' => $pesanan])->setPaper('a4','landscape');
            return $pdf->stream('daftar_pesanan.pdf');
        }

        return view('admin.pesanan.daftarpesanan', compact('pesanan'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();

        return view('admin.daftarpesanan', compact('pesanan'));
    }

    public function filter()
    {
        $filterDate = request()->pesanan;
        // dd($filterDate);
        // $antrian = Pesanan::whereDate('tanggal_kedatangan', $filterDate)->get();

        $pesanan = Pesanan::whereDate('tanggal_pesanan', $filterDate)->orderBy('id','ASC')->get();

        return view('admin.pesanan.daftarpesanan', compact('pesanan'));
    }

    public function store(Request $request,$id)
    {
        // dd($request->all());
        // dd($id);
        // dd(auth()->user()->id);
        $validateData = $request->validate([
            'tanggal_pesanan'=>'required',
            'tanggal_kedatangan'=>'required|date|after:tanggal_pesanan',
            'jam_kedatangan'=>'required',
            'catatan'=>'nullable',
            'jumlah_orang'=>'required',
            'total_harga' => 'required',
        ]);
        $validateData['kode_pesanan'] = 'NWK-' . now()->format('yhis');
        $validateData['paketwisata_id'] = $id;
        $validateData['users_id'] = auth()->user()->id;


        $pesanan = Pesanan::create($validateData);

        $paketwisata = Paketwisata::find($id);
         if ($paketwisata->ketersediaan > 0) {
                $paketwisata->decrement('ketersediaan');
    }

        return redirect()->route('pembayaran.index',$pesanan->id )->with(['success' => 'Pesanan berhasil dibuat']);
    }

    /**

     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::findOrfail($id);
        $pesanan->delete();

        $paketwisata = Paketwisata::find($pesanan->paketwisata_id);
         if ($paketwisata) {
        $paketwisata->increment('ketersediaan');
    }

        return redirect()->route('wisata.index')->with(['success', 'Pesanan berhasil dibatalkan']);
    }
}
