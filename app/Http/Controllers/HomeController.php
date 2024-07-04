<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function listaUsuarios(){
        $usuarios = User::where('estado', 1)->get();

        return view('usuarios/listar', compact('usuarios'));
    }
    public function crearUsuario(){
        return view('usuarios/create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password =  Hash::make($request->password);
        $usuario->tipo ="Cajero";
        $usuario->estado = 1;

    if($usuario->save()){
        return redirect('/usuarios/listar')->with('success', 'Registro agregado correctamente!');
    }else{
        return back()->with('error','El registro no fue realizado!');
    }
}
public function elimina($id) {
    $usuario=User::find($id);
    $usuario->estado=!$usuario->estado;
    if($usuario->save()) {
        return redirect('/usuarios/listar')->with('success', 'Registro eliminado correctamente!');
    }else{
        return back()->with('error','El registro no fue eliminado!');
    }
}
public function listaelimina(){
    $usuarios = User::where('estado', 0)->get();
    return view('usuarios/listaelimina', compact('usuarios'));
}
public function edit($id){
    $usuario = User::find($id);
    return view('usuarios/edit', compact('usuario'));
}
public function update(Request $request, $id){
    $this->validate($request,[
        'name' => ['required','string','max:255'],
        'email' => ['required','string', 'email','max:255', 'unique:users,email,'.$id],
        'tipo'=>['required'],
    ]);

    $usuario = User::find($id);
    $usuario->name = $request->name;
    $usuario->email = $request->email;
$usuario->tipo = $request->tipo;
    if($usuario->save()){
        return redirect('/usuarios/listar')->with('success', 'Registro actualizado correctamente!');
    } else{
        return back()->with('error','El registro no fue actualizado!');
    }
}
}
