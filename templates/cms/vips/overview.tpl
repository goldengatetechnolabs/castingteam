{literal} 
<script type="text/javascript">

var approved_code=1;


function updateUser(id,name,email,phone,company,sector,city,country,remark,address,postal,password,surname){

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: {
            id:id,
           name:name,
           email:email,
           phone:phone,
           company:company,
           sector:sector,
           city:city,
           country:country,
           remark:remark,
           address:address,
           postal:postal,
           password:password,
           surname:surname                                                                                                           
        },    
          
        url: "/ajax/update_vip_user",
        
        error:
            function () {
                 alert('Er is een technische fout opgetreden.');
            },

        success:
            function(json) {

              getUsers(approved_code);

            }
    });


}


function deleteUser(user_id){

$.ajax({
        type: "POST",
        dataType: 'json',
        data: {
           user_id:user_id
                                                                                                                       
        },    
          
        url: "/ajax/delete_vip_user",
        
        error:
            function () {
                 alert('Er is een technische fout opgetreden.');
            },

        success:
            function(json) {

             getUsers(approved_code);

            }


    });


}


function validateUpdate() {
    var id = $('#submit_update_button').attr('data_id');
    var name = $('#name').val();
    var email =$('#email').val();
    var phone = $('#phone').val();
   // var password = $('.field_wrap_inp #password').val();
    var company = $('#company').val();
    if (name == null || name == "" || email == null || email == "" || phone == null || phone == "" || company == null || company == "") {
        alert("All required fields must be filled out");
        
    }else{

      var city = $('#city').val();
      var address = $('#address').val();
      var postal = $('#postal').val();
      var country = $('#country').val();
      var remark = $('#remark').val();
      var sector = $('#sector').val();
      var password = $('#password').val();
      var surname = $('#surname').val();
        updateUser(id,name,email,phone,company,sector,city,country,remark,address,postal,password,surname);

    }
}

function createUsersFromData(json){
    $("#cms-subscriptions").empty();
	for (key in json.data){

		var element='<tr id="'+json.data[key].id+'"><td style="width: 200px;">'+json.data[key].name+' '+json.data[key].surname+'</td><td style="width: 300px;"><a href="mailto:'+json.data[key].email+'" class="mail">'+json.data[key].email+'</a></td><td style="width: 100px;"><span class="icon-eye icon"></span><a href="#" class="popup" data-id="models-preview" data-function="preview('+json.data[key].id+')">View</a></td><td style="width: 100px;"><span class="icon-envelope icon"></span><a href="#" class="popup" data-id="models-message" data-function="messages('+json.data[key].id+')">Message</a></td><td style="width: 100px;"><a href="#" id="delete_user">Delete</a></td><td style="width: 100px;">'+json.data[key]['update_date']+'</td></tr>';

		$("#cms-subscriptions").append($(element));
	}

	

}


$( document ).ready(function() {

	getUsers(approved_code);


    $('#cms-subscriptions').on('click', 'tr td #delete_user', function(e) {
     
     deleteUser($(this).parent().parent().attr('id'));
    e.preventDefault();
});



    
    $('body').delegate('#submit_update_button','click',function(e) {
     
     validateUpdate();

     $("#models-preview").toggle();
     $("#popup-bg").toggle();
     
    
});


});

</script>
{/literal}
<link rel="stylesheet" type="text/css" href="/css/cms/registration.css">
<h1>Overview</h1>
<div class="lijn gn-margin" style="clear:both"></div>
 <table id="cms-subscriptions" cellspacing="3" cellpadding="0">  
                          
</table>