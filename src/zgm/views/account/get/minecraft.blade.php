@extends('layouts.member')
@section('content')
@if($account->count() < 1)
Hello
@else
@foreach($account as $acc)
	{{$acc->username}}
@endforeach
@endif
@stop