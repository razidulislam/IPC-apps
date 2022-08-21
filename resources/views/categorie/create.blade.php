@extends('master')

@section('content')
        <h4>Create Category </h4>
        <hr>
        <form action="{{url('categories')}}" method="post">
          @if(Session::has('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif
          @if(Session::has('fail'))
          <div class="alert alert-danger">{{Session::get('fail')}}</div>
          @endif
          @csrf
          <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" placeholder="Enter Category Name" name="name" value="{{old('name')}}">
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <button class="btn btn-block btn-primary" style="margin-top: 15px;" type="submit" name="save">Create</button>
          </div>
        </form>
@endsection