@extends('Layouts.Main')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>
            <a href="">Show All</a>
        </div>



        <div class="table-responsive">
            @livewire('kasir.table')
        </div>
    </div>
</div>
@endsection
