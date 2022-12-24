<?php

namespace App\Http\Controllers;

use App\Models\FormProduk;
use App\Models\Kategori;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdukFormController extends Controller
{
    public function listProductPage($id)
    {
        $products = FormProduk::where('id_umkm', $id)->get();

        return view('produk/listProdukForm', ['produk' => $products, "umkm" => $id]);
    }

    public function tambahProdukPage($id)
    {
        if (Auth::guard()->user()->level == 2) {
            $umkm = Umkm::where('id', $id)->first();
            $ketegori = DB::table('ms_kategori')->get();
            $jenis = DB::table('ms_jenis')->get();
            return view('produk/tambahProdukForm', [
                'kategori' => $ketegori,
                "umkm" => $id,
                'umkmModel' => $umkm,
                "jenis" => $jenis,
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function storeProdukFormUMKM(Request $request)
    {
        if (Auth::guard()->user()->level == 2) {
            if ($request->file('file_gambar') != null) {
                $ttd = $request->file('file_gambar')->store("form-produk");
                $image = asset('storage/' . $ttd);
                $request['gambar'] = $image;
            }
            if ($request->file('filehalal') != null) {
                $ttd = $request->file('filehalal')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_halal'] = $image;
            }

            if ($request->file('filebpom') != null) {
                $ttd = $request->file('filebpom')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_bpom'] = $image;
            }

            if ($request->file('filepirt') != null) {
                $ttd = $request->file('filepirt')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_pirt'] = $image;
            }

            if ($request->file('filehaki') != null) {
                $ttd = $request->file('filehaki')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_haki'] = $image;
            }

            if ($request->file('filesni') != null) {
                $ttd = $request->file('filesni')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_sni'] = $image;
            }
            
            $request['id_umkm'] = $request->id;
            $request['status'] = 0;
            FormProduk::create($request->all());
            return redirect()->route('home')->with('success', 'Data berhasil ditambah');
        } else {
            return redirect()->route('home');
        }
    }

    public function editProdukFormUMKMPage($id)
    {
        if (Auth::guard()->user()->level == 2) {

            $produk = FormProduk::where('id', $id)->first();

            $umkm = Umkm::where('id', $produk->id_umkm)->first();
            $ketegori = Kategori::all();
            $jenis = DB::table('ms_jenis')->get();
            return view('produk.editProdukForm', [
                'produk' => $produk,
                'kategori' => $ketegori,
                "umkm" => $id,
                'umkmModel' => $umkm,
                "jenis" => $jenis,
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function updateProdukFormUMKM(Request $request)
    {

        if (Auth::guard()->user()->level == 2) {
            if ($request->file('file_gambar') != null) {
                $ttd = $request->file('file_gambar')->store("form-produk");
                $image = asset('storage/' . $ttd);
                $request['gambar'] = $image;
            }
            if ($request->file('filehalal') != null) {
                $ttd = $request->file('filehalal')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_halal'] = $image;
            }

            if ($request->file('filebpom') != null) {
                $ttd = $request->file('filebpom')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_bpom'] = $image;
            }

            if ($request->file('filepirt') != null) {
                $ttd = $request->file('filepirt')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_pirt'] = $image;
            }

            if ($request->file('filehaki') != null) {
                $ttd = $request->file('filehaki')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_haki'] = $image;
            }

            if ($request->file('filesni') != null) {
                $ttd = $request->file('filesni')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_sni'] = $image;
            }
            
            
            $request['status'] = 0;

            $matchThese = ['id' => $request->id];
            FormProduk::updateOrCreate($matchThese, $request->all());
            return redirect()->back()->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('home');
        }
    }

    public function deleteProdukFormUMKM($id)
    {
        if (Auth::guard()->user()->level == 2) {
            FormProduk::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Berhasil hapus data');
        } else {
            return redirect()->route('home');
        }
    }

    public function detailProdukFormUMKMPage($id, $umkmId)
    {
        $products = FormProduk::where('id', $id)->first();
        $umkm = Umkm::where('id', $umkmId)->first();
        return view('produk/detailProdukForm', ['produk' => $products, "umkm" => $id, "umkmModel" => $umkm]);
    }

    public function tolak(Request $request)
    {

        FormProduk::find($request->idProduk)->update(['catatan' => $request->catatan, 'status' => 2]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function terima(Request $request)
    {

        FormProduk::find($request->idProduk)->update(['catatan' => $request->catatan, 'status' => 1]);
        //    $product = FormProduk::where('id',$request->idProduk)->first();
        //    $matchThese = ['id_form' => $request->idProduk];

        //     Produk::updateOrCreate($matchThese,[
        //     "kode_umkm"=>$product->id_umkm,
        //     "id_form"=>$request->idProduk,
        //     "nama"=>$product->bahan_baku,
        //     "harga"=>$product->harga,
        //     "kode_kategori"=>$product->kategori->nama,
        //     "deskripsi"=>$product->bahan_baku,
        //     "foto"=>$product->gambar,
        //    ]); 

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
}
