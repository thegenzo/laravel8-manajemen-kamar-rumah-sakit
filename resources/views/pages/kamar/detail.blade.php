@extends('layout.app')

@section('title', 'Detail Kamar')

@push('addon-style')

@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Kamar</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/kamar">Data Kamar</a></li>
                        <li class="breadcrumb-item" aria-current="page">Tambah Kamar</li>
                        <li class="breadcrumb-item active" aria-current="page">Kamar {{ $kamar->nama_kamar }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kamar {{ $kamar->nama_kamar }}</h4>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pasien Dewasa</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Nomor Pasien</th>
                                    <th>Nama Pasien</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Diagnosa Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasien as $data)
                                <tr>
                                    <td class="text-center">{{ $data->nomor_pasien }}</td>
                                    <td>{{ $data->nama_pasien }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('LL') }}</td>
                                    <td>{{ $data->diagnosa_masuk }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pasien Anak</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Nomor Pasien</th>
                                    <th>Nama Pasien</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Diagnosa Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasienAnak as $data)
                                <tr>
                                    <td class="text-center">{{ $data->nomor_pasien }}</td>
                                    <td>{{ $data->nama_pasien }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('LL') }}</td>
                                    <td>{{ $data->diagnosa_masuk }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
        <a href="/kamar" class="btn btn-warning">Kembali</a>
    </section>
</div>
@endsection

@push('addon-script')

@endpush