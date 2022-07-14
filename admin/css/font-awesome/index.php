<!DOCTYPE html>
<html>
    <head>
        <title>Online hotel reservation</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="Book hotels online for travellers, trip, tourism...">

        <link rel="stylesheet" type="text/css" href="/hotel/css/stylesheet/all.css">
        <link rel="stylesheet" type="text/css" href="/hotel/css/stylesheet/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/hotel/css/stylesheet/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/hotel/css/stylesheet/style.css">
    	<style type="text/css">
    		.container-fluid{
    			padding: 0px;
    		}
    		.side-navbar{
    			position: absolute;
    			height: auto;
    			width: 25%;
    			height: 100%;
    			display: inline-block;
    			padding: 7px;
    			background: #060a00;
    		}
    		.side-navbar .side-navbar-brand{
    			padding: 7px 2px;
    			font-weight: 700;
    			font-size: 19px;
    			border-bottom: 2px solid #aaa;
    		}
    		.side-navbar-nav .nav-item{
    			padding: 7px 12px;
    			font-size: 18px;
    			color: white;
    			display: block;
    		}
    		.icon{
    			background: transparent;
    		}
    		.side-navbar-nav .nav-item:hover{
    			background: #1a1414;
    		}
    		.main{
    			display: inline-block;
    			width: 74%;
    			margin-left: 26%;
    			padding: 5px;
    		}
    		.bill-block{
    			padding: 7px;
    			border-radius: 5px;
    			margin: 10px 2px;
    		}
    		.bill-block .bill-count{
    			font-size: 2.9em;
    			font-weight: bold;
    			padding: 7px;
    		}
    		.bill-block .bill-text{
    			font-size: 1.5em;
    			padding: 7px;
    		}
    		.abs-dropdown .dropdown-toggler{
    			cursor: pointer;
    		}
    		.abs-dropdown .abs-dropdown-menu{
    			display: none;
    			padding: 7px;
    			width: inherit;
    			margin-left: 1em;
    			border: 1px solid #555;
    		}
    	</style>
    </head>
    <body>
    	<div class="container-fluid">
    		<?php include "includes/header.php"; ?>
    		<div class="main">
    			<div class="abs-navbar">
    				<div class="abs-navbar-nav">
                        <h4 class="text-left">DASHBOARD</h4>
                    </div>
    				<div class="abs-navbar-nav text-right">
	                    <a href="" class="abs-nav-item"><i class="fa fa-user fa-lg"></i> Login</a>
	                </div>
    			</div>
    			<div class="row">
    				<div class="col-md-6 col-lg-4">
    					<div class="bill-block bg-danger text-center">
    						<div class="bill-count text-white">45</div>
    						<div class="bill-text">Total Reservation</div>
    					</div>
    				</div> 
    				<div class="col-md-6 col-lg-4">
    					<div class="bill-block bg-danger text-center">
    						<div class="bill-count text-white">45</div>
    						<div class="bill-text">Total Reservation</div>
    					</div>
    				</div> 
    				<div class="col-md-6 col-lg-4">
    					<div class="bill-block bg-danger text-center">
    						<div class="bill-count text-white">45</div>
    						<div class="bill-text">Total Reservation</div>
    					</div>
    				</div> 
    			</div>
    		</div>
    	</div>
    	<input type="text" id="text">
    	<input type="color" id="color">
    	<script type="text/javascript" src="script/js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="script/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="script/js/custom.js"></script>
         <script type="text/javascript" src="script/js/color.js"></script>
    </body>
  </html>