@extends('admin.master')
@section('content')
    <div class="card-header">
        Add ProDuct
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
    <form action="{!! route('admin.product.getAdd') !!}" method="POST">
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <div class="form-group">
            <label for="txtProductName">Name</label>
            <input class="form-control" id="txtProductName" name="txtProductName" placeholder="Please enter product name">
        </div>
        <div class="form-group">
            <label for="txtprice">Price</label>
            <input class="form-control" id="txtprice" name="txtprice" placeholder="Please enter Price">
        </div>
        <div class="form-group">
            <label for="txtIntro">Intro</label>
            <textarea class="form-control" id="txtIntro" name="txtIntro" placeholder="Please enter Intro"></textarea>
        </div>
        <div class="form-group">
            <label for="txtContent">Content</label>
            <textarea class="form-control" id="txtContent" name="txtContent" placeholder="Please enter Content"></textarea>
        </div>
        <div class="form-group">
            <label for="txtProductFile">Files</label>
            <input type="file" class="form-control" id="txtProductFile" name="txtProductFile" placeholder="Please enter Content" />
        </div>
        <div class="btn-group">
            <input type="submit" class="btn btn-primary" value="Add Category"/>
            <input type="reset" class="btn btn-warning" value="Reset"/>
        </div>

    </form>
@stop
@section('script-ck')
<script> 
CKEDITOR.replace( 'txtIntro', {
        filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
        // filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
        // filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
</script>
@endsection
