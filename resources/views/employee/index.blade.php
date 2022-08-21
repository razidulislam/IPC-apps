@extends('master')

@section('content')

      @if(Session::has('msg'))
      <p class="alert alert-success">{{ Session::get('msg')}}</p>
      @endif
      <a href="{{url('/employees/create')}}" class="btn btn-primary my-3" style="float:right;">Add Employee</a>
      <table class="table table-striped table-hover">
        <h4>All Employee list</h4>
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Gender</th>
            <th scope="col">Designation</th>
          </tr>
        </thead>
        <tbody>
          @foreach($employees as $key=>$data)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->mobile }}</td>
            <td>{{ $data->gender }}</td>
            <td>{{ $data->designation }}</td>
            <td>
              <a href="{{ url('/employees/'.$data->id.'/edit')}}" class="btn btn-success">Edit</a>
              <form action="{{route('employee.destroy',[$data->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger" onclick= "return confirm('Are you sure to delete this Employee?')">Delete</button>        
            </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    {{ $employees->links() }}
   

@endsection