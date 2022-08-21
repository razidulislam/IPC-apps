@extends('master')

@section('content')

    <h1><b>Update Content</b></h1>

       {{--  Form::open(array('url' => '/contents/'.$updateContent->id , 'method' => 'PATCH')) --}} 
      <form action="{{route('udateContent',[$updateContent->id])}}" role="form" method="POST">
        {{ csrf_field() }}
    		<div class="form-group">
    			<label>Title</label>
    			<input type="text" class="form-control" name="title" value="{{ $updateContent->title}}" placeholder="Inter Your Title">
    			@error('title')
    			<span class="text-danger">{{ $message }}</span>
    			@enderror
    		</div>	
    		<div class="form-group">
    			<label>Description</label>
    			<input type="text" class="form-control" name="description" value="{{ $updateContent->description}}" placeholder="Inter Your Description">
    			@error('description')
    			<span class="text-danger">{{ $message }}</span>
    			@enderror
    		</div>
        <div class="form-group">
          <label>Remarks</label>
          <input type="text" class="form-control" name="remarks" value="{{ $updateContent->remarks}}" placeholder="Inter Your Remarks">
          @error('Mobile')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary my-3"> Update</button>
    		<!-- <input type="submit" class="btn btn-primary my-3" name="update" value="Update"> -->
    	</form>

  @endsection