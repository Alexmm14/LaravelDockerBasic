<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Label;
use App\Models\Categoria;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        $posts = Post::select('posts.*', 'categorias.nombreCategoria', 'labels.nombreEtiquetas as nombreLabel')
            ->leftJoin('categorias', 'posts.categoria_id', '=', 'categorias.id')
            ->leftJoin('labels', 'posts.label_id', '=', 'labels.id')
            ->orderBy('posts.created_at', 'desc')
            ->take(10)
            ->get();

        return view('Post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        $label = Label::orderBy('created_at', 'desc')->get();
        return view('Post.createpost', compact('categoria', 'label'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['post_imagen' => 'required|image|mimes:jpeg,png,jpg,gif']);
        #Obtiene la imagen
        $imagen = $request->file('post_imagen');
        // Nombre generico de la imagen
        $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
        // Guardar la imagen en la carpeta de almacenamiento
        $imagen->move(public_path('img'), $nombreImagen);

        $post = new Post;
        $post->post_contenido = $request["post_contenido"];
        $post->post_imagen = $nombreImagen;
        $post->fechaPublicacion = date("Y-m-d H:i:s");
        $post->estatus = true;
        $post->categoria_id = $request["categoria_id"];
        $post->label_id = $request["label_id"];
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categoria = Categoria::orderBy('created_at', 'desc')->get();
        $label = Label::orderBy('created_at', 'desc')->get();
        return view('Post.editpost', compact('post', 'categoria', 'label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // Encuentra el post antes de actualizar
        $postBeforeUpdate = Post::findOrFail($id);

        // Verifica si se ha cargado una nueva imagen
        if ($request->hasFile('post_imagen')) {
            // Validar y procesar la nueva imagen
            $request->validate([
                'post_imagen' => 'required|image|mimes:jpeg,png,jpg,gif'
            ]);

            // Obtener la imagen del formulario
            $imagen = $request->file('post_imagen');

            // Eliminar la imagen anterior si existe
            $nombreImagenAnterior = $postBeforeUpdate->post_imagen;
            $rutaImagenAnterior = public_path('img') . '/' . $nombreImagenAnterior;
            if (file_exists($rutaImagenAnterior)) {
                unlink($rutaImagenAnterior);
            }

            // Generar un nuevo nombre de imagen único
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();

            // Guardar la nueva imagen en la carpeta de almacenamiento
            $imagen->move(public_path('img'), $nombreImagen);

            // Actualizar el post con la nueva imagen
            $postBeforeUpdate->post_imagen = $nombreImagen;
        }
        $postBeforeUpdate->post_contenido = $request["post_contenido"];
        $postBeforeUpdate->categoria_id = $request["categoria_id"];
        $postBeforeUpdate->label_id = $request["label_id"];
        $postBeforeUpdate->save();
        return redirect()->route('post.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index');
    }
}
