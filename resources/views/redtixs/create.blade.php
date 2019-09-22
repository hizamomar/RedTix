@extends('redtixs.layout')
  
@section('content')
<div class="card bg-light mb-3">
    <div class="card-header">
        <h2>Create User</h2>
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
   
        <form action="{{ route('redtixs.store') }}" method="POST" class="was-validated">
            @csrf
          
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
                <div class="invalid-feedback">Please provide a valid email address.</div>
            </div>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" name="first_name" id="firstName" class="form-control" placeholder="First Name" required>
                <div class="invalid-feedback">Please provide your first name.</div>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" name="last_name" id="lastName" class="form-control" placeholder="Last Name" required>
                <div class="invalid-feedback">Please provide your last name.</div>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="custom-select" placeholder="Status" required>
                  <option value="">Please Select</option>
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                </select>  
                <div class="invalid-feedback">Please select the status.</div>              
            </div>
            <button type="submit" class="btn btn-dark btn-lg btn-block">Submit</button>
                
        </form>
    </div>
</div>
@endsection