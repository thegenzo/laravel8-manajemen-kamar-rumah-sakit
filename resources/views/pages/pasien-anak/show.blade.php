@extends('layout.app')

@section('title', 'Lihat Pasien Anak')

@push('addon-style')
<!-- Include Choices CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Lihat Pasien Anak</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/pasien">Data Pasien Anak</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat Pasien Anak</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Lihat data pasien anak</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Nomor Pasien</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="nomor_pasien" class="form-control" name="nomor_pasien" value="{{ $pasien->nomor_pasien }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Nama Pasien</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" value="{{ $pasien->nama_pasien }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Umur</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="umur" class="form-control" name="umur" value="{{ $pasien->umur }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">TTL</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="ttl" class="form-control" name="ttl" value="{{ $pasien->ttl }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Alamat</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" disabled>{{ $pasien->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Jenis Kelamin</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="ttl" class="form-control" name="ttl" value="{{ $pasien->jk }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Nama Kepala Keluarga</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="nama_kepala_keluarga" class="form-control" value="{{ $pasien->nama_kepala_keluarga }}" disabled>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="col-md-12">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Sumber Informasi dan Hubungan dengan Pasien</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="sumber_informasi" class="form-control" value="{{ $pasien->sumber_informasi }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Keluhan Utama</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="keluhan_utama" class="form-control" value="{{ $pasien->keluhan_utama }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Riwayat Keluhan Utama</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="riwayat_keluhan_utama" class="form-control" value="{{ $pasien->riwayat_keluhan_utama }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Riwayat Penyakit</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="riwayat_penyakit" class="form-control" value="{{ $pasien->riwayat_penyakit }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Riwayat Alergi</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="riwayat_alergi" class="form-control" value="{{ $pasien->riwayat_alergi }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Diagnosa Masuk</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="diagnosa_masuk" class="form-control" value="{{ $pasien->diagnosa_masuk }}" disabled>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="col-md-12">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Jenis Pasien</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="diagnosa_masuk" class="form-control" value="{{ $pasien->jenis_pasien }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Kamar</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="diagnosa_masuk" class="form-control" value="{{ $pasien->kamar->nama_kamar }} - {{ $pasien->kamar->gedung }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label">Dokter yang menangani</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" id="diagnosa_masuk" class="form-control" value="{{ $pasien->dokter->nama_dokter }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/pasien-anak" class="btn btn-warning d-inline">Kembali</a>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
<!-- Include Choices JavaScript -->
<script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
@endpush