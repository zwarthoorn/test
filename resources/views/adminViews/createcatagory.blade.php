@extends('master')


@section('content')
 <div class="panel-body">
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<form action="/admin/catagory" method='post'>	
	<div class='form-group'>
		<input class="form-control" id="catagory" name='catagory' type="text" placeholder="catagory name">
		
	</div>
	
	<div class='form-group'>
		<input class="form-control" id="slug" name='slug' type="text" placeholder='slug' disabled>
	</div>


	
	

	
  	<input type="hidden" name="_token" value='{{ csrf_token() }}' />
  	<button>send</button>
  </form>
  <script>
  var typeover = document.getElementById('catagory')
  var slug = document.getElementById('slug')

  typeover.onkeyup = function () {
  	if(typeover.value.length < 5){
  		slug.value = typeover.value;
  	}
  }
</script>
</div>
@stop