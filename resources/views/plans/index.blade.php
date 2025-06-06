@extends('layouts.app')

@section('title', 'Gerenciamento de planos')

@section('content')

    {{-- Renderiza o componente Livewire --}}
    @livewire('plan.index')

@endsection