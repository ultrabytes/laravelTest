<!--
/********************************************************************************
 * laravel With ajax 
 *********************************************************************************
 * Author: Ultra Bytes
 * Email: 
 * Website: http://www.bytesultra.com/
 *
 * File:createReview.blade.php (create review and listed latest reviews)
 * Version: 1.0
 * Copyright: (c) 2017 - Ultra Bytes
 * You are free to use, distribute, and modify this software
 * under the terms of the GNU General Public License. See the
 * included license.txt file.
 *
 ********************************************************************************/
 -->
@extends('layout.app')
@section('content')	
<div class="container">
  <h1>Create reviews</h1>   
  <div id="alert"></div>
  <form class="form-horizontal" id="reviewForm" method="post" action="">
     {{ csrf_field() }}
     <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter name" id="name" name="name">

            <span class="help-block">
  
            </span>
			
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" id="email" name="email">
                    
            <span class="help-block">
        
            </span>

      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="description">Description:</label>
      <div class="col-sm-10">          
       <textarea rows="4" cols="50" class="form-control" name="description" id="description">  </textarea>
                    
            <span class="help-block">
            
            </span>
		
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="reCaptcha"></label>
      <div class="col-sm-10 col-sm-offset-2">          
      {!! app('captcha')->display(); !!}
                    
            <span class="help-block">
         
            </span>
    
      </div>
    </div>

    

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
<div class="clearfix">
 <h1 class="pull-left">Recent reviews</h1> 
    
 </div>
      @if (count($reviews) > 0) 
       <div class="row"> 
   <div id="reviews">

        @include('recentReviewData')

    </div>
    </div>
    @else
    <div class="row">
    <div class="col-sm-12" >
  	<p>No record found</p>
      </div>
    </div>
    @endif
 
<div class="ajax-load text-center" style="display:none">

  <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More Reviews</p>

</div>

</div>
 <script type="text/javascript">
      	var page = 1;
/**
On Scroll pagination for recent reviews
*/

	$(window).scroll(function() {

	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
          //Call loadMoreData Method 
	        loadMoreData(page);

	    }

	});


/**
Form submit for new reviews with  client side validations
*/

$('#reviewForm').submit(function(e){
  e.preventDefault();

var bool= true;
var name= $("#name").val();
var email= $("#email").val();
var description= $.trim($("#description").val());
if(name==''){    
  $('#name').next('.help-block').html('This field is required !').css('color','red');
  $('#name').css('border-color', '#f015ca');
}else{
    $('#name').next('.help-block').html('');
   $('#name').css('border-color', '#EBEBEB');
}
if(email==''){    
  $('#email').next('.help-block').html('This field is required !').css('color','red');
  $('#email').css('border-color', '#f015ca');
}else{
    $('#email').next('.help-block').html('');
   $('#email').css('border-color', '#EBEBEB');
}
if(description==''){    
  $('#description').next('.help-block').html('This field is required !').css('color','red');
  $('#description').css('border-color', '#f015ca');
}else{
    $('#description').next('.help-block').html('');
   $('#description').css('border-color', '#EBEBEB');
}



if(name=='' || email=='' || description==''){
  bool= false;  
}else{
  bool= true;  
}
if(bool==true){
if(name.length>50){
  $('#name').next('.help-block').html('Name should not greater then 50 characters !').css('color','red');
  $('#name').css('border-color', '#f015ca');
   bool= false; 
}else{
   $('#name').next('.help-block').html('');
   $('#name').css('border-color', '#EBEBEB');
     bool= true;  
}

if(description.length>1048576){
  $('#description').next('.help-block').html('Description size should not greater then 1 mb' ).css('color','red');
  $('#description').css('border-color', '#f015ca');
   bool= false; 
}else{
   $('#description').next('.help-block').html('');
   $('#description').css('border-color', '#EBEBEB');
     bool= true;  
}

if(email!=''){
 var validEmail=isValidEmailAddress(email);

 if(validEmail==false){
  $('#email').next('.help-block').html('This email  is not valid !').css('color','red');
  $('#email').css('border-color', '#f015ca');
   bool =false;
 }else{
   $('#name').next('.help-block').html('');
   $('#name').css('border-color', '#EBEBEB');
    bool =true;
 }
}

}




if(bool==true){
 var form_data = new FormData(this); //constructs key/value pairs representing fields and values


  jQuery.ajax({
  
    url: "save",
    method: "POST",
    data : form_data,
    processData: false,
    cache: false,
    contentType: false
  })
  .done(function(response) {
 
  if(response.success==true) {
  $("#reviewForm").get(0).reset() ;
  grecaptcha.reset();
  $("#reviewForm").find('input textarea').each(function(){
  $(this).next('.help-block').html('');
  $(this).css('border-color', '#EBEBEB');

     });
  var htmlval='<p>Record saved successfully !</p>';
  $("#alert").html(htmlval).removeClass('alert-danger').addClass('alert-success');


    setTimeout(function(){
    $("#alert").html('').removeClass('alert-success').removeClass('alert-danger');
    }, 10000);  
  } else if(response.success==false){    
      var htmlval='<p>Captcha is required !</p>';
  $("#alert").html(htmlval).removeClass('alert-success').addClass('alert-danger');
      setTimeout(function(){
    $("#alert").html('').removeClass('alert-success').removeClass('alert-danger');
    }, 10000);  
  }  else {    
  $("#alert").html('<p>'+response.error+'</p>').removeClass('alert-success').addClass('alert-danger');
  setTimeout(function(){
      $("#alert").html('').removeClass('alert-success').removeClass('alert-danger');
    }, 10000);
  }
  });
  
  } else {

    return bool;
  }
 

});


/**
End form code 
*/

/**
loadMoreData Method declaration with page number and send it to the server
*/
	function loadMoreData(page){

	  $.ajax(

	        {

	            url: '?page=' + page,

	            type: "get",

	            beforeSend: function()

	            {

	                $('.ajax-load').show();

	            }

	        })

	        .done(function(data)

	        {

	            if(data.html == " "){

	                $('.ajax-load').html("No more records found");

	                return;

	            }

	            $('.ajax-load').hide();

	            $("#reviews").append(data.html);

	        })

	        .fail(function(jqXHR, ajaxOptions, thrownError)

	        {

	              //alert('server not responding...');

	        });

	}

/**
End loadMoreData method code 
*/


/**
Declared email validation method 
*/
   function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};
    </script>
@endsection