@extends('layouts.error')

@section('title', __('Troppe richieste'))
@section('code', '429')
@section('message', __('Il sito sta ricevendo troppe richieste contemporaneamente, si consiglia di riprovare più tardi.'))
