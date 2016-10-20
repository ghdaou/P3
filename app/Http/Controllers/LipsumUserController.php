<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LipsumUserController extends Controller
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


        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs($numOfPara);
        $paragraphs = implode('<p>', $paragraphs);

        return view('ipsumShow')->with('paragraphs', $paragraphs);

    }
    public function userShow(Request $request) {

        # Validate the request data
        $this->validate($request, [
            'user' => 'required|min:1|max:10|numeric',
        ]);

        # If the code makes it here, you can assume the validation passed
        $numOfUsers = $request->input('user');

        $generator = \Nubs\RandomNameGenerator\All::create();
        $userArray = array();
        for ($i=0; $i < $numOfUsers; $i++) {
            $userName = $generator->getName();
            $userArray[$i]=$userName;

        }
        $users = implode('</br>', $userArray);
        return view('userShow')->with('users', $users);


    }
}
