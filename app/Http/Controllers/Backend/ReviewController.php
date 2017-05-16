<?php
namespace App\Http\Controllers\Backend;
/********************************************************************************
 * laravel With ajax 
 *********************************************************************************
 * Author: Ultra Bytes
 * Email: 
 * Website: http://www.bytesultra.com/
 *
 * File:ReviewController.php (Backend)
 * Version: 1.0
 * Copyright: (c) 2017 - Ultra Bytes
 * You are free to use, distribute, and modify this software
 * under the terms of the GNU General Public License. See the
 * included license.txt file.
 *
 ********************************************************************************/
use Illuminate\Http\Request;
use App\Reviews;
use App\Http\Controllers\Controller;
use Validator;

class ReviewController extends Controller
{   

   


    /**
    Listing the  reviews
    */
    public function reviews( Request $request ){     
        $allReviews=  Reviews::orderBy('created_at','desc')->paginate(20);
        
        if ($request->ajax()) {
            $allReviews=  Reviews::orderBy('created_at',$request->order)->paginate(20);  
            $allReviewsData = view('admin.allReviewData',compact('allReviews'))->render();
            $links = view('admin.paginationData',compact('allReviews'))->render();
            return response()->json(['html'=>$allReviewsData,'linksHtml'=>$links]);
        }


        return view('admin.allReviews',compact('allReviews')); 
    }


    /**
    To changes the status of reviews 
    */
    public function changeStatus( Request $request ) 
    {
      $review= Reviews::select('review.status')->where('id',$request->id)->get();

      $updateArray['status']=0;

      if($review[0]->status==0) {
        $updateArray['status']=1;
        }

        if(Reviews::where('id', $request->id)->update($updateArray)){
            return response()->json(['html'=>true]);  
        }

        return response()->json(['html'=>false]);


    }
}
