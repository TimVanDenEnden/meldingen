<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Meldingen</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ SiteURL }}frontend/assets/images/favicon.jpg" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ SiteURL }}frontend/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Jquery Core Js -->
    <script src="{{ SiteURL }}frontend/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Waves Effect Css -->
    <link href="{{ SiteURL }}frontend/assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!--WaitMe Css-->
    <link href="{{ SiteURL }}frontend/assets/plugins/waitme/waitMe.css" rel="stylesheet" />

        <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ SiteURL }}frontend/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ SiteURL }}frontend/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ SiteURL }}frontend/assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ SiteURL }}frontend/assets/css/style.css" rel="stylesheet">
    <link href="{{ SiteURL }}frontend/assets/css/meldingen.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ SiteURL }}frontend/assets/css/themes/all-themes.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.4.4/sweetalert2.min.css">

    <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.4/sweetalert2.min.js"></script>

</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <section style="display: none">
        <aside id="leftsidebar" class="sidebar">
            <div class="menu">
                <ul class="list">
                    <li class="header active"></li>
                </ul>
            </div>
        </aside>
    </section>
    <section class="content">
		{{ CONTENT | raw }}
    </section>
    <script>
        $('.btn-toggle').click(function() {
            $(this).find('.btn').toggleClass('active');  
            
            if ($(this).find('.btn-primary').size()>0) {
                $(this).find('.btn').toggleClass('btn-primary');
            }
            if ($(this).find('.btn-danger').size()>0) {
                $(this).find('.btn').toggleClass('btn-danger');
            }
            if ($(this).find('.btn-success').size()>0) {
                $(this).find('.btn').toggleClass('btn-success');
            }
            if ($(this).find('.btn-info').size()>0) {
                $(this).find('.btn').toggleClass('btn-info');
            }
            
            $(this).find('.btn').toggleClass('btn-default');
               
        });
    </script>

    <!-- Bootstrap Core Js -->
    <script src="{{ SiteURL }}frontend/assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{ SiteURL }}frontend/assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ SiteURL }}frontend/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Autosize Plugin Js -->
    <script src="{{ SiteURL }}frontend/assets/plugins/autosize/autosize.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ SiteURL }}frontend/assets/plugins/node-waves/waves.js"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ SiteURL }}frontend/assets/plugins/momentjs/moment.js"></script>

    <!-- Wait Me Plugin Js -->
    <script src="{{ SiteURL }}frontend/assets/plugins/waitme/waitMe.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ SiteURL }}frontend/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="{{ SiteURL }}frontend/assets/js/admin.js"></script>
    <script src="{{ SiteURL }}frontend/assets/js/pages/cards/basic.js"></script>
    <script src="{{ SiteURL }}frontend/assets/js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="{{ SiteURL }}frontend/assets/js/demo.js"></script>
</body>
</html>