@extends('layouts.error')

@section('title', __('Accesso negato'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'L\'accesso a questa pagina è stato negato.'))
