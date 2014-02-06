<html>
<head profile="http://gmpg.org/xfn/11">
<title>PlusBusiness | Style Demo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="scripts/jquery.jcarousel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.lightbox_me.js"></script>
</head>
<body id="top">
<!-- ####################################################################################################### -->
<div class="wrapper col1">

  <div id="header">
    <div id="logo">
      <h1><a href="#">+Business</a></h1>
      <p>Free CSS Website Template</p>
    </div>
    <div id="topnav">
      <ul>
        <li class="<?php if($page=='Home'){echo 'active';}?>"><a href="index.php">Home</a></li>
        <li class="<?php if($page=='Style Demo'){echo 'active';}?>"><a href="style-demo.html">Style Demo</a></li>
        <li class="<?php if($page=='Full Width'){echo 'active';}?>"><a href="full-width.html">Full Width</a></li>
          <?php if(!isset($_SESSION['USERNAME'])){$temp1='login.php';
		  $temp2='Login';
		  $temp3='register.php';
		  $temp4='Signup';
		  $temp5='Login/Signup';}
			else{$temp1='logout.php';
		  $temp2='Logout';
		  $temp3='profile.php';
		  $temp4='My Profile';
		  $temp5='My Account';}
		  ?>
        <li><a href="#"><?php echo $temp5?></a>
          <ul>
        
            
            <li><a href="<?php echo $temp1?> "> <?php echo $temp2?> </a></li>
            <li><a href="<?php echo $temp3?> "> <?php echo $temp4?></a></li>
          </ul>
        </li>
      
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<div class="wrapper col3">
 <div id="container"  width="20%">
  <div id="content">
