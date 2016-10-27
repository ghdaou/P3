<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/*
* Contact controller using a single method __Invoke() that is automatically called
*
*/

class ContactController extends Controller
{
    /*
    *returns view contact.blade.php
    */

    public function __Invoke(){
       return view ('contact');
    }
}
