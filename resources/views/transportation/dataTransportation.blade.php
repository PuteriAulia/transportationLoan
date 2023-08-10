@extends('layouts.mainLayouts')

@section('title','Data Kendaraan | Manajemen Kendaraan')

@section('hero')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Data Kendaraan
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Kendaraan</li>
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
            <a href="/kendaraan/create"><button class="btn btn-alt-primary">Tambah data</button></a>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table id="product-table" class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th class="text-center" style="width: 10%;">Plat</th>
                            <th class="text-center" style="width: 15%;">Merk</th>
                            <th class="text-center" style="width: 10%;">Tipe</th>
                            <th class="text-center" style="width: 10%;">Status</th>
                            <th class="text-center" style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($transportations as $item)
                        <tr>
                            <th class="text-center">{{ $no++ }}</th>
                            <td class="text-center">{{ $item->plate }}</td>
                            <td class="text-center">{{ ucwords($item->merk) }}</td>
                            <td class="text-center">{{ ucwords($item->type) }}</td>
                            <td class="text-center">{{ ucwords($item->status) }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/kendaraan/{{ $item->id }}/edit">
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
@include('transportation.detailTransportation')
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
                url : 'kendaraan/'+id+'/delete',
                type: 'PUT',
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
            url: "kendaraan/"+id+"/detail",
            type: "GET",
            success: function(res){
                $('#plateDetail').text(res.data[0].plate)
                $('#statusDetail').text(": "+res.data[0].status)
                $('#merkDetail').text(": "+res.data[0].merk)
                $('#typeDetail').text(": "+res.data[0].type)
                $('#ownershipDetail').text(": "+res.data[0].ownership)
                $('#colourDetail').text(": "+res.data[0].colour)
                $('#typePayloadDetail').text(": "+res.data[0].type_payload)
                $('#detail-transportation').modal('show')
            }
        })
    })
</script>
@endpush