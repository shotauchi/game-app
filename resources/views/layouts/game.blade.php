{{-- resources/views/layouts/game.blade.php --}}
@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/game.css') }}" rel="stylesheet">
@endpush

{{-- layouts.app の body クラスに "game-layout" を渡す --}}
@section('body-class', 'game-layout')
