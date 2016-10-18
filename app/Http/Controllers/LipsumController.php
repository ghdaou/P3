<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LipsumController extends Controller
{
    //
    public function index(){

        return  view('welcome');
    }


    public function lipsumShow(Request $request) {

        # Validate the request data
        $this->validate($request, [
            'lipsum' => 'required|min:1|max:10|numeric',
        ]);

        # If the code makes it here, you can assume the validation passed
        $numOfPara = $request->input('lipsum');

        return view('ipsumShow')->with($numOfPara, $request);


    }
}
