<script type="text/javascript">

function registerUser(name,email,phone,company,sector,city,country,remark,address,postal,surname){

$.ajax({
        type: "POST",
        dataType: 'json',
        data: {
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
           surname:surname                                                                                                             
        },    
          
        url: "/ajax/add_vip_user",
        
        error:
            function () {
                 alert('Er is een technische fout opgetreden.');
            },

        success:
            function(json) {

              showResponse(json);

            }
    });


}


function showResponse(json){

  if(json.data.message!=='undefined'){
    $('#result_registration').append($('<span>'+json.data.message+'</span>'))
  }


}

function validateRegistration() {
    var name = $('#name').val();
    var email =$('#email').val();
    var phone = $('#phone').val();
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
      var surname = $('#surname').val();

        registerUser(name,email,phone,company,sector,city,country,remark,address,postal,surname);

    }
}





$( document ).ready(function() {

 


    $('#submit_registration_button').click(function(e) {
     
     validateRegistration();
    e.preventDefault();
});


});





</script>

<link rel="stylesheet" type="text/css" href="/css/cms/registration.css">

<h1>Add VIP</h1>
{if isset($registration_result)}<h2>{$registration_result}</h2>{/if}
<div id="result_registration" class="lijn gn-margin" style="margin-bottom: 40px;"></div>
<div id="registration" >
  <div class="field_wrap">
    <label>Voornaam</label>
    <div class="field_wrap_inp required">
      <input type="text"  name="name" id="name" value="" placeholder = "Voornaam" maxlength="50"/>
    </div>
  </div>
  <div class="field_wrap">
    <label>Achternaam</label>
    <div class="field_wrap_inp required">
      <input type="text"  name="surname" id="surname" value="" placeholder = "Achternaam" maxlength="50"/>
    </div>
  </div>
  <div class="field_wrap">
    <label>Email adres</label>
    <div class="field_wrap_inp required">
      <input type="email" name="email" id="email" value="" placeholder = "Email adres"  maxlength="50"/>
    </div>
  </div>
  <div class="field_wrap">
    <label>Adres</label>
    <div class="field_wrap_inp">
      <input type="text" name="address" id="address" value="" placeholder = "Adres"  maxlength="50"/>
    </div>
  </div>
  <div class="field_wrap">
    <label>Postcode</label>
    <div class="field_wrap_inp">
      <input type="text" name="postal" id="postal" value="" placeholder = "Postcode"  maxlength="50"/>
    </div>
  </div>
  <div class="field_wrap">
    <label>Stad / gemeente</label>
    <div class="field_wrap_inp">
      <input type="text" name="city" id="city" value="" placeholder = "Stad / gemeente"  maxlength="50"/>
    </div>
  </div>
   <div class="field_wrap">
    <label>Land</label>
    <div class="field_wrap_inp required">
      <div class="field_wrap_inp_sel">
        <select  name="country" id="country">
          <option>België</option>
          <option>Nederland</option>
          <option>Luxemburg</option>
          <option>Duitsland</option>
          <option>Frankrijk</option>
          <option>Verenigd Koninkrijk</option>
        </select>
      </div>
    </div>
  </div>
  <div class="field_wrap">
    <label>Telefoonnummer</label>
    <div class="field_wrap_inp required">
      <input type="tel"  name="phone" id="phone" value="" placeholder = "Telefoonnummer"  maxlength="50"/>
    </div>
  </div>
  <div class="field_wrap">
    <label>Bedrijfsnaam</label>
    <div class="field_wrap_inp required">
      <input type="text"  name="company" id="company" value="" placeholder = "Bedrijfsnaam"  maxlength="50"/>
    </div>
  </div>
  <div class="field_wrap">
    <label>Sector</label>
    <div class="field_wrap_inp required">
      <div class="field_wrap_inp_sel">
          <select  name="sector" id="sector">
          <option>Kies</option>
          <option>Fotografie</option>
          <option>Film</option>
          <option>Reclame</option>
          <option>Casting director</option>
          <option>Eindklant</option>
          <option>Student foto of film</option>
          <option>Andere</option>
          </select>
      </div>
    </div>
  </div>
  <div class="field_wrap">
    <label>Opmerkingen</label>
    <div class="field_wrap_inp">
      <input type="text"  name="remark" id="ramark" value="" placeholder = "Opmerkingen" maxlength="250"/>
    </div>
  </div>
  <div class="field_wrap">
    <label></label>
    <div class="field_wrap_inp required">
      <button id="submit_registration_button">Verzend</button>
      <span>Verplicht veld</span>
    </div>
  </div>
</div>