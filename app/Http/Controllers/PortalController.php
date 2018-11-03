<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Presentacion;
use App\Model\Mensaje;
use App\Model\Blog;
use App\Model\Suscriptor;
use App\Model\BlogDescargas;
use App\Model\ProductoVideo;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentacion = Presentacion::find(1);
        $blog = Blog::where('portada',1)->first();
        $productos = ProductoVideo::all();
        return view('welcome2',compact('presentacion','blog','productos'));
    }

    public function getContact()
    {
        return view('contact');
    }

    public function storeMensaje(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required',
            'correo' => 'required',
            'mensaje' => 'required',
        ]);

        $mensaje = new Mensaje();
        $mensaje->nombre = $request->input('nombre');
        $mensaje->correo = $request->input('correo');
        $mensaje->mensaje = $request->input('mensaje');
        $mensaje->save();

        return redirect()->route('contact')->with('success','Mensaje Enviado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function suscribirse($id)
    {
        return view('suscribirse',compact('id'));
    }

    public function storeSuscri(Request $request,$id)
    {
        $this->validate($request,[
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
        ]);

        $suscriptor = new Suscriptor();
        $suscriptor->nombre = $request->input('nombre');
        $suscriptor->correo = $request->input('correo');
        $suscriptor->telefono = $request->input('telefono');
        $suscriptor->save();

        $blogdescarga = new BlogDescargas();
        $blogdescarga->blog_id = $id;
        $blogdescarga->save();

        

        $blog= Blog::find($id);
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path()."/images/".$blog->archivo;

        $headers = [
                  'Content-Type' => 'application/bpm',
               ];
        //$respuesta = response()->download($file, $blog->archivo, $headers);
        //return redirect()->route('portal')->response()->download($file, $blog->archivo, $headers);
        //return response()->download($file, $blog->archivo, $headers);

        return response()->download($file, $blog->archivo, $headers);
        }
}
