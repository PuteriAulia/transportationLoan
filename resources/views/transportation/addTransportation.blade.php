@extends('layouts.mainLayouts')

@section('title','Tambah Kendaraan | Manajemen Kendaraan')

@section('hero')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Tambah Data Kendaraan
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Kendaraan</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="/kendaraan">Data</a>
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
                        <label for="plate">Plat</label>
                        <input type="text" class="form-control form-control-alt" id="plate" name="plate" placeholder="Masukkan plat nomor..">
                        <span class="text-danger error_text plate_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="merk">Merk</label>
                        <input type="text" class="form-control form-control-alt" id="merk" name="merk" placeholder="Masukkan merk kendaraan..">
                        <span class="text-danger error_text merk_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="colour">Warna</label>
                        <input type="text" class="form-control form-control-alt" id="colour" name="colour" placeholder="Masukkan warna kendaraan..">
                        <span class="text-danger error_text colour_error"></span>
                    </div>
                      
                    <div class="form-group">
                        <label for="ownership">Kepemilikan</label>
                        <select class="form-control form-control-alt" id="ownership" name="ownership">
                            <option value="">Pilih</option>
                            <option value="sendiri">Sendiri</option>
                            <option value="sewa">Sewa</option>
                        </select>
                        <span class="text-danger error_text ownership_error"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type" id="type">Tipe kendaraan</label>
                                <input type="text" class="form-control form-control-alt" id="typeTransport" name="typeTransport" placeholder="Masukkan tipe kendaraan..">
                                <span class="text-danger error_text type_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="typePayload">Tipe angkutan</label>
                                <select class="form-control form-control-alt" id="typePayload" name="typePayload">
                                    <option value="">Pilih</option>
                                    <option value="angkutan orang">Angkutan orang</option>
                                    <option value="angkutan barang">Angkutan barang</option>
                                </select>
                                <span class="text-danger error_text typePayload_error"></span>
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

    $('#store-data').click(function(e){
        e.preventDefault()

        $.ajax({
            url : '/kendaraan',
            type: 'POST',
            data: {
                plate       : $('#plate').val(),
                colour      : $('#colour').val(),
                merk        : $('#merk').val(),
                ownership   : $('#ownership').val(),
                type        : $('#typeTransport').val(),
                typePayload : $('#typePayload').val(),
                company_loc : $('#company_loc').val(),
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
                    $('#plate').val('')
                    $('#colour').val('')
                    $('#ownership').val('')
                    $('#merk').val('')
                    $('#type').val('')
                    $('#typePayload').val('')

                    $('span.typePayload_error').text('')
                    $('span.type_error').text('')
                    $('span.merk_error').text('')
                    $('span.ownership_error').text('')
                    $('span.colour_error').text('')
                    $('span.plate_error').text('')
                }
            }
        })
    })
</script>
@endpush