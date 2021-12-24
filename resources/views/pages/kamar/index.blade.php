@extends('layout.app')

@section('title', 'Data Kamar')

@push('addon-style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" media="screen">
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
                <table class="table table-striped" id="TABLE_1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Kamar</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Jumlah Kasur</th>
                            <th class="text-center">Kasur Tersedia</th>
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
                            <td class="text-center">{{ $data->kelas }}</td>
                            <td class="text-center">{{ $data->jumlah_kasur }}</td>
                            <td class="text-center">
                                {{ $data->jumlah_kasur - (\App\Models\Pasien::where('status_inap', '1')->where('id_kamar', $data->id)->count() + \App\Models\PasienAnak::where('status_inap', '1')->where('id_kamar', $data->id)->count()) }}
                            </td>
                            @if ($data->jumlah_kasur - (\App\Models\Pasien::where('status_inap', '1')->where('id_kamar', $data->id)->count() + \App\Models\PasienAnak::where('status_inap', '1')->where('id_kamar', $data->id)->count()) > 0)
                            <td>
                                <span class="badge bg-success">Tersedia</span>
                            </td>
                            @else
                            <td>
                                <span class="badge bg-danger">Penuh</span>
                                <br>
                            </td>
                            @endif
                            @if (auth()->user()->level == 'admin')
                            <td class="text-center">
                                <a href="{{ route('lihat-pasien', $data->id) }}" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Lihat Pasien">
                                    <i class="bi bi-receipt"></i>
                                </a>
                                <a href="{{ route('kamar.edit', $data->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Kamar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
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
                            <td colspan="7" class="text-center">Data Kosong</td>
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
                <table class="table table-striped" id="TABLE_2">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Kamar</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Jumlah Kasur</th>
                            <th class="text-center">Kasur Tersedia</th>
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
                            <td class="text-center">{{ $data->kelas }}</td>
                            <td class="text-center">{{ $data->jumlah_kasur }}</td>
                            <td class="text-center">
                                {{ ($data->jumlah_kasur) - ((\App\Models\Pasien::where('status_inap', '1')->where('id_kamar', $data->id)->count()) + (\App\Models\PasienAnak::where('status_inap', '1')->where('id_kamar', $data->id)->count())) }}
                            </td>
                            @if ((($data->jumlah_kasur) - ((\App\Models\Pasien::where('status_inap', '1')->where('id_kamar', $data->id)->count()) + (\App\Models\PasienAnak::where('status_inap', '1')->where('id_kamar', $data->id)->count()))) > 0)
                            <td>
                                <span class="badge bg-success">Tersedia</span>
                            </td>
                            @else
                            <td>
                                <span class="badge bg-danger">Penuh</span>
                                <br>
                            </td>
                            @endif
                            @if (auth()->user()->level == 'admin')
                            <td class="text-center">
                                <a href="{{ route('lihat-pasien', $data->id) }}" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Lihat Pasien">
                                    <i class="bi bi-receipt"></i>
                                </a>
                                <a href="{{ route('kamar.edit', $data->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Kamar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
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
                            <td colspan="7" class="text-center">Data Kosong</td>
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
                <table class="table table-striped" id="TABLE_3">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Kamar</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Jumlah Kasur</th>
                            <th class="text-center">Kasur Tersedia</th>
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
                            <td class="text-center">{{ $data->kelas }}</td>
                            <td class="text-center">{{ $data->jumlah_kasur }}</td>
                            <td class="text-center">
                                {{ ($data->jumlah_kasur) - ((\App\Models\Pasien::where('status_inap', '1')->where('id_kamar', $data->id)->count()) + (\App\Models\PasienAnak::where('status_inap', '1')->where('id_kamar', $data->id)->count())) }}
                            </td>
                            @if ((($data->jumlah_kasur) - ((\App\Models\Pasien::where('status_inap', '1')->where('id_kamar', $data->id)->count()) + (\App\Models\PasienAnak::where('status_inap', '1')->where('id_kamar', $data->id)->count()))) > 0)
                            <td>
                                <span class="badge bg-success">Tersedia</span>
                            </td>
                            @else
                            <td>
                                <span class="badge bg-danger">Penuh</span>
                                <br>
                            </td>
                            @endif
                            @if (auth()->user()->level == 'admin')
                            <td class="text-center">
                                <a href="{{ route('lihat-pasien', $data->id) }}" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Lihat Pasien">
                                    <i class="bi bi-receipt"></i>
                                </a>
                                <a href="{{ route('kamar.edit', $data->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Kamar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
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
                            <td colspan="7" class="text-center">Data Kosong</td>
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
                <table class="table table-striped" id="TABLE_4">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Kamar</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Jumlah Kasur</th>
                            <th class="text-center">Kasur Tersedia</th>
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
                            <td class="text-center">{{ $data->kelas }}</td>
                            <td class="text-center">{{ $data->jumlah_kasur }}</td>
                            <td class="text-center">
                                {{ ($data->jumlah_kasur) - ((\App\Models\Pasien::where('status_inap', '1')->where('id_kamar', $data->id)->count()) + (\App\Models\PasienAnak::where('status_inap', '1')->where('id_kamar', $data->id)->count())) }}
                            </td>
                            @if ((($data->jumlah_kasur) - ((\App\Models\Pasien::where('status_inap', '1')->where('id_kamar', $data->id)->count()) + (\App\Models\PasienAnak::where('status_inap', '1')->where('id_kamar', $data->id)->count()))) > 0)
                            <td>
                                <span class="badge bg-success">Tersedia</span>
                            </td>
                            @else
                            <td>
                                <span class="badge bg-danger">Penuh</span>
                                <br>
                            </td>
                            @endif
                            @if (auth()->user()->level == 'admin')
                            <td class="text-center">
                                <a href="{{ route('lihat-pasien', $data->id) }}" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Lihat Pasien">
                                    <i class="bi bi-receipt"></i>
                                </a>
                                <a href="{{ route('kamar.edit', $data->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Kamar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
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
                            <td colspan="7" class="text-center">Data Kosong</td>
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
                <table class="table table-striped" id="TABLE_5">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Kamar</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Jumlah Kasur</th>
                            <th class="text-center">Kasur Tersedia</th>
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
                            <td class="text-center">{{ $data->kelas }}</td>
                            <td class="text-center">{{ $data->jumlah_kasur }}</td>
                            <td class="text-center">
                                {{ ($data->jumlah_kasur) - ((\App\Models\Pasien::where('status_inap', '1')->where('id_kamar', $data->id)->count()) + (\App\Models\PasienAnak::where('status_inap', '1')->where('id_kamar', $data->id)->count())) }}
                            </td>
                            @if ((($data->jumlah_kasur) - ((\App\Models\Pasien::where('status_inap', '1')->where('id_kamar', $data->id)->count()) + (\App\Models\PasienAnak::where('status_inap', '1')->where('id_kamar', $data->id)->count()))) > 0)
                            <td>
                                <span class="badge bg-success">Tersedia</span>
                            </td>
                            @else
                            <td>
                                <span class="badge bg-danger">Penuh</span>
                                <br>
                            </td>
                            @endif
                            @if (auth()->user()->level == 'admin')
                            <td class="text-center">
                                <a href="{{ route('lihat-pasien', $data->id) }}" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Lihat Pasien">
                                    <i class="bi bi-receipt"></i>
                                </a>
                                <a href="{{ route('kamar.edit', $data->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Kamar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('kamar.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
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
                            <td colspan="7" class="text-center">Data Kosong</td>
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
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("table[id^='TABLE']").DataTable( {
            "scrollY": "200px",
            "scrollCollapse": true,
            "searching": true,
            "paging": true
        } );
    });

    // konfirmasi sebelum menghapus data
    $('.swal-confirm').click(function(event) {
          var form =  $(this).closest("form");
          var id = $(this).data("id");
          event.preventDefault();
          swal({
              title: `Yakin Hapus Data?`,
              text: "Data yang terkait juga akan ikut terhapus",
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