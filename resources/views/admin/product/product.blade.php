@extends('admin.layouts.admin')

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
<br><br><br><br>
<div class="text-center">
    <a href="{{ url('add-products') }}" class="btn btn-primary mx-5" >Add product</a>
</div>
<div class="card">
    <div class="card-header">
        <h4>products</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th>id</th>
                    <th>category</th>
                    <th>name</th>
                    <th>selling price</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $products as $item)
                 <tr>
                     <td>{{$item->id}}</td>
                     <td>{{$item->category->name}}</td>
                     <td>{{$item->name}}</td>
                     <td>{{$item->selling_price}}</td>
                     <td>
                         <img src="{{ asset('assets/uploads/products/' .$item->image)}}" class="cate-image" alt="image here">
                     </td>
                      <td>
                          <a href="{{url('edit-product/' .$item->id )}}" class="btn btn-primary btn-sm">edit </a>
                          <br><br>
                          <a href="{{url('delete-product/' .$item->id )}}" class="btn btn-danger btn-sm">delete </a>
                      </td>
                 </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
@section('scripts')
@endsection
