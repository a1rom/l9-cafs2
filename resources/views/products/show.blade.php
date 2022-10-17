@extends('layout')

@section('title', 'Product')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>SKU: {{ $product->sku }}</p>
    <p>EAN: {{ $product->ean }}</p>
    <p>Details: {{ $product->details }}</p>
    <p>Price: {{ $product->price }}</p>
    <p>Created at: {{ $product->created_at }}</p>

    <a href="/products">Back</a>
@endsection
