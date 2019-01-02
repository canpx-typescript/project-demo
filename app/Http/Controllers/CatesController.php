<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateRequest;
use App\Cate;
class CatesController extends Controller
{
    public function getAdd(){
        $parent =Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.Cate.add',compact('parent'));
    }
    public function postAdd(CateRequest $request){
        $cate = new Cate;
        $cate->name = $request->txtCateName;
        $cate->alias = convert_vi_to_en($request->txtCateName);
        $cate->order = $request->txtOrder;
        $cate->keywords = $request->txtKeyword;
        $cate->parent_id = 1;
        $cate->description = $request->txtDescription;
        $cate->save();
        return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Insert success','flash_level'=>'success']);
    }
    public function getList(){
        return view('admin.Cate.list');
    }
}
