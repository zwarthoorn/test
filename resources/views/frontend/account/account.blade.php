@extends('frontend.account.master')


@section('content')
						<h2 class="title text-center">uw informatie</h2>
						@if($billinfo == null)

						<div class="contact-form">
	    				
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="/account/update">
				            <div class="form-group col-md-6">
				                <input type="text" name="firstname" class="form-control"  placeholder="Voornaam" required="required">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="surname" class="form-control" required="required" placeholder="Achternaam">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="date" name="date" class="form-control" required="required">
				            </div>
				      		<div class="form-group col-md-6">
				                <input type="text" name="street-address" class="form-control" required="required" placeholder="uw adres met huisnummer">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="postcode" class="form-control" required="required" placeholder="uw postcode">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="city" class="form-control" required="required" placeholder="stad">
				            </div>
				        	<div class="form-group col-md-12">
				                <select name="country">
									<option value="">Land...</option>
									<option value="Belgie">Belgie</option>
									<option value="Nederland">Nederland</option>
								</select>
				            </div>                         
				            <div class="form-group col-md-12">
				            	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    			@else

	    			<div class="contact-form">
	    				
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="/account/update">
				            <div class="form-group col-md-6">
				                <input type="text" name="firstname" class="form-control" required="required" value="{{$billinfo[0]['name']}}">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="surname" class="form-control" required="required" value="{{$billinfo[0]['surename']}}">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="date" name="date" class="form-control" required="required" value="{{$billinfo[0]['age']}}">
				            </div>
				      		<div class="form-group col-md-6">
				                <input type="text" name="street-address" class="form-control" required="required" value="{{$billinfo[0]['adress']}}">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="postcode" class="form-control" required="required" value="{{$billinfo[0]['zipcode']}}">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="city" class="form-control" required="required" value="{{$billinfo[0]['stad']}}">
				            </div>
				        	<div class="form-group col-md-12">
				                <select name="country">
				                	<option value="">Land...</option>
				                	@if($billinfo[0]['country'] == 'Nederland')
				                	<option value="Nederland" selected>Nederland</option>
				                	<option value="Belgie">Belgie</option>
				                	@else
				                	<option value="Nederland">Nederland</option>
				                	<option value="Belgie" selected>Belgie</option>
				                	@endif
									
									
									
								</select>
				            </div>                         
				            <div class="form-group col-md-12">
				            	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    			@endif
@stop