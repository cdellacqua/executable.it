@extends('layouts.error')

@section('title', __('Servizio non disponibile'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Il sito è in manutenzione, si consiglia di riprovare più tardi.'))
