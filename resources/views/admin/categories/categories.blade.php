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
    <a href="{{ url('add-category') }}" class="btn btn-primary mx-5" >Add Category</a>
</div>
<div class="card">
    <div class="card-header">
        <h4>categories</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $category as $item)
                 <tr>
                     <td>{{$item->id}}</td>
                     <td>{{$item->name}}</td>
                     <td>{{$item->description}}</td>
                     <td>
                         <img src="{{ asset('assets/uploads/category/' .$item->image)}}" class="cate-image" alt="image here">
                     </td>
                      <td>
                          <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary">edit </a>
                          <br><br>
                          <a href="{{url('delete-category/' .$item->id)}}" class="btn btn-danger">delete </button>
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
