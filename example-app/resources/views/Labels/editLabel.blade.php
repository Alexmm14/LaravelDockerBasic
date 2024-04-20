<!-- editLabel.blade.php -->

@extends('layouts.templateBase')

@section('title', 'Editar Etiqueta')

@section('content')
<div class="container-fluid">
    <div class="container">
        <h2>Editar Etiqueta</h2>
    </div>
    <div class="container ">
        <form action="{{ route('etiquetas.update', ['etiqueta' => $etiqueta->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="codigo" class="form-label">{{ 'Nombre Etiquetas' }}</label>
                <input type="text" class="form-control" id="nombreEtiquetas" name="nombreEtiquetas"
                    value="{{ isset($etiqueta->nombreEtiquetas) ? $etiqueta->nombreEtiquetas : '' }}" required placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ 'Descripcion' }}</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion"
                    aria-describedby="emailHelp" value="{{ isset($etiqueta->descripcion) ? $etiqueta->descripcion : '' }}" required
                    placeholder="Descripción">
            </div>
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </form>

        <div>
            <a class="" href="{{ url('etiquetas') }}"> Regresar</a>
        </div>
    </div>
</div>
@endsection
