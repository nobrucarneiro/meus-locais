<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Crud::all();
        return view('crud.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Crud::all();
        $new = $request->except('_token');
        $save = Crud::create($new); 

        $request->session()->flash('success', 'Cadastro realizado com sucesso!');
        return redirect()->route('crud.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Crud::find($id);
        return view('crud.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Crud::whereId($id)->update($request->except(['_token', '_method']));
        $request->session()->flash('success', 'Registro atualizado com sucesso!');

        $data = Crud::all();
        return redirect()->route('crud.index', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = Crud::all();
        $del  = Crud::find($id)->delete();

        $request->session()->flash('delete', 'Realizado deletado com sucesso!');
        return redirect()->route('crud.index', compact('data'));
    }
}
