@extends('layout.app')

@section('title', 'Edit Kamar')

@push('addon-style')

@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Kamar</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/kamar">Data Kamar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kamar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit data kamar</h4>
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
                <form action="{{ route('kamar.update', $kamar->id) }}" method="POST">
                    @METHOD('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nama Kamar</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="nama_kamar" class="form-control" name="nama_kamar" value="{{ $kamar->nama_kamar }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Kelas</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="kelas" class="form-control" name="kelas" value="{{ $kamar->kelas }}">
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
                                            <option value="Melati" {{ $kamar->gedung == 'Melati' ? 'selected' : '' }}>Melati</option>
                                            <option value="Flamboyan" {{ $kamar->gedung == 'Flamboyan' ? 'selected' : '' }}>Flamboyan</option>
                                            <option value="Kamboja" {{ $kamar->gedung == 'Kamboja' ? 'selected' : '' }}>Kamboja</option>
                                            <option value="Bougenville" {{ $kamar->gedung == 'Bougenville' ? 'selected' : '' }}>Bougenville</option>
                                            <option value="Kebidanan" {{ $kamar->gedung == 'Kebidanan' ? 'selected' : '' }}>Kebidanan</option>
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
                                    <input type="number" id="jumlah_kasur" class="form-control" name="jumlah_kasur" value="{{ $kamar->jumlah_kasur }}">
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