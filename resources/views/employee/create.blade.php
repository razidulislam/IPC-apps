@extends('master')

@section('content')
        
        
        <form action="{{url('employees')}}" method="post">
          @if(Session('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif
          @if(Session::has('fail'))
          <div class="alert alert-danger">{{Session::get('fail')}}</div>
          @endif
          @csrf

          <a href="{{url('/employees')}}" class="btn btn-primary my-3" style="float:right;">Employee List</a>
          <h4>Add Employee </h4>
          <hr>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Enter Employee Name" name="name" value="{{old('name')}}">
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="Enter Employee's Email" name="email" value="{{old('email')}}">
            <span class="text-danger">@error('email') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" placeholder="Enter Employee's Mobile" name="mobile" value="{{old('mobile')}}">
            <span class="text-danger">@error('mobile') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" placeholder="Enter Employee's Gender" name="gender" value="{{old('gender')}}">
            <span class="text-danger">@error('gender') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" placeholder="Enter Employee's Designation" name="designation" value="{{old('designation')}}">
            <span class="text-danger">@error('designation') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <button class="btn btn-block btn-primary" style="margin-top: 15px;" type="submit" name="save">Add Employee</button>
          </div>
        </form>
@endsection