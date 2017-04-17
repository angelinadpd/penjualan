<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Politeknik Negeri Padang</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('vendors/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('vendors/css/sb-admin.css')}}" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="{{ asset('vendors/css/plugins/morris.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/layouts.app')}}">Politeknik Negeri Padang</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                    <li class="divider"></li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{{ url('/home') }}"><i class="fa fa-fw fa-home"></i> Home </a>
                    </li>
                     <li>
                        <a href="{{ route('barangs.index') }}"><i class="fa fa-fw fa-wrench"></i> Barang </a>
                    </li>
                    <li>
                        <a href="{{ route('pembelis.index') }}"><i class="fa fa-fw fa-users"></i> Pembeli </a>
                    </li>
                    <li>
                        <a href="{{ route('suppliers.index') }}"><i class="fa fa-fw fa-user"></i> Supplier </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-edit"></i> Transaksi <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li><a href="{{route('pesans.index')}}"><i class="fa fa-circle-o"> Pemesanan </i></a></li>
                            <li><a href="{{route('realisasis.index')}}"><i class="fa fa-circle-o"> Realisasi Pemesanan </i></a></li>
                            <li><a href="{{route('penjualans.index')}}"><i class="fa fa-circle-o"> Penjualan </i></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/laporans.default') }}"><i class="fa fa-fw fa-book"></i> Laporan </a>
                    </li>                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


        <div id="page-wrapper">
            <div class="container-fluid">
                       
                        <!-- /.row -->
                        <div class="panel-body">                                
                            @yield('content')                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- jQuery -->
    <script src="{{ asset('vendors/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/js/bootstrap.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('vendors/js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('vendors/js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('vendors/js/plugins/morris/morris-data.js') }}"></script>
    <script src="{{ asset('vendors/js/bootbox.min.js') }}"></script>

<!-- MODAL UNTUK MESSAGE CONFIRMATION -->
<!--     <script>
        $(document).ready(function () {
            $(tabelbarang).dataTable();
        });
    </script> -->
    <script>
        $(document).on("click", "#alertHapus", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            bootbox.confirm("Anda yakin ingin menghapus data ini ?", function(confirmed){
                if (confirmed) {
                    window.location.href = link; 
                };
            });
        });
    </script>
</body>

</html>
