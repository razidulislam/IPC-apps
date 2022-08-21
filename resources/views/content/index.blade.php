@extends('master')

@section('content')

    @if(Session::has('msg'))
      <p class="alert alert-success">{{ Session::get('msg')}}</p>
      @endif
      <a href="{{url('/contents/create')}}" class="btn btn-primary my-3" style="float:right;">Add Content</a>
      <table class="table table-striped table-hover">
        <h4>All Content list</h4>
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Remarks</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contents as $key=>$data)
        <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $data->title }}</td>
          <td>{{ $data->description }}</td>
          <td>{{ $data->remarks }}</td>
          <td>
            <!--<a href="{{ url('/update-employee/'.$data->id)}}" class="btn btn-success">Update</a>-->
            <!--<a href="{{ url('/content/'.$data->id)}}" class="btn btn-success">View</a>-->
            <a href="{{ url('/contents/'.$data->id.'/edit')}}" class="btn btn-success">Edit</a>
            <form action="{{route('content.destroy',[$data->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger" onclick= "return confirm('Are you sure to delete this Content?')">Delete</button>           
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $contents->links() }}
   

@endsection