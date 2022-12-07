<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = 'umkm';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nama',
        'nib',
        'kode_jenis',
        'foto',
        'pemilik',
        'alamat_pemilik',
        'jk',
        'ttl',
        'nohp',
        'noktp',
        'alamat_umkm',
        'jenis_produk',
        'deskripsi_produk',
        'no_halal',
        'no_bpom',
        'no_pirt',
        'merek_dagang',
        'hak_cipta',
        'email',
        'fb',
        'instagram',
        'landing_page',
        'shopee',
        'tokopedia',
        'lain',
        'nilai_asset',
        'omset',
        'karyawan',
        'tiktok',
        'youtube',
        'sosmedlain',
        'lpse',
        'mbiz',
        'deleted',
        'status',
        'file_nib',
        'file_bpom',
        'file_pirt',
        'file_halal',
        'file_haki',
        'tgl_nib',
        'tgl_bpom',
        'tgl_pirt',
        'tgl_halal',
        'tgl_haki',
        'tempat',
        'tanggal',
        'catatan',
        'kode_kota',
        'kode_umkm',
    
    ];

    use HasFactory;

    public function kota(){
        return $this->belongsTo(Kota::class,'kode_kota','id');
    }
}
