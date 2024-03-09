<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {
        return view(' me.hello ');
    }
    public function showAbout() {
        return view(' me.about ');
    }
    public function showContact() {
        return view(' me.contact ');
    }
}
