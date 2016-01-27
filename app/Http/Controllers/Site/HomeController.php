<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
        public function Index(){
            return view('site.home.index');
        }
        
        public function getSobre(){
            return view('site.sobre.index');
        }
        
        public function missingMethod($params = array()) {
            echo view('site.404', compact('params'));
        }
    
}
