@extends('layout.app')

@section('title', 'Diagnosa Pasien')

@push('addon-style')

@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Diagnosa Pasien</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/pasien">Data Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Diagnosa Pasien</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Data Pasien
                        </div>
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
                                        <label class="col-form-label">Nama Kepala Keluarga</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="text" id="nomor_pasien" class="form-control" name="nomor_pasien" value="{{ $pasien->nama_kepala_keluarga }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label">Umur</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="text" id="nomor_pasien" class="form-control" name="nomor_pasien" value="{{ $pasien->umur }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label">Diagnosa Masuk</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="text" id="nomor_pasien" class="form-control" name="nomor_pasien" value="{{ $pasien->diagnosa_masuk }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Isi Hasil Diagnosa Pasien</div>
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
                        <form action="/diagnosa/{{ $pasien->id }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label class="col-form-label">Diagnosa Akhir</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <input type="text" id="diagnosa_akhir" class="form-control" name="diagnosa_akhir" placeholder="Masukkan Diagnosa Akhir">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label class="col-form-label">Obat</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <textarea class="form-control" name="obat" id="obat" cols="30" rows="10"></textarea>
                                            <small class="text-muted">Boleh dikosongkan</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label class="col-form-label">Status Pasien</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="status_pasien" name="status_pasien">
                                                    <option value="" selected hidden>Pilih Status Pasien</option>
                                                    <option value="Sembuh">Sembuh</option>
                                                    <option value="Rujukan">Rujukan</option>
                                                    <option value="Meninggal">Meninggal</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-3">
                                            <label class="col-form-label">Rumah Sakit Rujukan</label>
                                        </div>
                                        <div class="col-lg-10 col-9">
                                            <textarea class="form-control" name="rs_rujukan" id="rs_rujukan" cols="30" rows="10"></textarea>
                                            <small class="text-muted">Boleh dikosongkan</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')

@endpush