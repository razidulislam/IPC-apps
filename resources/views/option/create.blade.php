@extends('master')

@section('content')

        <a href="{{url('/options')}}" class="btn btn-primary my-3" style="float:right;">Option List</a>
        <h4>Create Question Option </h4>
        <hr>
        <form action="{{url('options')}}" method="post">
          @if(Session::has('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif
          @if(Session::has('fail'))
          <div class="alert alert-danger">{{Session::get('fail')}}</div>
          @endif
          @csrf
          <div class="form-group">
            <label for="category_id">Select Category:</label>
            <select name="category_id" id="category_id">
              <option> Select Category</option>
              @foreach($categorys as $key=>$data)
              <option value="{{ $data->id }}"> {{ $data->name }} </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="question_id">Select Question:</label>
            <select name="question_id" id="question_id">
              <option> Select Question</option>
              @foreach($questions as $key=>$data)
              <option value="{{ $data->id }}"> {{ $data->name }} </option>
              @endforeach
            </select>
          </div>
          
          <div class="form-group">
            <label for="name">Option Name</label>
            <input type="text" class="form-control" placeholder="Enter Option Name" name="name" value="{{old('name')}}">
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
          </div>
          <div class="form-group">
            <label for="score">Score</label>
            <input type="text" class="form-control" placeholder="Enter Question Score" name="score" value="{{old('score')}}">
            <span class="text-danger">@error('score') {{$message}} @enderror</span>
          </div>

          <div class="form-group">
            <button class="btn btn-block btn-primary" style="margin-top: 15px;" type="submit" name="save">Create</button>
          </div>
        </form>
@endsection