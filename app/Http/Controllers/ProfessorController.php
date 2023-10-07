<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Docencia;
use App\Models\Eixo;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professor = Professor::all();
        return view('professor.index', compact('professor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eixos = Eixo::all();

        return view('professor.create', compact('eixos'));

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
            'email' => 'required|unique:professors|max:250|min:15',
            'siape' => 'required|unique:professors|max:10|min:8',
            'ativo' => 'required|max:1|min:1',
            'eixo' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "unique" => "O campo [:attribute] é único!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!"
        ];
        
        $request->validate($regras, $msgs);

        $professor = new Professor();
        $eixo = Eixo::find($request->eixo);

        $professor->nome = $request->nome;
        $professor->email = $request->email;
        $professor->siape = $request->siape;
        $professor->ativo = $request->ativo;
        $professor->eixo()->associate($eixo);

        $professor->save();

        return redirect()->route('professor.index');
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
        $professor = Professor::find($id);
        $eixos = Eixo::all();

        return view('professor.edit', compact('professor', 'eixos', 'id'));
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
            'email' => 'required|max:250|min:15',
            'siape' => 'required|max:10|min:8',
            'ativo' => 'required|max:1|min:1',
            'eixo' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "unique" => "O campo [:attribute] é único!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!"
        ];
        
        $request->validate($regras, $msgs);

        $professor = Professor::find($id);
        $eixo = Eixo::find($request->eixo);

        $professor->nome = $request->nome;
        $professor->email = $request->email;
        $professor->siape = $request->siape;
        $professor->ativo = $request->ativo;
        $professor->eixo()->associate($eixo);

        $professor->save();

        return redirect()->route('professor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docencias = Docencia::where('professor_id', $id)->get();

        foreach($docencias as $docencia){
            $docencia->delete();
        }
        Professor::find($id)->delete();

        return redirect()->route('professor.index');
    }
    
    public function vinculo(){
        $docencia = Docencia::all();
        $professor = Professor::all();
        $disciplina = Disciplina::orderBy('id')->get();

        return view('professor.vinculo', compact('docencia', 'professor', 'disciplina'));
    }

    public function vinculoStore(Request $request){

        $disciplinas = Disciplina::orderBy('id')->get();
        $professores = array_values($request->input('professores'));
        
        $i = 0;
        foreach($disciplinas as $disciplina){
;
            $docenciaExistente = Docencia::where('disciplina_id', $disciplina->id)->first();

                if($docenciaExistente){
                    $docenciaExistente->professor()->associate($professores[$i]);

                    $docenciaExistente->save();
                }else{
                    $docencia = new Docencia();
    
                    $docencia->professor()->associate($professores[$i]);
                    $docencia->disciplina()->associate($disciplina);
                    
                    $docencia->save();
                }
                $i++;
        }

        return redirect()->route('index');

    }

}
