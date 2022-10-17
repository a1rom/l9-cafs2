@extends('layout')

@section('title', 'Products')
{{-- @endsection --}}

@section('content')
    <h1>Products</h1>
    <ul>
        @foreach ($products as $product)
        <table>
            <tr>
                <td>
                    <li>
                        <a href="/products/{{ $product->id }}">
                            {{ $product->name }}
                        </a>
                    </li>
                </td>
                <td>
                    <form action="/products/{{ $product->id }}" method="GET">
                        @csrf
                        @method('GET')
                        <button type="submit">View</button>
                    </form>
                </td>
                <td>
                    <form action="/products/{{ $product->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        </table>
        @endforeach
    </ul>
@endsection
