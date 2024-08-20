<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
        $blog = Blog::latest()->paginate(3);

        return view('user.index', compact('blog'));

    }
    public function cekJadwal()
    {
        $cek = request()->jadwal;
        // dd($cekJadwal);
        $filter = Pesanan::where('status','lunas')
        ->whereDate('tanggal_kedatangan', $cek)
        ->orderBy('id','ASC')
        ->get();
        // dd($filter);

        return view('user.index', compact('filter'));
    }
}
