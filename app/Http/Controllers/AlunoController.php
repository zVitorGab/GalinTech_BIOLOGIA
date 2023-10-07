<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Matricula;
use Illuminate\Http\Request;

use function PHPUnit\Framework\countOf;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Aluno::all();
        return view('aluno.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('aluno.create', compact('cursos'));
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
            'nome' => 'required|max:100|min:10',
            'curso' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!"
        ];

        $request->validate($regras, $msgs);

        $aluno = new Aluno();
        $curso = Curso::find($request->curso);

        $aluno->nome = $request->nome;
        $aluno->curso()->associate($curso);

        $aluno->save();

        return redirect()->route('aluno.index');
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
        $aluno = Aluno::find($id);
        $cursos = Curso::all();
        return view('aluno.edit', compact('id', 'aluno', 'cursos'));
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
            'curso' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!"
        ];

        $request->validate($regras, $msgs);

        $aluno = Aluno::find($id);
        $curso = Curso::find($request->curso);

        $aluno->nome = $request->nome;
        $aluno->curso()->associate($curso);

        $aluno->save();

        return redirect()->route('aluno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matriculas = Matricula::where('aluno_id', $id)->get();

        foreach($matriculas as $matricula){
            $matricula->delete();
        }

        Aluno::find($id)->delete();
        return redirect()->route('aluno.index');
    }

    public function matricula($id){
        $aluno = Aluno::find($id);
        $curso = Curso::find($aluno->curso_id);
        $disciplinas = Disciplina::all();

        return view('aluno.matricula', compact('aluno', 'curso', 'disciplinas'));
    }

    public function matriculaStore(Request $request){

        $aluno = Aluno::find($request->aluno_id);
        $disciplinasSelecionadas = $request->input('disciplina_id');

        for ($i=0; $i < count($disciplinasSelecionadas); $i++) { 
            $disciplina = Disciplina::find($disciplinasSelecionadas[$i]);
            $matricula = new Matricula();
            $matricula->aluno()->associate($aluno);
            $matricula->disciplina()->associate($disciplina);
            $matricula->save();
        }

        return redirect()->route('index');

    }
}
