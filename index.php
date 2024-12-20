<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style type="text/css">
	
</style>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="images/bfs1.jpg" alt="First slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/bfs2.jpg" alt="Second slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/bfs3.jpg" alt="Third slide">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>

	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>

	    <div class="row">
      <div class="col-2">
        <h1><b>Embrace Yourself With A New Style!</b></h1>
        <p>Fashion isn't always about what your wear. It's about how you express yourself.</p>
        <a href="category.php?category=best" style="display: inline-block;
	background:#d14b1b;
	color: #fff;
	padding: 8px 30px;
	margin: 30px 0;
	border-radius: 30px;
	transition: background 0.5s;
	">Explore Now &#8594; </a>
      </div>
	 
	    </div>
	  </div>

  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>