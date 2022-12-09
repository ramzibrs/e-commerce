@extends('layouts.app')
@section('title')
welcome
@endsection
@section('content')
<br><br>

<style>
    .w-100 {
        width: 100% !important;
        height: 80vh;
      }
</style>
@if(session('status'))
<script>
    swal("", "{{ session('status') }}", "success");
</script>
@endif
<br>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/fig5.jpg" class="d-block w-100" alt="">
      </div>
      <div class="carousel-item">
        <img src="img/fig6.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/fig7.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<br>

  <div class="py=5" style="background-color: rgb(247, 243, 243);">
    <div class="container">
        <div class="row">
            <h1>trending categories</h1>
          <div class="owl-carousel featured-carousel owl-theme">
            @foreach ($trending_category as $tcategory)
            <div class="item">
                <a href="{{url('view-category/' .$tcategory->slug)}}">
                <div class="card">
                    <img src="{{asset('assets/uploads/category/'.$tcategory->image)}}" alt="product image" height="100px" width="100px">
                    <div class="card-body">
                        <h5>{{$tcategory->name}}</h5>
                        <p>
                            {{$tcategory->description}}
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

 <div class="py=5" style="background-color: rgb(247, 243, 243);">
    <div class="container">
        <div class="row">
            <h1>featured products</h1>
          <div class="owl-carousel featured-carousel owl-theme">
            @foreach ($featured_products as $prod)
            <div class="item">
                <div class="card">
                    <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="product image" height="100px" width="100px">
                    <div class="card-body">
                        <h5>{{$prod->name}}</h5>
                        <span class="float-start">{{$prod->selling_price}}$</span>
                        <span class="float-end"> <s>{{$prod->original_price}}$</s></span>
                    </div>
                </div>
            </div>
            @endforeach
           </div>
        </div>
    </div>
 </div>


@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection
