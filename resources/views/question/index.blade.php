@extends('master')

@section('content')

      @if(Session::has('msg'))
      <p class="alert alert-success">{{ Session::get('msg')}}</p>
      @endif
      <a href="{{url('/questions/create')}}" class="btn btn-primary my-3" style="float:right;">Add Question</a>
      <table class="table table-striped table-hover">
        <h4>All Question list</h4>
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Category</th>
            <th scope="col">Name</th>
            <th scope="col">Option Type</th>
          </tr>
        </thead>
        <tbody>
          @foreach($questions as $key=>$data)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $data->categoryName }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->option }}</td>
            <td>
              <a href="{{ url('/questions/'.$data->id.'/edit')}}" class="btn btn-success">Edit</a>
              <form action="{{route('question.destroy',[$data->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger" onclick= "return confirm('Are you sure to delete this Question?')">Delete</button>        
              </form>       
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    {{ $questions->links() }}
   

@endsection