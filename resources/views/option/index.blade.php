@extends('master')

@section('content')

      @if(Session::has('msg'))
      <p class="alert alert-success">{{ Session::get('msg')}}</p>
      @endif
      <a href="{{url('/options/create')}}" class="btn btn-primary my-3" style="float:right;">Add Option</a>
      <table class="table table-striped table-hover">
        <h4>All Option list</h4>
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Category</th>
            <th scope="col">Question Name</th>
            <th scope="col">Option Name</th>
            <th scope="col">Score</th>
          </tr>
        </thead>
        <tbody>
          @foreach($options as $key=>$data)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $data->categoryName }}</td>
            <td>{{ $data->question_id }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->score }}</td>
            <td>
              <a href="{{ url('/options/'.$data->id.'/edit')}}" class="btn btn-success">Edit</a>
              <form action="{{route('option.destroy',[$data->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick= "return confirm('Are you sure to delete this Option?')">Delete</button>
              </form>  
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    {{ $options->links() }}
   

@endsection