<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Paketwisata;

class PembayaranController extends Controller
{
    public function index($id)
    {
        $pesanan = Pesanan::find($id);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pesanan->kode_pesanan,
                'gross_amount' => $pesanan->total_harga,
            ),
            'customer_details' => array(
                'first_name'       => auth()->user()->nama,
                // 'email'            => auth()->user()->email,
                // 'phone'            => auth()->user()->no_hp,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('user.wisata.pembayaran',compact('pesanan','snapToken'));

    }

    public function prosesbayar()
    {
        return view('user.pesanan.pesananuser');
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hashed === $request->signature_key) {
            if ($request->transaction_status == 'settlement') {
                $pesanan = Pesanan::whereKodePesanan($request->order_id);
                $pesanan->update(['status' => 'lunas']);
            }
        }
    }
}
