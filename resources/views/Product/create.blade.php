@extends('componets.layout')

@section('view')

    @if ($errors->any())
        <div class="alert alert-danger">
           Errores encontrados:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-between ">
        <h4>Crear producto</h4>
        <a href="{{ route('index.product') }}" class="btn btn-sm btn-warning">Regresar</a>
    </div>
    <form action="{{ route('save.product') }}" method="POST" class="jumbotron">
        @csrf
        <input type="hidden" name="id" value="{{ isset($product->id) ? $product->id : 0 }}">
        <div class="form-group">
            <label for="txtName">Nombre</label>
            <input type="text" class="form-control" id="txtName" name="name"
                value="{{ isset($product->name) ? $product->name : '' }}">
        </div>

        <div class="form-group">
            <label for="txtPrice">Precio</label>
            <input type="text" class="form-control" id="txtPrice" name="price"
                value="{{ isset($product->price) ? $product->price : '' }}">
        </div>

        <div class="form-group">
            <label for="txtStock">Stock</label>
            <input type="number" class="form-control" id="txtStock" name="stock"
                value="{{ isset($product->stock) ? $product->stock : '' }}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect2">Categoria</label>
            <select  class="form-control" id="exampleFormControlSelect2" name="id_category">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary" type="submit"> Guardar</button>
    </form>
@endsection
