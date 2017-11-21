<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 10/7/17
 * Time: 10:07 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mews\Purifier\Facades\Purifier;

class PagesController extends Controller
{
    public function getIndex() {
        return view('pages.welcome');
    }

    public function getCV() {
        return view('pages.cv');
    }

    public function getAbout() {
        $first = 'Harry';
        $last = 'Seong';
        $fullname = $first . ' ' . $last;
        $email = 'harryseong@gmail.com';
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about')->withData($data);
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'subject'   => 'required|min:3',
            'message'   => 'required|min:10'
        ]);

        $data = array(
            'name'          => $request->name,
            'email'         => $request->email,
            'subject'       => $request->subject,
            'bodyMessage'   => Purifier::clean($request->message)
        );

        Mail::send(['html' => 'emails.contact'], $data, function($message) use($data){
            $message->from($data['email']);
            $message->to('harryseong@gmail.com');
            $message->subject($data['subject']);
        });

        session()->flash('success', 'Your message has been successfully emailed to Harry. You will hear back from him within 3-5 business days.');

        return redirect('/contact');
    }
}