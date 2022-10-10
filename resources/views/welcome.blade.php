<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('apkclaim/images/logo150.ico') }}">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/styledis.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('bt52/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bt52/js/bootstrap.bundle.min.js') }}" />
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5">
                <div class="card-body">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-2 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-3 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-4 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-5 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>

                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-6 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card-body  shadow ">
                    <div class="col-12 col-md-12 col-xl-12 mt-3">                         
                            {{-- <img src="..." class="img-thumbnail mb-3" alt="..."> --}}                      
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card-body">

                    <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-7 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-8 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-9 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i> <i class="fa-solid fa-3x fa-0 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i> <i class="fa-solid fa-3x fa-1 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>

                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i> <i class="fa-solid fa-3x fa-2 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                {{-- <div class="card-body">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow-lg">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">รายงาน</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow-lg">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-2 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">สมาชิก</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow-lg">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-3 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ขายสินค้า</label>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow-lg">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-4 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ซื้อวัสดุ</label>
                                </a>

                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow-lg">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-5 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">รับสินค้า</label>
                                </a>

                            </div>

                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow-lg">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-6 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">คลังสินค้า</label>
                                </a>

                            </div>

                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-2">
                {{-- <div class="card-body  shadow-lg">
                    <div class="col-12 col-md-12 col-xl-12 mt-3">                         
                                         
                    </div>
                </div> --}}
            </div>
            <div class="col-md-5">
                <div class="card-body">

                    <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i><i class="fa-solid fa-3x fa-3 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow ">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i><i class="fa-solid fa-3x fa-4 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow ">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i><i class="fa-solid fa-3x fa-5 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow ">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i><i class="fa-solid fa-3x fa-6 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow ">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i><i class="fa-solid fa-3x fa-7 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>

                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow ">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i><i class="fa-solid fa-3x fa-8 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"> 
                {{-- <div class="row mb-3 justify-content-center">
                    <div class="col-6 col-md-4 col-xl-3 mt-3">
                        <div class="card-body shadow">
                            <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                <i class="fa-solid fa-3x fa-1 text-info"></i><i class="fa-solid fa-3x fa-9 text-info"></i>
                                <br>
                                <label for="" class="mt-2">ว่าง</label>
                            </a>
                        </div>
                    </div>                    
                </div>        --}}
            </div> 
            <div class="col-md-1">                
            </div> 
            <div class="col-md-5">
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-1 text-info"></i><i class="fa-solid fa-3x fa-9 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-2 text-info"></i><i class="fa-solid fa-3x fa-0 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-2 text-info"></i><i class="fa-solid fa-3x fa-1 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-2 text-info"></i><i class="fa-solid fa-3x fa-2 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <<i class="fa-solid fa-3x fa-2 text-info"></i><i class="fa-solid fa-3x fa-3 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>

                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-2 text-info"></i><i class="fa-solid fa-3x fa-4 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>

                        </div>
                    </div> --}}

                </div>
            </div>
            <div class="col-md-2">   
                <div class="card-body">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-12 col-xl-12 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-v text-primary"></i><i class="fa-solid fa-3x fa-i text-warning"></i><i class="fa-solid fa-3x fa-p text-success"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div> 
                    </div> 
                </div>             
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"> 
                <div class="row mb-3 justify-content-center">
                    <div class="col-12 col-md-12 col-xl-12 mt-3">
                        <div class="card-body shadow">
                            <a href="{{ url('home') }}" class="nav-link text-dark text-center"> 
                                <i class="fa-solid fa-3x fa-cash-register text-warning"></i>
                                <br>
                                <label for="" class="mt-2">เค้าร์เตอร์แคชเชียร์</label>
                            </a>
                        </div>
                    </div>                    
                </div>       
            </div> 
            <div class="col-md-1">                
            </div> 
            <div class="col-md-5">
                <div class="card-body">

                    <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-2 text-info"></i><i class="fa-solid fa-3x fa-2 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-2 text-info"></i><i class="fa-solid fa-3x fa-3 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-2 text-info"></i><i class="fa-solid fa-3x fa-4 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="row mb-3 justify-content-center">
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-2 text-info"></i><i class="fa-solid fa-3x fa-2 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <<i class="fa-solid fa-3x fa-2 text-info"></i><i class="fa-solid fa-3x fa-3 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>

                        </div>
                        <div class="col-6 col-md-4 col-xl-3 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-2 text-info"></i><i class="fa-solid fa-3x fa-4 text-info"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>

                            </div>

                        </div>
                    </div> --}}

                </div>
            </div>
            <div class="col-md-2">   
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6 col-md-12 col-xl-12 mt-3">
                            <div class="card-body shadow">
                                <a href="{{ url('home') }}" class="nav-link text-dark text-center">
                                    <i class="fa-solid fa-3x fa-v text-primary"></i><i class="fa-solid fa-3x fa-i text-warning"></i><i class="fa-solid fa-3x fa-p text-success"></i>
                                    <br>
                                    <label for="" class="mt-2">ว่าง</label>
                                </a>
                            </div>
                        </div> 
                    </div> 
                </div>             
            </div>
        </div>
    </div>


    <link rel="stylesheet" href="{{ asset('bt52/js/bootstrap.min.js') }}" />


</body>

</html>
