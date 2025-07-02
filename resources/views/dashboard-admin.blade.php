@extends('layouts.app')

@section('title', 'Tela Inicial')

@section('content')
    <div class="d-flex flex-column gap-2">
        <h1 class="mb-4">Bem-vindo, {{ Auth::user()->name }}</h1>
        <a href="{{ route('categorias.index') }}" class="btn btn-primary align-self-start">Gerenciar Categorias</a>
        <a href="{{ route('autores.index') }}" class="btn btn-primary align-self-start">Gerenciar Autores</a>
        <a href="{{ route('livros.index') }}" class="btn btn-primary align-self-start">Gerenciar Livros</a>
        <a href="{{ route('autor-livro.create') }}" class="btn btn-primary align-self-start">Gerenciar Autores nos Livros</a>
    </div>
@endsection
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
