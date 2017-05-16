<?php
namespace App;
/********************************************************************************
 * laravel With ajax 
 *********************************************************************************
 * Author: Ultra Bytes
 * Email: 
 * Website: http://www.bytesultra.com/
 *
 * File:Reviews.php (Model) 
 * Version: 1.0
 * Copyright: (c) 2017 - Ultra Bytes
 * You are free to use, distribute, and modify this software
 * under the terms of the GNU General Public License. See the
 * included license.txt file.
 *
 ********************************************************************************/
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    	protected $fillable = ['name', 'email', 'description','created_at', 'updated_at'];
       protected $table = 'review';
}
