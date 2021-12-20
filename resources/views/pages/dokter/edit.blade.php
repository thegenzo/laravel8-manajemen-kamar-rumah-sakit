@extends('layout.app')

@section('title', 'Edit Dokter')

@push('addon-style')
<!-- Include Choices CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Dokter</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dokter">Data Dokter</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Dokter</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit data dokter</h4>
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
                <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nama Dokter</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="nama_dokter" class="form-control" name="nama_dokter" value="{{ $dokter->nama_dokter }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Spesialis</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="spesialis" class="form-control" name="spesialis" value="{{ $dokter->spesialis }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Jadwal</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <div class="form-group">
                                        {{-- <select class="choices form-select multiple-remove" multiple="multiple" id="jadwal[]" name="jadwal[]">
                                            <optgroup label="Nama Hari">
                                                <option value="Minggu" selected>Minggu</option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                                <option value="Sabtu">Sabtu</option>
                                            </optgroup>
                                        </select> --}}
                                        <input type="text" id="jadwal" class="form-control" name="jadwal" value="{{ $dokter->jadwal }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Status</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <div class="form-group">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $dokter->status == '1' ? 'selected' : '' }}>Aktif</option>
                                            <option value="0" {{ $dokter->status == '0' ? 'selected' : '' }}>Nonaktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/dokter" class="btn btn-warning d-inline">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
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
<script>
    $this.on('select2:select', function(e){
        var elm = e.params.data.element;
        $elm = jQuery(elm);
        $t = jQuery(this);
        $t.append($elm);
        $t.trigger('change.select2');
    });
</script>
@endpush