@extends('componets.layout')

@section('view')

    @if ($errors->any())
        <div class="alert alert-danger">
            There were some errors with your request.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-between mb-4">
        <h4>Crear producto</h4>
        <a href="{{ route('index.product') }}" class="btn btn-sm btn-warning">Regresar</a>
    </div>
    <div class="row">
        <div class="col-6">
            <form action="{{ route('save.category') }}" method="POST" class="">
                @csrf
                <input type="hidden" name="id" value="{{ isset($category->id) ? $category->id : 0 }}">
                <div class="form-group">
                    <label for="txtName">Nombre</label>
                    <input type="text" class="form-control" id="txtName" name="name"
                        value="{{ isset($category->name) ? $category->name : '' }}">
                </div>

                <div class="form-group">
                    <label for="txtDescription">Descripción</label>
                    <textarea class="form-control" id="txtDescription" name="description" rows="3">{{ isset($category->description) ? $category->description : '' }}</textarea>
                </div>

                <button class="btn btn-primary" type="submit"> Guardar</button>
            </form>
        </div>
        <div class="col-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories) != 0)
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('create.category', ['category_id' => $item->id]) }}"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('delete.category', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger btn-sm ml-1"><i class="fas fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2" class="text-center">Sin contenido</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
