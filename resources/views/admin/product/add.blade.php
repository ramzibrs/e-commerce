@extends('admin.layouts.admin')

@section('content')
<br><br><br>
<div class="card">
    <div class="card-header">
        <h4>add product</h4>
    </div>
<div class="card-body">
    <form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <select class="form-select"  name="cate_id" >
                    <option value=>select a category</option>
                    @foreach ($category as $item)
                    <option value="{{ $item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="col-md-6">

                <h6>name</h6>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-6">
                <h6>slug</h6>
                <input type="text" class="form-control" name="slug">
            </div>
            <div class="col-md-12">
                <h6>small description</h6>
                <textarea name="small_description"  rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-12">
                <h6>description</h6>
                <textarea name="description"  rows="3" class="form-control"></textarea>
            </div>
            <br><br><br> <br><br><br>
            <div class="col-md-6 nb-3">
                <h6>original price</h6>
                <input type="number" class="form-control" name="original_price">
            </div>
            <br><br><br>

            <div class="col-md-6 nb-3">
                <h6>selling price</h6>
                <input type="number" class="form-control" name="selling_price">
            </div>
            <br><br><br>

            <div class="col-md-6 nb-3">
                <h6>tax</h6>
                <input type="number" class="form-control" name="tax">
            </div>
            <br><br><br>

            <div class="col-md-6 nb-3">
                <h6>quantity</h6>
                <input type="number" class="form-control" name="qty">
            </div>
            <br><br><br>

            <div class="col-md-6 nb-3">
                <h6>status</h6>
                <input type="checkbox"  name="status">
            </div>
            <div class="col-md-6 nb-3">
                <h6>trending</h6>
                <input type="checkbox"  name="trending">
            </div>
            <div class="col-md-12 nb-3">
                <h6>meta title</h6>
                <input type="texte" class="form-control" name="meta_title">
            </div>
            <div class="col-md-12 nb-3">
                <h6>meta keywords</h6>
                <textarea name="meta_keywords"  rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-12 nb-3">
                <h6>meta description</h6>
                <textarea name="meta_description"  rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-12">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-12">
                <button type="submit"  class="btn btn-primary">submit</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
