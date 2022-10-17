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
                        {{ $product->name }}
                    </li>
                </td>
                <td>
                    <form action="/products/{{ $product->id }}">
                        <button type="submit">View</button>
                    </form>
                </td>
                <td>
                    {{-- <form action="/products/{{ $product->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form> --}}
                </td>
            </tr>
        </table>
        @endforeach
    </ul>
@endsection
