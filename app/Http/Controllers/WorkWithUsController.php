<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkWithUsController extends Controller
{
    public function showForm() {
        return view( 'work-with-us' );
}



}