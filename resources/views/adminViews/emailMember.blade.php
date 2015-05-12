@extends('master')


@section('content')
 <div class="panel-body">
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<form action="/admin/members/sendEmail" method='post'>	
	<div class='form-group'>
		<input class="form-control" id="email2" name='email2' type="text" value="{{$email}}" disabled>
		<input type="hidden" name="email" value="{{$email}}" />
	</div>
	
	<div class='form-group'>
		<input class="form-control" id="onderwerp" name='onderwerp' type="text" placeholder='onderwerp'>
	</div>

	<div class='form-group'>
		<textarea name='text' id='text'></textarea>
	</div>
	
	<script>tinymce.init({selector:'textarea'});</script>

	
  	<input type="hidden" name="_token" value='{{ csrf_token() }}' />
  	<button>send</button>
  </form>
</div>
@stop