<?php

namespace App\Http\Controllers;

use App\Mail\SendEmails;
use App\Models\Category;
use App\Models\Client;
use App\Models\Email;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class EventController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::get(['id', 'name']);
        $clients = Client::get(['id', 'name']);
        return view('events.create', compact('categories','clients'));
    }

    public function store(Request $request)
    {
                $request->validate([
                    'name'          => 'required',
                    'date'          => 'required',
                    'start_time'    => 'required',
                    'finish_time'   => 'required',
                    'address'       => 'required',
                ]);

                Event::create([
                  'name'        => $request->name,
                  'date'        => $request->date,
                  'start_time'  => $request->start_time,
                  'finish_time' => $request->finish_time,
                  'address'     => $request->address,
                  'description' => $request->description,
                  'client_id'   => implode(" ",$request->input('clients')),
                  'user_id'     => Auth::User()->id,
                  'category_id' => implode(" ",$request->input('categories'))

                ]);


        return redirect()->route('events.index')->with('success', 'Email creado exitosamente.');
    }

    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect()->route('events.index')
                        ->with('success','Evento eliminado.');
    }

    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show',compact('event'));
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $categories = Category::get(['id', 'name']);

        return view('events.edit', compact('event', 'categories'));
    }

    public function update(Request $request,Event $event)
    {

        $event->update($request->all());
        return redirect()->route('events.index')->with('success', 'Evento actualizado.' );
    }

    public function sendMails($id){

        $event= Event::where('id', $id)->first();
        $receivers = Email::where('category_id','=', $event->category_id )->select('email')->get();
        Mail::to($receivers)->send(new SendEmails($event));
        return redirect()->route('events.index')
        ->with('success','Evento difundido.');
    }



}
