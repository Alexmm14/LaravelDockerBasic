@extends('layouts.templateBase')


@section('title', 'Crear Etiquetas')


@section('content')
	
    <div class="container-fluid">
        <div class="container">
            <h2>Registro de Etiquetas</h2>
        </div>
        <div class="container ">
	    <form action="{{url('/etiquetas')}}" method="post">
		{{csrf_field()}}
                <div class="mb-3">
                    <label for="codigo" class="form-label">{{'Nombre Etiquetas'}}</label>
                    <input type="text" class="form-control" id="nombreEtiqueta" name="nombreEtiqueta" value="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{'Descripcion'}}</label>
                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" aria-describedby="emailHelp">
                </div>
                <input type="submit" class="btn btn-primary" value="Agregar" >
	    </form>

	<div>
		<a class ="" href="{{url('etiquetas')}}"> Regresar</a>
	</div>
        </div>
        
    </div>
@endsection
