@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @forelse($products as $product)
                <div class="col-md-4">
                    <div class="card mt-4">
                        <div class="card-header">{{$product->name}}</div>
                        <div class="card-body">
                            {{$product->price}}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">no products found</p>
            @endforelse
        </div>
    </div>
@endsection
