<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('sky16/images/logoZoffice2.ico') }}">
    <!-- Font Awesome -->
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <script src="{{ asset('lib/webviewer.min.js') }}"></script>

    <link href="{{ asset('sky16/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('sky16/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/icons.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/tableadmin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontuser.css') }}" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- loader-->
    <link href="{{ asset('sky16/css/pace.min.css') }}" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="{{ asset('sky16/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('sky16/css/header-colors.css') }}" rel="stylesheet" />

</head>

<?php
if (Auth::check()) {
    $type = Auth::user()->type;
    $userid = Auth::user()->id;
} else {
    echo "<body onload=\"TypeAdmin()\"></body>";
    exit();
}
$url = Request::url();
$pos = strrpos($url, '/') + 1;

use App\Http\Controllers\StaticController;
use App\Http\Controllers\RongController;
// $checkhn = StaticController::checkhn($userid);
// $checkhnshow = StaticController::checkhnshow($userid);
// $orginfo_headep = StaticController::orginfo_headep($userid);
// $orginfo_po = StaticController::orginfo_po($userid);
// $countadmin = StaticController::countadmin($userid);

?>
<style>
        body {
          font-family: 'Kanit', sans-serif;
          font-size: 14px;

          }

          label{
                font-family: 'Kanit', sans-serif;
                font-size: 14px;

          }

          @media only screen and (min-width: 1200px) {
            label {
                /* float:right; */
            }

          }
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }

        .b-example-divider {
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
          flex-shrink: 0;
          width: 1.5rem;
          height: 100vh;
        }

        .bi {
          vertical-align: -.125em;
          fill: currentColor;
        }

        .nav-scroller {
          position: relative;
          z-index: 2;
          height: 2.75rem;
          overflow-y: hidden;
        }

        .nav-scroller .nav {
          display: flex;
          flex-wrap: nowrap;
          padding-bottom: 1rem;
          margin-top: -1px;
          overflow-x: auto;
          text-align: center;
          white-space: nowrap;
          -webkit-overflow-scrolling: touch;
        }
      
        .dataTables_wrapper   .dataTables_filter{
                float: right 
              }

            .dataTables_wrapper  .dataTables_length{
                    float: left 
            }
            .dataTables_info {
                    float: left;
            }
            .dataTables_paginate{
                    float: right
            }
            .custom-tooltip {
                --bs-tooltip-bg: var(--bs-primary);
          
          
        }
        .table thead tr th{
            font-size:14px;
        }
        .table tbody tr td{
            font-size:13px;
        }
        .menu{
            font-size:13px;
        }
</style>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand bg-secondary">
                <div class="mobile-toggle-icon d-xl-none">
                    <i class="bi bi-list"></i>
                </div>
                <div class="top-navbar d-none d-xl-block">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dashboard">
                            <a class="nav-link" href=""><label for="" style="color: white">Dashboard</label></a>
                        </li>
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dashboard">
                            <a class="nav-link" href="{{url('bk_dashboard')}}"><label for="" style="color: white">Dashboard 2</label></a>
                        </li>
                    </ul>
                </div>
                <div class="ms-auto">
                                      
                </div>

                <div class="top-navbar-right ms-3">
                    <ul class="navbar-nav align-items-center">
                        {{-- <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip" data-bs-placement="bottom" title="?????????????????????????????????????????????">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="" >
                                <div class="projects"> 
                                    <i class="fa-solid fa-user-tie text-primary"></i>
                                </div>
                            </a>
                        </li> --}}

                        {{-- @if ($countadmin != 0)
                        <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip" data-bs-placement="bottom" title="?????????????????????????????????">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="{{ url('setting/setting_index') }}" >
                                <div class="projects"> 
                                    <i class="fa-solid fa-user-tie text-danger"></i>
                                </div>
                            </a>
                        </li>
                        @endif  --}}

                        {{-- @if ($checkhn != 0)
                        <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip" data-bs-placement="bottom" title="?????????????????????">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="{{ url('hn/hn_bookindex/'.Auth::user()->id) }}" >
                                <div class="projects"> 
                                    <i class="fa-solid fa-user-tie text-warning"></i>
                                </div>
                            </a>
                        </li>
                        @endif  --}}

                      
                        {{-- <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip" data-bs-placement="bottom" title="????????????????????????????????????">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="" >
                                <div class="projects"> 
                                    <i class="fa-solid fa-user-tie text-secondary"></i>
                                </div>
                            </a>
                        </li> --}}
                     

                        {{-- @if ($orginfo_headep != 0)
                        <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip" data-bs-placement="bottom" title="???????????????????????????????????????">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="{{ url('rong/rong_bookindex/'.Auth::user()->id) }}" >
                                <div class="projects"> 
                                    <i class="fa-solid fa-user-tie" style="color: rgb(241, 28, 241)"></i>
                                </div>
                            </a>
                        </li>
                        @endif  --}}

                        {{-- @if ($orginfo_po != 0)
                        <li class="nav-item dropdown dropdown-large" data-bs-toggle="tooltip" data-bs-placement="bottom" title="?????????????????????????????????">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="{{ url('po/po_bookindex/'.Auth::user()->id) }}" >
                                <div class="projects"> 
                                    <i class="fa-solid fa-user-tie text-success"></i>
                                </div>
                            </a>
                        </li>
                        @endif  --}}
                           
                      
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center gap-1"> 
                                    @if (Auth::user()->img == null)
                                        <img src="{{ asset('sky16/images/default-image.jpg') }}"n height="32px"
                                            width="32px" alt="Image" class="user-img">
                                    @else
                                        <img src="{{ asset('storage/person/' . Auth::user()->img) }}" height="32px"
                                            width="32px" alt="Image" class="user-img">
                                    @endif
                                    <div class="user-name d-none d-sm-block"> {{ Auth::user()->fname }}
                                        {{ Auth::user()->lname }}</div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">


                                            @if (Auth::user()->img == null)
                                                <img src="{{ asset('sky16/images/default-image.jpg') }}"
                                                    width="60" height="60" alt="Image" class="rounded-circle">
                                            @else
                                                <img src="{{ asset('storage/person/' . Auth::user()->img) }}"
                                                    width="60" height="60" alt="Image" class="rounded-circle">
                                            @endif

                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name"> {{ Auth::user()->fname }}
                                                    {{ Auth::user()->lname }}</h6>
                                                <small
                                                    class="mb-0 dropdown-user-designation text-secondary">{{ Auth::user()->position_name }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-user-profile.html">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Profile</span></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Logout</span></div>
                                        </div>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                                </li>
                            </ul>
                        </li>
                       

                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

       

        <!--start sidebar -->
        <aside class="sidebar-wrapper">
            <div class="iconmenu">
                <div class="nav-toggle-box bg-secondary">
                    <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
                </div>
                <ul class="nav nav-pills flex-column"> 
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="???????????????????????????????????????">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-gleave" type="button"> 
                            <i class="fa-solid fa-building-user text-danger"></i>                          
                        </button>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                      <a class="nav-link text-center" href="">   
                          <i class="fa-brands fa-slack text-danger "></i>                        
                      </a>
                  </li>
                    {{-- <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="?????????????????????????????????/????????????">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-persondev" type="button"> 
                            <i class="fa-solid fa-building-user text-danger"></i>
                        </button>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="?????????????????????????????????????????????">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-hosing" type="button">
                            <i class="fa-solid fa-building-user text-danger"></i>
                        </button>
                    </li>
                    <hr>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="???????????????????????????????????????">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-book" type="button"> 
                            <i class="fa-solid fa-hospital text-danger"></i>
                        </button>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="????????????????????????????????????????????????????????????????????????????????????">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-car" type="button"> 
                           
                            <i class="fa-solid fa-person-circle-plus text-danger"></i>
                        </button>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="?????????????????????????????????????????????????????????????????????????????????">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-meetting" type="button">
                         
                            <i class="fa-solid fa-person-circle-check text-danger"></i>
                        </button>
                    </li> --}}
                   
                </ul>
            </div>
            <div class="textmenu">
                <div class="brand-logo bg-secondary">
                    <img src="{{ asset('sky16/images/logoZoffice.png') }}" width="100" height="30px" alt="" />
                </div>
                <div class="tab-content">  
                       
                    <div class="tab-pane fade" id="pills-gleave">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-0">?????????????????????????????????</h5>
                                </div> 
                            </div>
                            {{-- @foreach ($types as $items)
                            <a href="{{ url('showperson')}}" class="list-group-item"> 
                                <i class="fa-solid fa-person-circle-check text-primary"></i>
                                {{$items->name}}
                            </a>
                            @endforeach --}}
                            <a href="{{ URL::to('doughnut') }}" class="list-group-item"> 
                                <i class="fa-solid fa-building-user text-info"></i>
                                Test Doughnut
                            </a>
                          <a href="{{ url('bar')}}" class="list-group-item">   
                                <i class="fa-solid fa-building-user text-secondary"></i>  
                                Test Bar
                            </a>
                            <a href="{{ URL::to('line') }}" class="list-group-item"> 
                                <i class="fa-solid fa-building-user text-info"></i>
                                Test Line
                            </a>
                            <a href="{{ URL::to('polarArea') }}" class="list-group-item"> 
                                <i class="fa-solid fa-building-user text-info"></i>
                                Test PolarArea
                            </a>
                            <a href="{{ URL::to('bubble') }}" class="list-group-item"> 
                                <i class="fa-solid fa-building-user text-info"></i>
                                Test Bubble
                            </a>
                             {{--  <a href="{{ url('setting/depsubsub_index') }}" class="list-group-item"> 
                                <i class="fa-solid fa-building-user text-danger"></i>
                                ????????????????????????
                            </a>
                            <a href="{{ url('setting/orginfo') }}" class="list-group-item"> 
                                <i class="fa-solid fa-hospital text-success"></i>
                                ??????????????????
                            </a>
                            <a href="{{ url('setting/leader') }}" class="list-group-item"> 
                                <i class="fa-solid fa-person-circle-plus text-warning"></i>
                                ???????????????????????????????????????????????????????????????
                            </a> --}}
                            {{-- <a href="{{ url('setting/permiss') }}" class="list-group-item"> 
                                <i class="fa-solid fa-person-circle-check text-primary"></i>
                                ????????????????????????????????????????????????????????????
                            </a>
                            <a href="{{ url('setting/line_token') }}" class="list-group-item">  
                                <i class="fa-brands fa-line text-dark"></i>
                                Line Token ??????????????????????????????
                            </a> --}}
                        </div>
                    </div>

                    {{-- <div class="tab-pane fade" id="pills-persondev">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-0">??????????????????/????????????/???????????????</h5>
                                </div>                               
                            </div>                            
                            <a href="{{ url('user/persondev_index/'. Auth::user()->id)}}" class="list-group-item"> 
                                <i class="fa-solid fa-handshake text-primary"></i>
                                ????????????????????????????????????
                            </a>
                            <a href="{{ url('user/persondev_inside/'. Auth::user()->id)}}" class="list-group-item">
                                <i class="fa-solid fa-handshake-simple text-success"></i>
                                ?????????????????????????????????
                            </a>
                        </div>
                    </div> --}}

                    {{-- <div class="tab-pane fade" id="pills-hosing">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-0">?????????????????????</h5>
                                </div>                               
                            </div>   
                            <a href="{{ url('user/house_detail/'. Auth::user()->id)}}" class="list-group-item">
                                <i class="fa-solid fa-house-circle-exclamation text-info"></i>
                                ???????????????????????????????????????
                            </a>                         
                            <a href="{{ url('user/house_petition/'. Auth::user()->id)}}" class="list-group-item">
                                <i class="fa-solid fa-hand-holding-droplet text-success"></i>
                                ??????????????????????????????
                            </a>   
                            <a href="{{ url('user/house_problem/'. Auth::user()->id)}}" class="list-group-item">
                                <i class="fa-solid fa-house-crack text-danger"></i>
                                ???????????????????????????
                            </a>                           
                        </div>
                    </div> --}}

                    {{-- <div class="tab-pane fade" id="pills-book">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-0">?????????????????????</h5>
                                </div>                               
                            </div>   
                            <a href="{{ url('user/book_inside/'. Auth::user()->id)}}" class="list-group-item"> 
                                <i class="fa-solid fa-book text-info"></i>
                                ?????????????????????????????????
                            </a>                         
                            <a href="{{ url('user/book_send/'. Auth::user()->id)}}" class="list-group-item"> 
                                <i class="fa-solid fa-book-open-reader text-success"></i>
                                ??????????????????????????????
                            </a>   
                                                       
                        </div>
                    </div> --}}

                    {{-- <div class="tab-pane fade" id="pills-car">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-0">????????????????????????</h5>
                                </div>                               
                            </div>   
                            <a href="{{ url('user_car/car_calenda/'. Auth::user()->id) }}" class="list-group-item">  
                                <i class="fa-solid fa-calendar-days text-info"></i>
                                ??????????????????????????????????????????
                            </a>                         
                            <a href="{{url('user_car/car_narmal/'.Auth::user()->id)}}" class="list-group-item">  
                                <i class="fa-solid fa-car-side text-success"></i>
                                ????????????????????????
                            </a>   
                            <a href="{{url('user_car/car_ambulance/'.Auth::user()->id)}}" class="list-group-item"> 
                                <i class="fa-solid fa-truck-medical text-danger"></i> 
                                ????????????????????????
                            </a>                          
                        </div>
                    </div> --}}

                    {{-- <div class="tab-pane fade" id="pills-meetting">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-0">??????????????????????????????</h5>
                                </div>                               
                            </div>   
                            <a href="{{ url('user_meetting/meetting_calenda') }}" class="list-group-item">  
                                <i class="fa-solid fa-calendar-days text-info"></i>
                                ??????????????????????????????????????????????????????????????????
                            </a>                         
                            <a href="{{url('user_meetting/meetting_index')}}" class="list-group-item">   
                                <i class="fa-solid fa-people-roof text-success"></i>
                                ??????????????????????????????????????????????????????????????????
                            </a>   
                            
                        </div>
                    </div> --}}

                  

                </div>
            </div>
        </aside>
         
        <main class="page-content">

            @yield('content')
        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

      

    </div>
    <!--********************************** Scripts ***********************************-->


    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('sky16/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    {{-- <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>  --}}
    <script src="{{ asset('sky16/js/jquery.min.js') }}"></script>
    <script src="{{ asset('sky16/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('sky16/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
 
    <script src="{{ asset('sky16/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('sky16/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script> 
  
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fullcalendar/lang/th.js') }}"></script>

    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!--app-->
  <script src="{{ asset('sky16/js/app.js') }}"></script> 
  <script src="{{ asset('sky16/js/pace.min.js') }}"></script>

@yield('footer')

<script type="text/javascript">

        $(document).ready(function () {
            $('#example').DataTable();
            $('#example2').DataTable();
            $('#example3').DataTable();
            $('#example4').DataTable();
            $('#example5').DataTable();
            $('#example_user').DataTable();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });

        $(document).ready(function(){
              $('#insert_depForm').on('submit',function(e){
                    e.preventDefault();            
                    var form = this;
                    // alert('OJJJJOL');
                    $.ajax({
                          url:$(form).attr('action'),
                          method:$(form).attr('method'),
                          data:new FormData(form),
                          processData:false,
                          dataType:'json',
                          contentType:false,
                          beforeSend:function(){
                            $(form).find('span.error-text').text('');
                          },
                          success:function(data){
                            if (data.status == 0 ) {
                              
                            } else {          
                              Swal.fire({
                                title: '??????????????????????????????????????????????????????',
                                text: "You Insert data success",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#06D177', 
                                confirmButtonText: '???????????????????????????'
                              }).then((result) => {
                                if (result.isConfirmed) {                  
                                  window.location="{{url('setting/setting_index')}}";
                                }
                              })      
                            }
                          }
                    });
              });

              $('#update_depForm').on('submit',function(e){
                    e.preventDefault();
                  
                    var form = this; 
                    $.ajax({
                            url:$(form).attr('action'),
                            method:$(form).attr('method'),
                            data:new FormData(form),
                            processData:false,
                            dataType:'json',
                            contentType:false,
                            beforeSend:function(){
                              $(form).find('span.error-text').text('');
                            },
                            success:function(data){
                              if (data.status == 0 ) {
                                
                              } else {          
                                Swal.fire({
                                  title: '???????????????????????????????????????????????????',
                                  text: "You edit data success",
                                  icon: 'success',
                                  showCancelButton: false,
                                  confirmButtonColor: '#06D177', 
                                  confirmButtonText: '???????????????????????????'
                                }).then((result) => {
                                  if (result.isConfirmed) {                  
                                    window.location="{{url('setting/setting_index')}}";
                                  }
                                })      
                              }
                            }
                      });
              });
        });
       
        $(document).ready(function(){    
               
                $('#LEADER_ID4').select2({
                    placeholder:"???????????????????????????????????????????????????",
                    allowClear:true
                });                 
        });

        $(document).on('click','.edit_line',function(){
                var line_token_id = $(this).val();
                // alert(line_token_id);
                        $('#linetokenModal').modal('show');
                        $.ajax({
                        type: "GET",
                        url:"{{url('setting/line_token_edit')}}" +'/'+ line_token_id,  
                        success: function(data) {
                            console.log(data.line_token.line_token_name);
                            $('#line_token_name').val(data.line_token.line_token_name)  
                            $('#line_token_code').val(data.line_token.line_token_code) 
                            $('#line_token_id').val(data.line_token.line_token_id)                
                        },      
                });
        });

      
</script>


</body>

</html>
