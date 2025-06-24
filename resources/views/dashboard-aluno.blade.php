@extends('layouts.app')

@section('title', 'Tela Inicial')

@section('content')
    <h1 class="mb-4">Bem-vindo, {{ Auth::user()->name }}</h1>
    <button class="btn btn-primary">Clique aqui, aluno!</button>
@endsection
