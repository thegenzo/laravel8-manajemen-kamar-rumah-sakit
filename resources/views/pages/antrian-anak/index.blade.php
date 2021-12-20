@extends('layout.app')

@section('title', 'Data Antrian Pasien Anak')

@push('addon-style')
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Antrian Pasien Anak</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="/antrian">Data Antrian Pasien Anak</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                @if (auth()->user()->level == 'admin')
                <a href="{{ route('antrian-anak.create') }}" class="btn btn-primary float-right mb-2">Tambah Antrian Pasien Anak</a>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Pasien</th>
                            <th class="text-center">Umur</th>
                            <th>Nomor Handphone</th>
                            <th>Diagnosa Masuk</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($antrian as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_pasien }}</td>
                            <td class="text-center">{{ $data->umur }}</td>
                            <td>{{ $data->no_hp }}</td>
                            <td>{{ $data->diagnosa_masuk }}</td>
                            <td class="text-center">
                                <a href="{{ route('antrian-anak.edit', $data->id) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Kirim Pasien Anak ke Kamar Inap">
                                    <i class="bi bi-journal-medical"></i>
                                </a>
                                <form action="{{ route('antrian-anak.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger swal-confirm" type="submit" data-id="{{ $data->id }}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Hapus Antrian Anak">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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