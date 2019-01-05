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
        $data = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.Cate.list',compact('data'));
    }
    public function getDelete($id){
        $parent = Cate::where('parent_id',$id)->count();
        if($parent == 0){
            $cate = Cate::find($id)->delete();
            return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công!']);
        }else{
            return redirect()->route('admin.cate.getList')->with(['flash_level'=>'danger','flash_message'=>'Có lỗi xảy ra, parent tồn tại!']);
        }
    }
    public function getEdit($id){
        $data = Cate::findOrFail($id);
        $parent =Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.cate.edit',compact('parent','data','id'));
    }
    public function postEdit(CateRequest $request, $id){
        $cate = Cate::find($id);
        $cate->name = $request->txtCateName;
        $cate->alias = convert_vi_to_en($request->txtCateName);
        $cate->order = $request->txtOrder;
        $cate->keywords = $request->txtKeyword;
        $cate->parent_id = $request->sltParent;
        $cate->description = $request->txtDescription;
        $cate->save();
        return redirect()->route('admin.cate.getList')->with(['flash_message'=>'Edit thành công','flash_level'=>'success']);
    }
}
