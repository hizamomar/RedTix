@extends('redtixs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Datatable with basic filtering</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('redtixs.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>                
                <th>Status</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
      
@endsection