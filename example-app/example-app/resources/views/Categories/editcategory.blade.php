@extends('layouts.templateBase')


@section('title', 'Editar categoria')


@section('content')
	
    <div class="container-fluid">
        <div class="container">
            <h2>Registro de categoria</h2>
        </div>
        <div class="container ">
	    <form action="{{url('/categorias.update')}}" method="post" enctype="multipart/form-data">
		    {{csrf_field()}}
            {{method_field('PATCH')}}
                <div class="mb-3">
                    <label for="codigo" class="form-label">{{'Nombre categoria'}}</label>
                    <input type="text" class="form-control" id="NombreCategoria" name="NombreCategoria" value="{{isset($categoria->nombreCategoria)?$nombreCategoria:''}}" required placeholder ="Nombre">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{'Descripcion'}}</label>
                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" aria-describedby="emailHelp" value="{{isset($categoria->Descripcion)?$Descripcion:''}}" required placeholder ="Nombre">
                </div>
                <input type="submit" class="btn btn-primary" value="Agregar" >
	    </form>

	<div>
		<a class ="" href="{{url('categorias')}}"> Regresar</a>
	</div>
        </div>
        
    </div>
@endsection