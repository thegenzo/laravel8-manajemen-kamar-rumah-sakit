@extends('layout.app')

@section('title', 'Pasien Keluar Anak')

@push('addon-style')
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pasien Keluar Anak</h3>
                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="/pasien-keluar">Pasien Keluar Anak</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="/laporan-pasien-keluar-anak" target="_blank" class="btn btn-danger me-1 mb-2">Cetak</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nomor Pasien</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Nama Pasien</th>
                            <th>Diagnosa Akhir</th>
                            <th>Status Pasien</th>
                            <th>RS Rujukan</th>
                            <th class="text-center">Rekam Medis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($diagnosa as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $data->pasien_anak->nomor_pasien }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->pasien_anak->created_at)->locale('id')->isoFormat('LL') }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('LL') }}</td>
                            <td>{{ $data->pasien_anak->nama_pasien }}</td>
                            <td>{{ $data->diagnosa_akhir }}</td>
                           
                            @if($data->status_pasien == 'Sembuh')
                            <td><span class="badge bg-success">Sembuh</span></td>
                            @elseif($data->status_pasien == 'Rujukan')
                            <td><span class="badge bg-warning">Rujukan</span></td>
                            @else
                            <td><span class="badge bg-danger">Meninggal</span></td>
                            @endif

                            @if (strlen($data->rs_rujukan) < 1)
                            <td>Pulang</td>
                            @else
                            <td><span class="badge bg-info">{{ $data->rs_rujukan }}</span></td>
                            @endif

                            <td class="text-center">
                                <a href="{{ route('rekam-medis-anak', $data->id_pasien_anak) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-journal-medical"></i>
                                </a>
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