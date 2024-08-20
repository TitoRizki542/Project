<?php

namespace App\Http\Controllers;

use App\Models\Paketwisata;
use App\Models\Rating;

class WisataController extends Controller
{
    public function index()
    {

        // $paketwisata = Paketwisata::orderBy('id', 'ASC')->get();
        $paketwisata = Paketwisata::with(['pesanan'=>function($q){
            $q->withSum('rating','rating');
        }])->get();


    $paketwisata = Paketwisata::with('pesanan')->withCount('pesanan')->orderBy('id', 'ASC')->get();

            foreach ($paketwisata as $i => $pw) {
                $rating = Rating::whereHas('pesanan',function($q)use($pw){
                    $q -> where('paketwisata_id',$pw->id);
                })->get();
                $avgRate[$i] = floatval($rating->avg('rating'));
            }

        return view('user.wisata.index', compact('paketwisata','avgRate'));
    }

    public function show($id)
    {
        $paketwisata = Paketwisata::where('id',$id)->first();
        $rating = Rating::whereHas('pesanan',function($q)use($paketwisata)
        {
            $q -> where('paketwisata_id',$paketwisata->id);
        })->get();

        $avgRate = floatval($rating->avg('rating'));

        return view('user.wisata.paket', compact('paketwisata', 'rating', 'avgRate'));
    }

    public function form($id)
    {
        $paketwisata = Paketwisata::where('id', $id)->first();
        // dd($paketwisata);
        return view('user.wisata.form', compact('paketwisata'));
    }


    public function filter()
    {
        $filter = request()->paketwisata;

        if ($filter == 'harga'){
            $paketwisata = Paketwisata::with('pesanan')->orderBy('harga','ASC')->get();

            foreach ($paketwisata as $i => $pw) {
                $rating = Rating::whereHas('pesanan',function($q)use($pw){
                    $q -> where('paketwisata_id',$pw->id);
                })->get();
                $avgRate[$i] = floatval($rating->avg('rating'));
            }

            return view('user.filter.harga',compact('paketwisata','avgRate'));

            // dd($paketwisata);
        }else if($filter == 'pesanan'){
            $paketwisata = Paketwisata::with('pesanan')->withCount('pesanan')->orderBy('pesanan_count', 'DESC')->get();

            foreach ($paketwisata as $i => $pw) {
                $rating = Rating::whereHas('pesanan',function($q)use($pw){
                    $q -> where('paketwisata_id',$pw->id);
                })->get();
                $avgRate[$i] = floatval($rating->avg('rating'));
            }

            return view('user.filter.pesanan',compact('paketwisata','avgRate'));
        }
    }
}
