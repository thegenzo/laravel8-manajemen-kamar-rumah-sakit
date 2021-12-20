@extends('layout.app')

@section('title', 'Tambah Kamar')

@push('addon-style')

@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Kamar</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/kamar">Data Kamar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Kamar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Masukkan data kamar</h4>
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
                <form action="{{ route('kamar.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nama Kamar</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="nama_kamar" class="form-control" name="nama_kamar" placeholder="Masukkan Nama Kamar">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Kelas</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="kelas" class="form-control" name="kelas" placeholder="Masukkan Kelas">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Gedung</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <fieldset class="form-group">
                                        <select class="form-select" id="gedung" name="gedung">
                                            <option value="" selected hidden>Pilih Gedung</option>
                                            <option value="Melati">Melati</option>
                                            <option value="Flamboyan">Flamboyan</option>
                                            <option value="Kamboja">Kamboja</option>
                                            <option value="Bougenville">Bougenville</option>
                                            <option value="Kebidanan">Kebidanan</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Jumlah Kasur</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="number" id="jumlah_kasur" class="form-control" name="jumlah_kasur" placeholder="Masukkan Jumlah Kamar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/kamar" class="btn btn-warning d-inline">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')

@endpush