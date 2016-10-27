<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/*
* main apllication Controller
*/
class LipsumUserController extends Controller
{

    /*
    * application main entry method
    */
    public function index(){
        /*
        * returns welcome.blade.php page
        */
        return  view('welcome');
    }

    /*
    * function that processes Lorem Ipsum form data, vaildation and outpout
    */

    public function lipsumShow(Request $request) {

        # Validate the $request object data, ensuring at least 1 paragraph and at most 10 and data must be numeric
        $this->validate($request, [
            'lipsum' => 'required|min:1|max:10|numeric',
        ]);
        # If the code makes it here, you can assume the validation passed

        # using package and creating a new object instance $generator
        $generator = new \Badcow\LoremIpsum\Generator();

        #using $request to obtain form data
        $numOfPara = $request->input('lipsum');
        # using helper $generator's method to generate paragraphs
        $paragraphs = $generator->getParagraphs($numOfPara);
        # converting the paragraph/s into a string
        $paragraphs = implode('<p>', $paragraphs);
        # returning ipsumShow.blade.php and passing string to it for display
        return view('ipsumShow')->with('paragraphs', $paragraphs);
    }
    /*
    * function that processes user/s form data, vaildation and outpout
    */
    public function userShow(Request $request) {

        # Validate the $request object data, ensuring at least 1 user and at most 10 and data must be numeric
        $this->validate($request, [
            'user' => 'required|min:1|max:10|numeric',
        ]);
        # If the code makes it here, you can assume the validation passed
        #Obtain form data (number of users) from $request
        $numOfUsers = $request->input('user');
        $users = '';
        # create a new Generator lorem ipsum object
        $lipsumGenerator = new \Badcow\LoremIpsum\Generator();
        # create a new name generator object
        $nameGenerator = \Nubs\RandomNameGenerator\All::create();
        # create an array for data storage
        $userArray = array();
        # store generated user data in array
        for ($i=0; $i < $numOfUsers; $i++) {
            $userName = $nameGenerator->getName();
            $birthDate = rand (1930, 2000);
            $userProfile = implode ('', $lipsumGenerator->getParagraphs(1));
            $userArray[$i]=[$userName, $birthDate, $userProfile];
        }
        # fetch app user's request of birth year and profile
        $birthdValue = $request->input('birthdate');
        $profileValue = $request->input('profile');

        # for the number of users requested, create string to be sent to blade

        for ($i=0; $i < $numOfUsers; $i++) {
            # both profile and birth year selected
            if ($birthdValue == "on" && $profileValue == "on"){
                $users .= implode ('</br>', $userArray[$i]);
                $users = $users.'</br>'.'</br>';
            # birth year only
            }elseif ($birthdValue == "on") {
                $users .= '</br>'.$userArray[$i][0].'</br>'.$userArray[$i][1];
                $users = $users.'</br>'.'</br>';
            # profile only
            }elseif ($profileValue == "on" ) {
                $users .= '</br>'.$userArray[$i][0].'</br>'.$userArray[$i][2];
                $users = $users.'</br>'.'</br>';
            # only user name/s
            }else {
                $users .= $userArray[$i][0].'</br>';
                $users = $users.'</br>'.'</br>';
            }
        }
        # return userShow blade
        return view('userShow')->with('users', $users);
    }
}
