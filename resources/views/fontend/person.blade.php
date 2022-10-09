@extends('layouts.admin')

@section('content')
    <script>
        function TypeAdmin() {
            window.location.href = '{{ route('index') }}';
        }
    </script>
    <?php
    if (Auth::check()) {
        $type = Auth::user()->type;
        $iduser = Auth::user()->id;
    } else {
        echo "<body onload=\"TypeAdmin()\"></body>";
        exit();
    }
    
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
                        <a class="btn btn-warning" href="{{ URL::to('bar') }}" target="_blank">Test Bar</a>
                        <a class="btn btn-info" href="{{ URL::to('line') }}" target="_blank">Test Line</a>
                        <button class="btn btn-primary" type="button" id="btn-click">
                            ทดสอบ Sweetalert2
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0 text-uppercase">Donut Chart</h6>
                                <hr />
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="chart-container-fluid">
                                            <canvas id="chart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <h6 class="mb-0 text-uppercase">Bar Chart</h6>
                                        <hr />
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="chart-container-fluid">
                                                    <canvas id="chart2"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h6 class="mb-0 text-uppercase">Line Chart</h6>
                                        <hr />
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="chart-container-fluid">
                                                    <canvas id="chart3"></canvas>
                                                </div>
                                            </div>
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
                                <div class="card shadow">
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
                            <div class="col-md-12 ">
                                <h6 class="mb-0 text-uppercase">Bar Chart ประกัน</h6>
                                <hr />
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="chart-container-fluid">
                                            <canvas id="chart7" width="400" height="400"></canvas>
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
                                                <table class="table table-hover table-bordered table-sm myTable "
                                                    style="width: 100%;" id="example">
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
                                                                <td class="text-center" width="10%">{{ $i++ }}
                                                                </td>
                                                                <td class="p-2" width="20%">{{ $items->pttype }}</td>
                                                                <td class="p-2">{{ $items->name }}</td>
                                                                <td class="text-center" width="10%">
                                                                    {{ StaticController::count_type($items->pttype) }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                        {{-- // const cData = JSON.parse(<?php echo $data; ?>) --}}
                        {{-- // const cData = JSON.parse(<?php echo $data; ?>) 
                        console.log(cData); --}}
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
        });
    </script>

    <script>
         var _labels = {!! json_encode($chartData_name) !!};
        var _datacount = {!! json_encode($chartData) !!};

        
        let myChart = document.getElementById('chart1');
        let massPopChart = new Chart(myChart, {
            type: 'doughnut',
            // data: data,
            data: {
                labels: [
                'ประกันสังคม(รพ.ชัยภูมิ)', 'Covid19', 'CI UC Co-vid', 'ประกันสังคม(ตรวจสุขภาพ)','พรบ.ข้าราชการ อปท.',
                'บัตรทอง(ตรวจสุขภาพ)', 'ประกันสังคม กรณีทุพลภาพ', 'ต่างด้าวขึ้นทะเบียน',
                'ประกันสังคมฉุกเฉิน รพ.อื่น', 'ประกันสังคม(ชำระเงิน)',
                'ประกันสังคมฉุกเฉินน้ำท่วม', 'บัตรทองฉุกเฉินน้ำท่วม', 'ค/ค ข้าราชการ',
                'ข้าราชการส่วนท้องถิ่น(ชำระเงิน)', 'รัฐวิสาหกิจ', 'ครูเอกชน',
                'ข้าราชการ กทม.', 'บัตรทอง(บัตรหมดอายุ ส่งพบประกัน)', 'พรบ.คปภ', 'ประกันสังคม(อุบัติเหตุจราจร)',
                'บัตรทอง(อุบัติเหตุจราจร)',
                'ประกันสังคมเจ็บป่วยทั่วไป รพ.อื่น', 'กองทุนทดแทน', 'พรบ.บัตรทอง', 'พรบ.ประกันสังคม',
                'พรบ.ข้าราชการจ่ายตรง', 'พรบ.ข้าราชการ อปท.',
                'สังคมสงเคราะห์'
            ],
                datasets: [{
                    label: 'polarArea',
                    data: [
                    <?php echo $count_a7; ?>, <?php echo $count_co; ?>, <?php echo $count_CI; ?>, <?php echo $count_C4; ?>,
                    <?php echo $count_39; ?>,
                    <?php echo $count_C2; ?>, <?php echo $count_06; ?>, <?php echo $count_13; ?>, <?php echo $count_14; ?>,
                    <?php echo $count_15; ?>,
                    <?php echo $count_17; ?>, <?php echo $count_18; ?>, <?php echo $count_20; ?>, <?php echo $count_21; ?>,
                    <?php echo $count_22; ?>,
                    <?php echo $count_24; ?>, <?php echo $count_25; ?>, <?php echo $count_30; ?>, <?php echo $count_31; ?>,
                    <?php echo $count_32; ?>,
                    <?php echo $count_33; ?>, <?php echo $count_34; ?>, <?php echo $count_35; ?>, <?php echo $count_36; ?>,
                    <?php echo $count_37; ?>,
                    <?php echo $count_38; ?>, <?php echo $count_39; ?>, <?php echo $count_40; ?>
                ],
                backgroundColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(22, 141, 247, 1)',
                    'rgba(22, 247, 247, 1)',
                    'rgba(22, 247, 100, 1)',
                    'rgba(56, 220, 4, 1)',
                    'rgba(243, 240, 8, 1)',
                    'rgba(251, 181, 7, 1)',
                    'rgba(251, 96, 7, 1)',
                    'rgba(251, 22, 7, 1)',
                    'rgba(242, 67, 99, 1)',
                    'rgba(236, 14, 213, 1)',
                    'rgba(82, 14, 236, 1)',
                    'rgba(247, 39, 231, 1)',

                    'rgba(0, 0, 0, 0.2)'
                ],
                
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
                labels: _labels,
                // labels: ['red2', 'orange2', 'yellow2', 'green2', 'blue2'],
                datasets: [{
                    label: 'barchart',
                    borderColor: '#FC1B71',
                    borderWidth: 1,
                    radius: 0,
                    data: _datacount ,
                    backgroundColor: [
                        'rgba(255,62,132,0.6)',
                        'rgba(55,96,62,0.6)',
                        'rgba(275,185,52,0.6)',
                        'rgba(55,135,10,0.6)',
                        'rgba(247, 22, 49)',
                    ],
                    barPercentage: 0.5 // ตัวนี้จะเป็นขนาดความกว้างของ bar =.ถ้าปิดตัวนี้ bar จะใหญ่ขึ้น

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
                labels: [
                'ประกันสังคม(รพ.ชัยภูมิ)', 'Covid19', 'CI UC Co-vid', 'ประกันสังคม(ตรวจสุขภาพ)','พรบ.ข้าราชการ อปท.',
                'บัตรทอง(ตรวจสุขภาพ)', 'ประกันสังคม กรณีทุพลภาพ', 'ต่างด้าวขึ้นทะเบียน',
                'ประกันสังคมฉุกเฉิน รพ.อื่น', 'ประกันสังคม(ชำระเงิน)',
                'ประกันสังคมฉุกเฉินน้ำท่วม', 'บัตรทองฉุกเฉินน้ำท่วม', 'ค/ค ข้าราชการ',
                'ข้าราชการส่วนท้องถิ่น(ชำระเงิน)', 'รัฐวิสาหกิจ', 'ครูเอกชน',
                'ข้าราชการ กทม.', 'บัตรทอง(บัตรหมดอายุ ส่งพบประกัน)', 'พรบ.คปภ', 'ประกันสังคม(อุบัติเหตุจราจร)',
                'บัตรทอง(อุบัติเหตุจราจร)',
                'ประกันสังคมเจ็บป่วยทั่วไป รพ.อื่น', 'กองทุนทดแทน', 'พรบ.บัตรทอง', 'พรบ.ประกันสังคม',
                'พรบ.ข้าราชการจ่ายตรง', 'พรบ.ข้าราชการ อปท.',
                'สังคมสงเคราะห์'
            ],
                datasets: [{
                    label: 'linechart',
                    borderColor: '#FC1B71',
                    // borderWidth: 1,
                    fill: false,
                    data: [
                    <?php echo $count_a7; ?>, <?php echo $count_co; ?>, <?php echo $count_CI; ?>, <?php echo $count_C4; ?>,
                    <?php echo $count_39; ?>,
                    <?php echo $count_C2; ?>, <?php echo $count_06; ?>, <?php echo $count_13; ?>, <?php echo $count_14; ?>,
                    <?php echo $count_15; ?>,
                    <?php echo $count_17; ?>, <?php echo $count_18; ?>, <?php echo $count_20; ?>, <?php echo $count_21; ?>,
                    <?php echo $count_22; ?>,
                    <?php echo $count_24; ?>, <?php echo $count_25; ?>, <?php echo $count_30; ?>, <?php echo $count_31; ?>,
                    <?php echo $count_32; ?>,
                    <?php echo $count_33; ?>, <?php echo $count_34; ?>, <?php echo $count_35; ?>, <?php echo $count_36; ?>,
                    <?php echo $count_37; ?>,
                    <?php echo $count_38; ?>, <?php echo $count_39; ?>, <?php echo $count_40; ?>
                ],
                backgroundColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(22, 141, 247, 1)',
                    'rgba(22, 247, 247, 1)',
                    'rgba(22, 247, 100, 1)',
                    'rgba(56, 220, 4, 1)',
                    'rgba(243, 240, 8, 1)',
                    'rgba(251, 181, 7, 1)',
                    'rgba(251, 96, 7, 1)',
                    'rgba(251, 22, 7, 1)',
                    'rgba(242, 67, 99, 1)',
                    'rgba(236, 14, 213, 1)',
                    'rgba(82, 14, 236, 1)',
                    'rgba(247, 39, 231, 1)',

                    'rgba(0, 0, 0, 0.2)'
                ],

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
    </script>

    // <script>
    //     var _labels = {!! json_encode($chartData_name) !!};
    //     var _datacount = {!! json_encode($chartData) !!};
    //     const data = {
    //         labels: _labels,
    //         datasets: [{
    //             label: 'จำนวน',
    //             data: _datacount,
    //             backgroundColor: [
    //                 'rgba(255, 26, 104, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //                 'rgba(153, 102, 255, 0.2)',
    //                 'rgba(255, 159, 64, 0.2)',
    //                 'rgba(22, 141, 247, 0.2)',
    //                 'rgba(22, 247, 247, 0.2)',
    //                 'rgba(22, 247, 100, 0.2)',
    //                 'rgba(56, 220, 4, 0.2)',
    //                 'rgba(243, 240, 8, 0.2)',
    //                 'rgba(251, 181, 7, 0.2)',
    //                 'rgba(251, 96, 7, 0.2)',
    //                 'rgba(251, 22, 7, 0.2)',
    //                 'rgba(242, 67, 99, 0.2)',
    //                 'rgba(236, 14, 213, 0.2)',
    //                 'rgba(82, 14, 236, 0.2)',
    //                 'rgba(247, 39, 231, 0.2)',

    //                 'rgba(0, 0, 0, 0.2)'
    //             ],
    //             borderColor: [
    //                 'rgba(255, 26, 104, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //                 'rgba(153, 102, 255, 1)',
    //                 'rgba(255, 159, 64, 1)',
    //                 'rgba(22, 141, 247, 1)',
    //                 'rgba(22, 247, 247, 1)',
    //                 'rgba(22, 247, 100, 1)',
    //                 'rgba(56, 220, 4, 1)',
    //                 'rgba(243, 240, 8, 1)',
    //                 'rgba(251, 181, 7, 1)',
    //                 'rgba(251, 96, 7, 1)',
    //                 'rgba(251, 22, 7, 1)',
    //                 'rgba(242, 67, 99, 1)',
    //                 'rgba(236, 14, 213, 1)',
    //                 'rgba(82, 14, 236, 1)',
    //                 'rgba(247, 39, 231, 1)',

    //                 'rgba(0, 0, 0, 1)'
    //             ],
    //             borderWidth: 1, // ตัวนี้จะเป็นเส้นขอบ bar
    //             // barPercentage: 0.9 // ตัวนี้จะเป็นขนาดความกว้างของ bar =.ถ้าปิดตัวนี้ bar จะใหญ่ขึ้น
    //         }]
    //     };
      
    //     const config = {
    //         type: 'bar',
    //         data,
    //         options: {
    //             //ถ้าเพิ่มตัวนี้จะเป็นลายนอน
    //             indexAxis: 'y',
    //             scales: {
    //                 y: {
    //                     beginAtZero: true
    //                 }
    //             }
    //         }
    //     };
    //     const myChart7 = new Chart(
    //         document.getElementById('chart7'),
    //         config
    //     );
    // </script>
    
    <script>
        const data = {
            labels: [
                'ประกันสังคม(รพ.ชัยภูมิ)', 'Covid19', 'CI UC Co-vid', 'ประกันสังคม(ตรวจสุขภาพ)','พรบ.ข้าราชการ อปท.',
                'บัตรทอง(ตรวจสุขภาพ)', 'ประกันสังคม กรณีทุพลภาพ', 'ต่างด้าวขึ้นทะเบียน',
                'ประกันสังคมฉุกเฉิน รพ.อื่น', 'ประกันสังคม(ชำระเงิน)',
                'ประกันสังคมฉุกเฉินน้ำท่วม', 'บัตรทองฉุกเฉินน้ำท่วม', 'ค/ค ข้าราชการ',
                'ข้าราชการส่วนท้องถิ่น(ชำระเงิน)', 'รัฐวิสาหกิจ', 'ครูเอกชน',
                'ข้าราชการ กทม.', 'บัตรทอง(บัตรหมดอายุ ส่งพบประกัน)', 'พรบ.คปภ', 'ประกันสังคม(อุบัติเหตุจราจร)',
                'บัตรทอง(อุบัติเหตุจราจร)',
                'ประกันสังคมเจ็บป่วยทั่วไป รพ.อื่น', 'กองทุนทดแทน', 'พรบ.บัตรทอง', 'พรบ.ประกันสังคม',
                'พรบ.ข้าราชการจ่ายตรง', 'พรบ.ข้าราชการ อปท.',
                'สังคมสงเคราะห์'
            ],
            datasets: [{
                label: 'จำนวน',
                data: [
                    <?php echo $count_a7; ?>, <?php echo $count_co; ?>, <?php echo $count_CI; ?>, <?php echo $count_C4; ?>,
                    <?php echo $count_39; ?>,
                    <?php echo $count_C2; ?>, <?php echo $count_06; ?>, <?php echo $count_13; ?>, <?php echo $count_14; ?>,
                    <?php echo $count_15; ?>,
                    <?php echo $count_17; ?>, <?php echo $count_18; ?>, <?php echo $count_20; ?>, <?php echo $count_21; ?>,
                    <?php echo $count_22; ?>,
                    <?php echo $count_24; ?>, <?php echo $count_25; ?>, <?php echo $count_30; ?>, <?php echo $count_31; ?>,
                    <?php echo $count_32; ?>,
                    <?php echo $count_33; ?>, <?php echo $count_34; ?>, <?php echo $count_35; ?>, <?php echo $count_36; ?>,
                    <?php echo $count_37; ?>,
                    <?php echo $count_38; ?>, <?php echo $count_39; ?>, <?php echo $count_40; ?>
                ],
                backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(22, 141, 247, 0.2)',
                    'rgba(22, 247, 247, 0.2)',
                    'rgba(22, 247, 100, 0.2)',
                    'rgba(56, 220, 4, 0.2)',
                    'rgba(243, 240, 8, 0.2)',
                    'rgba(251, 181, 7, 0.2)',
                    'rgba(251, 96, 7, 0.2)',
                    'rgba(251, 22, 7, 0.2)',
                    'rgba(242, 67, 99, 0.2)',
                    'rgba(236, 14, 213, 0.2)',
                    'rgba(82, 14, 236, 0.2)',
                    'rgba(247, 39, 231, 0.2)',

                    'rgba(0, 0, 0, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(22, 141, 247, 1)',
                    'rgba(22, 247, 247, 1)',
                    'rgba(22, 247, 100, 1)',
                    'rgba(56, 220, 4, 1)',
                    'rgba(243, 240, 8, 1)',
                    'rgba(251, 181, 7, 1)',
                    'rgba(251, 96, 7, 1)',
                    'rgba(251, 22, 7, 1)',
                    'rgba(242, 67, 99, 1)',
                    'rgba(236, 14, 213, 1)',
                    'rgba(82, 14, 236, 1)',
                    'rgba(247, 39, 231, 1)',

                    'rgba(0, 0, 0, 1)'
                ],
                borderWidth: 1, // ตัวนี้จะเป็นเส้นขอบ bar
                barPercentage: 0.9 // ตัวนี้จะเป็นขนาดความกว้างของ bar =.ถ้าปิดตัวนี้ bar จะใหญ่ขึ้น
               
            }]
        };
        // config 
        const config = {
            type: 'bar',
            data,
            options: {
                //ถ้าเพิ่มตัวนี้จะเป็นลายนอน
                // indexAxis: 'y',
                scales: {                    
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const myChart4 = new Chart(
            document.getElementById('chart4'),
            config
        );
    </script>
@endsection
