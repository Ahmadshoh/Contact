<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::paginate(15);

        return view('main', compact('contacts'));
    }

    public function add() {
        return view('add');
    }

    public function addContact(Request $request) {
        dd($request);
    }
}
