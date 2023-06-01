<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModulesController extends Controller
{
    public function getallmodulecategory (Request $request){
        return DB::table('module_category')->get();
    }
    public function getallmodules(Request $request){
        return DB::table('modules')->get();
    }
    public function insertMenuCategory(Request $request){
        $categoryname = $request->post('categoryname');
        $query = DB::table('module_category')->insert([
            'name' => $categoryname,
        ]);
        return $query;
    }
    public function insertModule(Request $request){
        $modulename = $request->post('modulename');
        $categoryid   = $request->post('categoryid');
        $moduleurl   = $request->post('moduleurl');
        $query = DB::table('modules')->insert([
            'name' => $modulename,
            'module_category' => $categoryid,
            'url' => $moduleurl,
        ]);
        return $query;
    }
}
