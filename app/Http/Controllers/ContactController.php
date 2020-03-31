<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index() {
        return view('pages.contact-me');
    }

    public function store(ContactRequest $contact) {
        $data = $contact->validated();
        Contact::query()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'message' => $data['message'],
            'privacy_granted' => Carbon::now()
        ]);

        return Redirect::to(route_locale('contact-me-tp'))
            ->with('success', true);
    }

    public function tp() {
        if (session('success') === true) {
            return view('pages.contact-me-tp');
        } else {
            return Redirect::to(route_locale('contact-me'));
        }
    }
}
