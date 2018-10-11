<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPortada = Blog::where('portada',1)->get()->first();
        $blogs = Blog::where('portada', '!=', 1)->get();
        return view('blog.index',compact('blogPortada','blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'titulo' => 'required',
            'resumen' => 'required',
            'imagen' => 'image|required',
            'archivo' => 'file|required',
        ]);
        $destinationPath = public_path('/images');

        if($request->hasFile('archivo')){
            //Get file name with the extension
            $filenameWithExt= $request->file('archivo')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension= $request->file('archivo')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //uploadImage
            //$path =$request->file('archivo')->storeAs('public/images',$fileNameToStore);
            $request->file('archivo')->move($destinationPath,$fileNameToStore);
        }
        if($request->hasFile('imagen')){
            //Get file name with the extension
            $filenameWithExt= $request->file('imagen')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension= $request->file('imagen')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore2= $filename.'_'.time().'.'.$extension;
            //uploadImage
            //$path =$request->file('imagen')->storeAs('public/images',$fileNameToStore);
            $request->file('imagen')->move($destinationPath,$fileNameToStore2);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        $blog = new Blog();
        $blog->titulo = $request->input('titulo');
        $blog->resumen = $request->input('resumen');
        $blog->imagen = $fileNameToStore2;
        $blog->archivo = $fileNameToStore;
        $blog->portada = 0;
        $blog->save();

        return redirect('/blog')->with('success','Post Creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function downloadPDF($id)
    {
        $blog= Blog::find($id);
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path()."/images/".$blog->archivo;

        $headers = [
                  'Content-Type' => 'application/bpm',
               ];

        return response()->download($file, $blog->archivo, $headers);
    }
    


    public function hacerPortada($id)
    {
        $blogPortada = Blog::where('portada',1)->get()->first();
        $blogPortada->portada = 0;
        $blogPortada->save();
        $blog = Blog::find($id);
        $blog->portada = 1;
        $blog->save();

        return redirect('/blog')->with('success','Portada Actualizada');
    }


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
        $post = Blog::find($id);

        return view('blog.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'titulo' => 'required',
            'resumen' => 'required',
            'imagen' => 'image',
            'archivo' => 'file',
        ]);
        $destinationPath = public_path('/images');

        if($request->hasFile('archivo')){
            //Get file name with the extension
            $filenameWithExt= $request->file('archivo')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension= $request->file('archivo')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //uploadImage
            //$path =$request->file('archivo')->storeAs('public/images',$fileNameToStore);
            $request->file('archivo')->move($destinationPath,$fileNameToStore);
        }
        if($request->hasFile('imagen')){
            //Get file name with the extension
            $filenameWithExt= $request->file('imagen')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension= $request->file('imagen')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore2= $filename.'_'.time().'.'.$extension;
            //uploadImage
            //$path =$request->file('imagen')->storeAs('public/images',$fileNameToStore);
            $request->file('imagen')->move($destinationPath,$fileNameToStore2);
        }else{
            $fileNameToStore2 = 'noimage.jpg';
        }


        $blog = Blog::find($id);
        $blog->titulo = $request->input('titulo');
        $blog->resumen = $request->input('resumen');
        if($request->hasFile('imagen')){
            $blog->imagen = $fileNameToStore2;
        }
        if($request->hasFile('archivo')){
            $blog->archivo = $fileNameToStore;
        }
        $blog->save();

        return redirect('/blog')->with('success','Post Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect('/blog')->with('success','Post Borrado');
    }
}
