<?php

namespace App\Http\Controllers\Frontend;

/********************************************************************************
 * laravel With ajax 
 *********************************************************************************
 * Author: Ultra Bytes
 * Email: 
 * Website: http://www.bytesultra.com/
 *
 * File:ReviewController.php (Frontend)
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
    To create new reviews
    */


    public function createReview( Request $request )
    {     
        $reviews=  Reviews::where('status','1')->orderBy('created_at','desc')->paginate(10);    

        if ($request->ajax()) {      
            $reviewData = view('recentReviewData',compact('reviews'));
            return response()->json(['html'=>$reviewData]);
        }

        return view('createReview',compact('reviews'));
    }


    /**
    Save the reviews
    */

    public function save( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required'
        ]);

        if ($validator->fails()) {
            return ['success' => false, 'errors' => $validator->errors()];
        }
        $reviews= new Reviews;

        
        $reviews->name=$request->get('name');
        $reviews->email=$request->get('email');
        $reviews->description=$request->get('description');           
        $reviews->ipAddress=$request->ip();
        
        if($reviews->save()){       
            return ['success'=>true];
        }

        return ['success'=>false,'error' => 'some error occur !'];
        
    }


}
