<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePessoa;
use App\Models\Pessoa;
use App\Models\Pessoas;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::orderBy('nome', )->paginate();

        return view('admin.pessoas.index', [
            'pessoas' => $pessoas
        ]);
    }

    public function create()
    {       
        return view('admin.pessoas.create');
    }

    public function store(StoreUpdatePessoa $request)
    {

        $data = $request->all();

        
        if ($request->foto != null && $request->foto->isValid()) {

            $namefile = Str::of($request->id)->slug('-') . '.' .$request->foto->getClientOriginalExtension();

            $image = $request->foto->storeAs('fotos', $namefile);
            $data['foto'] = $image;     

        }
        
        $pessoa = Pessoa::create($data);

        return redirect()
            ->route('pessoas.create')
            ->with('message', 'Registro criado com sucesso!!!');
    }

    public function show($id)
    {
       if(!$pessoa = Pessoa::find($id)){
           return redirect()->route('pessoas.index');
       }
        
       return view('admin.pessoas.show', compact('pessoa'));       
    
    }

    public function destroy($id)
    {
        if(!$pessoa = Pessoa::find($id)){
            return redirect()->route('pessoas.index');
        }

        $pessoa->delete();
         
               
       return redirect()
                ->route('pessoas.index')    
                ->with('message', 'Registro deletado com sucesso!!!');
    
    }

    public function edit($id)
    {
       if(!$pessoa = Pessoa::find($id)){
           return redirect()->back();
       }
        
       return view('admin.pessoas.edit', compact('pessoa'));       
    
    }


    public function update(StoreUpdatePessoa $request, $id)
    {
       if(!$pessoa = Pessoa::find($id)){
           return redirect()->back();
       }
        
        $pessoa->update($request->all());

        return redirect()
                ->route('pessoas.index')    
                ->with('message', 'Registro editado com sucesso!!!');
    }

    public function editdados($id)
    {
       if(!$pessoa = Pessoa::find($id)){
           return redirect()->back();
       }
        
       return view('admin.pessoas.editdados', compact('pessoa'));       
    
    }


    public function updatedados(StoreUpdatePessoa $request, $id)
    {
       if(!$pessoa = Pessoa::find($id)){
           return redirect()->back();
       }
        
        $pessoa->update($request->all());

        return redirect()
                ->route('pessoas.index')    
                ->with('message', 'Registro editado com sucesso!!!');
    }




    public function search(Request $request)
    {
            $filters = $request->all();
            $pessoas = Pessoa::where('nome', 'LIKE', "%{$request->search}%")
                                ->orwhere('email', 'LIKE', "%{$request->search}%" )
                                ->paginate();

        return view('admin.pessoas.index', compact('pessoas', 'filters'));
    }
}
