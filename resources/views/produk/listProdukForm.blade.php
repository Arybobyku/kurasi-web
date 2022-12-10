@extends('main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="container-fluid">

            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">List Produk
                            <span class="text-muted pt-2 font-size-sm d-block"></span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->

                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <div class="dropdown dropdown-inline mr-2">
                            @if (Auth::guard()->user()->level == 1)
                            @endif
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi flex-column navi-hover py-2">
                                    <li
                                        class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                        Choose an option:</li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link" id="export_print">
                                            <span class="navi-icon">
                                                <i class="la la-print"></i>
                                            </span>
                                            <span class="navi-text">Print</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link" id="export_copy">
                                            <span class="navi-icon">
                                                <i class="la la-copy"></i>
                                            </span>
                                            <span class="navi-text">Copy</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link" id="export_excel">
                                            <span class="navi-icon">
                                                <i class="la la-file-excel-o"></i>
                                            </span>
                                            <span class="navi-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link" id="export_csv">
                                            <span class="navi-icon">
                                                <i class="la la-file-text-o"></i>
                                            </span>
                                            <span class="navi-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link" id="export_pdf">
                                            <span class="navi-icon">
                                                <i class="la la-file-pdf-o"></i>
                                            </span>
                                            <span class="navi-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        @if (Auth::guard()->user()->level == 2)
                            <a href="{{ route('tambahProdukFormPage', $umkm) }}" <button type="button"
                                class="btn btn-primary" style="margin-right: 20px;" data-target="#exampleModal">
                                Tambah Produk
                                </button></a>
                        @endif


                        <!--end::Button-->

                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-checkable" id="kt_datatable2">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Jenis Produk</th>
                                <th>Kategori Produk</th>
                                <th>Gambar</th>
                                <th>Status</th>

                                <th>Aksi</th>


                            </tr>
                        </thead>
                        <tbody>


                            @php
                                $nomor = 1;
                            @endphp
                            @foreach ($produk as $d)
                                <tr>
                                    <td style=" width:5%">{{ $nomor }}</td>
                                    <td>{{ $d->jenis_produk }}</td>
                                    <td>{{ $d->kategori->nama }}</td>
                                    <td>
                                        <img height="100" width="100" src="{{ $d->gambar }}" />
                                    </td>

                                    <td>
                                        @if ($d->status == 0)
                                            <span
                                                class="label label-lg font-weight-bold label-light-primary label-inline">Belum
                                                Diperiksa</span>
                                        @elseif ($d->status == 1)
                                            <span
                                                class="label label-lg font-weight-bold label-light-warning label-inline">Terverifikasi</span>
                                        @elseif ($d->status == 2)
                                            <span
                                                class="label label-lg font-weight-bold label-light-success label-inline">Divalidasi</span>
                                        @else
                                            <span
                                                class="label label-lg font-weight-bold label-light-danger label-inline">Ditolak</span>
                                        @endif

                                    </td>
                                    <td nowrap="nowrap">
                                        <a href="{{ route('detailProdukForm', [$d->id, $umkm]) }}" class="btn btn-primary"
                                            id="{{ $d->id }}" title=" Detail Data ">
                                            Detail
                                        </a>
                                        @if (Auth::guard()->user()->level == 1)
                                            <a class="btn btn-success terima_btn_produk" id="{{ $d->id }}"
                                                title=" Edit Data ">
                                                Terima
                                            </a>

                                            <a class="btn  btn-danger tolak_btn_produk" id="{{ $d->id }}"
                                                title=" Edit Data ">
                                                Tolak
                                            </a>
                                        @endif

                                        @if (Auth::guard()->user()->level == 2)
                                            <a href="{{ route('editProdukFormPage', $d->id) }}" class="btn btn-info "
                                                id="{{ $d->id }}" title=" Edit Data ">
                                                Edit
                                            </a>
                                            <form action="{{ route('deleteProdukForm', $d->id) }}" method="post"
                                                onsubmit="return confirm('Apakah anda sudah yakin menghapus data ini ?');"
                                                class="pt-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-sm btn-danger btn-iconr" title="Delete">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif

                                    </td>



                                </tr>

                                @php
                                    $nomor++;
                                @endphp
                            @endforeach




                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>

        </div>


        <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alasan Penolakan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('produkForm.tolak') }}">
                            {{ csrf_field() }}
                            <input type="hidden" id="idumkm" name="idProduk">
                            <textarea class="form-control" required name="catatan" id="catatan" placeholder="Alasan Penolakan"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                        <button type="Submit" name="Submit" class="btn btn-primary">Tolak Verifikasi</button>
                    </div>w
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="terimaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('produkForm.terima') }}">
                            {{ csrf_field() }}
                            <input type="hidden" id="idterima" name="idProduk">
                            <textarea class="form-control" required name="catatan" id="catatan" placeholder="Catatan"></textarea>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                        <button type="Submit" name="Submit" class="btn btn-primary">Verifikasi</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
