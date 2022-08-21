@extends('master')

@section('content')
        
        <form action="{{url('categorys/'.$UpdateCategory->id)}}" method="post">
          @if(Session('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif
          @if(Session::has('fail'))
          <div class="alert alert-danger">{{Session::get('fail')}}</div>
          @endif
          @csrf
          @method('PATCH')
          <a href="{{url('/categorys')}}" class="btn btn-primary my-3" style="float:right;">Category List</a>
          <h4>Update Category </h4>
          <hr>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Enter Category Name" name="name" value="{{$UpdateCategory->name}}">
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <button class="btn btn-block btn-primary" style="margin-top: 15px;" type="submit" name="update">Update Category</button>
          </div>
        </form>
@endsection