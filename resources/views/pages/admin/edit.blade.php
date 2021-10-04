@extends('layout.app')

@section('title', 'Edit Admin')

@push('addon-style')

@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Admin</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Data Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit data admin</h4>
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
                <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <h3>Data Akun</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nama</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $admin->user->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Email</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="email" id="email" class="form-control" name="email" value="{{ $admin->user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Password</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="password" id="password" class="form-control" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Konfirmasi Password</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="password" id="konfirmasi_password" class="form-control" name="konfirmasi_password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3">
                    <h3>Data Admin</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nomor Induk Pegawai (NIP)</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="number" id="nip" class="form-control" name="nip" value="{{ $admin->nip }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Nomor Handphone</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <input type="number" id="no_hp" class="form-control" name="no_hp" value="{{ $admin->no_hp }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label">Alamat</label>
                                </div>
                                <div class="col-lg-10 col-9">
                                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10">{{ $admin->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin" class="btn btn-warning d-inline">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')

@endpush