@extends('layouts.app')
@section('title')
{{$category->name}}
@endsection
<br><br><br>
@section('content')
<div class="py-3 nb-4 shadow-sm  border-top" style="background-color: rgb(223, 224, 146);">
    <div class="container">
        <h6 class="mb-0">collection / {{$category->name}} </h6>
    </div>
</div>
<br>
<div class="py=5" >
    <div class="container">
        <div class="row">
            <h2>{{$category->name}}</h2>
            @foreach ($products as $prod)
            <div class="col-md-3 mb-3">
                <div class="card">
                  <a href="{{url('category/' .$category->slug .'/'.$prod->slug)}}">
                    <img src="{{asset('assets/uploads/products/'.$prod->image)}}" class="w-100" alt="product image" height="200px" width="260px">
                    <div class="card-body">
                        <h5>{{$prod->name}}</h5>
                        <span class="float-start">{{$prod->selling_price}}$</span>
                        <span class="float-end"> <s>{{$prod->original_price}}$</s></span>
                    </div>
                  </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
 </div>
@endsection
