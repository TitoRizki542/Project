<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;


class RatingController extends Controller
{
    public function index(Request $request)
    {

        $pesanan = Pesanan::whereUsersId(auth()->user()->id)->get();


        return view('user.pesanan.pesananuser',compact('pesanan'));
    }

    public function store(Request $request,$id)
    {
        $validateData = $request->validate([
            'rating' => 'required',
            'komentar' => 'required|max:50'
        ]);

        $validateData['pesanan_id'] = $id;

        $rating = Rating::create($validateData);

        return redirect()->route('rating.index')->with('success','Penilaian Berhasil!');
    }

}
