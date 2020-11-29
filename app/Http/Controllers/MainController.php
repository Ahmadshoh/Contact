<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $contacts = Contact::paginate(15);

        return view('main', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        $validator = $request->validate([
//            'name'     => ['required', 'string', 'max:255', 'unique:contacts']
//        ]);


        $phones = $request->phone;
        $emails = $request->email;
        $contact_id = Contact::create(['name' => $request['name']])->id;

        foreach ($phones as $phone) {
            if ($phone !== null) {
                $phoneTable = new Phone();
                $phoneTable->contact_id = $contact_id;
                $phoneTable->phone = $phone;

                $phoneTable->save();
            }

        }

        foreach ($emails as $email) {
            if ($email !== null) {
                $emailTable = new Email();
                $emailTable->contact_id = $contact_id;
                $emailTable->email = $email;

                $emailTable->save();
            }
        }

        return redirect()->route('contact.index')->with('success', "Контакт успешно добавлен!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $phones = $request['phone'];
        $emails = $request['email'];
        $contact->name = $request['name'];

        foreach ($contact->getPhones() as $phone) {
            $phone->delete();
        }

        foreach ($contact->getEmails() as $email) {
            $email->delete();
        }

        foreach ($phones as $phone) {
            if ($phone !== null) {
                $phoneTable = new Phone();
                $phoneTable->contact_id = $id;
                $phoneTable->phone = $phone;

                $phoneTable->save();
            }
        }

        foreach ($emails as $email) {
            if ($email !== null) {
                $emailTable = new Email();
                $emailTable->contact_id = $id;
                $emailTable->email = $email;

                $emailTable->save();
            }
        }

        $contact->save();

        return redirect()->route('contact.index')->with('success', 'Контакт успешно сохранён!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);

        foreach ($contact->getPhones() as $phone) {
            $phone->delete();
        }

        foreach ($contact->getEmails() as $email) {
            $email->delete();
        }
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Контакт успешно удалён!');
    }

    public function search() {
        $query = !empty($_GET['query']) ? strtolower($_GET['query']) : null;

        if ($query == null) {
            return redirect()->route('contact.index');
        }

        $contacts = Contact::all();
        $results = array();

        foreach ($contacts as $key => $contact) {
            if(preg_match("#{$query}#i", strtolower($contact->name))) {
                $results[$key] = $contact;
            } else {
                continue;
            }
        }

        if (empty($results)) {
            foreach ($contacts as $key => $contact) {
                foreach ($contact->getPhones() as $phone) {
                    if(preg_match("#{$query}#i", strtolower($phone->phone))) {
                        $results[$key] = $contact;
                    } else {
                        continue;
                    }
                }

                if (empty($results)) {
                    foreach ($contact->getEmails() as $email) {
                        if(preg_match("#{$query}#i", strtolower($email->email))) {
                            $results[$key] = $contact;
                        } else {
                            continue;
                        }
                    }
                }
            }
        }

        if (!empty($results)) {
            return view('search', [
                'contacts'  => $results
            ]);
        } else {
            return redirect()->route('contact.index')->withErrors("По вашему запросу не найден ни один контакт!");
        }
    }
}
