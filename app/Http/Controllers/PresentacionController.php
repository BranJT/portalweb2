<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Presentacion;
use App\Model\ProductoVideo;
use App\Model\Empleo;

class PresentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentacion = Presentacion::find(1);
        $productovideos = ProductoVideo::all();
        $empleos = Empleo::all();
        return view('presentacion.index',compact('presentacion','productovideos','empleos'));
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
    public function edit()
    {
        $presentacion = Presentacion::find(1);
        return view('presentacion.edit',compact('presentacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'descripcion' => 'required',
            'videoFondo' => 'mimetypes:video/avi,video/mpeg,video/mp4',
        ]);

        if($request->hasFile('videoFondo')){
            
            //Get file name with the extension
            $filenameWithExt= $request->file('videoFondo')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension= $request->file('videoFondo')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore= $filename.'.'.$extension;
            //uploadImage
            $path =$request->file('videoFondo')->storeAs('public/videos',$fileNameToStore);
            
        }else{
            $fileNameToStore = 'novideo.mp4';
        }

        $presentacion = Presentacion::find(1);
        $presentacion->descripcion= $request->input('descripcion');
        if($request->hasFile('videoFondo')){
            $presentacion->videoFondo=$fileNameToStore;
        }

        $presentacion->save();

        return redirect()->route('presentacion_index')->with('success','Presentacion actualizada');
    }

    public function editProducto($id)
    {
        $producto = ProductoVideo::find($id);
        return view('producto.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProducto(Request $request,$id)
    {
        $this->validate($request,[
            'descripcion' => 'required',
            'etiqueta' => 'required',
            'videoFondo' => 'mimetypes:video/avi,video/mpeg,video/mp4',
            'video' => 'mimetypes:video/avi,video/mpeg,video/mp4',
        ]);

        if($request->hasFile('videoFondo')){
            
            //Get file name with the extension
            $filenameWithExt= $request->file('videoFondo')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension= $request->file('videoFondo')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore= $filename.'.'.$extension;
            //uploadImage
            $path =$request->file('videoFondo')->storeAs('public/videos',$fileNameToStore);
            
        }else{
            $fileNameToStore = 'novideo.mp4';
        }

        if($request->hasFile('video')){
            
            //Get file name with the extension
            $filenameWithExt2= $request->file('video')->getClientOriginalName();
            //Get just filename
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            //Get just extension
            $extension2= $request->file('video')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore2= $filename2.'.'.$extension2;
            //uploadImage
            $path2 =$request->file('video')->storeAs('public/videos',$fileNameToStore2);
            
        }else{
            $fileNameToStore2 = 'novideo.mp4';
        }

        $producto = ProductoVideo::find($id);
        $producto->etiqueta= $request->input('etiqueta');
        $producto->descripcion= $request->input('descripcion');
        if($request->hasFile('videoFondo')){
            $producto->videoFondo=$fileNameToStore;
        }
        if($request->hasFile('video')){
            $producto->video=$fileNameToStore2;
        }

        $producto->save();

        return redirect()->route('presentacion_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function destroyProducto($id)
    {
        //
    }
    
    public function destroyEmpleo($id)
    {
        //
    }
}
