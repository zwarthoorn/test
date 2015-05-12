@extends('master')


@section('content')
<div class='row'>
	<div class='col-lg-6'>
		<h3>user edit</h3>
		<div class='form-group'>
			<input class="form-control" id="username" type="text" value={{$user['name']}} disabled>
		</div>
		<div class='form-group'>
			<input class="form-control" id="email" type="text" value={{$user['email']}} disabled>
		</div>
		<div class='form-group'>
			<input class="form-control" id="lastactive" type="text" value={{$user['updated_at']}} disabled>
		</div>
		<div class='form-group'>
			<form action="/password/email'" method='post'>
				<input type="hidden" name="email" value="{{$user['email']}}" />
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" class='btn btn-lg btn-danger btn-block' value='force reset password' id='resetPassword'>
			</form>
			
		</div>
		<div class='form-group'>
			<input type="submit" class='btn btn-lg btn-danger btn-block' value='force reset name' id='resetName'>
		</div>
		

	</div>
	<div class='col-lg-6'>
		<h3>discription</h3>
	<div class='form-group'>
		<div id='disc'>
			{!!$user['disc']!!}
		</div>
			 
		</div>
	</div>
</div>
 <script src="/js/walter.js"></script>
@stop