@extends('componets.layout')

@section('view')
    @if (Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif


    <div class="d-flex justify-content-between mb-5">
        <h4>PRODUCTOS</h4>
        <div>
            <a class="btn btn-primary" href="{{ route('create.product') }}"> Crear</a>
            <a class="btn btn-info" href="{{ route('create.category') }}"> Crear categoria</a>
        </div>
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <th>{{ $item->name }}</th>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td class="d-flex">
                            <a class="btn btn-success btn-sm" href="{{ route('create.product', ['product_id'=>$item->id]) }}"><i
                                class="fas fa-edit"></i></a>
                            <form action="{{ route('delete.product', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm ml-1"><i class="fas fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
