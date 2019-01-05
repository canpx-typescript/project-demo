@extends('admin.master')
@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>Category Parent</th>
            <th>Keyword</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{ $d['id'] }}</td>
                <td>{{ $d['name'] }}</td>
                <td>
                @if($d['parent_id'] == 0)
                    {{ 'NONE' }}
                @else
                    <?php
                        $parent = DB::table('cates')->where('id',$d['parent_id'])->first();
                        echo $parent->name;
                    ?>
                @endif
                </td>
                <td>
                    <a onclick="return xacnhanxoa('Bạn có chắc muốn xóa không?');" href="{{ URL::route('admin.cate.getDelete',$d['id'])}}"> Delete </a>
                </td>
                <td>
                    <a href="{{ URL::route('admin.cate.getEdit',$d['id'])}}"> Edit </a>
                </td>
            </tr>
        @endforeach    
        </tbody>
    </table>
@stop