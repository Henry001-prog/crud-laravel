<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $c = Client::where('cpf', $request->cpf);
        // if ($c) {
        //     return redirect()->route('client.index')->with('error', 'CPF já Cadastrado!');
        // }
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'cpf' => 'required',
            'phone' => 'required',
            'cep' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);

        Client::create($request->all());

        return redirect()->route('client.index')->with('success', 'Cliente Criado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact($client));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $c = Client::find($client->id);

        return view('clients.edit', compact('c'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required',
            'phone' => 'required',
            'cep' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);

        $c = Client::find($id);
        $c->update($request->all());

        return redirect()->route('client.index')->with('success', 'Cliente modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $c = Client::find($client->id);
        $c->delete();
        return redirect()->route('client.index')->with('success', 'Cliente removido!');
    }
}
