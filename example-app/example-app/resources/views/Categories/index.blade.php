@extends('layouts.templateBase')


@section('title', 'Categorias')


@section('content')
    <div class="container-fluid">
        <div class="container">
            <h2>Categorias</h2>
        </div>
        <div class="container row d-flex justify-content-center align-content-center ">
            @foreach($categorias as $categorias)
            <div class="col-10 bg-secondary  bg-opacity-25  mt-2">
                <tr>
                    <h3>Nombre Categoria</h3>
                    <td>{{ $categorias->nombreCategoria}}</td>
                    <h3>Descripción</h3>
                    <td>{{ $categorias->Descripcion}}</td>
                    <h3>Usuario creador</h3>
                    <td>{{ $categorias->UsuarioCreador}}</td>
                    <!-- Añade más columnas según las propiedades de tu modelo -->
                    <a href="{{url('/categorias/'.$categorias->id.'/edit')}}">Editar</a>
                </tr>
            </div>
                
            @endforeach
        </div>
        
    </div>
@endsection