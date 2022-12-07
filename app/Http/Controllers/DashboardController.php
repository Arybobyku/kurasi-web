<?php

namespace App\Http\Controllers;

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
        $status = 0;;
        if(Auth::guard()->user()->level == 1){
            $status = 0;
        }elseif(Auth::guard()->user()->level == 2){
            $status = 3;
        }elseif(Auth::guard()->user()->level == 3){
            $status = 1;
        }
        $anggota =  DB::table('anggota')->get();
        $umkm = DB::table('umkm')->where('status',$status)->get();
        $umkmverif = DB::table('umkm')->where("status","==", 1)->get();
        return view('dashboard', ['verif'=>$umkmverif,'data' => $anggota, 'umkm' => $umkm]);
    }

    public function tolak(Request $request)
    {

        $umkm = Umkm::find($request->idumkm)->update(['catatan' => $request->catatan, 'status' => 2]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function terima(Request $request)
    {

        $umkm = Umkm::find($request->idterima)->update(['catatan' => $request->catatan, 'status' => 1]);
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

            if ($request->file('filebpom') != null) {
                $ttd = $request->file('filebpom')->store("berkas");
                $image = asset('storage/' . $ttd);
                $request['file_bpom'] = $image;
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