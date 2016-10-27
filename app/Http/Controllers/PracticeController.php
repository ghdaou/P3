<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PracticeController extends Controller
{
    Public function example1(){
        return 'first P3 try';
    }

    Public function example2(){
        return \Lipsum::html(2);;
    }

    Public function example3(){
        $converter = new \CurrencyConverter\CurrencyConverter;
        return $converter->convert('1', '44');
    }
}
