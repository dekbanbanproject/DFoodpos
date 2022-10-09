@extends('layouts.admin')

@section('content')
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

    <div class="container">
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
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="mb-0 text-uppercase">Donut Chart</h6>
                                <hr />
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-container">
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
                                        <div class="chart-container">
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
                                        <div class="chart-container">
                                            <canvas id="chart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-md-12 ">
                                <h6 class="mb-0 text-uppercase">Bar Chart</h6>
                                <hr />
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-container">
                                            <canvas id="chart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-md-12 ">
                                <h6 class="mb-0 text-uppercase">Bar Chart</h6>
                                <hr />
                                <div class="card">
                                    <div class="card-body">
                                        <div class="chart-container">
                                            <canvas id="chart5"></canvas>
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
                            522315,
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
                    // indexAxis:'y', ถ้าเพิ่มตัวนี้จะเป็นลายนอน
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

    </script>

<script>
    const data2 = {
            labels: ['ประกันสังคม', 'อปท', 'ราชการ', 'บัตรทอง', 'ผู้สูงอายุ', 'ต่างด้าว'],
            datasets: [{
                label: 'Weekly Sales',
                data: [
                    ['2022-01-01','2022-01-03'],
                    ['2022-01-05','2022-01-08'],
                    ['2022-01-09','2022-01-12'],
                    ['2022-01-13','2022-01-15'],
                    ['2022-01-17','2022-01-19'],
                    ['2022-01-20','2022-01-25']
                ],
                backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(0, 0, 0, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(0, 0, 0, 1)'
                ],
                // borderWidth: 1,  // ตัวนี้จะเป็นเส้นขอบ bar
                barPercentage:0.3  // ตัวนี้จะเป็นขนาดความกว้างของ bar =.ถ้าปิดตัวนี้ bar จะใหญ่ขึ้น
            }]
        };
        // config 
        const config = {
            type: 'bar',
            data,
            options: {
                indexAxis:'y', //ถ้าเพิ่มตัวนี้จะเป็นลายนอน
                scales: {
                    x:{
                        type:'time',
                        time:{
                            unit:'day'
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        // render init block
        const myChart5 = new Chart(
            document.getElementById('chart5'),
            config
        );

</script>
@endsection
