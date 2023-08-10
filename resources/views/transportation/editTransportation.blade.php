@extends('layouts.mainLayouts')

@section('title','Edit Kendaraan | Manajemen Kendaraan')

@section('hero')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Edit Data Kendaraan
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Kendaraan</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="/kendaraan">Data</a>
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
    {{-- <form action="kendaraan" action="POST">
    @csrf --}}
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
            @foreach ($transportations as $item)
            <div class="row justify-content-center py-sm-3 py-md-5">
                <div class="col-sm-10 col-md-8">
                    <input type="text" id="idEdit" name="id" value="{{ $item->id }}" hidden>

                    <div class="form-group">
                        <label for="plate">Plat</label>
                        <input type="text" class="form-control form-control-alt" id="plate" name="plate" value="{{ $item->plate }}">
                        <span class="text-danger error_text plate_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="merk">Merk</label>
                        <input type="text" class="form-control form-control-alt" id="merk" name="merk" value="{{ $item->merk }}">
                        <span class="text-danger error_text merk_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="colour">Warna</label>
                        <input type="text" class="form-control form-control-alt" id="colour" name="colour" value="{{ $item->colour }}">
                        <span class="text-danger error_text colour_error"></span>
                    </div>
                      
                    <div class="form-group">
                        <label for="ownership">Kepemilikan</label>
                        <select class="form-control form-control-alt" id="ownership" name="ownership">
                            <?php foreach ($ownership as $data) {
                                ?>
                                <option value="<?= $data ?>" <?= $item->ownership==$data ? 'selected' : null ?>>
                                    <?= $data ?>
                                </option>
                            <?php } ?>
                        </select>
                        <span class="text-danger error_text ownership_error"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type" id="type">Tipe kendaraan</label>
                                <input type="text" class="form-control form-control-alt" id="typeTransport" name="typeTransport" value="{{ $item->type }}">
                                <span class="text-danger error_text type_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="typePayload">Tipe angkutan</label>
                                <select class="form-control form-control-alt" id="typePayload" name="typePayload">
                                    <?php foreach ($typePayload as $data) {
                                        ?>
                                        <option value="<?= $data ?>" <?= $item->type_payload==$data ? 'selected' : null ?>>
                                            <?= $data ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <span class="text-danger error_text typePayload_error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- </form> --}}
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })

    $('#edit-data').click(function(){
        let id = $('#idEdit').val()

        $.ajax({
            url : '/kendaraan/'+id,
            type: 'PUT',
            data: {
                'plate'         : $('#plate').val(),
                'merk'          : $('#merk').val(),
                'colour'        : $('#colour').val(),
                'ownership'     : $('#ownership').val(),
                'type'          : $('#typeTransport').val(),
                'typePayload'   : $('#typePayload').val(),
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
                   
                    $('span.colour_error').text('')
                    $('span.merk_error').text('')
                    $('span.plate_error').text('')
                    $('span.ownership_error').text('')
                    $('span.type_error').text('')
                    $('span.typePayload_error').text('')
                }
            }
        })
    })
</script>
@endpush