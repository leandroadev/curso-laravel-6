@extends('admin.layouts.app')

@section('title', 'Cadastro Novo Produto')

@section('content')
    <h1>Cadastrar Novo Produto</h1>

    <form action="" method="post">
        <input type="text" name="name" placeholder="Nome:">
        <input type="text" name="description" placeholder="Descrição:">
        <button type="submit">Enviar</button>
    </form>

@endsection