@extends('master')


@section('content')
	  <div class="panel-body">
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <form action="/admin/product" method='post'>   
    <div class='form-group'>
        <input class="form-control" id="name" name='name' type="text" placeholder="catagory name">
        
    </div>
    
    <div class='form-group'>
        <input class="form-control" id="slug" name='slug' type="hidden" >
    </div>

    <div class='form-group'>
        <label for="discription">product discription</label>
        <textarea name="discription" id="discription" cols="30" rows="10" placeholder='discription of product'></textarea>
    </div>
    <div class='form-group'>
        {!! Form::file('image', null) !!}
    </div>
    <div class='form-group'>
        <input class="form-control" id="price" name='price' type="number" >
    </div>
    <div class='form-group'>
        <select name="catagory" class="form-control">
            @foreach($cat as $value)
            <option value="{{$value['id']}}">{{$value['name']}}</option>
            @endforeach                                    
        </select>
    </div>
        <div class='form-group'>
        <select name="brand" class="form-control">
            @foreach($brands as $value)
            <option value="{{$value['id']}}">{{$value['name']}}</option>
            @endforeach                                    
        </select>
    </div>

    <input type="hidden" name="_token" value='{{ csrf_token() }}' />
    <button>send</button>
  </form>
  <script>tinymce.init({selector:'textarea'});</script>
  <script>
  var typeover = document.getElementById('name')
  var slug = document.getElementById('slug')

  typeover.onkeyup = function () {
    
        slug.value = typeover.value;
    
  }
</script>
</div>

@stop