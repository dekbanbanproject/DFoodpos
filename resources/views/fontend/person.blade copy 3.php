@extends('layouts.admin')

@section('content')
<?php  
    
          use App\Http\Controllers\StaticController;   
        //   $count_type = StaticController::count_type();
    ?>
<style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .chartMenu {
            width: 100vw;
            height: 40px;
            background: #1A1A1A;
            color: rgba(255, 26, 104, 1);
        }

        .chartMenu p {
            padding: 10px;
            font-size: 20px;
        }

        .chartCard {
            width: 100vw;
            height: calc(100vh - 40px);
            background: rgba(255, 26, 104, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chartBox {
            width: 700px;
            padding: 20px;
            border-radius: 20px;
            border: solid 3px rgba(255, 26, 104, 1);
            background: white;
        }
</style>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Dashboard') }}
                        <a class="btn btn-primary" href="{{ URL::to('employee/pdf') }}" target="_blank">Export to DOMPDF</a>
                        <a class="btn btn-danger" href="{{ URL::to('employee/fpdi') }}" target="_blank">Export to FPDI</a>
                        <a class="btn btn-success" href="{{ URL::to('showperson') }}" target="_blank">Test Person</a>
                        <button class="btn btn-primary" type="button" id="btn-click">
                            ทดสอบ Sweetalert2
                        </button>
                    </div>

                    <div class="card-body">
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <h6 class="mb-0 text-uppercase">Donut Chart</h6>
                                <hr />
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-container-fluid">                                         
                                                <div class="row">
                                                    @foreach ($types as $items) 
                                                    <div class="col-6 col-md-4 col-xl-2 mt-3" >  
                                                        <div class="card">
                                                            <div class="card-body shadow-lg">          
                                                                <a href="" class="nav-link text-dark text-center"> 
                                                                <label for="" class="mt-2">{{$items->name}}</label>
                                                                <br>
                                                                <label for="" class="mt-2">{{(StaticController::count_type($items->pttype))}}</label>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  --}}

                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="mb-0 text-uppercase">Donut Chart</h6>
                                <hr />
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-container-fluid">
                                            <canvas id="chart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <h6 class="mb-0 text-uppercase">Bar Chart</h6>
                                <hr />
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-container-fluid">
                                            <canvas id="chart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <h6 class="mb-0 text-uppercase">Line Chart</h6>
                                <hr />
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-container-fluid">
                                            <canvas id="chart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-md-12 ">
                                <h6 class="mb-0 text-uppercase">Bar Chart </h6>
                                <hr />
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-container-fluid">
                                            <canvas id="chart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="mb-0 text-uppercase">Donut Chart</h6>
                                <hr />
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-container-fluid">                                         
                                                <div class="row">
                                                    {{-- @foreach ($types as $items) 
                                                    <div class="col-6 col-md-4 col-xl-2 mt-3" >  
                                                        <div class="card">
                                                            <div class="card-body shadow-lg">          
                                                                <a href="" class="nav-link text-dark text-center"> 
                                                                <label for="" class="mt-2">{{$items->name}}</label>
                                                                <br>
                                                                <label for="" class="mt-2">{{(StaticController::count_type($items->pttype))}}</label>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach --}}
                                                    <table class="table table-hover table-bordered table-sm myTable " style="width: 100%;" id="example"> 
                                                        <thead>
                                                            <tr height="10px">
                                                                <th width="7%">ลำดับ</th>
                                                                <th width="10%">รหัสสิทธิ์</th>
                                                                <th width="10%">ชื่อสิทธิ์</th> 
                                                                <th width="15%">จำนวน</th> 
                                                            </tr>  
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1; ?>
                                                            @foreach ($types as $items)  
                                                                <tr>
                                                                    <td class="text-center" width="10%">{{ $i++ }}</td>
                                                                    <td class="p-2" width="20%">{{$items->pttype}}</td>
                                                                    <td class="p-2">{{$items->name}}</td>
                                                                    <td class="text-center" width="10%">{{(StaticController::count_type($items->pttype))}}</td>
                                                                </tr>
                                                            @endforeach
                                                </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!--end row-->


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/dist-chart.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#example').DataTable();
            $('#example2').DataTable();
            $('#example3').DataTable();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btn-click').click(function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            });


            let myChart = document.getElementById('chart1');
            let massPopChart = new Chart(myChart, {
                type: 'doughnut',
                // data: data,
                data: {
                    labels: ['red', 'orange', 'yellow', 'green', 'blue'],
                    datasets: [{
                        label: 'polarArea',
                        data: [
                            <?php echo $count_a7?>,
                            923541,
                            123214,
                            423622,
                            525646
                        ],
                        backgroundColor: [
                            'rgba(255,62,132,0.6)',
                            'rgba(55,96,62,0.6)',
                            'rgba(275,185,52,0.6)',
                            'rgba(54, 148, 210 )',
                            'rgba(255,4,64,0.6)',
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Polar Area Chart'
                        }
                    }
                },
            });

            let myChart2 = document.getElementById('chart2');
            let bubbleChart = new Chart(myChart2, {
                type: 'bar',
                // data: data,
                data: {
                    labels: ['red', 'orange', 'yellow', 'green', 'blue'],
                    datasets: [{
                        label: 'barchart',
                        borderColor: '#FC1B71',
                        borderWidth: 1,
                        radius: 0,
                        data: [
                            522135,
                            923541,
                            123214,
                            423622,
                            212556
                        ],
                        backgroundColor: [
                            'rgba(255,62,132,0.6)',
                            'rgba(55,96,62,0.6)',
                            'rgba(275,185,52,0.6)',
                            'rgba(55,135,10,0.6)',
                            'rgba(247, 22, 49)',
                        ],
                        barPercentage:0.5  // ตัวนี้จะเป็นขนาดความกว้างของ bar =.ถ้าปิดตัวนี้ bar จะใหญ่ขึ้น

                    }]
                },
                options: {
                    responsive: true,
                    interaction: {
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Bar Chart'
                        }
                    }
                }
            })

            let myChart3 = document.getElementById('chart3');
            let lineChart = new Chart(myChart3, {
                type: 'line',
                // data: data,
                data: {
                    labels: ['red', 'orange', 'yellow', 'green', 'blue'],
                    datasets: [{
                        label: 'linechart',
                        borderColor: '#FC1B71',
                        // borderWidth: 1,
                        fill: false,
                        data: [
                            522135,
                            923541,
                            123214,
                            423622,
                            212556
                        ],
                        backgroundColor: [
                            'rgba(255,62,132,0.6)',
                            'rgba(55,96,62,0.6)',
                            'rgba(275,185,52,0.6)',
                            'rgba(55,135,10,0.6)',
                            'rgba(255,4,64,0.6)',
                        ]

                    }]
                },
                options: {
                    responsive: true,
                    interaction: {
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Bar Chart'
                        }
                    }
                }
            })

        });
    </script>
    <script>
        const data = {
            labels: ['ประกันสังคม(รพ.ชัยภูมิ)', 'Covid19', 'CI UC Co-vid', 'ประกันสังคม(ตรวจสุขภาพ)', 'พรบ.ข้าราชการ อปท.', 'บัตรทอง(ตรวจสุขภาพ)'],
                datasets: [{
                    label: 'จำนวน', 
                    data: [
                        <?php echo $count_a7?>,
                        <?php echo $count_co?>,
                        <?php echo $count_CI?>,
                        <?php echo $count_C4?>,
                        <?php echo $count_39?>,
                        <?php echo $count_C2?>,
                    ],
                    // data: [
                    // ['2022-02-01','2022-02-03'],
                    // ['2022-02-03','2022-02-06'],
                    // ['2022-02-06','2022-02-07'],
                    // ['2022-02-07','2022-02-10'],
                    // ['2022-02-10','2022-02-14'],
                    // ['2022-02-14','2022-02-20'],
                    // ['2022-02-20','2022-02-22']
                // ],
                    backgroundColor: [
                        'rgba(255, 26, 104, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        
                        'rgba(0, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 26, 104, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(0, 0, 0, 1)'
                    ],
                    borderWidth: 1,  // ตัวนี้จะเป็นเส้นขอบ bar
                    barPercentage:0.4  // ตัวนี้จะเป็นขนาดความกว้างของ bar =.ถ้าปิดตัวนี้ bar จะใหญ่ขึ้น
                }]
            };
            // config 
            const config = {
                type: 'bar',
                data,
                options: {
                    //ถ้าเพิ่มตัวนี้จะเป็นลายนอน
                    indexAxis:'y', 
                    scales: {
                    // x:{
                    //     min: '2022-02-01',
                    //     type:'time',
                    //     time:{
                    //         unit:'day'
                    //     }
                    // },
                    y: {
                        beginAtZero: true
                    }
                }
                }
            };
            // render init block
            const myChart = new Chart(
                document.getElementById('chart4'),
                config
            );

    </script>

{{-- <script>
    const data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Weekly Sales',
                data: [18, 12, 6, 9, 12, 3, 9],
                backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 0, 0, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 0, 0, 1)'
                ],
                borderWidth: 1,  // ตัวนี้จะเป็นเส้นขอบ bar
                barPercentage:0.3  // ตัวนี้จะเป็นขนาดความกว้างของ bar =.ถ้าปิดตัวนี้ bar จะใหญ่ขึ้น
            }]
        };
        // config 
        const config = {
            type: 'bar',
            data,
            options: {
                //ถ้าเพิ่มตัวนี้จะเป็นลายนอน
                indexAxis:'y', 
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        // render init block
        const myChart = new Chart(
            document.getElementById('chart4'),
            config
        );

</script> --}}
@endsection
