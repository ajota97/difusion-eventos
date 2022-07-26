<?php

namespace App\Http\Controllers;

use App\Mail\SendEmails;
use App\Models\Category;
use App\Models\Email;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::all();

        return view('emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);
        return view('emails.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        Email::create([
            'email'      =>  $request->email,
            'user_id'     =>  Auth::User()->id,
            'category_id'=>implode(" ",$request->input('categories'))
          ]);


        return redirect()->route('emails.index')->with('success','Correo creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
      return view('emails.show',compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = Email::find($id);
        $categories = Category::get(['id', 'name']);

        return view('emails.edit', compact('email', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Email $email)
    {
        $email->update($request->all());

        return redirect()->route('emails.index')->with('success', 'Correo actualizado.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email $emails
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
      $email->delete();

       return redirect()->route('emails.index')
                       ->with('success','Correo eliminado.');
    }

}
