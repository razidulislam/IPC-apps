@extends('master')

@section('content')

        
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

        <a href="{{url('/questions')}}" class="btn btn-primary my-3" style="float:right;">Question List</a>
        <h4>Create Question </h4>
        <hr>
        <form action="{{url('questions')}}" method="post">
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
              <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
              @endforeach
            </select>
          </div>
          
          <div class="form-group">
            <label for="name">Question Name</label>
            <textarea id="name" name="name" rows="3" cols="50" class="form-control" required placeholder="Enter Question Name" value="{{old('name')}}">
            </textarea>
            
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
          </div>

          <div class="form-group">
            <label for="option ">Option Type And Score:</label> <br>
            @error('option')
          <span class="text-danger">{{ $message }}</span>
          @enderror
              <div class="select-box">
                <input type='button' value='Add Button' id='addButton'>
                <input type='button' value='Remove Button' id='removeButton'>
              </div>

              <div  id="qustionTypeandAnswer">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" required name="option[]" placeholder="Option Name" />
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <input type="text" class="form-control" required name="score[]" placeholder="Score" />
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="form-group">
            <button class="btn btn-block btn-primary" style="margin-top: 15px;" type="submit" name="save">Create</button>
          </div>
        </form>
        <script>
            $("#addButton").click(function(){
              $("#qustionTypeandAnswer").append('<div class="row"><div class="col-lg-3"><div class="form-group"><input type="text" required class="form-control" name="option[]" placeholder="Option Name" /></div></div><div class="col-lg-3"><div class="form-group"><input type="text" required class="form-control" name="score[]" placeholder="Score" /></div></div></div>');
            });
            
        </script>
@endsection