@extends('main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Tambah Produk</h5>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <form action="{{ route('tambahProdukFormPage.tambah') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" value="{{ $umkm }}" name="id">
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Tambah Produk UMKM
                                <span class="text-muted pt-2 font-size-sm d-block"></span>
                            </h3>
                        </div>
                        <div class="card-toolbar">

                        </div>
                    </div>
                    {{-- start Form Based on Category Product --}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Jenis Produk<span class="text-danger">*</span> </label>
                            <div>
                                <input type="text" name="jenis_produk" id="" required class="form-control"
                                    placeholder="Jenis Produk">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Jenis Produk <span class="text-danger">*</span> </label>
                            <div>
                                <select class="form-control select2bs4" style="width: 100%;" name="kode_jenis"
                                    id="jenis_produk" placeholder="Pilih Substansi Data" required>
                                    <option value="">Pilih jenis Produk</option>
                                    {{ $no = 1 }}
                                    @foreach ($jenis as $p)
                                        <option value="{{ $p->kode_jenis }}">
                                            {{ $no }}. {{ $p->nama }}</option>
                                        {{ $no++ }}
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="">Kateogri Produk <span class="text-danger">*</span> </label>
                            <div>
                                <select class="form-control select2bs4" style="width: 100%;" name="id_kategori"
                                    id="id_kategori" placeholder="Pilih Kategoru" required>
                                    <option value="">Pilih Kategori</option>
                                    {{ $no = 1 }}
                                    @foreach ($kategori as $p)
                                        <option value="{{ $p->id }}">
                                            {{ $no }}. {{ $p->nama }}</option>
                                        {{ $no++ }}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Produk <span class="text-danger">*</span> </label>
                            <div>
                                <textarea type="text" name="deskripsi" id="" required class="form-control" id="" value=""
                                    placeholder="Deskripsi Produk"> </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Bahan Baku</label>
                            <div>
                                <input type="text" name="bahan_baku" id="" class="form-control" id=""
                                    value="" placeholder="Bahan Baku">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Bahan Tambahan</label>
                            <div>
                                <input type="text" name="bahan_tambahan" id="" class="form-control"
                                    id="" value="" placeholder="Bahan Tambahan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Bahan Kimia</label><br>
                            <label for="">Note (Pewarna, Pengawet, Pemanis Buatan, Penambah Aroma)</label>
                            <div>
                                <textarea type="text" name="bahan_kimia" id="" class="form-control" id="" value=""
                                    placeholder="Bahan Kimia"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Perhitungan Jumlah Komposisi bahan baku dan bahan tambahan dan bahan
                                kimia</label>
                            <div>
                                <textarea type="text" name="perhitungan_kimia" id="" class="form-control" id="" value=""
                                    placeholder="Perhitungan Kimia"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan Singkat Pembuatan</label>
                            <div>
                                <textarea type="text" name="cara_pembuatan" id="" rows="4" class="form-control" id=""
                                    value="" placeholder="Keterangan singkat pembuatan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Jenis Kemasan <span class="text-danger">*</span></label>
                                <select class="form-control select2bs4" style="width: 100%;" name="jenis_kemasan"
                                    id="jenis_kemasan" required>
                                    <option value="">Pilih jenis kemasan</option>
                                    <option value="Alumunium Foi">1. Alumunium Foil</option>
                                    <option value="Plastik">2. Plastik</option>
                                    <option value="Karton/Kertas">3. Karton/Kertas</option>
                                    <option value="Kaleng">4. Kaleng</option>
                                    <option value=" Kaca/Gelas">5. Kaca/Gelas</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Tampilan Kemasan <span class="text-danger">*</span></label>
                                <select class="form-control select2bs4" style="width: 100%;" name="tampilan_kemasan"
                                    id="tampilan_kemasan" required>
                                    <option value="">Pilih tampilan kemasan</option>
                                    <option value="Sangat Menarik">1. Sangat Menarik</option>
                                    <option value="Menarik">2. Menarik</option>
                                    <option value="Kurang Menarik">3. Kurang Menarik</option>
                                    <option value="Tidak Menarik">4. Tidak Menarik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File Gambar Produk
                                <span class="text-danger">*</span></label>
                            <input type="file" id="" required class="form-control" id=""
                                value="" name="file_gambar" placeholder="gambar">
                        </div>
                        <div class="form-group">
                            <label for="">Expired</label>
                            <div>
                                <input type="date" name="expired" id="" class="form-control" id=""
                                    value="" placeholder="expired">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Biaya Produksi <span class="text-danger">*</span></label> <br>
                            <label for="">Note ( Biaya Bahan Baku,Bahan Tambahan, Bahan Kimia yang dipergunakan +
                                Biaya Lain-lain (Biaya Ongkos Kirim + Biaya Kemasan + dll) + Biaya Tenaga Kerja Langsung +
                                Biaya Overhead Produksi dibagi Jumlah Kemasan Produksi )</label>
                            <div>
                                <input type="text" onchange="calculate()" name="biaya_produksi" class="form-control"
                                    id="biaya_produksi" value="" placeholder="Biaya Produksi" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <div>
                                <input type="text" name="harga" id="harga" class="form-control" id=""
                                    value="" placeholder="Rp. 0" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>No. Sertifikat Halal
                                    <span class="text-danger"></span></label>
                                <input type="text" name="no_halal" class="form-control" id="no_halal"
                                    value="" placeholder="No. Sertifikat Halal">
                            </div>
                            <div class="col-sm-4">
                                <label>File Sertifikat Halal
                                    <span class="text-danger"></span></label>
                                <input type="file" name="filehalal" class="form-control" id="filehalal"
                                    value="" placeholder="Nomor Sertifikat Halal">
                            </div>
                            <div class="col-sm-4">
                                <label>Berlaku Sampai
                                    <span class="text-danger"></span></label>
                                <input type="date" name="tgl_halal" class="form-control" id="tgl_halal"
                                    value="" placeholder="No. Sertifikat Halal">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>No. Sertifikat BPOM
                                    <span class="text-danger"></span></label>
                                <input type="text" name="no_bpom" class="form-control" id="no_bpom" value=""
                                    placeholder="No. Sertifikat BPOM">
                            </div>
                            <div class="col-sm-4">
                                <label>File Sertifikat BPOM
                                    <span class="text-danger"></span></label>
                                <input type="file" name="filebpom" class="form-control" id="filebpom"
                                    value="" placeholder="Nomor Sertifikat BPOM">
                            </div>
                            <div class="col-sm-4">
                                <label>Berlaku Sampai
                                    <span class="text-danger"></span></label>
                                <input type="date" name="tgl_bpom" class="form-control" id="tgl_bpom"
                                    value="" placeholder="No. Sertifikat BPOM">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>No. PIRT
                                    <span class="text-danger"></span></label>
                                <input type="text" name="no_pirt" class="form-control" id="no_pirt" value=""
                                    placeholder="No. PIRT">
                            </div>
                            <div class="col-sm-4">
                                <label>File Sertifikat PIRT
                                    <span class="text-danger"></span></label>
                                <input type="file" name="filepirt" class="form-control" id="filepirt"
                                    value="" placeholder="Nomor PIRT">
                            </div>
                            <div class="col-sm-4">
                                <label>Berlaku Sampai
                                    <span class="text-danger"></span></label>
                                <input type="date" name="tgl_pirt" class="form-control" id="tgl_pirt"
                                    value="" placeholder="No. PIRT">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>Nama SNI
                                    <span class="text-danger"></span></label>
                                <input type="text" name="nama_sni" class="form-control" id="no_pirt" value=""
                                    placeholder="Nama SNI">
                            </div>
                            <div class="col-sm-4">
                                <label>No. SNI
                                    <span class="text-danger"></span></label>
                                <input type="text" name="no_sni" class="form-control" id="no_pirt" value=""
                                    placeholder="No. SNI">
                            </div>
                            <div class="col-sm-4">
                                <label>File SNI
                                    <span class="text-danger"></span></label>
                                <input type="file" name="filesni" class="form-control" id="filepirt"
                                    value="" placeholder="File SNI">
                            </div>
                            <div class="col-sm-4">
                                <label>Tanggal Penerbitan SNI
                                    <span class="text-danger"></span></label>
                                <input type="date" name="tgl_sni" class="form-control" id="tgl_pirt"
                                    value="" placeholder="Tgl SNI">
                            </div>
                        </div>

                        <hr>
                        <br>
                        No. Sertifikasi HAKI
                        <br>
                        <br>

                        <div class="form-group row">

                            <div class="col-sm-6">
                                <label>Merek Dagang
                                    <span class="text-danger"></span></label>
                                <input type="text" name="merek_dagang" class="form-control" id=""
                                    value="" placeholder="Merek Dagang">
                            </div>
                            <div class="col-sm-6">
                                <label>Hak Cipta
                                    <span class="text-danger"></span></label>
                                <input type="text" name="hak_cipta" class="form-control" id=""
                                    value="" placeholder="Hak Cipta">
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-6">
                                <label>Sertifikat Haki
                                    <span class="text-danger"></span></label>
                                <input type="file" name="filehaki" class="form-control" id=""
                                    value="" placeholder="Merek Dagang">
                            </div>
                            <div class="col-sm-6">
                                <label>Berlaku Sampai
                                    <span class="text-danger"></span></label>
                                <input type="date" name="tgl_haki" class="form-control" id=""
                                    value="" placeholder="Hak Cipta">
                            </div>
                        </div>
                        <hr>
                        <br>


                        {{-- radio button --}}
                        <div class=" form-group">
                            <label for="">Merek Produk</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="iya" name="opt_merk_produk">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Iya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="tidak" name="opt_merk_produk"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        {{-- End radio Button --}}

                        {{-- radio button --}}
                        <div class=" form-group">
                            <label for="">Logo Halal Produk</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="iya" name="opt_logo_halal">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Iya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="tidak" name="opt_logo_halal"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        {{-- End radio Button --}}


                        {{-- radio button --}}
                        <div class=" form-group">
                            <label for="">Nomor Pirt</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="iya" name="opt_no_pirt">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Iya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="tidak" name="opt_no_pirt"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        {{-- End radio Button --}}



                        {{-- radio button --}}
                        <div class=" form-group">
                            <label for="">Nomor BPOM <span>(Khusus produk frozen, herbal, susu, dikemas didalam
                                    kaleng)</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="iya" name="opt_no_bpom">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Iya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="tidak" name="opt_no_bpom"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        {{-- End radio Button --}}


                        {{-- Form Pernyataan --}}
                        <div class="card my-2 p-10">
                            <center>
                                <h1><b>SURAT PERNYATAAN <br>
                                        KEBENARAN INFORMASI DATA KUMKM DAN DATA PRODUK</b></h1>
                            </center>
                            <br>
                            <br>
                            <h3>
                                Dengan ini kami menyatakan bahwa seluruh informasi data yang disampaikan adalah
                                yang sebenar-benarnya dan apabila data KUMKM beserta Data Produk yang kami ajukan
                                tidak sesuai dengan kondisi yang sebenarnya, maka kami bersedia menerima
                                pengembalian Data dan Produk yang kami kirimkan dengan menanggung segala biaya
                                yang timbul akibat pengembalian produk dimaksud.
                            </h3>
                            <br>
                            <div id="signBarcode">

                            </div>
                        </div>
                        {{-- End Form Pernyataan --}}
                        <div class="form-check">
                            <input required class="form-check-input" type="checkbox" name="pernyataan" value=""
                                id="pernyataan">
                            <label class="form-check-label" for="flexCheckChecked">
                                Setujui Pernyataan
                            </label>
                        </div>
                    </div>

                    {{-- End --}}

                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <!-- <button class="btn btn-secondary">Cancel</button> -->
                    </div>

                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bwip-js/3.0.4/bwip-js.min.js"></script>

    <script>
        var result = 0;

        function calculate() {
            var a = document.getElementById("biaya_produksi").value;
            var x = (100 / (100 - 5)) * a;
            result = Math.ceil(x);
            document.getElementById("harga").value = Math.ceil(x);
        }

        $('#pernyataan').click(function() {
            if ($('#pernyataan').is(':checked')) {
                var idKategori = $('#id_kategori').find(":selected").val();
                $('#signBarcode').html(
                    `
                <h3> Sign Barcode </h3>
                                <br>
                                <canvas height="50" width="50" id="qrcodeCanvas"></canvas>
                                <input type="text" name="harga" value="` + result +
                    `" hidden>
                                
                    <input id="barcode" type="text" hidden name="barcode" value="0{{ Auth::user()->id }}{{ $umkmModel->kode_kota }}{{ $umkmModel->kode_umkm }}` +
                    "0" + idKategori + `">
                `);


                try {
                    var barcode = document.getElementById("barcode").value;
                    // The return value is the canvas element
                    let canvas = bwipjs.toCanvas('qrcodeCanvas', {
                        bcid: 'qrcode', // Barcode type
                        text: barcode,
                    })


                } catch (e) {
                    // `e` may be a string or Error object
                }
            } else {
                $('#signBarcode').html(``)
            }
        });
    </script>
@endsection
