@extends('layouts.app')
@section('title' , $products ->name)

<br><br><br>
@section('content')
<style>
.flexContainer {
    display: flex;
}

.inputField {
    flex: 1;
}</style>
@if(session('status'))
<script>
    swal("", "{{ session('status') }}", "success");
</script>
@endif
@if(session('status1'))
<script>
    swal("", "{{ session('status1') }}", "error");
</script>
@endif
<div class="py-3 nb-4 shadow-sm  border-top" style="background-color: rgb(223, 224, 146)">
    <div class="container">
        <h6 class="mb-0">collection / {{$products->category->name}} / {{$products->name}}</h6>
    </div>
</div>
<br>
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/products/' .$products->image) }}" class="w-100" alt="image here" >
                </div>
            <div class="col-md-8 ">
                <h2 class="mb-0">
                    {{$products->name}}
                    @if ($products->trending == '1' )
                     <label style="font-size: 16px" class="float-end badge bg-danger trending-tag"> trending</label>
                     @endif
                </h2>

                <hr>
                <label class="me-3">original price : <s>$ {{$products->original_price}}</s></label>
                <label class="fw-bold">selling price : $ {{$products->selling_price}}</label>
                <p class="mt3">
                    {!!$products->small_description !!}

                </p>
                <hr>
                @if ($products->qty > 0)
                <label class="badge bg-success">In stock</label>
                @else
                <label class="badge bg-danger">out of stock</label>
                @endif
                <div class="row mt-2">
                    <div class="col-md-2">
                        <input type="hidden" value="{{$products->id}}" class="prod_id">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 130px">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity "  class="form-control qty-input text-center" value="1">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                  <div class="col-md-9">
                   <br/>
                   <button type="button" class="btn btn-success me-3 float-start mx-3"> add to wishlist <i class="fa fa-heart"></i></button>
                   <button type="button" class="btn btn-primary me-3 addToCartBtn float-start"> add to cart <i class="fa fa-shopping-cart"></i> </button>
                  </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <h3>decription</h3>
                <p class="mt-3">
                    {!! $products->description!!}
                </p>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<br><br>
@if (Auth::user()->check_role==2)
    <div class="card container" style="background-color: rgb(238, 238, 238)">
        <div class="card-body">
           <div class="card-footer" style="background-color: rgb(231, 221, 221)">
               <h5>vous etes un receveur !!  generer le lien pour partager l'article</h5>
               <div class="flexContainer">
               <input type="text" id="demo"   class="form-control inputField "  />

            <button type="button" onclick="myFunction()" class="btn btn-secondary " style="float: right;">generer le lien </button>
        </div>
           </div>
        </div>
    </div>
<script>
    function myFunction() {
        var text = "  {{ route('lien', ['cate_slug' => $products->category->slug,'prod_slug' => $products->slug,'id' => Auth::user()->id])}}"
        $('#demo').val(text);
        document.getElementById("demo").innerHTML = "{{ route('lien', ['cate_slug' => $products->category->slug,'prod_slug' => $products->slug,'id' => Auth::user()->id])}}";
      }
</script>
@endif

    </div>
</div>

@endsection

