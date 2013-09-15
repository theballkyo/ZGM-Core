@extends('layouts.member')
@section('content')
<table class="table">
<thead>
	<tr>
		<th>ราชื่อบริการ</th>
		<th>Detail</th>
	</tr>
</thead>
<tbody>
  <tr>
	<td class="name-service">
		<a href="{{URL::to('account/view/minecraft')}}">Game Minecraft</a>
	</td>
	<td class="detail">
		Game minecraft java tester 1234<br>12345678945612
	</td>
	<td>
		<a href="{{ URL::to('account/add/minecraft') }}" class="btn btn-primary btn-success">Register</a>
	</td> 
  </tr>
  <tr>
	<td class="name-service">
		Game Rangnarok
	</td>
	<td class="detail">
		Game Rangnarok tester 1234<br>12345678945612
	</td>
	<td>
		<a href="{{ URL::to('account/add/rak') }}" class="btn btn-primary btn-success">Register</a>
	</td> 
  </tr>
</tbody>
</table>
@stop