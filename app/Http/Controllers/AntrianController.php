<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Carbon\Carbon;
use App\Models\Paketwisata;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AntrianController extends Controller
{
    public function index(Request $request)
    {

        // $waktuDatang = Pesanan::select('jam_kedatangan')->get();
        // $lamaDurasi = Paketwisata::select('durasi')->get();
        // dd($waktuDatang);
        // dd($lamaDurasi);

        $antrian = Pesanan::where('status', 'lunas')->orderBy('id','ASC')->get();

        if($request->get('export') == 'pdf')
        {
            $pdf = Pdf::loadView('admin.pdf.antrian', ['antrian' => $antrian])->setPaper('a4','landscape');
            return $pdf->stream('daftar_antrian.pdf');
        }


        return view('admin.pesanan.antrian', compact('antrian'));
    }

    public function filter()
    {
        $filterDate = request()->antrian;

        // $antrian = Pesanan::whereDate('tanggal_kedatangan', $filterDate)->get();

        $antrian = Pesanan::where('status', 'lunas')
        ->whereDate('tanggal_kedatangan', $filterDate)
        ->orderBy('id','ASC')
        ->get();

        return view('admin.pesanan.antrian', compact('antrian'));

    }
}
