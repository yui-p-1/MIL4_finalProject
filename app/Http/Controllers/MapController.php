<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MapController extends Controller{

public function csvMap(){
        
        return view('/map', [
        'title' => 'CSV読み込みのサンプル',
        ]);
      
      
        }
    }
?>