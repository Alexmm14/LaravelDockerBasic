<!-- editLabel.blade.php -->

@extends('layouts.templateBase')

@section('title', 'Editar Categoria')

@section('content')
<div class="container-fluid">
    <div class="container">
        <h2>Editar Categoria</h2>
    </div>
    <div class="container ">
        <form action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="codigo" class="form-label">{{ 'Nombre Categorias' }}</label>
                <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria"
                    value="{{ isset($categoria->nombreCategoria) ? $categoria->nombreCategoria : '' }}" required placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ 'Descripcion' }}</label>
                <input type="text" class="form-control" id="Descripcion" name="Descripcion"
                    aria-describedby="emailHelp" value="{{ isset($categoria->Descripcion) ? $categoria->Descripcion : '' }}" required
                    placeholder="Descripción">
            </div>
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </form>

        <div>
            <a class="" href="{{ url('categorias') }}"> Regresar</a>
        </div>
    </div>
</div>
@endsection
