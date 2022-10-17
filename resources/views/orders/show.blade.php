@extends('layout')

@section('title', 'Order')

@section('content')
    <h1>Order {{ $order->id }}</h1>
    <p>Customer: {{ $order->user_id }}</p>
    <p>Delivery address: {{ $order->delivery_address_id }}</p>
    <p>Created at: {{ $order->created_at }}</p>
    <p>Updated at: {{ $order->updated_at }}</p>
    <p>Products:</p>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->id }} - {{ $product->name }}</li>
        @endforeach
    </ul>
    <a href="/orders">Back</a>
@endsection
