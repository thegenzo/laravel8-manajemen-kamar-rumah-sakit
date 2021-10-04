@extends('layout.app')

@section('title', 'Dashboard')

@push('addon-style')
{{-- <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" media="screen">
<link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
@endpush

@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="fas fa-star-of-life"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Flamboyan</h6>
                                    <h6 class="font-extrabold mb-0">{{ $flamKosong }} kosong | {{ $flamTerisi }} terisi</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="fas fa-biohazard"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Melati</h6>
                                    <h6 class="font-extrabold mb-0">{{$melKosong}} kosong | {{$melTerisi}} terisi</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="fas fa-cannabis"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Kamboja</h6>
                                    <h6 class="font-extrabold mb-0">{{$kambKosong}} kosong | {{$kambTerisi}} terisi</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="fas fa-x-ray"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Bougenville</h6>
                                    <h6 class="font-extrabold mb-0">{{$bougenKosong}} kosong | {{$bougenTerisi}} terisi</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Papan Informasi Pasien Rawat Inap</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="TABLE_1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nomor Pasien</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Nama Pasien</th>
                                        <th class="text-center">Umur</th>
                                        <th>Gedung</th>
                                        <th>Kamar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pasienAktif as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $data->nomor_pasien }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('LL') }}</td>
                                        <td>{{ $data->nama_pasien }}</td>
                                        <td class="text-center">{{ $data->umur }}</td>
                                        <td>{{ $data->kamar->gedung }}</td>
                                        <td>{{ $data->kamar->nama_kamar }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Papan Informasi Pasien Rawat Inap Anak</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="TABLE_2">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nomor Pasien</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Nama Pasien Anak</th>
                                        <th class="text-center">Umur</th>
                                        <th>Gedung</th>
                                        <th>Kamar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pasienAktifAnak as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $data->nomor_pasien }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('LL') }}</td>
                                        <td>{{ $data->nama_pasien }}</td>
                                        <td class="text-center">{{ $data->umur }}</td>
                                        <td>{{ $data->kamar->gedung }}</td>
                                        <td>{{ $data->kamar->nama_kamar }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <h4 class="card-header">
                            <div class="card-title text-center">Data Status Pasien Dewasa</div>
                        </h4>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8 m-auto">
                                    <div style="width:370px; height:370px;">
                                        <canvas id="statusPasienDewasa"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <h4 class="card-header">
                            <div class="card-title text-center">Data Status Pasien Anak</div>
                        </h4>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8 m-auto">
                                    <div style="width:370px; height:370px;">
                                        <canvas id="statusPasienAnak"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
<script src="assets/vendors/fontawesome/all.min.js"></script>
{{-- <script src="assets/vendors/simple-datatables/simple-datatables.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    // // Simple Datatable
    // let table1 = document.querySelector('#table1');
    // let dataTable = new simpleDatatables.DataTable(table1);

    // let table2 = document.querySelector('#table2');
    // let dataTable = new simpleDatatables.DataTable(table2);
    $(document).ready(function() {
        $("table[id^='TABLE']").DataTable( {
            "scrollY": "200px",
            "scrollCollapse": true,
            "searching": true,
            "paging": true
        } );
    });

    // chartjs untuk status pasien dewasa 
    var sembuh = JSON.parse('<?php echo json_encode($sembuh); ?>');
    var rujukan = JSON.parse('<?php echo json_encode($rujukan); ?>');
    var meninggal = JSON.parse('<?php echo json_encode($meninggal); ?>');
    var ctx = document.getElementById('statusPasienDewasa').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Sembuh', 'Rujuk', 'Meninggal'],
            datasets: [{
                label: ['Sembuh', 'Rujukan', 'Meninggal'],
                data: [sembuh, rujukan, meninggal],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // chartjs untuk status pasien dewasa 
    var sembuhAnak = JSON.parse('<?php echo json_encode($sembuhAnak); ?>');
    var rujukanAnak = JSON.parse('<?php echo json_encode($rujukanAnak); ?>');
    var meninggalAnak = JSON.parse('<?php echo json_encode($meninggalAnak); ?>');
    var ctx = document.getElementById('statusPasienAnak').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Sembuh', 'Rujuk', 'Meninggal'],
            datasets: [{
                label: ['Sembuh', 'Rujukan', 'Meninggal'],
                data: [sembuhAnak, rujukanAnak, meninggalAnak],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

</script>
@endpush