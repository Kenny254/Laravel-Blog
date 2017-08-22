<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Email;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\ContactEmail;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inbox = DB::table('emails')->where('recipient', Auth::user()->email)->get();
        $sent = DB::table('emails')->where('from', Auth::user()->email)->get();
        return view('backend/email/inbox', compact('inbox', 'sent'));
    }

    public function outbox()
    {
        $inbox = DB::table('emails')->where('recipient', Auth::user()->email)->get();
        $sent = DB::table('emails')->where('from', Auth::user()->email)->get();
        return view('backend/email/outbox', compact('inbox', 'sent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inbox = DB::table('emails')->where('recipient', Auth::user()->email)->get();
        $sent = DB::table('emails')->where('from', Auth::user()->email)->get();
        return view('backend/email/create', compact('inbox', 'sent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'recipient' => 'required',
                'subject' => 'required|min:3',
                'body' => 'required|min:3'
            ]);

        $email = new Email;
        $email->recipient = $request->recipient;
        $email->subject = $request->subject;
        $email->body = $request->body;
        $email->from = Auth::user()->email;

        $email->save();

        $content = [
            'salutation' => 'Hi there,',
            'body' => $request->body,
            'button' => 'Back'
        ];

        $receiver = $request->recipient;
        Mail::to($receiver)->send(new ContactEmail($content));
        

        Session::flash('send-mail', 'Your email has been sent and stored successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Email::find($id);
        return view('backend/email/read', compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = Email::find($id);

        $email->delete();

        Session::flash('delete-mail', 'Your email has been deleted successfully');
        return redirect()->back();
    }
}
