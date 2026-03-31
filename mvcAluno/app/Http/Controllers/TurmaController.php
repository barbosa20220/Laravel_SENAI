<?php 

 namespace App\Http\Controllers;
 use App\Models\Turma;

 use Illuminate\Http\Request;

 class TurmaController extends Controller
 {
    public function listar(){
        $query = Turma::query();
        $turma = $query->get();
        return view('listar', compact('turma'));
    }

    public function add(Request $request){

        $request->validate([
            'numSala' => 'required|string|max:255',
            'serie' => 'required|string|max:255|unique:turma,serie'
        ]);

        Turma::create([
            'numSala' => $request->numSala,
            'serie' => $request->serie
        ]);

        return redirect()->back()->with('success','turma Cadatra com sucesso!');
    }

    public function atualizar($id){
        $turma = Turma::findOrFail($id);
        return view('atualizar', compact('turma'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'numSala'=> 'required|string|max:255',
            'serie'=> "required|string|max:255|unique:turma,serie,$id",
        ]);

        $turma = Turma::findOrFail($id);

        $turma->numSala = $request->numSala;
        $turma->serie = $request->serie;

        $turma->save();
        return redirect()->back()->while('success','turma atualizado com suceso');
    }

    public function deletar($id){
        $turma = Turma::findOrFail($id);
        $turma->delete();
        
        return redirect()->route('turma.listar')->with('sucess','turma excluido com sucesso!');
    }
    
 }