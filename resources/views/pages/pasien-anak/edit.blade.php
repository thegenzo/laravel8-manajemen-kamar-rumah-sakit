@extends('layout.app')

@section('title', 'Edit Pasien Anak')

@push('addon-style')
<!-- Include Choices CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Pasien Anak</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/pasien">Data Pasien Anak</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Pasien Anak</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit data pasien anak</h4>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('pasien-anak.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nomor Pasien</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="nomor_pasien" class="form-control" name="nomor_pasien" value="{{ $pasien->nomor_pasien }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nama Pasien</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" value="{{ $pasien->nama_pasien }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Umur</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="umur" class="form-control" name="umur" value="{{ $pasien->umur }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">TTL</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="ttl" class="form-control" name="ttl" value="{{ $pasien->ttl }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10">{{ $pasien->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" {{ $pasien->jenis_kelamin == 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="laki-laki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" {{ $pasien->jenis_kelamin == 'P' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="perempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nama Kepala Keluarga</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="nama_kepala_keluarga" name="nama_kepala_keluarga" class="form-control" value="{{ $pasien->nama_kepala_keluarga }}">
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
                                    <input type="text" id="sumber_informasi" class="form-control" name="sumber_informasi" value="{{ $pasien->sumber_informasi }}">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Keluhan Utama</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <textarea class="form-control" name="keluhan_utama" id="keluhan_utama" cols="30" rows="5">{{ $pasien->keluhan_utama }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Riwayat Keluhan Utama</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <textarea class="form-control" name="riwayat_keluhan_utama" id="riwayat_keluhan_utama" cols="30" rows="5">{{ $pasien->riwayat_keluhan_utama }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Riwayat Penyakit</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <textarea class="form-control" name="riwayat_penyakit" id="riwayat_penyakit" cols="30" rows="5">{{ $pasien->riwayat_penyakit }}</textarea>
                                    <small class="text-muted">Jika tidak ada, boleh dikosongkan</small>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Riwayat Alergi</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <textarea class="form-control" name="riwayat_alergi" id="riwayat_alergi" cols="30" rows="5">{{ $pasien->riwayat_alergi }}</textarea>
                                    <small class="text-muted">Jika tidak ada, boleh dikosongkan</small>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Diagnosa Masuk</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="diagnosa_masuk" name="diagnosa_masuk" class="form-control" value="{{ $pasien->diagnosa_masuk }}">
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
                                    <select name="jenis_pasien" id="jenis_pasien" class="form-control">
                                        <option value="JKN" {{ $pasien->jenis_pasien == 'JKN' ? 'selected' : '' }}>JKN</option>
                                        <option value="Umum" {{ $pasien->jenis_pasien == 'Umum' ? 'selected' : '' }}>Umum</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Kamar</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    @if ($kamarTersedia < 1)
                                    <h5 class="text-danger">Seluruh kamar rawat inap telah penuh!</h5>
                                    @else
                                    <fieldset class="form-group">
                                        <select class="form-select" id="id_kamar" name="id_kamar">
                                            @forelse ($kamar as $data)
                                            <option value="{{ $data->id }}" {{ $pasien->id_kamar == $data->id ? 'selected' : ''}}>{{ $data->nama_kamar }} - Kelas {{ $data->kelas }} - Gedung {{ $data->gedung }}</option>
                                            @empty
                                            <option value="" selected hidden>Kamar Kosong</option>
                                            @endforelse
                                        </select>
                                    </fieldset>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Dokter yang menangani</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <select name="id_dokter" id="id_dokter" class="form-control">
                                        @forelse ($dokter as $data)
                                        <option value="{{ $data->id }}" {{ $pasien->id_dokter == $data->id ? 'selected' : ''}}>{{ $data->nama_dokter }} - {{ $data->spesialis }}</option>
                                        @empty
                                        <option value="" selected hidden>Kamar Kosong</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="/pasien-anak" class="btn btn-warning d-inline">Kembali</a>
                </form>
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