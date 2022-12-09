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
<div class="card">
    <div class="card-header">
        <h4>receveurs demandes</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>money</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $receveur as $item)
                @if ($item->state=='1')
                 <tr>
                     <td>{{$item->user_id}}</td>
                     <td>{{$item->user->name}}</td>
                     <td>{{$item->money}}</td>
                      <td>
                        <form action="{{url('accepted_money/'.$item->user_id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <button type="submit"  class="btn btn-primary">accept</button>
                        </form>
                          <br><br>

                      </td>
                 </tr>
                @endif
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
@section('scripts')
@endsection
