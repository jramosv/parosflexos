<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>PAROS</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
	<link href="{{asset('/css/app.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/material-kit.css')}}" rel="stylesheet"/>
    <link href="{{asset('/css/topbutton.css')}}" rel="stylesheet"/>
	

</head>

<body class="profile-page">
	<nav class="navbar navbar-danger navbar-fixed-top navbar-color-on-scroll">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button src="img/carlogo.png" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<img src="img/carlogo.png">
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
					
        		</ul>
        	</div>
    	</div>
    </nav>

    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('/img/LogoCartonesWeb.jpg');"></div>

		<div class="main main-raised">
			<div class="profile-content">
	            <div class="container">
	                <div class="row">
	                    <div class="profile">
	                        <div class="avatar">
	                            <img src="/img/clogo.png" alt="Circle Image" class="img-circle img-responsive img-raised">
	                        </div>
	                        <div class="name">
	                            <h3 class="title">Sistema de Flexos</h3>
								<h6>Paros</h6>
	                        </div>
	                    </div>
	                </div>
	                <div class="description text-center">
                        <p><button onclick="topFunction()" id="myBtn" title="Go to top">Subir</button> </p>
	                </div>

					<div class="row">
						<div>
							@yield('contenido')
						</div>
	                </div>

	            </div>
	        </div>
		</div>

    </div>
    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
				<ul>
					<li>
						<b>Copyright © 2017 Cartones de Guatemala S.A.</b>
					</li>
				
				</ul>
            </nav>
            <div class="copyright pull-right">
               <b>Departamento de Informática y Tecnología</b>
            </div>
        </div>
    </footer>


</body>


	<!--   Core JS Files   -->
	<script src="{{asset('/js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('/js/material.min.js')}}" ></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="{{asset('/js/nouislider.min.js')}}" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="{{asset('/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="{{asset('/js/material-kit.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/topbutton.js')}}" type="text/javascript"></script>
	<!--   Datatables   -->
	 <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	@stack('scripts')
    

</html>
