@extends('frontend.account.master')

@section('content')
<h2 class="title text-center">Uw email verandering</h2>

@if($errormes == null)
@else
<p>u heeft iets niet ingevult {{$errormes}}</p>
@endif
					

						<div class="contact-form">
	    				
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="/account/password">
				            <div class="form-group col-md-12">
				                <input type="password" name="newemail" class="form-control" required="required" placeholder="new password">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="password" name="newemail2" class="form-control" required="required" placeholder="Conferm password">
				            </div>

				            <div class="form-group col-md-12">
				            	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
@stop