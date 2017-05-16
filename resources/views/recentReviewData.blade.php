 
<!--
/********************************************************************************
 * laravel With ajax 
 *********************************************************************************
 * Author: Ultra Bytes
 * Email: 
 * Website: http://www.bytesultra.com/
 *
 * File:createReviewData.blade.php (recent review data)
 * Version: 1.0
 * Copyright: (c) 2017 - Ultra Bytes
 * You are free to use, distribute, and modify this software
 * under the terms of the GNU General Public License. See the
 * included license.txt file.
 *
 ********************************************************************************/
 -->
 @foreach ($reviews as $key => $rel)  
    <div class="col-md-12">
  <div class="name">  <h3>{{$rel->name}}</h3></div>
<div class="description">
 <p>{{$rel->description}}</p>
</div>
<div class="created_at">
 <p>{{date('d-m-Y H:i:s', strtotime($rel->created_at))}}</p>
</div>
    </div>
  
      @endforeach