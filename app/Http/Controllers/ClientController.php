<?php

namespace App\Http\Controllers;
use App\Models\Client;
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
        $request->validate(
            [
                'name'    => 'required | min:3',
                'email'   => 'required | email | unique:clients,email',
                'nit'     => 'required | numeric | digits:10',
                'address' => 'required | min:15 ',
                'phone'   => 'required | digits_between:7,11 | numeric' 
            ],
            [
                'name.required' => 'El campo No puede estar vacio',
                'name.min'      => 'El campo Requiere un MINIMO de 3 caracteres',
                'email.required'=> 'El campo No puede estar vacio',
                'email.email'   => 'Debe ingresar un correo valido',
                'email.unique'  => 'El correo ya se encuentra Registrado',
                'nit.required'  => 'El campo No puede estar vacio',
                'nit.numeric'   => 'Ingrese solo numeros',
                'nit.digits'    => 'La candidad requerida es de 10 digitos ',
                'address.required'=> 'El campo No puede estar vacio',
                'address.min'    => 'El campo Requiere un MINIMO de 15 caracteres',
                'phone.required' => 'El campo No puede estar vacio',
                'phone.min'      => 'El campo Requiere un MINIMO de 7 digitos',
                'phone.digits_between'  => 'El telefono tiene que tener 7 u 11 digitos',
                'phone.numeric'  => 'Ingrese solo numeros',

            ]
        );

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success','Cliente creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
      return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate(
            [
                'name'    => 'required | min:3',
                'email'   => 'required | email | unique:clients,email',
                'nit'     => 'required | numeric | digits:10',
                'address' => 'required | min:15 ',
                'phone'   => 'required | digits_between:7,11 | numeric' 
            ],
            [
                'name.required' => 'El campo No puede estar vacio',
                'name.min'      => 'El campo Requiere un MINIMO de 3 caracteres',
                'email.required'=> 'El campo No puede estar vacio',
                'email.email'   => 'Debe ingresar un correo valido',
                'email.unique'  => 'El correo ya se encuentra Registrado',
                'nit.required'  => 'El campo No puede estar vacio',
                'nit.numeric'   => 'Ingrese solo numeros',
                'nit.digits'    => 'La candidad requerida es de 10 digitos ',
                'address.required'=> 'El campo No puede estar vacio',
                'address.min'    => 'El campo Requiere un MINIMO de 15 caracteres',
                'phone.required' => 'El campo No puede estar vacio',
                'phone.min'      => 'El campo Requiere un MINIMO de 7 digitos',
                'phone.digits_between'  => 'El telefono tiene que tener 7 u 11 digitos',
                'phone.numeric'  => 'Ingrese solo numeros',

            ]
        );

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success','Client actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
      $client->delete();

       return redirect()->route('clients.index')
                       ->with('success','cliente eliminado.');
    }

}
