<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/vendor/fonts/circular-std/style.css')}}">
    <link rel="stylesheet" href="{{url('/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{url('/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{url('/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{url('/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{url('/assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    
    <title>Salman.id</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/home">Salman.id</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                    <form action="/search" method="GET">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input type="text" name="search" class="form-control" placeholder="Search..">
                            </div>
                        </li> 
                    </form>                              
                        <li class="nav-item">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top:13px"> Create Link </button>                                        
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{url('/assets/images/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }} </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-power-off mr-2"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <!-- <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-power-off mr-2"></i>Logout</a>                                 -->
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="list-group mt-3">
                        @foreach($short as $row)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{route('home.show',$row->id)}}">{{ route('shorten.link', $row->code) }}</a>
                                <span class="badge badge-primary badge-pill">{{$row->total}}</span>
                            </li>              
                        @endforeach  
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->                    
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @yield('content')
                        </div>                       
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->                   
                </div>
            </div>
            <!-- ============================================================== -->                        
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{url('/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{url('/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{url('/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- main js -->
    <script src="{{url('/assets/libs/js/main-js.js')}}"></script>
    <!-- chart chartist js -->
    <script src="{{url('/assets/vendor/charts/charts-bundle/Chart.bundle.js')}}"></script>
    <script src="{{url('/assets/vendor/charts/charts-bundle/chartjs.js')}}"></script>

    <!-- Create Modal Form -->
    <form action="/home" method="POST">
        {{csrf_field()}}
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                        <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">                   
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Generate</button>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </form>
</body>
</html>