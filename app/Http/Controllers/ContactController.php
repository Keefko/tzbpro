<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function get(){
        return view('contact')->with('contact', Contact::findOrFail(1));
    }

    public function getDash(){
        return view('dashboard.contact.index')->with('contact', Contact::findOrFail(1));
    }

    public function update(Request $request, $id){
        $contact = Contact::findOrFail($id);

        $contact->adress = $request->input('adress');
        $contact->ico = $request->input('ico');
        $contact->dic = $request->input('dic');
        $contact->icdph = $request->input('icdph');
        $contact->bank = $request->input('bank');
        $contact->mail = $request->input('mail');
        $contact->phone = $request->input('phone');
        $contact->text = $request->input('text');
        $contact->certificates = $request->input('certificates');
        $contact->heading1 = $request->input('heading1');
        $contact->heading2 = $request->input('heading2');

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $contact->img = $filename;
        }

        $contact->save();
        return redirect()->back()->with('success', 'Kontaktne informacie boli uspesne upravene');
    }

}
