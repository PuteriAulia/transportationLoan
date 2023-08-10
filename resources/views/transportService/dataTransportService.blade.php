@extends('layouts.mainLayouts')

@section('title','Service Kendaraan | Manajemen Kendaraan')

@section('hero')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Data Service Kendaraan
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
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
            <a href="/service/create"><button class="btn btn-alt-primary">Tambah data</button></a>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table id="product-table" class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th class="text-center" style="width: 15%;">Plat</th>
                            <th class="text-center" style="width: 15%;">Pegawai</th>
                            <th class="text-center" style="width: 15%;">Tanggal masuk</th>
                            <th class="text-center" style="width: 15%;">Tanggal keluar</th>
                            <th class="text-center" style="width: 15%;">Biaya</th>
                            <th class="text-center" style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($services as $item)
                        <tr>
                            <th class="text-center">{{ $no++ }}</th>
                            <td class="text-center">{{ $item->transportation->plate }}</td>
                            <td class="text-center">{{ ucwords($item->employee->name) }}</td>
                            <td class="text-center">{{ dateFormat($item->date_in) }}</td>
                            <td class="text-center">{{ dateFormat($item->date_out) }}</td>
                            <td class="text-center">{{ rupiahFormat($item->cost) }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/service/{{ $item->id }}/edit">
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
@include('transportService.detailTransportService')
@endsection

@push('js')

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
                url : '/service/'+id,
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
            url: "service/"+id+"/detail",
            type: "GET",
            success: function(res){
                let monthIn = res.data[0].date_in.substr(5,2)
                let yearIn  = res.data[0].date_in.substr(0,4)
                let dateIn  = res.data[0].date_in.substr(8,2)

                let monthOut = res.data[0].date_out.substr(5,2)
                let yearOut  = res.data[0].date_out.substr(0,4)
                let dateOut  = res.data[0].date_out.substr(8,2)
                let monthString = ''

                if (monthIn == 01 | monthOut == 01) {
                    monthString = 'Januari'
                }else if(monthIn == 02 | monthOut == 02){
                    monthString = 'Februari'
                }else if(monthIn == 03 | monthOut == 03){
                    monthString = 'Maret'
                }else if(monthIn == 04 | monthOut == 04){
                    monthString = 'April'
                }else if(monthIn == 05 | monthOut == 05){
                    monthString = 'Mei'
                }else if(monthIn ===06 | monthOut == 06){
                    monthString = 'Juni'
                }else if(monthIn == 07 | monthOut == 07){
                    monthString = 'Juli'
                }else if(monthIn == 08 | monthOut == 08){
                    monthString = 'Agustus'
                }else if(monthIn == 09 | monthOut == 09){
                    monthString = 'September'
                }else if(monthIn == 10 | monthOut == 10){
                    monthString = 'Oktober'
                }else if(monthIn == 11 | monthOut == 11){
                    monthString = 'November'
                }else if(monthIn == 12 | monthOut == 12){
                    monthString = 'Desember'
                }

                $('#plateDetail').text(res.transportation[0].plate)
                $('#employeeDetail').text(": "+res.employee[0].name)
                $('#transportationDetail').text(": "+res.transportation[0].type)
                $('#typeDetail').text(": "+res.data[0].type)
                $('#costDetail').text(": Rp "+res.data[0].cost)
                $('#kmInDetail').text(": "+res.data[0].km_in)
                $('#kmOutDetail').text(": "+res.data[0].km_out)
                $('#dateInDetail').text(": "+dateIn+' '+monthString+' '+yearIn)
                $('#dateOutDetail').text(": "+dateOut+' '+monthString+' '+yearOut)
                $('#descDetail').text(": "+res.data[0].desc)
                $('#detail-transportService').modal('show')
            }
        })
    })
</script>
@endpush