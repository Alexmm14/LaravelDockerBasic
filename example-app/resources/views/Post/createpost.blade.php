@extends('layouts.templateBase')


@section('title', 'Crear categoria')


@section('content')

    <div class="container-fluid">
        <div class="container">
            <h2>Registro de Posts</h2>
        </div>
        <div class="container ">
            <form action="{{ url('post') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row container ">
                    <div class="col-12 col-md-6 row d-flex align-items-center ">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">{{ 'Post' }}</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="post_contenido" name="post_contenido"></textarea>
                                    <label for="floatingTextarea">Contenido</label>
                                  </div>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Añadir Imagen</label>
                                    <input type="file" class="form-control" id="post_imagen" name="post_imagen">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 row d-flex align-items-center ">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="input-categoria" class="input-group">Categoría</label>
                                <select class="form-select" aria-label="Default select example" id="categoria_id" name="categoria_id">
                                    @foreach ($categoria as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->nombreCategoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="input-label" class="input-group">Etíqueta</label>
                                <select class="form-select" aria-label="Default select example" id="label_id" name="label_id">
                                    @foreach ($label as $label)
                                        <option value="{{$label -> id}}">{{$label -> nombreEtiquetas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <input type="submit" class="btn btn-primary" value="Agregar">
            </form>

            <div>
                <a class ="" href="{{ url('post') }}"> Regresar</a>
            </div>
        </div>
    </div>
@endsection
