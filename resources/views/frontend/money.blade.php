@extends('layouts.app')
@section('title')
checkout
@endsection
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
@if (Auth::user()->check_role==0 )
<h1 class="container text-center" >receveur role </h1>
<br>
<div class="card container" style="background-color: rgba(55, 0, 255, 0.096)">
    <div class="card-body">
       <div class="card-footer" style="background-color: rgb(238, 238, 238)">
        <h4 class="card-header container text-center " style="background: rgb(223, 224, 146)">utilisation terms  </h4>
        <p class="container card-text">
            <br>
            le site amarta market shop vous offret de travailler comme un receveur et gagner de l'argent.
            <br>
            pour sela vous dever voir les articles et les produits dans le site web amarta market shop et partager l'article par generer un lien vous le treverai au desous de l'article.
            <br>
            vous pouver choisir n'import quelle article.
            <br>
            quand le client visite le produit a partir de votre lien generez vous gagner 1 point.
            <br>
            quand le client achete un article vous gagnez 10 point.
            <br>
            apres la collection des point vous devez demander la conversion des point et attendais l'admin de les convertir.

        </p>
        <br><br>
        </div>
        <br><br>
<form action="{{url('receveur/'.  Auth::user()->id )}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" value="2" name="role">
    <button type="submit"  class="btn btn-secondary col-md-12">devenir un receveur</button>
</form>
@endif

@if (Auth::user()->check_role==2)
<div class="card container" style="background-color: rgba(55, 0, 255, 0.096)">
<div class="card-body">
    <div class="card-footer" style="background-color: rgb(238, 238, 238)">
     <h4 class="card-header container text-center " style="background: rgb(223, 224, 146)">welcome to your dashboard  </h4>
     <p class="container card-text">
        <h5>vous avez  {{$receveur->point}} points </h5>
        <h5>pour chaque point vous collecter 1$</h5>
        <h5>cliquer sur convertir pour convertit les point en $</h5>
     </p>
     <br><br>
     <form action="{{url('tresfert-money/'.Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <h5>entrer le nombre des point pour convertir</h5>
                <input type="text" class="form-control" name="money">
                <br>
            </div>
            <div class="col-md-12">
                <button type="submit"  class="btn btn-primary">convertir</button>
            </div>
        </div>
    </form>
     </div>
     <br><br>
</div>
</div>
@endif
    </div>
</div>

@endsection
