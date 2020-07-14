@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')
    <h1>Exibindo os produtos</h1>

    @component('admin.components.card')
        @slot('title')
            <h1>Título Card</h1>
        @endslot
        Um card de exemplo
    @endcomponent

    <hr>

    @include('admin.includes.alerts', ['content' => 'Alerta de preços de produtos'])
    {{-- @include('admin.alerts.alerts', []) --}}

    <hr>

    @if (isset($products))
        @foreach ($products as $product)
            <p class="@if ($loop->last) last @endif">{{ $product }}</p>
        @endforeach

    @endif

    <hr>
    @forelse ($products as $product)
        <p class="@if ($loop->first) last @endif">{{ $product }}</p>
    @empty
        <p>Não existem produtos cadastrados.</p>
    @endforelse
    <hr>

    @if ($teste === '123')
        É igual.
    @elseif($teste == 123)
        É igual a 123.
    @else
        É diferente.
    @endif

    @unless ($teste === '123')
        fdada
    @else
        teste
    @endunless

    @isset($teste2)
        <p>{{ $teste2 }}</p>
    @endisset

    @empty($teste3)
        <p>Vazio...</p>
    @endempty

    @auth
        <p>Autenticando</p>
    @else
        <p>Não autenticado<p>
    @endauth

    @guest
        <p>Não autenticado</p>
    @endguest

    @switch($teste)
        @case(1)
            Igual 1
            @break
        @case(2)
            Igual 2
            @break
        @case(3)
            Igual 3
            @break
        @case(123)
            Igual 123
            @break
        @default
            Default
    @endswitch

@endsection

@push('styles')
    <style>
        .last {background: #ccc;}
    </style>            
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef'
    </script>
@endpush