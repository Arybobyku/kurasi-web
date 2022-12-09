<?php

namespace App\Http\Controllers;

use App\Models\FormProduk;
use App\Models\Kategori;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $umkm = [];
        if(Auth::guard()->user()->level == 1){
            $umkm = DB::table('umkm')->where('status',0)->get();
        }elseif(Auth::guard()->user()->level == 2){
            $umkm = DB::table('umkm')->where('status',3)->get();
        }elseif(Auth::guard()->user()->level == 3){
            $umkm = DB::table('umkm')->where('status',1)->orWhere('status',2)->get();
        }

        $anggota =  DB::table('anggota')->get();
     
        $umkmverif = DB::table('umkm')->where("status","==", 2)->get();
        return view('dashboard', ['verif'=>$umkmverif,'data' => $anggota, 'umkm' => $umkm]);
    }

    public function tolak(Request $request)
    {

        $umkm = Umkm::find($request->idumkm)->update(['catatan' => $request->catatan, 'status' => 3]);
        FormProduk::where('id_umkm',$request->idumkm)->update(['status'=>3]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function terima(Request $request)
    {
        Umkm::find($request->idterima)->update(['catatan' => $request->catatan, 'status' => 1]);
        FormProduk::where('id_umkm',$request->idterima)->update(['status'=>1]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }


    public function terimaValidasi(Request $request)
    {
        Umkm::find($request->idterima)->update(['catatan' => $request->catatan, 'status' => 2]);
        FormProduk::where('id_umkm',$request->idterima)->update(['status'=>2]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }


    public function tolakValidasi(Request $request)
    {
        Umkm::find($request->idumkm)->update(['catatan' => $request->catatan, 'status' => 3]);
        FormProduk::where('id_umkm',$request->idumkm)->update(['status'=>3]);
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function add()
    {
        if (Auth::guard()->user()->level == 2) {
            $jenis = DB::table('ms_jenis')->get();
            $kota = DB::table('ms_kota')->get();
            // $jenis = Kategori::all();
            return view('tambah', ['jenis' => $jenis, "kota" => $kota]);
        } else {
            return redirect()->route('home');
        }

        //   echo asset('storage/app/5/yoOPOR8scE8BNIjAwDCt0YxDeDxDWBMaz4SxFkOr.txt');
    }

    public function editview($id)
    {
        if (Auth::guard()->user()->level == 2) {
            $jenis = DB::table('ms_jenis')->get();
            $umkm = DB::table("umkm")->where('id', $id)->first();
            $kota = DB::table('ms_kota')->get();
            return view('edit', ['jenis' => $jenis, 'umkm' => $umkm,"kota"=>$kota]);
        } else {
            return redirect()->route('home');
        }

        //   echo asset('storage/app/5/yoOPOR8scE8BNIjAwDCt0YxDeDxDWBMaz4SxFkOr.txt');
    }

    public function hapus($id){
        if (Auth::guard()->user()->level == 2) {
            Umkm::where('id', $id)->delete();
            FormProduk::where('id_umkm', $id)->delete();
            return redirect()->back()->with('success', 'Berhasil hapus data');
        } else {
            return redirect()->route('home');
        }

    }


    public function detail($id)
    {
        $jenis = DB::table('ms_jenis')->get();
        $umkm = DB::table("umkm")->where('id', $id)->first();
        return view('detail', ['jenis' => $jenis, 'umkm' => $umkm]);

        //   echo asset('storage/app/5/yoOPOR8scE8BNIjAwDCt0YxDeDxDWBMaz4SxFkOr.txt');
    }

    public function addumkm(Request $request)
    {

        //    echo $request->file('filenib');

        if (Auth::guard()->user()->level == 2) {
            if ($request->file('filenib') != null) {
                $ttd = $request->file('filenib')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_nib'] = $image;
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

            $request['ttl'] = $request->tempat . ',' . $request->tanggal;



            $umkm =  Umkm::create($request->all());
            $result = Umkm::where('id',$umkm->id)->update(array("kode_umkm"=>"00".$umkm->id));
            return redirect()->route("tambahProdukFormPage", $umkm->id)->with('success', 'Data berhasil ditambah');
        } else {
            return redirect()->route('home');
        }
    }

    public function update(Request $request)
    {

        //    echo $request->file('filenib');

        if ($request->file('filenib') != null) {
            $ttd = $request->file('filenib')->store("berkas");
            $image = asset('storage/' . $ttd);
            $request['file_nib'] = $image;
        }

        if ($request->file('filepirt') != null) {
            $ttd = $request->file('filepirt')->store("berkas");

            $image = asset('storage/' . $ttd);
            $request['file_pirt'] = $image;
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

        $matchThese = ['id' => $request->id];
        Umkm::updateOrCreate($matchThese, $request->all());

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }
}
