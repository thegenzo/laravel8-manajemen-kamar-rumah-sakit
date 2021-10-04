@extends('layout.app')

@section('title', 'Data Rekam Medis')

@push('addon-style')
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Rekam Medis</h3>
                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/pasien-anak">Data Pasien Anak</a></li>
                        <li class="breadcrumb-item active">Data Rekam Medis</li>
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
                            Data Pasien Anak
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
                        <div class="card-title">Form Isi Rekam Medis Pasien Anak</div>
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
                        <form action="/rekam-medis-anak/{{ $pasien->id }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="squareText">Tensi Darah</label>
                                        <input type="text" id="tensi_darah" class="form-control" name="tensi_darah" placeholder="Masukkan Tensi Darah">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="squareText">Anamnesis</label>
                                        <textarea class="form-control" name="anamnesis" id="anamnesis" cols="30" rows="10" placeholder="Masukkan Anamnesis"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="squareText">Terapi</label>
                                        <textarea class="form-control" name="terapi" id="terapi" cols="30" rows="10" placeholder="Masukkan Terapi"></textarea>
                                    </div>
                                </div>
                            </div>
                            <a href="/pasien-anak" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-success d-inline">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">History Rekam Medis Pasien</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Tensi Darah</th>
                                    <th>Anamnesis</th>
                                    <th>Terapi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rekam as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('LL') }}</td>
                                    <td>{{ $data->tensi_darah }}</td>
                                    <td>{{ $data->anamnesis }}</td>
                                    <td>{{ $data->terapi }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script type="text/javascript">
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    // konfirmasi sebelum menghapus data
    $('.swal-confirm').click(function(event) {
          var form =  $(this).closest("form");
          var id = $(this).data("id");
          event.preventDefault();
          swal({
              title: `Yakin Hapus Data?`,
              text: "Data yang terhapus tidak dapat dikembalikan",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, hapus',
          })
          .then((willDelete) => {
              if (willDelete) {
              form.submit();
              }
          });
      });
</script>
@endpush