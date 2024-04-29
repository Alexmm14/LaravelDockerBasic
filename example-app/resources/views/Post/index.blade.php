@extends('layouts.templateBase')


@section('title', 'Categorias')

@section('btn')
<a href="{{ url('/categorias/create') }}" class="btn btn-dark ">Nueva</a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-12 d-flex  justify-content-center align-content-center ">
            <h2>Categorias</h2>
        </div>
        <div class="container ">
            <table class="table table-dark  ">
                <thead class="">
                    <tr>
                        <th scope="col">Nombre </th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Creador</th>
                        <th scope="col" class="d-flex justify-content-center  align-content-center ">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categorias)
                        <tr>
                            <td>{{ $categorias->nombreCategoria}}</td>
                            <td>{{ $categorias->Descripcion}}</td>
                            <td>{{ $categorias->UsuarioCreador}}</td>
                            <td>
                                <div class="container-fluid row">
                                    <div class="col-6 d-flex  justify-content-center  align-content-center">
                                        <a href="{{url('/categorias/'.$categorias->id.'/edit')}}"
                                            class="btn btn-warning  ">Editar</a>
                                    </div>
                                    <div class="col-6 ">
                                        <form action="{{ url('/categorias/'. $categorias->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('¿Seguro que desear eliminarlo?');">Eliminar</button>
                                        </form>
                                    </div>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection