@extends('master')

@section('content')

      @if(Session::has('msg'))
      <p class="alert alert-success">{{ Session::get('msg')}}</p>
      @endif
      <a href="{{url('/categorys/create')}}" class="btn btn-primary my-3" style="float:right;">Add Category</a>
      <table class="table table-striped table-hover">
        <h4>All Category list</h4>
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categorys as $key=>$data)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $data->name }}</td>
            <td>
              <a href="{{ url('/categorys/'.$data->id.'/edit')}}" class="btn btn-success">Edit</a>
              <form action="{{route('category.destroy',[$data->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger" onclick= "return confirm('Are you sure to delete this Category?')">Delete</button>        
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    {{ $categorys->links() }}
   

@endsection