@extends('layouts.member')
@section('content')
<h1>
	Hello ,
</h1>
{{ Form::open(array('class' => 'form-horizontal', 'id' => 'edit_profile')) }}
<div class="form-group">
	{{ Form::label('username', Lang::get('account.username'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::text('username', Auth::user()->username, array('class' => 'form-control', 'disabled' => 'disabled')) }}   
	</div>
	<div class="error-msg"> 
		{{ $errors->first('username') }}
	</div>
</div><!-- /.form-group -->

<div class="form-group">
	{{ Form::label('email', Lang::get('account.email'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::text('email', Auth::user()->email, array('class' => 'form-control', 'placeholder=" '.Auth::user()->email.'"')) }}   
	</div>
	<div class="error-msg"> 
		{{ $errors->first('email') }}
	</div>
</div><!-- /.form-group -->

<div class="form-group">
	{{ Form::label('logintime', Lang::get('account.logintime'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::text('logintime', Auth::user()->logintime, array('class' => 'form-control', 'disabled' => 'disabled')) }}   
	</div>
</div><!-- /.form-group -->

<div class="form-group">
	{{ Form::label('lastlogintime', Lang::get('account.lastlogintime'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::text('lastlogintime', Auth::user()->lastlogintime, array('class' => 'form-control', 'disabled' => 'disabled')) }}   
	</div>
</div><!-- /.form-group -->

<div class="form-group">
	{{ Form::label('ip', Lang::get('account.ip'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::text('ip', Auth::user()->ip, array('class' => 'form-control', 'disabled' => 'disabled')) }}   
	</div>
</div><!-- /.form-group -->

<div class="form-group">
	{{ Form::label('lastloginip', Lang::get('account.lastloginip'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::text('lastloginip', Auth::user()->lastloginip, array('class' => 'form-control', 'disabled' => 'disabled')) }}   
	</div>
</div><!-- /.form-group -->

<hr>
<h2>รหัสผ่านใหม่ <small>ถ้าไม่ต้องการเปลี่ยนปล่อยว่างไว้</small></h2>
<div class="form-group">
	{{ Form::label('new_password', Lang::get('account.new_password'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::password('new_password', array('class' => 'form-control')) }}   
	</div>
	<div class="error-msg"> 
		{{ $errors->first('new_password') }}
	</div>
</div><!-- /.form-group -->

<div class="form-group">
	{{ Form::label('new_password2', Lang::get('account.confirm_password'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::password('new_password2', array('class' => 'form-control')) }}   
	</div>
	<div class="error-msg"> 
		{{ $errors->first('new_password2') }}
	</div>
</div><!-- /.form-group -->

<hr>
<div class="form-group">
<h2>
	กรอกรหัสผ่านเดิม <small>เพื่อความปลอดภัย</small>
</h2>
	{{ Form::label('password', Lang::get('account.password'), array('class' => 'col-lg-2 control-label')) }}
	<div class="col-lg-4">
	{{ Form::password('password', array('class' => 'form-control')) }}   
	</div>
	<div class="error-msg"> 
		{{ $errors->first('password') }}
	</div>
</div><!-- /.form-group -->

{{ Form::submit('Change', array('class' => 'btn btn-success col-offset-2 col-lg-4', 'name' => 'edit_profile'))}}
{{ Form::close() }}
@stop

@section('script')
editProfileLoad();
@stop