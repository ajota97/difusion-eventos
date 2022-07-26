<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    public function index()
    {
      

        $emails = Email::all();

        return view('emails.index', compact('emails'));
    }


    public function create()
    {
        $categories = Category::get(['id', 'name']);
        return view('emails.create', compact('categories'));
    }


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

    public function show(Email $email)
    {
      return view('emails.show',compact('email'));
    }
   
 
    public function edit($id)
    {
        $email = Email::find($id);
        $categories = Category::get(['id', 'name']);

        return view('emails.edit', compact('email', 'categories'));
    }

    public function update(Request $request,Email $email)
    {

        $email->update($request->all());

        return redirect()->route('emails.index')->with('success', 'Correo actualizado.');
    }
   
    public function destroy(Email $email)
    {
      $email->delete();

       return redirect()->route('emails.index')
                       ->with('success','Correo eliminado.');
    }

}
