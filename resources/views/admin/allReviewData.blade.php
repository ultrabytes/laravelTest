<!--
/********************************************************************************
 * laravel With ajax 
 *********************************************************************************
 * Author: Ultra Bytes
 * Email: 
 * Website: http://www.bytesultra.com/ *
 * File:allReviewData.blade.php 
 * Version: 1.0
 * Copyright: (c) 2017 - Ultra Bytes
 * You are free to use, distribute, and modify this software
 * under the terms of the GNU General Public License. See the
 * included license.txt file.
 *
 ********************************************************************************/
 -->


       @foreach ($allReviews as $key => $rel)   
       @if ($key % 2 == 0)          
      <tr class="even gradeC">      
      @else
      <tr class="odd gradeX">
      @endif
        <td>{{$rel->name}}</td>
        <td>{{$rel->email}}</td>
        <td>{{$rel->ipAddress}}</td>
        <td>{{$rel->created_at}}</td>
        <td>{{$rel->description}}</td> 
        @if($rel->status==1)
        <td><a href="javascript:void(0);"  review-id="{{$rel->id}}" class="btn btn-success changeStatus" role="button">Confirmed</a></td>       
        @else
        <td><a href="javascript:void(0);"   review-id="{{$rel->id}}" class="btn btn-info changeStatus" role="button">Confirm</a></td>     
        @endif  
      </tr>  

     
      @endforeach

