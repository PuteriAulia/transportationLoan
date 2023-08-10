@extends('layouts.mainLayouts')

@section('title','Dashboard | Manajemen Kendaraan')

@section('hero')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2 text-center text-sm-left">
            <div class="flex-sm-fill">
                <h1 class="h3 font-w700 mb-2">
                    Halaman Dashboard
                </h1>
                <h2 class="h6 font-w500 text-muted mb-0">
                    Selamat datang {{ ucwords(Auth::user()->name) }}, semoga harimu menyenangkan.
                </h2>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content">
    {{-- Alert --}}
    @if (Session::has('status')=='success')
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row row-deck">
        <!-- Transportation -->
        <div class="col-sm-4 col-xl-4">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="font-size-h3 font-w700">{{ $transport }}</dt>
                        <dd class="text-muted mb-0">Total Kendaraan</dd>
                    </dl>
                    <div class="item item-rounded bg-body">
                        <i class="fa fa-car font-size-h3 text-primary"></i>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                    <a class="font-w500 d-flex align-items-center" href="/kendaraan">
                        Daftar kendaraan
                        <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- END Transportation -->

        <!-- Service -->
        <div class="col-sm-4 col-xl-4">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="font-size-h2 font-w700">{{ rupiahFormat($costService) }}</dt>
                        <dd class="text-muted mb-0">Total Biaya Service</dd>
                    </dl>
                    <div class="item item-rounded bg-body">
                        <i class="fa fa-shopping-cart font-size-h3 text-primary"></i>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                    <a class="font-w500 d-flex align-items-center" href="/service">
                        Daftar service
                        <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- END Service -->

        <!-- Fuel Refil -->
        <div class="col-sm-4 col-xl-4">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="font-size-h2 font-w700">{{ rupiahFormat($costFuelRefil) }}</dt>
                        <dd class="text-muted mb-0">Total Biaya BBM</dd>
                    </dl>
                    <div class="item item-rounded bg-body">
                        <i class="fa fa-shopping-cart font-size-h3 text-primary"></i>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                    <a class="font-w500 d-flex align-items-center" href="/pengeluaran-BBM">
                        Daftar BBM
                        <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- END Fuel Refil -->
    </div>

    <div class="row">
        <div class="col-xl-12 d-flex flex-column">
            <!-- Earnings Summary -->
            <div class="block block-rounded flex-grow-1 d-flex flex-column">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Periodik Pemesanan Kendaraan</h3>
                </div>
                <div class="block-content">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

@push('js')
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
@endpush