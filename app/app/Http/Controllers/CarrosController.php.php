<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarrosController extends Controller
{

    public function __construct()
    {
        $this->carro = new Carro();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Carro::all();
        return view("carros", ['carros' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carro_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created = Carro::create([
            'Fipe' => $request->input('Fipe'),
            'Marca' => $request->input('Marca'),
            'Modelo' => $request->input('Modelo'),
            'Ano' => $request->input('Ano'),
            'Preco' => $request->input('Preco'),
        ]);

        if ($created) {
            return redirect()->back()->with('success', 'Cadastrado com sucesso');
        }

        return redirect()->back()->with('error', 'Erro ao cadastrar as informações');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Carro $carro)
    {
        return view('carro_show', ['carro' => $carro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carro $carro)
    {
        return view('carro_edit', ['carro' => $carro]);
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
        $data = $request->only(['Fipe', 'Marca', 'Modelo', 'Ano', 'Preco']);

        $updated = $this->carro->where('id', $id)->update($data);

        if ($updated) {
            return redirect()->back()->with('success', 'Informações atualizadas com sucesso');
        }
        return redirect()->back()->with('error', 'Erro ao realizar a atualização dos dados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->carro->where('id', $id)->delete();

        return redirect()->route('carros.index')->with('success', 'Dados deletados com sucesso');
    }
}
