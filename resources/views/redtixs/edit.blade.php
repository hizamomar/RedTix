@extends('redtixs.layout')
   
@section('content')

<div class="card bg-light mb-3">
  <div class="card-header">
    <h2>Edit User</h2>
  </div>
  <div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('redtixs.update',$user->id) }}" method="POST" class="was-validated">
        @csrf
        @method('PUT')
        <div class="form-group">                    
            <label for="email">Email address</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="Email Address" required>
            <div class="invalid-feedback">Please provide a valid email address.</div>
        </div>
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" name="first_name" id="firstName" value="{{ $user->first_name }}" class="form-control" placeholder="First Name" required>
            <div class="invalid-feedback">Please provide your first name.</div>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" name="last_name" id="lastName" value="{{ $user->last_name }}" class="form-control" placeholder="Last Name" required>
            <div class="invalid-feedback">Please provide your last name.</div>
        </div>
        <div class="form-group">                
            <label for="status">Status</label>
            <select class="custom-select" id="status" name="status" required>
                <option value="active" {{($user->status ==='active') ? 'selected' : ''}}> Active </option>
                <option value="inactive" {{($user->status ==='inactive') ? 'selected' : ''}}> Inactive </option>     
            </select>
            <div class="invalid-feedback">Please select the status.</div>  
        </div>
      <button type="submit" class="btn btn-dark btn-lg btn-block">Submit</button>
    </form>
  </div>
</div>
@endsection