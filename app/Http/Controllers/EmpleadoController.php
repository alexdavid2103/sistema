<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::paginate(5);//cargue la variable con los datos a consultar
        return view('empleado.index',$datos );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       // $datosEmpleado = request()->all(); //Ve la variable datosEmpelado igualamos todo lo que venga del formulario
       $datosEmpleado = request()->except('_token');//Guardamos la informacion en la variable $datosEmpleado sin el token 
       if($request->hasFile('Foto')){ //Condicional para preguntar si hay foto
        $datosEmpleado['Foto']=$request->file('Foto')//capturamos la información del campo “foto”
        ->store('upload','public');//La información la enviamos a la carpeta upload 
    }
    
    Empleado::insert( $datosEmpleado);
     return response()->json($datosEmpleado);


    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleado = request()->except(['_token','_method']);//Capturamos la información que viene del formulario sin el token y el metodo
        Empleado::where('id','=',$id)->update($datosEmpleado);//preguntamos si el ID es igual al ID que traemos/ si es así actualice en la base de datos

        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('empleado');

    }
}
