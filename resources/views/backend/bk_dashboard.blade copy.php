@extends('layouts.bk')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@section('content')
    

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Preloader</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                        <li class="breadcrumb-item active">Preloader</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">Total Sales</p>
                            <h4 class="mb-2">1452</h4>
                            <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-shopping-cart-2-line font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                            
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">New Orders</p>
                            <h4 class="mb-2">938</h4>
                            <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from previous period</p>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-success rounded-3">
                                <i class="mdi mdi-currency-usd font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                              
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">New Users</p>
                            <h4 class="mb-2">8246</h4>
                            <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-user-3-line font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                              
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">Unique Visitors</p>
                            <h4 class="mb-2">29670</h4>
                            <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous period</p>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-success rounded-3">
                                <i class="mdi mdi-currency-btc font-size-24"></i>  
                            </span>
                        </div>
                    </div>                                              
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-xl-6">

            <div class="card">
                <div class="card-body pb-0">
                    <div class="float-end d-none d-md-inline-block">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Export</a>
                                <a class="dropdown-item" href="#">Import</a>
                                <a class="dropdown-item" href="#">Download Report</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">Email Sent</h4>

                    <div class="text-center pt-3">
                        {{-- <div class="row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <div class="d-inline-flex">
                                    <h5 class="me-2">25,117</h5>
                                    <div class="text-success font-size-12">
                                        <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                    </div>
                                </div>
                                <p class="text-muted text-truncate mb-0">Marketplace</p>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <div class="d-inline-flex">
                                    <h5 class="me-2">$34,856</h5>
                                    <div class="text-success font-size-12">
                                        <i class="mdi mdi-menu-up font-size-14"> </i>1.2 %
                                    </div>
                                </div>
                                <p class="text-muted text-truncate mb-0">Last Week</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="d-inline-flex">
                                    <h5 class="me-2">$18,225</h5>
                                    <div class="text-success font-size-12">
                                        <i class="mdi mdi-menu-up font-size-14"> </i>1.7 %
                                    </div>
                                </div>
                                <p class="text-muted text-truncate mb-0">Last Month</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body py-0 px-2">
                    {{-- <div id="area_chart" class="apex-charts" dir="ltr"></div> --}}
                    {{-- <canvas id="myChart" width="800" height="1200"></canvas> --}}
                    <div class="p-6 m-20 bg-white rounded shadow">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="float-end d-none d-md-inline-block">
                        <div class="dropdown">
                            <a class="text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted">This Years<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">This Year</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">Revenue</h4>

                    <div class="text-center pt-3">
                        <div class="row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <div>
                                    <h5>17,493</h5>
                                    <p class="text-muted text-truncate mb-0">Marketplace</p>
                                </div>
                            </div><!-- end col -->
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <div>
                                    <h5>$44,960</h5>
                                    <p class="text-muted text-truncate mb-0">Last Week</p>
                                </div>
                            </div><!-- end col -->
                            <div class="col-sm-4">
                                <div>
                                    <h5>$29,142</h5>
                                    <p class="text-muted text-truncate mb-0">Last Month</p>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div>
                </div>
                <div class="card-body py-0 px-2">
                    <div id="column_line_chart" class="apex-charts" dir="ltr"></div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>

                    <h4 class="card-title mb-4">Latest Transactions</h4>

                    <div class="table-responsive">
                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th style="width: 120px;">Salary</th>
                                </tr>
                            </thead><!-- end thead -->
                            <tbody>
                                <tr>
                                    <td><h6 class="mb-0">Charles Casey</h6></td>
                                    <td>Web Developer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                    </td>
                                    <td>
                                        23
                                    </td>
                                    <td>
                                        04 Apr, 2021
                                    </td>
                                    <td>$42,450</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Alex Adams</h6></td>
                                    <td>Python Developer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                    </td>
                                    <td>
                                        28
                                    </td>
                                    <td>
                                        01 Aug, 2021
                                    </td>
                                    <td>$25,060</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Prezy Kelsey</h6></td>
                                    <td>Senior Javascript Developer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                    </td>
                                    <td>
                                        35
                                    </td>
                                    <td>
                                        15 Jun, 2021
                                    </td>
                                    <td>$59,350</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Ruhi Fancher</h6></td>
                                    <td>React Developer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                    </td>
                                    <td>
                                        25
                                    </td>
                                    <td>
                                        01 March, 2021
                                    </td>
                                    <td>$23,700</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Juliet Pineda</h6></td>
                                    <td>Senior Web Designer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                    </td>
                                    <td>
                                        38
                                    </td>
                                    <td>
                                        01 Jan, 2021
                                    </td>
                                    <td>$69,185</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Den Simpson</h6></td>
                                    <td>Web Designer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                    </td>
                                    <td>
                                        21
                                    </td>
                                    <td>
                                        01 Sep, 2021
                                    </td>
                                    <td>$37,845</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Mahek Torres</h6></td>
                                    <td>Senior Laravel Developer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                    </td>
                                    <td>
                                        32
                                    </td>
                                    <td>
                                        20 May, 2021
                                    </td>
                                    <td>$55,100</td>
                                </tr>
                                 <!-- end -->
                            </tbody><!-- end tbody -->
                        </table> <!-- end table -->
                    </div>
                </div><!-- end card -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <select class="form-select shadow-none form-select-sm">
                            <option selected>Apr</option>
                            <option value="1">Mar</option>
                            <option value="2">Feb</option>
                            <option value="3">Jan</option>
                        </select>
                    </div>
                    <h4 class="card-title mb-4">Monthly Earnings</h4>
                    
                    <div class="row">
                        <div class="col-4">
                            <div class="text-center mt-4">
                                <h5>3475</h5>
                                <p class="mb-2 text-truncate">Market Place</p>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-4">
                            <div class="text-center mt-4">
                                <h5>458</h5>
                                <p class="mb-2 text-truncate">Last Week</p>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-4">
                            <div class="text-center mt-4">
                                <h5>9062</h5>
                                <p class="mb-2 text-truncate">Last Month</p>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mt-4">
                        <div id="donut-chart" class="apex-charts"></div>
                    </div>
                </div>
            </div><!-- end card -->
        </div><!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container-fluid -->



@endsection
@section('footer')

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}

{{-- <script src="{{ asset('js/chart.min.js') }}"></script>
<script src="{{ asset('js/dist-chart.min.js') }}"></script> --}}

{{-- <script>
    var xmlhttp = new XMLHttpRequest();
    var url = "{{ route('per.getbar') }}";
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var datas = JSON.parse(this.responseText);
            // console.log(datas);
            label = datas.chartData_dataset.map(function(e) {
                return e.label;
            });
            // console.log(label);
            count = datas.chartData_dataset.map(function(e) {
                return e.count;
            });
            // console.log(count);
            label_week = datas.chartData_dataset_week.map(function(e) {
                return e.label_week;
            });
            console.log(label_week);
            count_week = datas.chartData_dataset_week.map(function(e) {
                return e.count_week;
            });
            console.log(count_week);
            // setup 
            const data = {
                labels: label ,
                datasets: [                        
                {
                    label: ['จำนวนคนที่มาย้อนหลัง 1 สัปดาห์'],
                    data: count_week,
                    backgroundColor: [
                        'rgba(255, 26, 104, 0.2)'
                        // 'rgba(54, 162, 235, 0.2)',
                        // 'rgba(255, 206, 86, 0.2)',
                        // 'rgba(75, 192, 192, 0.2)',
                        // 'rgba(153, 102, 255, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)',
                        // 'rgba(155, 26, 104, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 26, 104, 1)'
                        // 'rgba(54, 162, 235, 1)',
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)',
                        // 'rgba(155, 26, 104, 1)'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.9 // ตัวนี้จะเป็นขนาดความกว้างของ bar =.ถ้าปิดตัวนี้ bar จะใหญ่ขึ้น 
                },
                {
                    label: ['จำนวนคนที่มาย้อนหลัง 1 เดือน'],
                    data: count,
                    backgroundColor: [
                        // 'rgba(255, 26, 104, 0.5)',
                        'rgba(54, 162, 235, 0.5)'
                        // 'rgba(255, 206, 86, 0.5)',
                        // 'rgba(75, 192, 192, 0.5)',
                        // 'rgba(153, 102, 255, 0.5)',
                        // 'rgba(255, 159, 64, 0.5)',
                        // 'rgba(155, 26, 104, 0.2)'
                    ],
                    borderColor: [
                        // 'rgba(255, 26, 104, 1)',
                        'rgba(54, 162, 235, 1)'
                        // 'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)',
                        // 'rgba(155, 26, 104, 1)'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.9 // ตัวนี้จะเป็นขนาดความกว้างของ bar =.ถ้าปิดตัวนี้ bar จะใหญ่ขึ้น
                }
            ]
            };

            // config 
            const config = {
                type: 'bar',
                data,
                options: {
                    indexAxis: 'y',
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // render init block
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );

        }
    }
</script> --}}
 
@endsection
