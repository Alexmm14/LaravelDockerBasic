@extends('layouts.templateBase')


@section('title', 'Post')

@section('btn')
    <a href="{{ url('/post/create') }}" class="btn btn-dark ">Nueva</a>
@endsection

@section('content')
    <div class="container mt-5 ">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($posts as $post)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ asset('img/' . $post->post_imagen) }}" class="card-img-top img-fluid" alt="..." style="height:75%;" >
                        <div class="card-body">
                            <p class="card-text">{{ $post->post_contenido }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $post->nombreCategoria }}</small>
                                <small class="text-muted">{{ $post->nombreLabel }}</small>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($post->updated_at)->format('d/m/Y') }}</small>
                            </div>
                            <div class="d-flex justify-content-center  align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('/post/' . $post->id . '/edit') }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="{{ url('/post/'. $post->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"
                                            onclick="return confirm('¿Seguro que desear eliminarlo?');"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
