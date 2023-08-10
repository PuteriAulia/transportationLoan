@extends('layouts.mainLayouts')

@push('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href={{ asset("assets/js/plugins/datatables/dataTables.bootstrap4.css") }}>
    <link rel="stylesheet" href={{ asset("assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css") }}>
@endpush

@section('title','Edit Pembelian BBM | Manajemen Kendaraan')

@section('hero')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Edit Data Pembelian BBM
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Pembalian BBM</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="/service">Data</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="">Edit</a>
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
        <div class="block-header block-header-default block-header-rtl">
            <h3 class="block-title"></h3>
            <div class="block-options">
                <button type="button" class="btn btn-sm btn-primary" id="edit-data">
                    Ubah
                </button>
            </div>
        </div>
        <div class="block-content">
            @foreach ($service as $item)
            <div class="row justify-content-center py-sm-3 py-md-5">
                <div class="col-sm-10 col-md-8">
                    <input type="text" id="idEdit" name="id" value="{{ $item->id }}" hidden>

                    <div class="form-group">
                        <label for="employee">Pegawai</label>
                        <div class="input-group">
                            <input type="text"  id="employeeId" name="employeeId" value="{{ $item->employee_id }}" hidden>
                            <input type="text" class="form-control form-control-alt" id="employeeCode" value="{{ $item->employee->code }}">
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
                            <?php foreach ($transportations as $data) {
                                ?>
                                <option value="<?= $data->id ?>" <?= $data->id==$item->transportation_id ? 'selected' : null ?>>
                                    <?= $data->plate ?> | <?= $data->type ?> 
                                </option>
                            <?php } ?>
                        </select>
                        <span class="text-danger error_text transportationId_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="type">Tipe service</label>
                        <select class="form-control form-control-alt" id="typeService" name="typeService">
                            <option value="">Pilih</option>
                            <?php foreach ($serviceType as $data) { ?>
                                <option value="<?= $data ?>" <?= $data==$item->type ? 'selected' : null ?>>
                                    <?= $data ?> 
                                </option>
                            <?php } ?>
                        </select>
                        <span class="text-danger error_text typeService_error"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dateIn">Tanggal masuk</label>
                                <input type="date" class="form-control form-control-alt" id="dateIn" name="dateIn" value="{{ $item->date_in }}">
                                <span class="text-danger error_text dateIn_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dateOut">Tanggal keluar</label>
                                <input type="date" class="form-control form-control-alt" id="dateOut" name="dateOut" value="{{ $item->date_out }}">
                                <span class="text-danger error_text dateOut_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cost">Biaya</label>
                        <input type="number" class="form-control form-control-alt" id="cost" name="cost" value="{{ $item->cost }}">
                        <span class="text-danger error_text cost_error"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kmIn">Km masuk</label>
                                <input type="number" class="form-control form-control-alt" id="kmIn" name="kmIn" value="{{ $item->km_in }}">
                                <span class="text-danger error_text kmIn_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kmOut">Km datang kembali</label>
                                <input type="number" class="form-control form-control-alt" id="kmOut" name="kmOut" value="{{ $item->km_out }}">
                                <span class="text-danger error_text kmOut_error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="desc">Keterangan</label>
                        <input type="text" class="form-control form-control-alt" id="desc" name="desc" value="{{ $item->desc }}">
                        <span class="text-danger error_text desc_error"></span>
                    </div>
                </div>
            </div>
            @endforeach
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
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">No</th>
                                <th class="text-center" style="width: 20%;">Code</th>
                                <th class="text-center" style="width: 20%;">Nama</th>
                                <th class="text-center" style="width: 20%;">Depertemen</th>
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
                                    <button class="btn btn-success btn-sm" id="chooseEmployee" data-employeeid="{{ $item->id }}" data-employeecode="{{ $item->code }}">Pilih</button>
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

<!-- Page JS Plugins -->
{{-- <script src={{ asset("assets/js/plugins/datatables/jquery.dataTables.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/dataTables.bootstrap4.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/buttons/dataTables.buttons.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/buttons/buttons.print.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/buttons/buttons.html5.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/buttons/buttons.flash.min.js") }}></script>
<script src={{ asset("assets/js/plugins/datatables/buttons/buttons.colVis.min.js") }}></script>

<!-- Page JS Code -->
<script src={{ asset("assets/js/pages/be_tables_datatables.min.js") }}></script> --}}

<script>
    // Show modal transportation
    $('body').on('click','#modal-find-employee',function(){
        $('#form-find-employee').modal('show')
    })

    //Process employee data
    $('body').on('click','#chooseEmployee',function(){
        var employeeId = $(this).data('employeeid')
        var employeeCode = $(this).data('employeecode')

        $('#employeeId').val(employeeId)
        $('#employeeCode').val(employeeCode)
        $('#form-find-employee').modal('hide')
    })

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })

    // Edit
    $('#edit-data').click(function(){
        let id = $('#idEdit').val()
        
        $.ajax({
            url : '/service/'+id,
            type: 'PUT',
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
                if (res.errors) {
                    $.each(res.errors, function(prefix,value){
                        $('span.'+prefix+'_error').text(value[0])
                    })
                } else {
                    Swal.fire(
                        'Berhasil',
                        `${res.message}`,
                        'success'
                    )
                   
                    $('span.employeeId_error').text('')
                    $('span.transportationId_error').text('')
                    $('span.typeService_error').text('')
                    $('span.dateIn_error').text('')
                    $('span.dateOut_error').text('')
                    $('span.cost_error').text('')
                    $('span.kmIn_error').text('')
                    $('span.kmOut_error').text('')
                }
            }
        })
    })

    
</script>
@endpush