@extends('admin.layouts.admin')

@section('content')
<br><br><br>
<div class="card">
    <div class="card-header">
        <h4>update product</h4>
    </div>
<div class="card-body">
    <form action="{{url('update-product/' .$products->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12 mb-3">
                <h6>category</h6>
                <select class="form-select">
                    <option value="">{{$products->category->name}}</option>

                  </select>
            </div>
            <div class="col-md-6">

                <h6>name</h6>
                <input type="text" class="form-control" value="{{$products->name}}" name="name">
            </div>
            <div class="col-md-6">
                <h6>slug</h6>
                <input type="text" class="form-control" value="{{$products->slug}}" name="slug">
            </div>
            <div class="col-md-12">
                <h6>small description</h6>
                <textarea name="small_description"  rows="3" class="form-control">{{$products->small_description}}</textarea>
            </div>
            <div class="col-md-12">
                <h6>description</h6>
                <textarea name="description"  rows="3" class="form-control">{{$products->description}}</textarea>
            </div>
            <br><br><br> <br><br><br>
            <div class="col-md-6 nb-3">
                <h6>original price</h6>
                <input type="number" value="{{$products->original_price}}" class="form-control" name="original_price">
            </div>
            <br><br><br>

            <div class="col-md-6 nb-3">
                <h6>selling price</h6>
                <input type="number" value="{{$products->selling_price}}" class="form-control" name="selling_price">
            </div>
            <br><br><br>

            <div class="col-md-6 nb-3">
                <h6>tax</h6>
                <input type="number" value="{{$products->tax}}" class="form-control" name="tax">
            </div>
            <br><br><br>

            <div class="col-md-6 nb-3">
                <h6>quantity</h6>
                <input type="number" value="{{$products->qty}}"  class="form-control" name="qty">
            </div>
            <br><br><br>

            <div class="col-md-6 nb-3">
                <h6>status</h6>
                <input type="checkbox" {{$products->status =="1"? 'checked' :'' }} name="status">
            </div>
            <div class="col-md-6 nb-3">
                <h6>trending</h6>
                <input type="checkbox" {{$products->trending =="1" ? 'checked' :'' }} name="trending">
            </div>
            <div class="col-md-12 nb-3">
                <h6>meta title</h6>
                <input type="texte" value="{{$products->meta_title}}" class="form-control" name="meta_title">
            </div>
            <div class="col-md-12 nb-3">
                <h6>meta keywords</h6>
                <textarea name="meta_keywords"  rows="3" class="form-control">{{$products->meta_keywords}}</textarea>
            </div>
            <div class="col-md-12 nb-3">
                <h6>meta description</h6>
                <textarea name="meta_description"  rows="3" class="form-control">{{$products->meta_description}}</textarea>
            </div>
            @if ($products->image)
                <img src="{{asset('assets/uploads/products/' .$products->image)}}" alt="image here">
            @endif
            <div class="col-md-12">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-12">
                <button type="submit"  class="btn btn-primary">update</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
