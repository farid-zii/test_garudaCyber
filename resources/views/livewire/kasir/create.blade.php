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
