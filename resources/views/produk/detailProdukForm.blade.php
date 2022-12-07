@extends('main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Detail Produk</h5>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <form action="{{ route('editProdukFormPage.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" value="{{ $umkm }}" name="id">
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Detail Produk UMKM
                                <span class="text-muted pt-2 font-size-sm d-block"></span>
                            </h3>
                        </div>
                        <div class="card-toolbar">

                        </div>
                    </div>
                    {{-- start Form Based on Category Product --}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Jenis Produk</label>
                            <div>
                                <div>
                                    <input type="text" name="produk_kategori" value="{{ $produk->kategori->nama }}"
                                        id="" class="form-control" id="" disabled
                                        placeholder="Produk Kategori" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Kategori Produk</label>
                            <div>
                                <div>
                                    <input type="text" name="produk_kategori" value="{{ $produk->kategori->nama }}"
                                        id="" class="form-control" id="" disabled
                                        placeholder="Produk Kategori" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Produk</label>
                            <div>
                                <div>
                                    <textarea type="text" name="produk_kategori" value="{{ $produk->deskripsi }}"
                                        id="" class="form-control" id="" value=""
                                        placeholder="Produk Kategori" disabled>{{ $produk->deskripsi }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Bahan Baku</label>
                            <div>
                                <input type="text" name="bahan_baku" value="{{ $produk->bahan_baku }}" id=""
                                    class="form-control" id="" value="" placeholder="Bahan Baku" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Bahan Tambahan</label>
                            <div>
                                <input type="text" name="bahan_tambahan" value="{{ $produk->bahan_tambahan }}"
                                    id="" class="form-control" id="" value=""
                                    placeholder="Bahan Tambahan" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Bahan Kimia</label>
                            <div>
                                <textarea type="text" name="bahan_kimia" value="{{ $produk->bahan_kimia }}" id=""
                                    class="form-control" id="" value="" placeholder="Bahan Kimia" disabled>{{ $produk->bahan_kimia }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Perhitungan Jumlah Komposisi bahan baku dan bahan tambahan dan bahan kimia</label>
                            <div>
                                <textarea type="text" name="perhitungan_kimia" value="{{ $produk->perhitungan_kimia }}"
                                    id="" class="form-control" id="" value=""
                                    placeholder="Perhitungan Kimia" disabled>{{ $produk->perhitungan_kimia }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan Singkat Pembuatan</label>
                            <div>
                                <textarea disabled type="text" name="cara_pembuatan" value="{{ $produk->cara_pembuatan }}" id=""
                                    rows="4" class="form-control" id="" placeholder="Keterangan singkat pembuatan">{{ $produk->cara_pembuatan }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Jenis Kemasan</label>
                                <div>
                                    <input type="text" name="jenis_kemasan" value="{{ $produk->jenis_kemasan }}"
                                        id="" class="form-control" id="" value=""
                                        placeholder="Jenis Kemasan" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Tampilan Kemasan</label>
                                <div>
                                    <input type="text" name="tampilan_kemasan"
                                        value="{{ $produk->tampilan_kemasan }}" id="" class="form-control"
                                        id="" value="" placeholder="Tampilan Kemasan" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File Gambar Produk</label>
                            <div>
                                <img height="250" width="250" src="{{ $produk->gambar }}" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Expired</label>
                            <div>
                                <input type="text" name="expired" value="{{ $produk->expired }}" id=""
                                    class="form-control" id="" value="" placeholder="expired" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Biaya Produksi </label>
                            <div>
                                <input type="text" name="biaya_produksi" class="form-control" id="biaya_produksi"
                                    value="{{ $produk->biaya_produksi }}" placeholder="Biaya Produksi" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <div>
                                <input disabled type="text" name="harga" value="{{ $produk->harga }}"
                                    id="" class="form-control" placeholder="harga">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Logo Halal</label>
                            <div>
                                <input disabled type="text" value="{{ $produk->logo_halal }}" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Pirt</label>
                            <div>
                                <input disabled type="text" value="{{ $produk->no_pirt }}" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor BPOM</label>
                            <div>
                                <input disabled type="text" value="{{ $produk->no_pirt }}" class="form-control" >
                            </div>
                        </div>

                        @if ($produk->barcode != null)
                            {{-- Form Pernyataan --}}
                            <i class="btn btn-sm btn-info btn-icon edit_btn" title="Print">
                                <i class="la la-print" onclick="printDiv('suratPernyataan')"></i>
                            </i>

                            <div id="suratPernyataan" class="card my-2 p-10">
                                <center>
                                    <h1><b>SURAT KETERANGAN LULUS KURASI PRODUK KUMKM</b></h1>
                                </center>
                                <br>
                                <br>
                                <h4>Dengan ini kami menerangkan bahwa:</h4>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <h4>Kab/Kota</h4>
                                    </div>
                                    <div>
                                        <h4>:</h4>
                                    </div>
                                    <div class="col-6">
                                        <h4> {{ $umkmModel->kota->nama }}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h4>No.Register KUMKM</h4>
                                    </div>
                                    <div>
                                        <h4>:</h4>
                                    </div>
                                    <div class="col-6">
                                        <h4> {{ $umkmModel->id }}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h4>No.Register Produk</h4>
                                    </div>
                                    <div>
                                        <h4>:</h4>
                                    </div>
                                    <div class="col-6">
                                        <h4>{{ $produk->id }}</h4>
                                    </div>
                                </div>
                                <br>
                                <h4>
                                    Berdasarkan hasil verifikasi terhadap seluruh informasi data
                                    Legalitas KUMKM, Sertifikasi Produk dan seluruh dokumen yang telah
                                    di upload ke dalam sistem Aplikasi Kurasi ini telah lengkap dan telah sesuai dengan
                                    ketentuan yang ditetapkan dan dinyatakan LULUS.
                                </h4>
                                <br>
                                <h4>
                                    Selanjutnya dapat segera ditindaklanjuti dengan mengirimkan produk dimaksud
                                    ke Galeri KUMKM UPT.Pusat Layanan Usaha Terpadu Dinas Koperasi dan UKM
                                    Provinsi Sumatera Utara/ Jl.Jend.Gatot Subroto Km, 5,6 (Komplek PRSU) Medan.
                                </h4>
                                <br>
                                <h4> {{ $umkmModel->kota->nama }}, {{ date('d F Y', strtotime($produk->created_at)) }}
                                </h4>
                                <br>
                                <h4>
                                    <b>
                                        UPT.PUSAT LAYANAN USAHA TERPADU DINAS KOPERASI DAN UKM PROVINSI SUMATERA UTARA
                                    </b>
                                </h4>
                                <br>
                                <h4>Sign Barcode</h4>
                                <input type="text" value="{{ $produk->barcode }}" id="barcode" hidden>
                                <div class="col-3 ">
                                    <canvas height="50" width="50" id="qrcodeCanvas"></canvas>
                                    <img id="canvaPrint">
                                </div>
                            </div>
                            {{-- End Form Pernyataan --}}
                        @endif


                    </div>

                    {{-- End --}}

                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bwip-js/3.0.4/bwip-js.min.js"></script>
    <!-- ② -->
    <script>
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

        function printDiv(divName) {
            const canvas = document.getElementById('qrcodeCanvas')
            const img = canvas.toDataURL('image/png')
            document.getElementById('canvaPrint').src = img

            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
