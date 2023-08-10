@extends('layouts.mainLayouts')

@section('title','Data Peminjaman | Manajemen Kendaraan')

@section('hero')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Data Konfirmasi Peminjaman Kendaraan
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Konfirmasi</li>
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
        <div class="block-content">
            @if ($loanConfirm === 0)
               <h4 class="text-muted text-center">Tidak terdapat permintaan konfirmasi kendaraan</h4> 
            @else
            <div class="table-responsive">
                <table id="product-table" class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th class="text-center" style="width: 10%;">Kode</th>
                            <th class="text-center" style="width: 10%;">Plat</th>
                            <th class="text-center" style="width: 15%;">Tanggal pinjam</th>
                            <th class="text-center" style="width: 15%;">Tanggal kembali</th>
                            <th class="text-center" style="width: 10%;">Status</th>
                            <th class="text-center" style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($loanConfirm as $item)
                        <tr>
                            <th class="text-center">{{ $no++ }}</th>
                            <td class="text-center">{{ $item->loan->code }}</td>
                            <td class="text-center">{{ $item->loan->transportation->plate }}</td>
                            <td class="text-center">{{ dateFormat($item->loan->date_loan) }}</td>
                            <td class="text-center">{{ dateFormat($item->loan->date_return) }}</td>
                            <td class="text-center">{{ ucwords($item->status) }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success" id="btn-confirm" data-id="{{ $item->id }}">
                                        Confirm
                                    </button>
                                    <a href="/peminjaman/{{ $item->loan->id }}/detail">
                                        <button type="button" class="btn btn-sm btn-primary" id="btn-detail" data-id="{{ $item->id }}" data-toggle="tooltip" title="Detail">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <input type="text" id="confirmer" value="{{ $confirmer }}" hidden>
            </div>
            @endif
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

    // Konfirmasi
    $('body').on('click','#btn-confirm', function(){
        let id = $(this).data('id')
        
        $.ajax({
            url : 'pinjaman-konfirmasi/'+id,
            type: 'PUT',
            data: {
                confirmer : $('#confirmer').val(),
            },
            success: function(res){
                console.log(res.message)
            }
        })
        document.location.reload()
    }) 
</script>
@endpush