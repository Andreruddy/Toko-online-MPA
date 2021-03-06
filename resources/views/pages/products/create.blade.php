@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Produk</label>
                    <input type="text"
                            name="product_name"
                            value="{{ old('product_name') }}"
                            class="form-control @error('product_name') is-invalid @enderror"/>
                @error('product_name') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Type Produk</label>
                    <input type="text"
                            name="type"
                            value="{{ old('type') }}"
                            class="form-control @error('type') is-invalid @enderror"/>
                @error('type') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">Deskripsi</label>
                    <textarea name="description"
                    class="form-control ckeditor @error('type') is-invalid @enderror">{{old('description')}}</textarea>
                @error('description') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="form-control-label">Harga</label>
                    <input price="number"
                            name="price"
                            value="{{ old('price') }}"
                            class="form-control @error('price') is-invalid @enderror"/>
                @error('price') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-control-label">Stok</label>
                    <input quantity="number"
                            name="quantity"
                            value="{{ old('quantity') }}"
                            class="form-control @error('quantity') is-invalid @enderror"/>
                @error('quantity') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Tambah Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection