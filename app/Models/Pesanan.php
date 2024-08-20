<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paketwisata;
use App\Models\User;
use Carbon\Carbon;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'paketwisata_id',
        'users_id',
        'kode_pesanan',
        'tanggal_pesanan',
        'tanggal_kedatangan',
        'jam_kedatangan',
        'catatan',
        'jumlah_orang',
        'total_harga',
        'status',
    ];


    public function getJamPesananAttribute()
    {
        return Carbon::parse($this->jam_kedatangan)->format('h:i');
        // return Carbon::parse($this->tanggal_pesanan)->format('h:i:s');
    }

    public function paketwisata()
    {
        return $this->belongsTo(Paketwisata::class, 'paketwisata_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'pesanan_id');
    }


}

