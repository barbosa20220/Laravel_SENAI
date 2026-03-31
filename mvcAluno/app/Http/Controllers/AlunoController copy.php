<?php 

 namespace App\Http\Controllers;
 use App\Models\Aluno;

 use Illuminate\Http\Request;

 class AlunoController extends Controller
 {
    public function listar(){
        $query = Aluno::query();
        $alunos = $query->get();
        return view('listar', compact('alunos'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email'
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email
        ]);

        return redirect()->back()->with('success','Aluno Cadatro com sucesso!');
    }

    public function atualizar($id){
        $aluno = Aluno::findOrFail($id);
        return view('atualizar', compact('aluno'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome'=> 'required|string|max:255',
            'email'=> "required|string|max:255|unique:alunos,email,$id",
        ]);

        $aluno = Aluno::findOrFail($id);

        $aluno->nome = $request->nome;
        $aluno->email = $request->email;

        $aluno->save();
        return redirect()->back()->while('success','Aluno atualizado com suceso');
    }

    public function deletar($id){
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();
        
        return redirect()->route('aluno.listar')->with('sucess','Aluno excluido com sucesso!');
    }
 }