<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Models\Answer;
use App\Mail\MarkDownRisposta;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message_array = Message::orderByDesc('id')->paginate(20);
        return view('admin.chats.index',compact('message_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Answer $answer)
    {

        //ddd($request->all());
        $validated = $request->validate([
            'e-mail-user' => 'required|email',
            'content-answer' => 'required|min:5|max:1000',
        ]);
 
        $mail = Answer::create($validated);
        $to = $validated['e-mail-user'];
        Mail::to($to)->send(new MarkDownRisposta($mail));
        return redirect()->route('admin.inbox.index')->with('message', "hai risposto all utente con mail {$to}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {

        return view('admin.chats.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.inbox.index')->with('message3', "Il messaggio n.{$message->id} è stato eliminato");
    }
}
