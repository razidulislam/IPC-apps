@extends('master')

@section('content')

    @if(Session::has('msg'))
      <p class="alert alert-success">{{ Session::get('msg')}}</p>
      @endif
    	<table class="table table-striped table-hover">
    	  <h4>All User list</h4>
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Name</th>
		      <th scope="col">Details</th>
		      <th scope="col">Remarks</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($contents as $key=>$data)
		    <tr>
		      <td>{{ $key+1 }}</td>
		      <td>{{ $data->name }}</td>
		      <td>{{ $data->details }}</td>
		      <td>{{ $data->remarks }}</td>
		      <td>
		      	<!--<a href="{{ url('/update-employee/'.$data->id)}}" class="btn btn-success">Update</a>-->
		      	<a href="{{ url('/user/'.$data->id.'/edit')}}" class="btn btn-success">Edit</a>
		      	<!--<form action="{{route('content_crud.destroy',[$data->id])}}" method="POST">
						@method('DELETE')
						@csrf
						<button type="submit" class="btn btn-danger" onclick= "return confirm('Are you sure to delete this Employee?')">Delete</button>           
				</form>
		      	 <a href="{{ url('/employee/'.$data->id)}}" onclick= "return confirm('Are you sure to delete this Employee?')" class="btn btn-danger">Delete</a> -->
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		{{ $user->links() }}
   

@endsection