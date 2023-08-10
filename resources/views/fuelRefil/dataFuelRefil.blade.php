@extends('layouts.mainLayouts')

@section('title','Data Pembelian BBM | Manajemen Kendaraan')

@push('css')
<link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
@endpush

@section('hero')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Data Pembelian BBM
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Pembelian BBM</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="">Data</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header">
            <a href="/pengeluaran-BBM/create"><button class="btn btn-alt-primary">Tambah data</button></a>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table id="product-table" class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th class="text-center" style="width: 10%;">Kode</th>
                            <th class="text-center" style="width: 10%;">Plat</th>
                            <th class="text-center" style="width: 15%;">Tanggal</th>
                            <th class="text-center" style="width: 10%;">Biaya</th>
                            <th class="text-center" style="width: 10%;">Karyawan</th>
                            <th class="text-center" style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($data as $item)
                        <tr>
                            <th class="text-center">{{ $no++ }}</th>
                            <td class="text-center">{{ $item->code }}</td>
                            <td class="text-center">{{ $item->transportation->plate }}</td>
                            <td class="text-center">{{ dateFormat($item->date) }}</td>
                            <td class="text-center">{{ rupiahFormat($item->cost) }}</td>
                            <td class="text-center">{{ ucwords($item->employee->name) }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/pengeluaran-BBM/{{ $item->id }}/edit">
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" id="btn-del" data-id="{{ $item->id }}" data-toggle="tooltip" title="Hapus">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary" id="btn-detail" data-id="{{ $item->id }}" data-toggle="tooltip" title="Detail">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('fuelRefil.detailFuelRefil')
@endsection

@push('js')
<script src={{ asset("assets/js/plugins/datatables/jquery.dataTables.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/dataTables.bootstrap4.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/buttons/dataTables.buttons.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/buttons/buttons.print.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/buttons/buttons.html5.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/buttons/buttons.flash.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/buttons/buttons.colVis.min.js") }}></script>

<!-- Page JS Code -->
<script src="assets/js/pages/be_tables_datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //Store product
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })

    // Delete
    $('body').on('click','#btn-del', function(){
        Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data yang sudah dihapus tidak dapat dilihat kembali",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
        }).then((result) => {
        if (result.isConfirmed) {
            let id = $(this).data('id')
            $.ajax({
                url : 'pengeluaran-BBM/'+id,
                type: 'DELETE',
                success: function(res){
                    Swal.fire(
                        'Berhasil',
                        `${res.message}`,
                        'success'
                    )
                }
            })
            document.location.reload()
        }})
    }) 

    // Detail
    $('body').on('click','#btn-detail',function(){
        let id = $(this).data('id')
       
        $.ajax({
            url: "pengeluaran-BBM/"+id+"/detail",
            type: "GET",
            success: function(res){
                $('#idDetail').text(res.data[0].code)
                $('#plateDetail').text(": "+res.transportation[0].plate)
                $('#costDetail').text(": Rp "+res.data[0].cost)
                $('#literDetail').text(": "+res.data[0].liter)
                $('#kmBeforeDetail').text(": "+res.data[0].km_before)
                $('#kmAfterDetail').text(": "+res.data[0].km_after)
                $('#employeeDetail').text(": "+res.employee[0].name)
                $('#detail-fuelRefil').modal('show')
            }
        })
    })
</script>
@endpush