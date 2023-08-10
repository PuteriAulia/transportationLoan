@extends('layouts.mainLayouts')

@section('title','Tambah Peminjaman | Manajemen Kendaraan')

@section('hero')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Tambah Data Peminjaman Kendaraan
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Peminjaman kendaraan</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="/peminjaman">Data</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="">Tambah</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content">
    {{-- <form action="/peminjaman" method="POST">
    @csrf --}}
    <div class="block block-rounded">
        <div class="block-header block-header-default block-header-rtl">
            <h3 class="block-title"></h3>
            <div class="block-options">
                <button type="submit" class="btn btn-sm btn-primary" id="store-data">
                    Tambah
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="row justify-content-center py-sm-3 py-md-5">
                <div class="col-sm-10 col-md-8">
                    <div class="form-group">
                        <label for="transportation">Kendaraan</label>
                        <div class="input-group">
                        <input type="text" class="form-control form-control-alt" id="transportationId" name="transportationId" hidden>

                        <input type="text" class="form-control form-control-alt" id="transportationPlate" name="transportationPlate" placeholder="Masukkan kendaraan.." required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary push" data-toggle="modal" data-target="#modal-block-transportation"><i class="fa fa-search"></i></button>
                        </div>
                        </div>
                        <span class="text-danger error_text transportationId_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="borrower">Peminjam</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-alt" id="borrowerId" name="borrowerId" hidden>

                            <input type="text" class="form-control form-control-alt" id="borrowerCode" name="borrowerCode" placeholder="Masukkan karyawan peminjam.." required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary push" data-toggle="modal" data-target="#modal-block-borrower"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <span class="text-danger error_text borrowerId_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="driver">Driver</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-alt" id="driverId" name="driverId" hidden>

                            <input type="text" class="form-control form-control-alt" id="driverCode" name="driverCode" placeholder="Masukkan pengemudi.." required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary push" data-toggle="modal" data-target="#modal-block-driver"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <span class="text-danger error_text driverId_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="dateLoan">Tanggal peminjaman</label>
                        <input type="date" class="form-control form-control-alt" id="dateLoan" name="dateLoan" required>
                        <span class="text-danger error_text dateLoan_error"></span>
                    </div>
                      
                    <div class="form-group">
                        <label for="dateReturn">Tanggal pengembalian</label>
                        <input type="date" class="form-control form-control-alt" id="dateReturn" name="dateReturn" required>
                        <span class="text-danger error_text dateReturn_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="destination">Lokasi tujuan</label>
                        <input type="text" class="form-control form-control-alt" id="destination" name="destination" placeholder="Masukkan lokasi tujuan.." required>
                        <span class="text-danger error_text destination_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="desc">Keterangan</label>
                        <input type="text" class="form-control form-control-alt" id="desc" name="desc" placeholder="Masukkan keterangan tambahan.." required>
                        <span class="text-danger error_text desc_error"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstConfirmer">Penyetuju 1</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-alt" id="firstConfirmerId" name="firstConfirmerId" hidden>

                                    <input type="text" class="form-control form-control-alt" id="firstConfirmerCode" name="firstConfirmerCode" placeholder="Masukkan penyetuju pertama.." required>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary push" data-toggle="modal" data-target="#modal-block-firstConfirmer"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <span class="text-danger error_text firstConfirmerId_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="secondConfirmer">Penyetuju 2</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-alt" id="secondConfirmerId" name="secondConfirmerId" hidden>

                                    <input type="text" class="form-control form-control-alt" id="secondConfirmerCode" name="secondConfirmerCode" placeholder="Masukkan penyetuju kedua.." required>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary push" data-toggle="modal" data-target="#modal-block-secondConfirmer"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <span class="text-danger error_text secondConfirmerId_error"></span>
                            </div>
                        </div>

                        <input type="text" class="form-control form-control-alt" id="company_loc" name="company_loc" value="{{ Auth::user()->employee->company_loc_id }}" hidden>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </form> --}}
</div>

{{-- Start data kendaraan --}}
<div class="modal" id="modal-block-transportation" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Data Kendaraan</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <!-- Start table -->
                    <div class="table-responsive">
                        <table class="table-vcenter table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%;">No</th>
                                    <th class="text-center" style="width: 20%;">Plat</th>
                                    <th class="text-center" style="width: 20%;">Jenis</th>
                                    <th class="text-center" style="width: 20%;">Status</th>
                                    <th class="text-center" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ $no=1; }}
                                @foreach ($transportation as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $no++; }}</th>
                                    <td><p>{{ $item->plate }}</p></td>
                                    <td><p>{{ ucwords($item->type) }}</p></td>
                                    <td><p>{{ ucwords($item->status) }}</p></td>
                                    <td class="text-center">
                                        <button class="btn btn-success btn-sm" id="chooseTransportation" data-transaportationid="{{ $item->id }}" data-transportationplate="{{ $item->plate }}">Pilih</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End tabel -->
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Start data peminjam --}}
<div class="modal" id="modal-block-borrower" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Data Pegawai</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <!-- Start table -->
                    <div class="table-responsive">
                        <table class="table-vcenter table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%;">No</th>
                                    <th class="text-center" style="width: 20%;">Kode</th>
                                    <th class="text-center" style="width: 20%;">Nama</th>
                                    <th class="text-center" style="width: 20%;">Departemen</th>
                                    <th class="text-center" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ $no=1; }}
                                @foreach ($employee as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $no++; }}</th>
                                    <td><p>{{ $item->code }}</p></td>
                                    <td><p>{{ ucwords($item->name) }}</p></td>
                                    <td><p>{{ ucwords($item->departement->name) }}</p></td>
                                    <td class="text-center">
                                        <button class="btn btn-success btn-sm" id="chooseBorrower" data-employeeid="{{ $item->id }}" data-employeecode="{{ $item->code }}">Pilih</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End tabel -->
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Start data driver --}}
<div class="modal" id="modal-block-driver" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Data Driver</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <!-- Start table -->
                    <div class="table-responsive">
                        <table class="table-vcenter table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%;">No</th>
                                    <th class="text-center" style="width: 20%;">Kode</th>
                                    <th class="text-center" style="width: 20%;">Nama</th>
                                    <th class="text-center" style="width: 20%;">Departemen</th>
                                    <th class="text-center" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ $no=1; }}
                                @foreach ($employee as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $no++; }}</th>
                                    <td><p>{{ $item->code }}</p></td>
                                    <td><p>{{ ucwords($item->name) }}</p></td>
                                    <td><p>{{ ucwords($item->departement->name) }}</p></td>
                                    <td class="text-center">
                                        <button class="btn btn-success btn-sm" id="chooseDriver" data-employeeid="{{ $item->id }}" data-employeecode="{{ $item->code }}">Pilih</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End tabel -->
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Start data penyetuju 1 --}}
<div class="modal" id="modal-block-firstConfirmer" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Data Penyetuju Pertama</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <!-- Start table -->
                    <div class="table-responsive">
                        <table class="table-vcenter table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%;">No</th>
                                    <th class="text-center" style="width: 20%;">Kode</th>
                                    <th class="text-center" style="width: 20%;">Nama</th>
                                    <th class="text-center" style="width: 20%;">Posisi</th>
                                    <th class="text-center" style="width: 20%;">Departemen</th>
                                    <th class="text-center" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ $no=1; }}
                                @foreach ($firstConfirmer as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $no++; }}</th>
                                    <td><p>{{ $item->code }}</p></td>
                                    <td><p>{{ ucwords($item->name) }}</p></td>
                                    <td><p>{{ ucwords($item->position->name) }}</p></td>
                                    <td><p>{{ ucwords($item->departement->name) }}</p></td>
                                    <td class="text-center">
                                        <button class="btn btn-success btn-sm" id="chooseFirstConfirmer" data-employeeid="{{ $item->id }}" data-employeecode="{{ $item->code }}">Pilih</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End tabel -->
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Start data penyetuju 2 --}}
<div class="modal" id="modal-block-secondConfirmer" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Data Penyetuju Kedua</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <!-- Start table -->
                    <div class="table-responsive">
                        <table class="table-vcenter table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10%;">No</th>
                                    <th class="text-center" style="width: 20%;">Kode</th>
                                    <th class="text-center" style="width: 20%;">Nama</th>
                                    <th class="text-center" style="width: 20%;">Posisi</th>
                                    <th class="text-center" style="width: 20%;">Departemen</th>
                                    <th class="text-center" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ $no=1; }}
                                @foreach ($secondConfirmer as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $no++; }}</th>
                                    <td><p>{{ $item->code }}</p></td>
                                    <td><p>{{ ucwords($item->name) }}</p></td>
                                    <td><p>{{ ucwords($item->position->name) }}</p></td>
                                    <td><p>{{ ucwords($item->departement->name) }}</p></td>
                                    <td class="text-center">
                                        <button class="btn btn-success btn-sm" id="chooseSecondConfirmer" data-employeeid="{{ $item->id }}" data-employeecode="{{ $item->code }}">Pilih</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End tabel -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Modal transporttaion
    $('body').on('click','#chooseTransportation',function(){
        var transportationId = $(this).data('transaportationid')
        var transportationPlate = $(this).data('transportationplate')

        $('#transportationId').val(transportationId)
        $('#transportationPlate').val(transportationPlate)
        $('#modal-block-transportation').modal('hide')
    })

    // Modal borrower
    $('body').on('click','#chooseBorrower',function(){
        var borrowerId = $(this).data('employeeid')
        var borrowerCode = $(this).data('employeecode')

        $('#borrowerId').val(borrowerId)
        $('#borrowerCode').val(borrowerCode)
        $('#modal-block-borrower').modal('hide')
    })

    // Modal borrower
    $('body').on('click','#chooseDriver',function(){
        var driverId = $(this).data('employeeid')
        var driverCode = $(this).data('employeecode')

        $('#driverId').val(driverId)
        $('#driverCode').val(driverCode)
        $('#modal-block-driver').modal('hide')
    })

    // Modal first confirmer
    $('body').on('click','#chooseFirstConfirmer',function(){
        var firstConfirmerId = $(this).data('employeeid')
        var firstConfirmerCode = $(this).data('employeecode')

        $('#firstConfirmerId').val(firstConfirmerId)
        $('#firstConfirmerCode').val(firstConfirmerCode)
        $('#modal-block-firstConfirmer').modal('hide')
    })

    // Modal second confirmer
    $('body').on('click','#chooseSecondConfirmer',function(){
        var secondConfirmerId = $(this).data('employeeid')
        var secondConfirmerCode = $(this).data('employeecode')

        $('#secondConfirmerId').val(secondConfirmerId)
        $('#secondConfirmerCode').val(secondConfirmerCode)
        $('#modal-block-secondConfirmer').modal('hide')
    })

    // Store 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })

    $('#store-data').click(function(e){
        e.preventDefault()
        $.ajax({
            url : '/peminjaman',
            type: 'POST',
            data: {
                transportationId : $('#transportationId').val(),
                borrowerId : $('#borrowerId').val(),
                driverId : $('#driverId').val(),
                dateLoan : $('#dateLoan').val(),
                dateReturn : $('#dateReturn').val(),
                destination : $('#destination').val(),
                firstConfirmerId : $('#firstConfirmerId').val(),
                secondConfirmerId : $('#secondConfirmerId').val(),
                company_loc : $('#company_loc').val(),
                desc : $('#desc').val(),
            },
            success: function(res){
                // alert(res.message)
                if (res.errors) {
                    $.each(res.errors, function(prefix,value){
                        $('span.'+prefix+'_error').text(value[0])
                    })
                } else {
                    // alert(res.message)
                    Swal.fire(
                        'Berhasil',
                        `${res.message}`,
                        'success'
                    )
                    $('#transportationId').val('')
                    $('#transportationPlate').val('')
                    $('#borrowerId').val('')
                    $('#borrowerCode').val('')
                    $('#dateReturn').val('')
                    $('#destination').val('')
                    $('#dateLoan').val('')
                    $('#firstConfirmerId').val('')
                    $('#firstConfirmerCode').val('')
                    $('#secondConfirmerId').val('')
                    $('#secondConfirmerCode').val('')
                    $('#desc').val('')
                    $('#driverId').val('')
                    $('#driverCode').val('')

                    $('span.transportationId_error').text('')
                    $('span.borrowerId_error').text('')
                    $('span.dateReturn_error').text('')
                    $('span.destination_error').text('')
                    $('span.firstConfirmerId_error').text('')
                    $('span.secondConfirmerId_error').text('')
                    $('span.desc_error').text('')
                    $('span.driverId_error').text('')
                }
            }
        })
    })
</script>
@endpush