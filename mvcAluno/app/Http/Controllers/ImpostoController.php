<?php 

 namespace App\Http\Controllers;
 use App\Models\Imposto;

 use Illuminate\Http\Request;

 class ImpostoController extends Controller
 {
    public function listar(){
        $query = Imposto::query();
        $imposto = $query->get();
        return view('listar', compact('imposto'));
    }

    public function add(Request $request){

        $request->validate([
            'CNPJ' => 'required|string|max:255',
            'Pais' => 'required|string|max:255|unique:imposto,Pais',
            'Cidade' => 'required|string|max:255'
        ]);

        Imposto:create([
            'CNPJ' => $request->CNPJ,
            'Pais' => $request->Pais,
            'Cidade' => $request->Cidade
        ]);

        return redirect()->back()->with('success','imposto Cadatra com sucesso!');
    }

    public function atualizar($id){
        $imposto = Imposto::findOrFail($id);
        return view('atualizar', compact('imposto'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'CNPJ'=> 'required|string|max:255',
            'Pais'=> "required|string|max:255|unique:imposto,Pais,$id",
            'Cidade' => 'required|string|max255',
        ]);

        $imposto = Imposto::findOrFail($id);

        $imposto->CNPJ = $request->numSala;
        $imposto->Pais = $request->serie;
        $imposto->Cidade = $request->Cidade;

        $imposto->save();
        return redirect()->back()->while('success','imposto atualizado com suceso');
    }

    public function deletar($id){
        $imposto = Imposto::findOrFail($id);
        $imposto->delete();
        
        return redirect()->route('imposto.listar')->with('sucess','imposto excluido com sucesso!');
    }
    
 }