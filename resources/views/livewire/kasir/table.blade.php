<div class="d-flex">


    <div class="me-3">
        <div class="mb-2">
            <form action="" class="d-flex" wire:submit.prevent='store'>
                <div class="me-2">
                    <input type="text" class="form-control" placeholder="Nama Barang" wire:model='barang'>
                </div>
                <div class="me-2">
                    <input type="number" class="form-control" placeholder="Harga" wire:model='harga'>
                </div>
                <div class="me-2">
                    <input type="number" class="form-control" placeholder="Qty" wire:model='qty'>
                </div>
                <div class="d-flex">
                    <button class="btn btn-primary me-1">Tambah</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                </div>
            </form>
        </div>

        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-dark">
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $datas as $index=>$item )

                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->harga}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->total}}</td>
                    <td>
                        <button class="btn btn-danger" wire:click="delete({{$item->id}})">Hapus</button>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada pesanan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class=" mt-5 table-bordered mt-4">
        @if(session()->has('error'))
            <div class="alert alert-danger mb-3">{{session('error')}}</div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success mb-3">
                <p>
                    {{session('success')}}
                </p>
                <a href="/faktur/{{session('kode')}}" target="__black" class="btn btn-primary btn-sm"> Cetak </a>
            </div>
        @endif
        <form action="" class="" wire:submit.prevent='bayar'>
            <div class="me-2">
                <input type="text" class="form-control" placeholder="Voucher" wire:model='voucher'>
            </div>
            <div class=" mt-3">
                <button class="btn btn-success me-1 col-10">Bayar</button>
            </div>
        </form>
    </div>

</div>
