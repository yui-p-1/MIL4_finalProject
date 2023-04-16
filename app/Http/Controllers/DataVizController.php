<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataVizController extends Controller{

public function csvDataViz(){
        
        return view('/dataViz', [
        'title' => 'CSV読み込みのサンプル',
        ]);
      
      
        }
    }
    ?>