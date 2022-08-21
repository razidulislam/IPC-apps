<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IPC Apps - Forgot password</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 50px;">
			<div class="col-md-4 col-md-offset-4">
				<h4>Forgot password</h4>
				<hr>
				<form action="{{route('password.email')}}" method="post">
					@csrf

					@if(Session::has('status'))
					<div class="alert alert-success">{{Session::get('status')}}</div>
					@endif
					@if(Session::has('email'))
					<div class="alert alert-danger">{{Session::get('email')}}</div>
					@endif

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" placeholder="Enter your email" name="email" value="{{old('email')}}">
						<span class="text-danger">@error('email') {{$message}} @enderror</span>
					</div>
					<div class="form-group">
						<button class="btn btn-block btn-primary" style="margin-top: 15px;" type="submit">Continue</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>