 /*
  * ZGM.js v. 0.9 created by Theballkyo
  */


 /*
  * Define variable
  * id @int
  */

  var id;
 /**
  * selected tr
  */
  var selTr; 

 /*
  * variable define @obj
  * var of the selected account.
  * to get text use var_name.text()
  * to change text use var_name.text(value);
  */
  
  var username;
  var email;
  var group;

 /**
  * @var obj
  *
  */
  
  var showAccounts;
  
  /**
   * Check IE Version
   *
   * http://james.padolsey.com/javascript/detect-ie-in-js-using-conditional-comments/
   *
   * @return version 
   */
  var ie = (function(){
 
    var undef,
        v = 3,
        div = document.createElement('div'),
        all = div.getElementsByTagName('i');
 
    while (
        div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
        all[0]
    );
 
    return v > 4 ? v : undef;
 
  }());


function Load(this_click){
	selTr = $(this_click).closest('tr');
	id = selTr.attr('id');
	username = selTr.find('#username');
	email = selTr.find('#email');
	group = selTr.find('#group');
}

// Defind old email
function editProfileLoad(){
	email = $("input[name='email']");
}

function msgModal(msg){
	if(msg != null && typeof msg === 'object')
	{
		if(msg.type == 'succ')
		{
			selTr.fadeTo(1000,0,'swing',function(){
			showAccounts.fnDeleteRow($("#" + id)[0]);
			selTr.remove();
			});
		}
	} else {
		alert(msg);
	}
}

function createTable_showAccounts()
{
	 showAccounts = $('#showAccounts').dataTable({
        "bProcessing": true,
        "sAjaxSource": "member/json",
        "sPaginationType" : "full_numbers",
		"bServerSide": true,
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
        $(nRow).attr('id', aData['id']);
        },
        "aoColumns": [
            { "mData": "username" },
            { "mData": "email" },
            { "mData": "logintime" },
            { "mData": "lastlogintime" },
            { "mData": "ip" },
            { "mData": "lastloginip" },
            { "mData": "group"},
            { "mData": null, sDefaultContent: '<input class="btn btn-primary btn-success" name="edit" type="submit" value="Edit">' },
            { "mData": null, sDefaultContent: '<input class="btn btn-primary btn-success" name="del" type="submit" value="Del">' }
        ],
        "aoColumnDefs": [
	        { 
	          "bSortable": false, 
	          "aTargets": [ -1 , -2 ] // <-- gets last column and turns off sorting
	        } 
     	],
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {                  
            $('td:eq(0)', nRow).attr('id','username');
            $('td:eq(1)', nRow).attr('id','email');
            $('td:eq(6)', nRow).attr('id','group');
        },

    });
 	return showAccounts;
}

//Edit profile member click
$('#edit_profile').on('click', "input[name='edit_profile']", function(){
	if($("input[name='email']").val() == email.val())
	{
		$("input[name='email']").val("");
	}
});

//On click Edit or Del => Load variable
$("#showAccounts").on('click', "input[name='edit'],input[name='del']", function(){
	Load(this);
});

//Load modal edit account
$("#showAccounts").on('click', "input[name='edit']", function(){

	$("input[name='username']").val(username.text());
	$("input[name='email']").val(email.text());
	$("input[name='group']").val(group.text());
	$("input[name='account_id']").val(id);
	$('#EditModal').modal();
});

//Load modal del account
$("#showAccounts").on('click', "input[name='del']", function(){
	$('#delModal').modal();
});

//Edit account ajax
$("#EditModal").on('click', "input[name='edit_save']", function(){

	var post_data = {
		ajax: "true"
	}

	//input value
	var input_username = $("input[name='username']").val();
	var input_email = $("input[name='email']").val();
	var input_group = $("input[name='group']").val();
	var input_password = $("input[name='password']").val();

	if(username.text() !== input_username)
	{
		post_data.username = input_username;
	}
	if(email.text() !== input_email)
	{
		post_data.email = input_email;
	}
	if(group.text() !== input_group)
	{
		post_data.group = input_group;
	}
	if(input_password !== "" && input_password !== null)
	{
		post_data.password = input_password;
	}

	$.ajax({
		type: "POST",
		url: "member/" + id + "/edit",
		data: post_data,
		cache: false
	}).done(function(msg){
		if(msg == "true")
		{
			username.text(input_username);
			email.text(input_email);
			group.text(input_group);
			$('#EditModal').modal('hide');
			$('#succModal').modal();

		}
		else
		{
			$.each(msg, function(index, value){
				alert(index + " : " + value);
			});
		}
	}).fail(function(jqXHR, textStatus){
		alert('Error !');
	});
});

//Del account ajax
$("#delModal").on('click', "input[name='del_save']", function(){

	$.ajax({
		type: "POST",
		url: "member/" + id + "/del",
		data: { ajax: "true"},
		cache: false
	}).done(function(msg){
		$('#delModal').modal('hide');
		msgModal(msg);
	}).fail(function(jqXHR, textStatus){
		msgModal('การลบผิดพลาด')
	});

});
function preload(){
        $('.container').show();
        $('.waitload').hide();

        if(ie < 8){
        	$('.browser-error').show();
        }
    }