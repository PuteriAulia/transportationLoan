@extends('layouts.mainLayouts')

@section('title','Data Peminjaman | Manajemen Kendaraan')

@section('hero')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Data Peminjaman Kendaraan
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Peminjaman</li>
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
            @if (Auth::user()->employee->position->name == "kepala departemen" && Auth::user()->employee->departement->name == "umum")
            <a href="/peminjaman/create"><button class="btn btn-alt-primary">Tambah data</button></a>

            
            <div class="input-group-append">
                <button type="button" class="btn btn-success push" data-toggle="modal" data-target="#modal-block-exportData">Export</button>
            </div>
            @endif
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table id="loan-table" class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th class="text-center" style="width: 10%;">Plat</th>
                            <th class="text-center" style="width: 15%;">Tanggal Pinjam</th>
                            <th class="text-center" style="width: 10%;">Status</th>
                            <th class="text-center" style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($loans as $item)
                        <tr>
                            <th class="text-center">{{ $no++ }}</th>
                            <td class="text-center">{{ $item->transportation->plate }}</td>
                            <td class="text-center">{{ dateFormat($item->date_loan) }}</td>
                            <td class="text-center">{{ ucwords($item->status) }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/peminjaman/{{ $item->id }}/detail">
                                        <button type="button" class="btn btn-sm btn-primary" id="btn-detail" data-id="{{ $item->id }}" data-toggle="tooltip" title="Detail">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </button>
                                    </a>
                                    @if (Auth::user()->employee->position->name == "kepala departemen" && Auth::user()->employee->departement->name == "umum")
                                    <button type="button" class="btn btn-sm btn-danger" id="btn-del" data-id="{{ $item->id }}" data-toggle="tooltip" title="Hapus">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>

                                    <button type="button" class="btn btn-sm btn-warning" id="btn-return" data-id="{{ $item->id }}"  data-toggle="tooltip" title="Pengembalian" <?= $item->status=="selesai" ? 'disabled' : null ?>>
                                        Pengembalian
                                    </button>
                                    @endif
                                    
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


<div class="modal" id="modal-block-exportData" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Export Data</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <!-- Start table -->
                    <div class="table-responsive">
                        <form action="/exportData" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="datestart">Tanggal awal</label>
                                <input type="date" class="form-control form-control-alt" id="datesatart" name="datestart"required>
                            </div>

                            <div class="form-group">
                                <label for="dateend">Tanggal akhir</label>
                                <input type="date" class="form-control form-control-alt" id="dateend" name="dateend" required>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary mb-5">Export</button>
                        </form>
                    </div>
                    <!-- End tabel -->
                </div>
            </div>
        </div>
    </div>
</div>
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
                url : 'peminjaman/'+id+'/delete',
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

    // Return
    $('body').on('click','#btn-return', function(){
        Swal.fire({
        title: 'Apakah kendaraan telah kembali?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya'
        }).then((result) => {
        if (result.isConfirmed) {
            let id = $(this).data('id')

            $.ajax({
                url : 'pengembalian/'+id,
                type: 'GET',
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
</script>
@endpush