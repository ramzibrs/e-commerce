@extends('layouts.app')
@section('title')
category
@endsection
@section('content')
<br><br>
 <div class="py-5" style="background-color: rgb(238, 235, 235);">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h2>all categories</h2>
                 <br>
                 <div class="row">
                  @foreach ($category as $cate )
                  <div class="col-md-3 mb-3">
                  <a href="{{url('view-category/' .$cate->slug)}}">
                    <div class="card">
                        <img src="{{asset('assets/uploads/category/'.$cate->image)}}" alt="category image" height="120px" width="260px">
                        <div class="card-body">
                            <h5>{{$cate->name}}</h5>
                            <p>
                                {{$cate->description}}
                            </p>
                        </div>
                    </div>
                  </a>
                </div>
                  @endforeach
                </div>
             </div>
         </div>
     </div>
 </div>
@endsection
