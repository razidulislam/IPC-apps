@extends('master')

@section('content')
   <form action="{{ url('question-submit') }}" method="post">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

        <h4>Develop new Question </h4>
        <hr>
           {{ csrf_field() }}
          @if(Session::has('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
          @endif
          @if(Session::has('fail'))
          <div class="alert alert-danger">{{Session::get('fail')}}</div>
          @endif
          @csrf
          <div class="form-group">
            <label for="category_id">Select Category:</label>
            <select name="category_id" id="category_id" onchange="questionView()">
              <option> Select Category</option>
              @foreach($categorys as $key=>$data)
              <option value="{{ $data->id }}"> {{ $data->name }} </option>
              <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
              @endforeach
            </select>
          </div>
        <div id="result">
      <!-- <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th scope="col">Question Name</th>
                <th scope="col">Option</th>
                <th scope="col">Score</th>
              </tr>
            </thead>
             <tbody>
              <tr>
                <td rowspan="3">1. Do you have an IPC programme? <br> Choose one answer</td>
                <td><input type="checkbox" name="name1"/> Yes, without clearly defined objectives</td>
                <td>10</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="name1"/> Yes</td>
                <td>5</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="name1"/> No</td>
                <td>0</td>
              </tr>
              <tr>
                <td rowspan="2">2. Have you complete IPC training? <br> Choose one answer</td>
                <td><input type="checkbox" name="name1"/> Yes, completed</td>
                <td>10</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="name1"/> No</td>
                <td>0</td>
              </tr>
              <tr>
                <td rowspan="2">3. Does the IPC team include both doctors and nurses?</td>
                <td><input type="checkbox" name="name1"/> Yes, without clearly defined objectives</td>
                <td>10</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="name1"/> No</td>
                <td>0</td>
              </tr>
            </tbody> 
          </table> -->
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-primary" style="margin-top: 15px;" type="submit" name="save">Submit</button>
        </div>
        <!-- </form> -->
        <script type="text/javascript">
           function questionView() {
               var category_id = $('#category_id').val();

                $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: 'http://127.0.0.1:8000/category/wise/question?category_id='+category_id ,
                success: function (data) {
                    $('#result').html(data);
                },
                error: function() { 
                    alert(category_id);
                }
            });
                
           }
        </script>
</form>
@endsection