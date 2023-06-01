<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function getModuleCategory(Request $request){
        $data=[];
        $category = DB::table('module_category')->get();
        $modules  = DB::table('modules')->get();
        foreach ($category as $categoryIndex => $categoryItem){
            $data[$categoryIndex] = (object) [
                'categoryname' => $categoryItem->name,
                'module' => [],
            ];
            foreach($modules as $moduleIndex => $moduleItem){
                if ($moduleItem->module_category === $categoryItem->id) {
                    $data[$categoryIndex]->module[] = [
                        'modulename' => $moduleItem->name,
                        'moduleurl'  => $moduleItem->url,
                    ];
                }
            }
        }
        return $data;
    }
}
