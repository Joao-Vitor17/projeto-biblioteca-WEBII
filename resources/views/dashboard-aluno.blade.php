@extends('layouts.app')

@section('title', 'Tela Inicial')

@section('content')
    <div class="d-flex flex-column gap-2">
        <h1 class="mb-4">Bem-vindo, {{ Auth::user()->name }}</h1>
        <a href="{{ route('emprestimos.index') }}" class="btn btn-primary align-self-start">Visualizar Empréstimos</a>
        <a href="{{ route('emprestimos.create') }}" class="btn btn-primary align-self-start">Realizar Empréstimo</a>
        <a href="{{ route('livros.listar') }}" class="btn btn-primary align-self-start">Visualizar Livros</a>
        <a href="{{ route('emprestimos.emitir') }}" class="btn btn-primary align-self-start">Gerar PDF dos Empréstimos</a>
    </div>
@endsection
