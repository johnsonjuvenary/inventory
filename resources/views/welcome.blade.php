<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="backend/img/logo/logo.png" rel="icon">
    <title>RuangAdmin - Dashboard</title>
    <link rel="stylesheet" href="css/app.css">
    <link href="backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="backend/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="app">
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar"
                v-show="$route.path === '/' || $route.path === '/register'  || $route.path === '/forget' ? false : true"
                style="display: none;">
                @include('includes.sidebar')
            </div>
            <!-- Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- TopBar -->
                    <div id="topbar"
                        v-show="$route.path === '/' || $route.path === '/register'  || $route.path === '/forget' ? false : true"
                        style="display: none;">
                        @include('includes.topnav')
                    </div>
                    <!-- Topbar -->
                    <!-- Container Fluid-->
                    <div class="container-fluid" id="container-wrapper">
                        <router-view></router-view>
                    </div>
                    <!---Container Fluid-->
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="js/app.js"></script>
    <script src="backend/vendor/jquery/jquery.min.js"></script>
    <script src="backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="backend/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="backend/js/ruang-admin.min.js"></script>
    <script src="backend/vendor/chart.js/Chart.min.js"></script>
    <script src="backend/js/demo/chart-area-demo.js"></script>
    <script>
        const token = localStorage.getItem('token')
        if(token){
            $('#sidebar').css('display','')
            $('#topbar').css('display','')
        }
    </script>
</body>

</html>
