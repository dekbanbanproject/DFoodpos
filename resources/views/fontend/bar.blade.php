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
                        <button class="btn btn-primary" type="button" id="btn-click">
                            ทดสอบ Sweetalert2
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <h6 class="mb-0 text-uppercase">Bar Chart </h6>
                                <hr />
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="chart-container-fluid">
                                            <canvas id="myChart" width="800" height="1200"></canvas>
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
        });
    </script>

    <script>
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
    </script>
@endsection
