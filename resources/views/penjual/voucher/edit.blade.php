<x-app-layout>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Kupon</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-4">
        <form action="{{ route('vouchers.update', $voucher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama Kupon</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $voucher->nama) }}" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga', $voucher->harga) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="available" {{ $voucher->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="unavailable" {{ $voucher->status == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Kupon</button>
        </form>
    </div>
</x-app-layout>
