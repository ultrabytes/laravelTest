
<!--
/********************************************************************************
 * laravel With ajax 
 *********************************************************************************
 * Author: Ultra Bytes
 * Email: 
 * Website: http://www.bytesultra.com/
 *
 * File:allReviews.blade.php 
 * Version: 1.0
 * Copyright: (c) 2017 - Ultra Bytes
 * You are free to use, distribute, and modify this software
 * under the terms of the GNU General Public License. See the
 * included license.txt file.
 *
 ********************************************************************************/
 -->
@extends('admin.layout.app')
@section('content')	
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Reviews</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="alert">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>IP</th>
                                    <th id="dateHeader" sort-data="desc" >Date
                                          <img class="sort-icon" src="{{URL::asset('images/arrow-up.png')}}">
                                    </th>
                                    <th>Description</th>
                                    <th>Status</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    
                                @if (count($allReviews) > 0)  
                             
                                @include('admin.allReviewData')
                                @else
                              <tr>
                              <td>
                                No record found
                              </td>
                              </tr>
                                @endif
                                </tbody>
                            </table>
                             <div id="pagination-link">
                            {{$allReviews->links()}}
                            </div>
                            <div class="ajax-load text-center" style="display:none">

                            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More Reviews</p>

                          </div>
                       
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
</div>


@endsection

@section('scripts')
 <script type="text/javascript">

 jQuery(function ($) {
// ajax pagination start
  $('body').on('click','.pagination a',function(e){
    e.preventDefault();
    var th= $(this);
    var page=th.html(); 
    var sortOrder =$('#dateHeader').attr('sort-data');   
    sortData(sortOrder,page);   
  });
// ajax pagination End

// ajax change status of review start
$('table').on('click','.changeStatus',function(){
 var id= $(this).attr('review-id');
 var page=$('#pagination-link ul').find('.active span').html();
 changeStatus(id,page);
});

// ajax change status of review end


// ajax sorting start accordint to date
$('table').on('click','#dateHeader',function(){
 
var sortOrder =$(this).attr('sort-data');
if(sortOrder=='desc'){
  var sortVar= 'asc';
  $(this).attr('sort-data','asc')
}else{
  var sortVar= 'desc';
  $(this).attr('sort-data','desc')
}
 var page=$('#pagination-link ul').find('.active span').html();
 //Sort data with sortVar and  page number 
 sortData(sortVar,page);
});

});

 // for load more reviews with page number
  function loadMoreData(page){

    $.ajax(

          {

              url:  '?page='+page,

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

              $("tbody").html(data.html);

              $("#pagination-link").html(data.linksHtml);

          })

          .fail(function(jqXHR, ajaxOptions, thrownError)

          {

                alert('server not responding...');

          });

  }

   function sortData(sortVar,page){

    $.ajax(

          {

              url:  '?page='+page+'&order='+sortVar,

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

              $("tbody").html(data.html);

              $("#pagination-link").html(data.linksHtml);

          })

          .fail(function(jqXHR, ajaxOptions, thrownError)

          {

                alert('server not responding...');

          });

  }


  function changeStatus(id,page){

    $.ajax(

          {

              url: 'changeStatus/'+id,

              type: "get"


          })

          .done(function(data)

          {

              if(data.html == false){

                 // $('.ajax-load').html("No more records found");
                 alert("Not updated");

                  return;

              } else{
        
             $('.alert').addClass('alert-success').html('Status changed successfully !');      
             $('html, body').animate({scrollTop:$('.alert').position().top}, 'slow');          
             loadMoreData(page);
             setTimeout(function(){ 
              $('.alert').removeClass('alert-success').html('');
             }, 8000);

              }

           
          })

          .fail(function(jqXHR, ajaxOptions, thrownError)

          {

                alert('server not responding...');

          });

  }
    </script>

    @endsection