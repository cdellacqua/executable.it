@extends('layouts.error')

@section('title', __('Errore Server'))
@section('code', '500')
@section('message', __('Il server ha riscontrato un\'errore imprevisto durante la gestione della richiesta.'))
