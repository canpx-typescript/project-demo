@extends('admin.master')
@section('content')
    <div class="card-header">
        Add Category
    </div>
    @include('elements.error')
    <form action="{!! route('admin.cate.postEdit',$id) !!}" method="POST">
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <div class="form-group">
            <label for="formGroupExampleInput">Category parent</label>
            <select class="form-control" name="sltParent">
                <option value="0">Please choose Category</option>
                {{generate_parent_menu($parent,0,'--',$data['parent_id'])}}
            </select>
        </div>
        <div class="form-group">
            <label for="txtCateName">Category Name</label>
            <input class="form-control" id="txtCateName" name="txtCateName" value="{{ old('txtCateName',isset($data)?$data['name']:null) }}" placeholder="Please enter category name">
        </div>
        <div class="form-group">
            <label for="txtOrder">Category Order</label>
            <input class="form-control" id="txtOrder" name="txtOrder" value="{{ old('txtOrder',isset($data)?$data['order']:null) }}" placeholder="Please enter category Order">
        </div>
        <div class="form-group">
            <label for="txtKeyword">Category Keywords</label>
            <input class="form-control" id="txtKeyword" name="txtKeyword" value="{{ old('txtKeyword',isset($data)?$data['keywords']:null) }}" placeholder="Please enter category Keyword">
        </div>
        <div class="form-group">
            <label for="txtDescription">Category Description</label>
            <textarea class="form-control" id="txtDescription" name="txtDescription" placeholder="Please enter category Description">{{ old('txtDescription',isset($data)?$data['description']:null) }}</textarea>
        </div>
        <div class="btn-group">
            <input type="submit" class="btn btn-primary" value="Add Category"/>
            <input type="reset" class="btn btn-warning" value="Reset"/>
        </div>

    </form>
@stop