<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Jobs\ProcessContact;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
    public function index() {
        return view('pages.contacts');
    }

    public function store(ContactRequest $contact) {
        $data = $contact->validated();
        /** @var Contact $contact */
        $contact = Contact::query()->create([
            'locale' => app()->getLocale(),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'message' => $data['message'],
            'privacy_granted' => Carbon::now()
        ]);

        if (config('app.env') !== 'testing') {
            ProcessContact::dispatchAfterResponse($contact);
        }

        return Redirect::to(route_locale('contacts-tp'), 303)
            ->with('success', true);
    }

    public function tp() {
        if (session('success') === true) {
            return response()->view('pages.contacts-tp', [], 201);
        } else {
            return Redirect::to(route_locale('contacts'));
        }
    }
}
