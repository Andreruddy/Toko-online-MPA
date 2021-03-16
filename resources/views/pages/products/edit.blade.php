@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Produk</strong>
            <small>{{$item->product_name}}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.update', $item->id) }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Produk</label>
                    <input type="text"
                            name="product_name"
                            value="{{ old('product_name') ? old('product_name') : $item->product_name }}"
                            class="form-control @error('product_name') is-invalid @enderror"/>
                @error('product_name') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Type Produk</label>
                    <input type="text"
                            name="type"
                            value="{{ old('type') ? old('type') : $item->type }}"
                            class="form-control @error('type') is-invalid @enderror"/>
                @error('type') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">Deskripsi</label>
                    <textarea name="description"
                    class="form-control ckeditor @error('description') is-invalid @enderror">{{old('description') ? old('description') : $item->description}}</textarea>
                @error('description') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="form-control-label">Harga</label>
                    <input type="number"
                            name="price"
                            value="{{ old('price') ? old('price') : $item->price }}" {{-- tenary function/pengkondisian --}}
                            class="form-control @error('price') is-invalid @enderror"/>
                @error('price') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-control-label">Stok</label>
                    <input type="number"
                            name="quantity"
                            value="{{ old('quantity') ? old('quantity') : $item->quantity }}"
                            class="form-control @error('quantity') is-invalid @enderror"/>
                @error('quantity') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Edit Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection