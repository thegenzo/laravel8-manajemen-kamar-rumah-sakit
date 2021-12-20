@extends('layout.app')

@section('title', 'Data Dokter')

@push('addon-style')
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Dokter</h3>
                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="/dokter">Data Dokter</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                @if (auth()->user()->level == 'admin')
                <a href="{{ route('dokter.create') }}" class="btn btn-primary float-right mb-2">Tambah Dokter</a>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Dokter</th>
                            <th>Spesialis</th>
                            <th>Jadwal</th>
                            <th class="text-center">Status</th>
                            @if (auth()->user()->level == 'admin')
                            <th class="text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dokter as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_dokter }}</td>
                            <td>{{ $data->spesialis }}</td>
                            <td>{{ $data->jadwal }}</td>
                            @if($data->status == 1)
                            <td class="text-center"><span class="badge bg-success">Aktif</span></td>
                            @else
                            <td class="text-center"><span class="badge bg-danger">Nonaktif</span></td>
                            @endif
                            @if (auth()->user()->level == 'admin')
                            <td class="text-center">
                                <a href="{{ route('dokter.edit', $data->id) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Dokter">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('dokter.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger swal-confirm" type="submit" data-id="{{ $data->id }}" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Hapus Dokter">
                                        <i class="bi bi-trash-fill swal-confirm"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
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

    $(document).ready( function () {

    $('.swal-confirm').click(function(event) {
        var form =  $(this).closest("form");
        var id = $(this).data("id");
        event.preventDefault();
        swal({
            title: `Yakin Hapus Data?`,
            text: "Data yang terhapus tidak bisa dikembalikan",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus',
        })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
            });
        });

    });
    
</script>
@endpush