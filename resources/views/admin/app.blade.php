<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description"
        content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular." />
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:site" content="@pratikborsadiya" />
    <meta property="twitter:creator" content="@pratikborsadiya" />
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Vali Admin" />
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme" />
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin" />
    <meta property="og:image" content="../blog/vali-admin/hero-social.png" />
    <meta property="og:description"
        content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular." />
    <title>Administrator</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('./public/backend/assets/css/main.css') }}" />

    <!-- Index CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('./public/backend/assets/css/index.css') }}" />

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('./public/backend/assets/css/font-awesome/4.7.0/css/font-awesome.min.css') }}" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- flatpickr datetimepicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.js"
        integrity="sha512-tYefFVRPVQIZMI0CqDcVLTti7ajlO/l9qk1s8eswWduldmconu2sKCdYQOTRkn/f2k3eupgRbFzf55bM2moH8Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Thống kê Moris Chart -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

</head>

<body class="app sidebar-mini rtl">
    <!-- Header -->
    @include('admin.template.layout.header')

    <!-- Menu -->
    @include('admin.template.layout.menu')
    <main class="app-content">
        <!-- Breadcrumb -->
        @include('admin.template.layout.breadcrumb')
        @if($ProfileComposer['com'] == 'admin.index')
            @include('admin.template.dashboard.index')
        @endif
        <!-- Yield content-->
        @yield('content')
    </main>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('public/backend/assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{  asset('public/backend/assets/js/plugins/pace.min.js')}}"></script>
    <script src="{{ asset('public/backend/assets/js/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        if($('#cke_content').length){
            CKEDITOR.replace("cke_content");
            CKEDITOR.replace("cke_desc");
        }

    </script>

    <!-- Data table plugin-->
    <script type="text/javascript" src="{{asset('public/backend/assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        $("#sampleTable").DataTable();
    </script>

    <!-- toast -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- pusher -->
    <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>

    <!-- flatpickr datetimepicker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        let optional_config = {
            dateFormat: "Y-m-d ",
        }
        $(".thongke-datetimepicker").flatpickr(optional_config);
        $(".thongke-datetimepicker").flatpickr(optional_config);
        $(".end_date_flatpickr").flatpickr(optional_config);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                name: 'Inflation',
                data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function (val) {
                    return val + "vnđ";
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function (val) {
                        return val + "vnđ";
                    }
                }

            },
            title: {
                text: 'Thống kê doanh thu',
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#444'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#revenueFilterByDateChart"), options);
        chart.render()

        $('#thongke-larapexchart').click(function() {
            var tungay = $('.tungay_flatpickr').val();
            var denngay = $('.denngay_flatpickr').val();


            $.getJSON('http://127.0.0.1:8000/admin/filter-by-date',
            {
                tungay: tungay,
                denngay: denngay,
            }, function(response) {
                console.log(response);
                // chart.updateSeries([{
                //     name: 'Doanh thu',
                //     data: response
                // }]);
                chart.updateOptions({
                    series: [{
                        data: response.total_price
                    }],
                    xaxis: {
                        position: 'bottom',
                        categories:response.date
                    },
                    title: {
                        text: 'Thống kê doanh thu từ '+response.tungay+' đến '+response.denngay,
                    }
                });
            });

        });
    </script>
</body>

</html>
