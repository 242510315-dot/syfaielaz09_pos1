@csrf

@if (!empty($produk->foto))
    <div class="mb-2">
        <label>Foto Saat Ini</label><br>
        <img src="{{ asset('storage/' . $produk->foto) }}"
             width="150"
             class="img-thumbnail">
    </div>
@endif


<div class="row mb-3">

    <div class="col">
        <label>Gambar</label>

        <input type="file"
               name="foto"
               onchange="previewImage(this)"
               class="form-control @error('foto') is-invalid @enderror">

        @error('foto')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>


    <div class="col">
        <label>Preview Foto</label><br>

        <img id="preview"
             class="img-thumbnail mt-2"
             style="display:none"
             width="150">
    </div>

</div>



<div class="mb-3">

    <label>Nama Produk</label>

    <input type="text"
           name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $produk->nama ?? '') }}">

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>



<div class="mb-3">

    <label>Jenis Produk</label>

    <select name="jenis_produk_id"
            class="form-control @error('jenis_produk_id') is-invalid @enderror">

        <option value="">
            -- Pilih Jenis Produk --
        </option>

        @foreach($jenisProduks as $jenis)

            <option value="{{ $jenis->id }}"
                {{ old(
                    'jenis_produk_id',
                    $produk->jenis_produk_id ?? ''
                ) == $jenis->id ? 'selected' : '' }}>

                {{ $jenis->nama }}

            </option>

        @endforeach

    </select>

    @error('jenis_produk_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>



{{-- HARGA BELI --}}

<div class="mb-3">

    <label>Harga Beli</label>

    <input type="number"
           name="purchase_price"
           id="purchase_price"
           class="form-control @error('purchase_price') is-invalid @enderror"
           value="{{ old('purchase_price', $produk->harga_beli ?? '') }}"
           min="0"
           placeholder="Masukkan harga beli">

    @error('purchase_price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>



{{-- HARGA JUAL --}}

<div class="mb-3">

    <label>Harga Jual Normal</label>

    <input type="number"
           name="selling_price"
           id="selling_price"
           class="form-control @error('selling_price') is-invalid @enderror"
           value="{{ old('selling_price', $produk->harga_jual ?? '') }}"
           min="0"
           readonly>

    @error('selling_price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    <div class="form-text">
        Harga jual otomatis dihitung <strong>30% lebih tinggi</strong>
        dari harga beli.
    </div>

</div>



{{-- STOK --}}

<div class="mb-3">

    <label>Stok</label>

    <input type="number"
           name="stock"
           class="form-control @error('stock') is-invalid @enderror"
           value="{{ old('stock', $produk->stok ?? '') }}"
           min="0">

    @error('stock')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>



<button class="btn btn-success mt-3" type="submit">
    <i class="bi bi-save"></i>
    Simpan
</button>


<a href="{{ route('produk.index') }}"
   class="btn btn-secondary mt-3">

    <i class="bi bi-arrow-left"></i>
    Kembali

</a>



<script>

function previewImage(input) {

    const preview = document.getElementById('preview');
    const file = input.files[0];

    if (file) {

        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';

    } else {

        preview.src = '';
        preview.style.display = 'none';

    }

}



const purchasePriceInput =
    document.getElementById('purchase_price');

const sellingPriceInput =
    document.getElementById('selling_price');


function updateSellingPrice() {

    const purchasePrice =
        Number(purchasePriceInput.value || 0);


    if (purchasePrice > 0) {

        const sellingPrice =
            purchasePrice * 1.30;

        sellingPriceInput.value =
            Math.round(sellingPrice);

    } else {

        sellingPriceInput.value = '';

    }

}


purchasePriceInput.addEventListener(
    'input',
    updateSellingPrice
);

updateSellingPrice();

</script>

