@extends('layout.app')

@section('title', 'Data Pasien')

@push('addon-style')
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                @if (auth()->user()->level == 'admin')
                <h3>Data Seluruh Pasien Anak</h3>
                @else
                <h3>Data Pasien Anak Gedung {{$gedung}}</h3>
                @endif
                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="/pasien-anak">Data Pasien</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                @if (auth()->user()->level == 'admin')
                <a href="{{ route('pasien-anak.create') }}" class="btn btn-primary float-right mb-2">Tambah Pasien</a>
                <a href="/laporan-pasien-masuk-anak" target="_blank" class="btn btn-danger me-1 mb-2">Cetak</a>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nomor Pasien</th>
                            <th>Tanggal Masuk</th>
                            <th>Nama Pasien</th>
                            <th class="text-center">Umur</th>
                            <th>Diagnosa Masuk</th>
                            <th>Kamar</th>
                            <th>Dokter yang menangani</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pasien as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $data->nomor_pasien }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('LL') }}</td>
                            <td>{{ $data->nama_pasien }}</td>
                            <td class="text-center">{{ $data->umur }}</td>
                            <td>{{ $data->diagnosa_masuk }}</td>
                            <td>{{ $data->kamar->nama_kamar }}</td>
                            <td>{{ $data->dokter->nama_dokter }}</td>
                            <td class="text-center">
                                <a href="{{ route('pasien-anak.show', $data->id) }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Lihat Data Pasien">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('rekam-medis-anak', $data->id) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Rekam Medis">
                                    <i class="bi bi-journal-medical"></i>
                                </a>
                                <a href="{{ route('diagnosa-anak', $data->id) }}" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Diagnosa">
                                    <i class="bi bi-card-checklist"></i>
                                </a>
                                <br>
                                <a href="{{ route('pasien-anak.edit', $data->id) }}" class="btn btn-sm btn-info mt-1" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Data Pasien">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('pasien-anak.destroy', $data->id) }}" method="post" class="d-inline swal-confirm">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger swal-confirm mt-1" type="submit" data-id="{{ $data->id }}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Hapus Pasien">
                                        <i class="bi bi-trash-fill swal-confirm"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
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