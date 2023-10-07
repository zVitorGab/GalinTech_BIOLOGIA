<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Docencia;
use App\Models\Matricula;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Disciplina::orderBy('id')->get();
        return view('disciplina.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Curso::all();
        return view('disciplina.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:50|min:10'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!"
        ];

        $request->validate($regras, $msgs);

        $disciplina = new Disciplina();
        $curso = $request->curso;

        $disciplina->nome = $request->nome;
        $disciplina->carga = $request->carga;

        $disciplina->curso_id = $request->curso;
        $disciplina->save();

        return redirect()->route('disciplina.index');
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
        $cursos = Curso::all();
        $disciplina = Disciplina::find($id);

        return view('disciplina.edit', compact('disciplina', 'cursos', 'id'));
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
        $regras = [
            'nome' => 'required|max:100|min:10',
            'carga' => 'required|max:12|min:1',
            'curso' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!"
        ];
        
        $request->validate($regras, $msgs);

        $disciplina = Disciplina::find($id);
        $curso = Curso::find($request->curso);

        $disciplina->nome = $request->nome;
        $disciplina->carga = $request->carga;
        
        $disciplina->curso()->associate($curso);
        $disciplina->save();

        return redirect()->route('disciplina.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matriculas = Matricula::where('disciplina_id', $id)->get();
        $docencias = Docencia::where('disciplina_id', $id)->get();

        foreach($matriculas as $matricula){
            $matricula->delete();
        }
        foreach($docencias as $docencia){
            $docencia->delete();
        }
        
        Disciplina::find($id)->delete();
        return redirect()->route('disciplina.index');
    }
}
