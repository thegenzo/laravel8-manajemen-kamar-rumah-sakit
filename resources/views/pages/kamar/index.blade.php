@extends('layout.app')

@section('title', 'Data Kamar')

@push('addon-style')
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kamar</h3>
                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        @if (auth()->user()->level == 'admin')
                        <a href="/kamar/create" class="btn btn-primary float-right mb-2">Tambah Kamar</a>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <!-- Gedung Bougenville -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Gedung Bougenville
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Kamar</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            @if (auth()->user()->level == 'admin')
                            <th class="text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bougenville as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_kamar }}</td>
                            <td>{{ $data->kelas }}</td>
                            @if ($data->status == 'kosong')
                            <td>
                                <span class="badge bg-success">Kosong</span>
                            </td>
                            @else
                            <td>
                                <span class="badge bg-danger">Terisi Oleh {{ \App\Models\Pasien::where('id_kamar', $data->id)->first()->nama_pasien ?? \App\Models\PasienAnak::where('id_kamar', $data->id)->first()->nama_pasien }}</span>
                                <br>
                            </td>
                            @endif
                            @if (auth()->user()->level == 'admin')
                            <td class="text-center">
                                <a href="{{ route('kamar.edit', $data->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Kamar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm" onclick="return confirm('Apa yakin ingin menghapus data ini? Data yang terkait juga akan ikut terhapus')".>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger swal-confirm" type="submit" data-id="{{ $data->id }}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Hapus Kamar">
                                        <i class="bi bi-trash-fill swal-confirm"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Gedung Flamboyan -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Gedung Flamboyan
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table2">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Kamar</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            @if (auth()->user()->level == 'admin')
                            <th class="text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($flamboyan as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_kamar }}</td>
                            <td>{{ $data->kelas }}</td>
                            @if ($data->status == 'kosong')
                            <td>
                                <span class="badge bg-success">Kosong</span>
                            </td>
                            @else
                            <td>
                                <span class="badge bg-danger">Terisi Oleh {{ \App\Models\Pasien::where('id_kamar', $data->id)->first()->nama_pasien ?? \App\Models\PasienAnak::where('id_kamar', $data->id)->first()->nama_pasien }}</span>
                                <br>
                            </td>
                            @endif
                            @if (auth()->user()->level == 'admin')
                            <td class="text-center">
                                <a href="{{ route('kamar.edit', $data->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Kamar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm" onclick="return confirm('Apa yakin ingin menghapus data ini? Data yang terkait juga akan ikut terhapus')".>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger swal-confirm" type="submit" data-id="{{ $data->id }}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Hapus Kamar">
                                        <i class="bi bi-trash-fill swal-confirm"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Gedung Melati -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Gedung Melati
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table3">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Kamar</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            @if (auth()->user()->level == 'admin')
                            <th class="text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($melati as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_kamar }}</td>
                            <td>{{ $data->kelas }}</td>
                            @if ($data->status == 'kosong')
                            <td>
                                <span class="badge bg-success">Kosong</span>
                            </td>
                            @else
                            <td>
                                <span class="badge bg-danger">Terisi Oleh {{ \App\Models\Pasien::where('id_kamar', $data->id)->first()->nama_pasien ?? \App\Models\PasienAnak::where('id_kamar', $data->id)->first()->nama_pasien }}</span>
                                <br>
                            </td>
                            @endif
                            @if (auth()->user()->level == 'admin')
                            <td class="text-center">
                                <a href="{{ route('kamar.edit', $data->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Kamar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm" onclick="return confirm('Apa yakin ingin menghapus data ini? Data yang terkait juga akan ikut terhapus')".>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger swal-confirm" type="submit" data-id="{{ $data->id }}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Hapus Kamar">
                                        <i class="bi bi-trash-fill swal-confirm"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Gedung Kamboja -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Gedung Kamboja
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table4">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Kamar</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            @if (auth()->user()->level == 'admin')
                            <th class="text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kamboja as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_kamar }}</td>
                            <td>{{ $data->kelas }}</td>
                            @if ($data->status == 'kosong')
                            <td>
                                <span class="badge bg-success">Kosong</span>
                            </td>
                            @else
                            <td>
                                <span class="badge bg-danger">Terisi Oleh {{ \App\Models\Pasien::where('id_kamar', $data->id)->first()->nama_pasien ?? \App\Models\PasienAnak::where('id_kamar', $data->id)->first()->nama_pasien }}</span>
                                <br>
                            </td>
                            @endif
                            @if (auth()->user()->level == 'admin')
                            <td class="text-center">
                                <a href="{{ route('kamar.edit', $data->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Kamar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm" onclick="return confirm('Apa yakin ingin menghapus data ini? Data yang terkait juga akan ikut terhapus')".>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger swal-confirm" type="submit" data-id="{{ $data->id }}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Hapus Kamar">
                                        <i class="bi bi-trash-fill swal-confirm"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Gedung Kebidanan -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Gedung Kebidanan
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table4">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Kamar</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            @if (auth()->user()->level == 'admin')
                            <th class="text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kebidanan as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_kamar }}</td>
                            <td>{{ $data->kelas }}</td>
                            @if ($data->status == 'kosong')
                            <td>
                                <span class="badge bg-success">Kosong</span>
                            </td>
                            @else
                            <td>
                                <span class="badge bg-danger">Terisi Oleh {{ \App\Models\Pasien::where('id_kamar', $data->id)->first()->nama_pasien ?? \App\Models\PasienAnak::where('id_kamar', $data->id)->first()->nama_pasien }}</span>
                                <br>
                            </td>
                            @endif
                            @if (auth()->user()->level == 'admin')
                            <td class="text-center">
                                <a href="{{ route('kamar.edit', $data->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Kamar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm" onclick="return confirm('Apa yakin ingin menghapus data ini? Data yang terkait juga akan ikut terhapus')".>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger swal-confirm" type="submit" data-id="{{ $data->id }}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Hapus Kamar">
                                        <i class="bi bi-trash-fill swal-confirm"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
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

    let table2 = document.querySelector('#table2');
    let dataTable = new simpleDatatables.DataTable(table2);

    let table3 = document.querySelector('#table3');
    let dataTable = new simpleDatatables.DataTable(table3);
    
    let table4 = document.querySelector('#table4');
    let dataTable = new simpleDatatables.DataTable(table4);

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