@extends('admin.master')
@section('content')
    <div class="card-header">
        Add Category
    </div>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach( $errors->all() as $err)
                    <li>{{ $err }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{!! route('admin.cate.getAdd') !!}" method="POST">
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <div class="form-group">
            <label for="formGroupExampleInput">Category parent</label>
            <select class="form-control" name="sltParent">
                <option value="0">Please choose Category</option>
                {{generate_parent_menu($parent)}}
            </select>
        </div>
        <div class="form-group">
            <label for="txtCateName">Category Name</label>
            <input class="form-control" id="txtCateName" name="txtCateName" placeholder="Please enter category name">
        </div>
        <div class="form-group">
            <label for="txtOrder">Category Order</label>
            <input class="form-control" id="txtOrder" name="txtOrder" placeholder="Please enter category Order">
        </div>
        <div class="form-group">
            <label for="txtKeyword">Category Keywords</label>
            <input class="form-control" id="txtKeyword" name="txtKeyword" placeholder="Please enter category Keyword">
        </div>
        <div class="form-group">
            <label for="txtDescription">Category Description</label>
            <textarea class="form-control" id="txtDescription" name="txtDescription" placeholder="Please enter category Description"></textarea>
        </div>
        <div class="btn-group">
            <input type="submit" class="btn btn-primary" value="Add Category"/>
            <input type="reset" class="btn btn-warning" value="Reset"/>
        </div>

    </form>
@stop