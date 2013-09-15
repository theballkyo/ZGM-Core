@extends('layouts.member')
@section('content')
@if(isset($post))
	คุณสมัครสมาชิก : {{ $account_name }} เสร็จเรียบร้อยแล้ว
@else
	@if($open === null)
		Die
	@else
		Register : {{ $apps['title']}}
		<br>
		{{ Form::open() }}
		@foreach($apps['columns'] as $ak => $av)
			@if(!isset($av['hidden']))
				<?php echo Form::$av['type']($ak); ?>
				{{ $errors->first($ak) }}
			@endif
		@endforeach
		<br>
		{{ Form::submit('Register') }}
		{{ Form::close() }}
	@endif
@endif
@stop