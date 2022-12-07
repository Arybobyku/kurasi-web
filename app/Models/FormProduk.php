<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormProduk extends Model
{

    protected $table = 'form_produk';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_umkm',
        'id_kategori',
        'bahan_baku',
        'bahan_tambahan',
        'bahan_kimia',
        'perhitungan_kimia',
        'jenis_kemasan',
        'cara_pembuatan',
        'harga',
        'barcode',
        'catatan',
        'expired',
        'tampilan_kemasan',
        'status',
        'gambar',
        "deskripsi",
        "kode_jenis",
        
        "biaya_produksi",
        "merk_produk",
        "logo_halal",
        "no_pirt",
        "no_bpom",
    
    ];

    use HasFactory;

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori','id');
    }

    public function jenis(){
        return $this->belongsTo(Kategori::class,'kode_jenis','id');
    }

}
