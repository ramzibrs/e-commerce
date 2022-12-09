@extends('admin.layouts.admin')

@section('content')
<br><br><br>
<div class="card">
    <div class="card-header">
        <h4>edit/update</h4>
    </div>
<div class="card-body">
    <form action="{{url('update-category/' .$category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <h6>name</h6>
                <input type="text" class="form-control" name="name"  value="{{$category->name}}">
            </div>
            <div class="col-md-6">
                <h6>slug</h6>
                <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
            </div>
            <div class="col-md-12">
                <h6>description</h6>
                <textarea name="description"  rows="3" class="form-control" >{{$category->description}}</textarea>
            </div>
            <div class="col-md-6 nb-3">
                <h6>status</h6>
                <input type="checkbox" {{$category->status == 1 ? 'checked':''}} class="form-control" name="status">
            </div>
            <div class="col-md-6 nb-3">
                <h6>popular</h6>
                <input type="checkbox" {{$category->popular == 1 ? 'checked':''}} class="form-control" name="popular">
            </div>
            <div class="col-md-12 nb-3">
                <h6>meta title</h6>
                <input type="texte" class="form-control" name="meta_title" value="{{$category->meta_title}}">
            </div>
            <div class="col-md-12 nb-3">
                <h6>meta keywords</h6>
                <textarea name="meta_keywords"  rows="3" class="form-control" >{{$category->meta_keywords}}</textarea>
            </div>
            <div class="col-md-12 nb-3">
               <h6>meta description</h6>
                <textarea name="meta_description"  rows="3" class="form-control">{{$category->meta_descrip}}</textarea>
            </div>
            @if ($category->image)
            <img src="{{asset('assets/uploads/category/' .$category->image)}}" alt="category image">

            @endif
            <div class="col-md-12">
                <input type="file" name="image" class="form-control" >
            </div>
            <div class="col-md-12">
                <button type="submit"  class="btn btn-primary">submit</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
