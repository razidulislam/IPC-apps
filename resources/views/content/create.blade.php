@extends('master')

@section('content')
        
        
        <form action="{{url('contents')}}" method="post">
          @if(Session('success'))
          <div class="alert alert-success">
          {{Session::get('success')}}</div>
          @endif
          @if(Session::has('fail'))
          <div class="alert alert-danger">{{Session::get('fail')}}</div>
          @endif
          @csrf

          <a href="{{url('/contents')}}" class="btn btn-primary my-3" style="float:right;">Content List</a>
          <h4>Add Content </h4>
          <hr>
          <div class="form-group">
            <label for="title">Content Name</label>
            <input type="text" class="form-control" placeholder="Enter Content Name" name="title" value="{{old('title')}}">
            <span class="text-danger">@error('title') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label for="description">Content Description</label>
            <textarea id="description" name="description" rows="3" cols="50" class="form-control" required placeholder="Enter Content Description" value="{{old('description')}}">
            </textarea>
            <span class="text-danger">@error('description') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label for="remarks">Remarks</label>
            <input type="text" class="form-control" placeholder="Enter your Remarks" name="remarks" value="{{old('remarks')}}">
            <span class="text-danger">@error('remarks') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <button class="btn btn-block btn-primary" style="margin-top: 15px;" type="submit" name="save">Create</button>
          </div>
        </form>
@endsection