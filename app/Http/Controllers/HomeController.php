<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $employees = DB::table('employees')->get();
        $predict = DB::table('predict')->get();

        return view('home', [
            'employees' => $employees,
            'predict' => $predict,
        ]);
    }
}
?>