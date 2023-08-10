@extends('layouts.mainLayouts')

@section('title','Detail Peminjaman | Manajemen Kendaraan')

@section('content')
@foreach ($loan as $item)
<div class="row justify-content-center">
    <div class="col-md-7 col-xl-7 mt-3">
        <div class="block block-rounded block-themed">
            <div class="block-header bg-modern">
                <h3 class="block-title">Detail Peminjaman</h3>
            </div>
            <div class="block-content">
                <h3 class="text-muted">{{ $item->code }}</h3>
                <hr>

                {{-- Detail kendaraan --}}
                <div class="table-responsive">
                    <p class="text-muted"><b>Detail Kendaraan</b></p>
                    <table class="mb-3 text-gray-dark">
                        <tr>
                            <td>Kendaraan</td>
                            <td>:  {{ $item->transportation->plate }}</td>
                        </tr>
                        <tr>
                            <td>Tipe kendaraan</td>
                            <td>:  {{ ucwords($item->transportation->type) }}</td>
                        </tr>
                        <tr>
                            <td>Merk</td>
                            <td>:  {{ ucwords($item->transportation->merk) }}</td>
                        </tr>
                        <tr>
                            <td>Pengemudi</td>
                            @foreach ($driver as $item)
                            <td>:  {{ ucwords($item->employee->name) }}</td>
                            @endforeach
                        </tr>
                    </table>
                </div>
                <hr>
                
                {{-- Detail peminjam --}}
                <div class="table-responsive">
                    <p class="text-muted"><b>Detail Peminjam</b></p>
                    @foreach ($borrower as $item)
                    <table class="mb-3 text-gray-dark">
                        <tr>
                            <td>Nama</td>
                            <td>:  {{ $item->employee->name }}</td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>:  {{ ucwords($item->employee->position->name) }}</td>
                        </tr>
                        <tr>
                            <td>Departemen</td>
                            <td>:  {{ ucwords($item->employee->departement->name) }}</td>
                        </tr>
                        <tr>
                            <td>Lokasi</td>
                            <td>:  {{ ucwords($item->employee->companyloc->name) }}</td>
                        </tr>
                    </table>
                    @endforeach
                </div>
                <hr>

                {{-- Detail status --}}
                <div class="table-responsive">
                    <p class="text-muted"><b>Status Peminjam</b></p>
                    <table class="mb-3 text-gray-dark">
                        <tr>
                            <td>Persetujuan pertama</td>
                            @foreach ($firstConfirmer as $item)
                            <td>: {{ ucwords($item->status) }} | {{ ucwords($item->employee->name) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Persetujuan kedua</td>
                            @foreach ($secondConfirmer as $item)
                            <td>: {{ ucwords($item->status) }} | {{ ucwords($item->employee->name) }}</td>
                            @endforeach
                        </tr>
                    </table>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection