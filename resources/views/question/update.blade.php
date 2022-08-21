@extends('master')

@section('content')
        
        <form action="{{url('questions/'.$UpdateQuestion->id)}}" method="post">
          @if(Session('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif
          @if(Session::has('fail'))
          <div class="alert alert-danger">{{Session::get('fail')}}</div>
          @endif
          @csrf
          @method('PATCH')
          <a href="{{url('/questions')}}" class="btn btn-primary my-3" style="float:right;">Question List</a>
          <h4>Update Question </h4>
          <hr>
          <div class="form-group">
            <label for="category_id">Select Category:</label>
            <select name="category_id" id="category_id">
              <option> Select Category</option>
              @foreach($categorys as $key=>$data)
              <option value="{{ $data->id }}"> {{ $data->name }} </option>
              @endforeach
            </select>
          </div>
          <!-- <div class="form-group">
            <label for="category_id">Select Category</label>
            <input type="text" class="form-control" placeholder="Enter Question Name" name="category_id" value="{{$UpdateQuestion->category_id}}">
            <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
          </div> -->
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Enter Question Name" name="name" value="{{$UpdateQuestion->name}}">
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label for="option">Option Type</label>
            <input type="text" class="form-control" placeholder="Enter Option Type" name="option" value="{{$UpdateQuestion->option}}">
            <span class="text-danger">@error('option') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <button class="btn btn-block btn-primary" style="margin-top: 15px;" type="submit" name="update">Update Question</button>
          </div>
        </form>
@endsection