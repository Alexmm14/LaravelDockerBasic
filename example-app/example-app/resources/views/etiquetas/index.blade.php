@extends('layouts.templateBase')


@section('title', 'Etiquetas')


@section('content')
    <div class="container-fluid">
        <div class="container">
            <h2>Etiquetas</h2>
        </div>
        <div class="container row d-flex justify-content-center align-content-center ">
            @foreach($Etiquetas as $Etiquetas)
            <div class="col-10 bg-secondary  bg-opacity-25  mt-2">
                <tr>
                    <h3>Nombre Categoria</h3>
                    <td>{{ $Etiquetas->nombreCategoria}}</td>
                    <h3>Descripción</h3>
                    <td>{{ $Etiquetas->Descripcion}}</td>
                    <h3>Usuario creador</h3>
                    <td>{{ $Etiquetas->UsuarioCreador}}</td>
                    <!-- Añade más columnas según las propiedades de tu modelo -->
                    <a href="{{url('/Etiquetas/'.$Etiquetas->id.'/edit')}}">Editar</a>
                </tr>
            </div>
                
            @endforeach
        </div>
        
    </div>
@endsection