<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


;
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
        $generator = new \Badcow\LoremIpsum\Generator();
        # If the code makes it here, you can assume the validation passed
        $numOfPara = $request->input('lipsum');
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
        $users = '';
        $lipsumGenerator = new \Badcow\LoremIpsum\Generator();
        $nameGenerator = \Nubs\RandomNameGenerator\All::create();
        $userArray = array();

        for ($i=0; $i < $numOfUsers; $i++) {
            $userName = $nameGenerator->getName();
            $birthDate = rand (1930, 2000);
            $userProfile = implode ('', $lipsumGenerator->getParagraphs(1));
            $userArray[$i]=[$userName, $birthDate, $userProfile];
        }
        #dd ($userArray);
        $birthdValue = $request->input('birthdate');
        $profileValue = $request->input('profile');

        for ($i=0; $i < $numOfUsers; $i++) {
            if ($birthdValue == "on" && $profileValue == "on"){
                $users .= implode ('</br>', $userArray[$i]);
                $users = $users.'</br>'.'</br>';
            }elseif ($birthdValue == "on") {
                $users .= '</br>'.$userArray[$i][0].'</br>'.$userArray[$i][1];
                $users = $users.'</br>'.'</br>';
            }elseif ($profileValue == "on" ) {
                $users .= '</br>'.$userArray[$i][0].'</br>'.$userArray[$i][2];
                $users = $users.'</br>'.'</br>';
            }else {
                $users .= $userArray[$i][0].'</br>';
                $users = $users.'</br>'.'</br>';
            }
        }

        return view('userShow')->with('users', $users);
    }
}
