@extends('admin.layouts.admin')

@section('content')
<br><br><br>
<div class="card">
    <div class="card-header">
        <h4>add category</h4>
    </div>
<div class="card-body">
    <form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <h6>name</h6>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-6">
                <h6>slug</h6>
                <input type="text" class="form-control" name="slug">
            </div>
            <div class="col-md-12">
                <h6>description</h6>
                <textarea name="description"  rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-6 nb-3">
                <h6>status</h6>
                <input type="checkbox" class="form-control" name="status">
            </div>
            <div class="col-md-6 nb-3">
                <h6>popular</h6>
                <input type="checkbox" class="form-control" name="popular">
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
