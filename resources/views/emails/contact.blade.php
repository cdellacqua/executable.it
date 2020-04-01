<?php /** @var \App\Models\Contact $contact */ ?>

@extends('emails.layouts.default', ['title' => $title ?? null])
@section('body')
    <table style="margin: 0 auto;">
        @if (config('app.env') !== 'production')
            <tr>
                <td style="text-align: center;"><h2>Ambiente rilevato diverso da produzione: {{ config('app.env') }}</h2></td>
            </tr>
        @endif
        <tr>
            <td style="text-align: center;"><h1>Nuovo contatto dal form di Executable</h1></td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td style="text-align: right;"><b>Data</b></td><td>{{ $contact->created_at->toISOString() }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><b>Locale</b></td><td>{{ $contact->locale }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><b>Nome</b></td><td>{{ $contact->first_name }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><b>Cognome</b></td><td>{{ $contact->last_name }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><b>Email</b></td><td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><b>Telefono</b></td><td>{{ $contact->phone ?? '-' }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;"><b>Messaggio</b></td>
        </tr>
        <tr>
            <td>
                <p style="text-align: justify; margin: 0 auto; max-width: 400px;">
                    {{ $contact->message }}
                </p>
            </td>
        </tr>
    </table>
@endsection
