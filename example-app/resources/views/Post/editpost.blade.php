<!-- editLabel.blade.php -->

@extends('layouts.templateBase')

@section('title', 'Editar Categoria')

@section('content')

    <div class="container-fluid">
        <div class="container">
            <h2>Registro de Posts</h2>
        </div>
        <div class="container ">
            <form action="{{ route('post.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row container ">
                    <div class="col-12 col-md-6 row d-flex align-items-center ">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">{{ 'Post' }}</label>
                                <div class="form-floating">
                                    <textarea class="form-control" id="post_contenido" name="post_contenido" required placeholder="Contenido">{{ isset($post->post_contenido) ? $post->post_contenido : '' }}</textarea>
                                    <label for="floatingTextarea">Contenido</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 ">
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Añadir Imagen</label>
                                    <input type="file" class="form-control" id="post_imagen" name="post_imagen"
                                        value="{{ isset($post->post_imagen) ? $post->post_imagen : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 row d-flex align-items-center ">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="input-categoria" class="input-group">Categoría</label>
                                <select class="form-select" aria-label="Default select example" id="categoria_id"
                                    name="categoria_id">
                                    @foreach ($categoria as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ $post->categoria_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->nombreCategoria }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="input-label" class="input-group">Etiqueta</label>
                                <select class="form-select" aria-label="Default select example" id="label_id"
                                    name="label_id">
                                    @foreach ($label as $lbl)
                                        <option value="{{ $lbl->id }}"
                                            {{ $post->label_id == $lbl->id ? 'selected' : '' }}>
                                            {{ $lbl->nombreEtiquetas }}
                                        </option>
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
