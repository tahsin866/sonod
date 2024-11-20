<?php

namespace App\Http\Controllers;
use App\Models\students_number_potrro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class demoController extends Controller
{

function demoAction(Request $request){

$demos = DB::table('students_number_potrro')->sum('total');
return $demos;

}





}
