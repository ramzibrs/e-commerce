@extends('layouts.app')
@section('title')
  my cart
@endsection
<br><br><br>
@section('content')
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
<div class="py-3 nb-4 shadow-sm  border-top" >
    <div class="container">
        <h6 class="mb-0">
         <a href="{{url('/')}}" style="color: black">
             home
         </a> /
         <a href="{{url('cart')}}"style="color: black">
            cart
        </a>

        </h6>
    </div>
</div>

<br>

<div class="card container" style="background-color: rgb(247, 245, 240)">
    <div class="card-header" style="background-color: rgb(223, 224, 146)">
        <h4>products</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th>image</th>
                    <th>name</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cartitems as $item)
                 <tr>
                     <td>
                        <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" height="70px" width="70px"  alt="image here">
                     </td>
                      <td>
                        <h6>{{$item->products->name}}</h6>
                      </td>
                      <td>
                        <h6>{{$item->products->selling_price}} $</h6>
                      </td>

                      <td>
                         {{$item->prod_qty }}
                      </td>
                      <td>
                      <a href="{{url('delete-cart/' .$item->id )}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>delete </a>
                      </td>
                 </tr>
                 @php $total +=$item->products->selling_price * $item->prod_qty ; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br><br>
<div class="card container" style="background-color: rgb(238, 238, 238)">
    <div class="card-body" >
       <div class="card-footer" style="background-color: rgb(231, 221, 221)">
        <form action="{{url('/checkout')}}" method="GET" enctype="multipart/form-data">
           <input type="hidden" name="total" value="{{$total}}">
          <h6>total price :  {{$total}} $
            @if ($cart_count !=0)
            <button type="submit" class="btn btn-secondary float-end">procees to checkout</button>
            @endif
            @if ($cart_count ==0)
            <a href="/" class="btn btn-secondary float-end">continue shopping</a>
            @endif
          </form>
        </h6>
        </div>
    </div>
</div>
@endsection
