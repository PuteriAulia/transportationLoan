@extends('layouts.mainLayouts')

@section('title','Tambah Data Sevice | Manajemen Kendaraan')

@section('hero')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Tambah Data Service Kendaraan
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Service</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="/service">Data</a>
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
    {{-- <form action="kendaraan" action="POST">
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
                        <label for="employee">Pegawai</label>
                        <div class="input-group">
                            <input type="text"  id="employeeId" name="employeeId" hidden>
                            <input type="text" class="form-control form-control-alt" id="employeeCode" placeholder="Pilih pegawai..">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" data-toggle="modal" id="modal-find-employee">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <span class="text-danger error_text employeeId_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="transaportation">Kendaraan</label>
                        <select class="form-control form-control-alt" id="transportationId" name="transaportation">
                            <option value="">Pilih</option>
                            @foreach ($transportations as $data)
                            <option value="{{ $data->id }}">{{ $data->plate }} | {{ ucwords($data->type) }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error_text transportationId_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="type">Tipe service</label>
                        <select class="form-control form-control-alt" id="typeService" name="typeService">
                            <option value="">Pilih</option>
                            <option value="rutin">Rutin</option>
                            <option value="tak terduga">Tak terduga</option>
                        </select>
                        <span class="text-danger error_text typeService_error"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dateIn">Tanggal masuk</label>
                                <input type="date" class="form-control form-control-alt" id="dateIn" name="dateIn" placeholder="Masukkan tanggal masuk service..">
                                <span class="text-danger error_text dateIn_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dateOut">Tanggal keluar</label>
                                <input type="date" class="form-control form-control-alt" id="dateOut" name="dateOut" placeholder="Masukkan tanggal keluar service..">
                                <span class="text-danger error_text dateOut_error"></span>
                            </div>
                        </div>

                        <input type="text" class="form-control form-control-alt" id="company_loc" name="company_loc" value="{{ Auth::user()->employee->company_loc_id }}" hidden>
                    </div>

                    <div class="form-group">
                        <label for="cost">Biaya</label>
                        <input type="number" class="form-control form-control-alt" id="cost" name="cost" placeholder="Masukkan biaya service..">
                        <span class="text-danger error_text cost_error"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kmIn">Km masuk</label>
                                <input type="number" class="form-control form-control-alt" id="kmIn" name="kmIn" placeholder="Masukkan km masuk service..">
                                <span class="text-danger error_text kmIn_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kmOut">Km datang kembali</label>
                                <input type="number" class="form-control form-control-alt" id="kmOut" name="kmOut" placeholder="Masukkan km datang service kembali..">
                                <span class="text-danger error_text kmOut_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="desc">Keterangan</label>
                        <input type="text" class="form-control form-control-alt" id="desc" name="desc" placeholder="Masukkan keterangan tambahan..">
                        <span class="text-danger error_text desc_error"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </form> --}}
</div>


{{-- Modal find employee --}}
<div class="modal" id="form-find-employee" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="block block-rounded block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">Pencarian Pegawai</h3>
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
                            @foreach ($employees as $item)
                            <tr>
                                <th class="text-center" scope="row">{{ $no++; }}</th>
                                <td><p>{{ $item->code }}</p></td>
                                <td><p>{{ ucwords($item->name) }}</p></td>
                                <td><p>{{ ucwords($item->departement->name) }}</p></td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-sm" id="chooseeEmployee" data-employeeid="{{ $item->id }}" data-employeecode="{{ $item->code }}">Pilih</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End tabel -->
            </div>
            <div class="block-content block-content-full text-right border-top">
                <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- END Modal find employee--}}
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //Store product
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })

    // Show modal employee
    $('body').on('click','#modal-find-employee',function(){
        $('#form-find-employee').modal('show')
    })

    $('body').on('click','#chooseeEmployee',function(){
        var employeeId = $(this).data('employeeid')
        var employeeCode = $(this).data('employeecode')

        $('#employeeId').val(employeeId)
        $('#employeeCode').val(employeeCode)
        $('#form-find-employee').modal('hide')
    })

    // Store
    $('#store-data').click(function(e){
        e.preventDefault()
        $.ajax({
            url : '/service',
            type: 'POST',
            data: {
                transportationId : $('#transportationId').val(),
                // transportationPlate : $('#transportationPlate').val(),
                typeService : $('#typeService').val(),
                dateIn : $('#dateIn').val(),
                dateOut : $('#dateOut').val(),
                company_loc : $('#company_loc').val(),
                cost : $('#cost').val(),
                kmIn : $('#kmIn').val(),
                kmOut : $('#kmOut').val(),
                desc : $('#desc').val(),
                employeeId : $('#employeeId').val(),
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
                    // $('#transportationPlate').val('')
                    $('#typeService').val('')
                    $('#dateIn').val('')
                    $('#dateOut').val('')
                    $('#company_loc').val('')
                    $('#cost').val('')
                    $('#kmIn').val('')
                    $('#kmOut').val('')
                    $('#desc').val('')
                    $('#employeeId').val('')
                    $('#employeeCode').val('')

                    $('span.employeeId_error').text('')
                    $('span.transportationId_error').text('')
                    $('span.typeService_error').text('')
                    $('span.dateIn_error').text('')
                    $('span.dateOut_error').text('')
                    $('span.cost_error').text('')
                    $('span.kmIn_error').text('')
                    $('span.kmOut_error').text('')
                    $('span.desc_error').text('')
                }
            }
        })
    })
</script>
@endpush