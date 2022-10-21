@extends('layout')

@section('title', 'My shop')

@section('content')
    <form action="" class="d-flex justify-content-around align-self-stretch py-3 mb-3">
        <div class="">
            <select class="form-select" aria-label="Category" name="category">
                <option value="null" selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            {{-- <label for="search" class="form-label"></label> --}}
            <input type="text" class="form-control" name="search" placeholder="look up...">
        </div>
        <div class="">
            <select class="form-select" aria-label="Sort" name="sort">
                <option value="null" selected>Sort by</option>
                @foreach ($sorting as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    @foreach ($products as $product)
        <ul>
            <li>
                <p>{{ $product->name }}</p>
                <p>{{ $product->price }}</p>
                <p>{{ $product->category_id }}</p>
            </li>
        </ul>
    @endforeach

@endsection
