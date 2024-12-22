<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('admin.message', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message, $id)
    {
        $message = Message::find($id);

        return view('admin.message_edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message, $id)
    {
        try {
         //   dd($request->input('note'));
            $message = Message::find($id);
            $message->note = $request->input('note');
            $message->status = "Old";
            $message->save();
            return redirect()->route('adminmessages')->with('success', 'Mesaj başarılı bir şekilde güncellendi.');
        }catch (\Exception $exception){
            return redirect()->back()->with('error',"Hata" . $exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message,$id)
    {
        try {
            Message::destroy($id);

            return redirect()->route('adminmessages')->with('success', 'Mesaj  silindi.');


        }catch (\Exception $exception){
            return redirect()->back()->with('error',"Hata" . $exception->getMessage());
        }



    }
}
