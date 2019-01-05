<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('public/admin/bootstrap4/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/lib/package/dist/sweetalert2.min.css')}}">
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/lib/package/dist/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('public/admin/bootstrap4/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/js/script.js') }}"></script>
    <!-- Ckeditor !-->
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
</head>
<body>
<?php
$request = response()->getMethodCurrent();
?>
<div class="container-fluid">
    <div class="header-content">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand"></a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                @auth
                    <a href="{{ route('logout')  }}" class="btn btn-outline-warning my-2 my-sm-0" type="submit">Logout</a>
                @endauth
            </form>
        </nav>
    </div>
    <div class="left-content">
        <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Quản lý người dùng
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse <?php if($request['controller'] == 'UsersController') echo 'show'; else echo '' ?>" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <a href="/users/add">Thêm người dùng</a>
                        </div>
                        <div class="card-body">
                           Danh sách người dùng
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Quản lý Category
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse <?php if($request['controller'] == 'CatesController') echo 'show'; else echo '' ?>" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body <?php if($request['action'] == 'getAdd' && $request['controller'] == 'CatesController') echo 'active'; else echo '' ?>">
                            <a href="<?php echo URL::to('admin/cate/add'); ?>" >Thêm category</a>
                        </div>
                        <div class="card-body <?php if($request['action'] == 'getList' && $request['controller'] == 'CatesController') echo 'active'; else echo '' ?>">
                            <a href="<?php echo URL::to('admin/cate/list'); ?>" >Danh sách category</a>
                        </div>
                    </div>
                </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Quản lý Ảnh
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse <?php if($request['controller'] == 'ImagesController') echo 'show'; else echo '' ?>" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        Thêm ảnh mới
                    </div>
                    <div class="card-body">
                        Danh sách ảnh
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                            Quản lý Product
                        </button>
                    </h5>
                </div>
                <div id="collapse4" class="collapse <?php if($request['controller'] == 'ProductController') echo 'show'; else echo '' ?>" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body <?php if($request['action'] == 'getAdd' && $request['controller'] == 'ProductController') echo 'active'; else echo '' ?>">
                    <a href="<?php echo URL::to('admin/product/add'); ?>" >Thêm Product </a>
                    </div>
                    <div class="card-body <?php if($request['action'] == 'getList' && $request['controller'] == 'ProductController') echo 'active'; else echo '' ?>">
                    <a href="<?php echo URL::to('admin/product/list'); ?>" > Danh sách Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container-fluid">
           <div class="card-header" >
               <h2> {{ $request['controller'] }} - {{  $request['action'] }}</h2>
           </div>
           <div>
                @if(Session::has('flash_message'))
                    <div class="alert alert-{{ Session::get('flash_level')}}">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
           </div>
            @yield('content')
        </div>
    </div>
</div>

</body>
@yield('script-ck')
</html>