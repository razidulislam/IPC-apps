@extends('master')

@section('content')
<a href="{{url('/voss')}}" class="btn btn-primary my-3" style="float:right;">Content List</a>
        <h4>Add User </h4>
        <hr>
        <form action="{{url('voss')}}" method="post">
          @if(Session::has('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif
          @if(Session::has('fail'))
          <div class="alert alert-danger">{{Session::get('fail')}}</div>
          @endif
          @csrf
          <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" class="form-control" placeholder="Enter User Name" name="name" value="{{old('name')}}">
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label for="details">User Details</label>
            <input type="text" class="form-control" placeholder="Enter User details" name="details" value="{{old('details')}}">
            <span class="text-danger">@error('details') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label for="remarks">Remarks</label>
            <input type="text" class="form-control" placeholder="Enter your Remarks" name="remarks" value="{{old('remarks')}}">
            <span class="text-danger">@error('remarks') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <button class="btn btn-block btn-primary" style="margin-top: 15px;" type="submit">Create</button>
          </div>
        </form>
@endsection