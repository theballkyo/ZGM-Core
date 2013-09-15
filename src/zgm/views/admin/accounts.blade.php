@extends('layouts.master')
@section('content')
<h2>
View accounts
</h2>
<div id="showtable">
<table id="showAccounts" class="table table-hover">
	<thead>
		<tr>
				<th>{{ Lang::get('account.username') }}</th>
				<th>{{ Lang::get('account.email') }}</th>
				<th>{{ Lang::get('account.logintime') }}</th>
				<th>{{ Lang::get('account.lastlogintime') }}</th>
				<th>{{ Lang::get('account.ip') }}</th>
				<th>{{ Lang::get('account.lastloginip') }}</th>
				<th>{{ Lang::get('account.group') }}</th>
        <th></th>
        <th></th>
		</tr>
	</thead>
	<tbody>

  <tr id="">
    <td id="username">{</td>    
    <td id="email"></td>    
    <td></td> 
    <td></td> 
    <td></td>
    <td></td>
    <td id="group"></td>
    <td></td>
    <td></td>
  </tr>

	</tbody>
</table>
</div>
  <!-- Modal Edit -->
  <div class="modal fade" id="EditModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">{{ Lang::get('account.register_new') }}</h4>
        </div>
        <div class="modal-body">
          {{ Form::open(array('class' => 'form-horizontal')) }}

          <div class="form-group">
		    {{ Form::label('username', Lang::get('register.username'), array('class' => 'col-lg-4 control-label')) }}
		    <div class="col-lg-4">
		      {{ Form::text('username', '', array('class' => 'form-control')) }}   
	        </div>
		  </div><!-- /.form-group -->

		  <div class="form-group">
		    {{ Form::label('password', Lang::get('register.password'), array('class' => 'col-lg-4 control-label')) }}
		    <div class="col-lg-4">
		      {{ Form::password('password', array('class' => 'form-control')) }}     
	        </div>
		  </div><!-- /.form-group -->

		  <div class="form-group">
		    {{ Form::label('email', Lang::get('register.email'), array('class' => 'col-lg-4 control-label')) }}
		    <div class="col-lg-4">
		      {{ Form::text('email', '', array('class' => 'form-control')) }}   
	        </div>
		  </div><!-- /.form-group -->

		  <div class="form-group">
		    {{ Form::label('group', Lang::get('register.group'), array('class' => 'col-lg-4 control-label')) }}
		    <div class="col-lg-4">
		      {{ Form::text('group', '', array('class' => 'form-control')) }}   
	        </div>
		  </div><!-- /.form-group -->
		{{ Form::close() }}
        </div><!-- /.modal-body -->
        <div class="modal-footer">
          <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
          {{Form::submit('Save changes',array('class' =>'btn btn-primary btn-success', 'name' => 'edit_save'))}}
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Modal edit success msg -->
  <div class="modal fade" id="succModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
 
        </div><!-- /.modal-body -->
        <div class="modal-footer">
          <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Modal Del -->
  <div class="modal fade" id="delModal">
   <div class="modal-dialog">
  	 <div class="modal-content">
  	   <div class="modal-header">
  		  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  	   	  <h4 class="modal-title">{{ Lang::get('account.confirm_del') }}
  	    </div>
  		<div class="modal-body">
  		  test
  		</div>
  		<div class="modal-footer">
  		  <a href="#" class="btn btn-default" data-dismiss="modal">{{ Lang::get('global.cancel') }}</a>
  		  {{ Form::submit(Lang::get('global.yes'),array('class' =>'btn btn-primary btn-success', 'name' => 'del_save')) }}
  		</div>
  	  </div>
  	</div>
  </div>
@stop

@section('script')
createTable_showAccounts();
@stop