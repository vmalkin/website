<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dunedin Aurora - Search Form</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
include 'connect.inc.php';
include 'menu.php';
include 'searchfunctions.inc.php';
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Search Form
                    <small>Search our data</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- QA Item Row -->
        <div class="row">

            <div class="col-md-12">
			<!-- PAGE CONTENT HERE -->
			
			<?php
			$startdate = "yyyy-mm-dd";
			$enddate = "yyyy-mm-dd";
			
			// *********************
			// process button click
			// *********************
			
			if(isset($_POST['btnSearch']))
			{
				// // get data out of $_POST. Cleanup
				$startdate = cleanString($_POST['magstart']);
				$enddate = cleanString($_POST['magend']);
				$readingtype = cleanString($_POST['readingtype']);
				
				// We need to parse the results of the dates
				
				// Run the search query and display the results
				displaySearch($connection, $startdate, $enddate);
				displayResults($connection, $startdate, $enddate, $readingtype);
			}
			else
			{
				displaySearch($connection, $startdate, $enddate);
			}
			
			// ***********************************
			// UDF to to display search parameters
			// ***********************************
			function displaySearch($connection, $startdate, $enddate)
			{
				$self = htmlentities($_SERVER['PHP_SELF']); 
				// BEGIN Set up form to search for peoples
				echo("
					<form action=\"$self\" method=\"POST\">
					<fieldset>
					<legend>Enter search dates</legend>
					<p>Choose search data:
					<p>Full Field Data $nbsp <input type=\"radio\" name=\"readingtype\" value=\"DataF\" checked>
					<p>3-Axis (X,Y,Z) Data $nbsp <input type=\"radio\" name=\"readingtype\" value=\"DataXYZ\"><br>
					");
					
				
				echo("<hr>");
				// include AuroraBot's search results
				include 'searchaurorabot.php';
				
				echo("
					<p>Search from: &nbsp
					<input type=\"date\" name=\"magstart\" value=\"$startdate\" min=\"2015-04-01\">			  
					&nbsp to &nbsp
					<input type=\"date\" name=\"magend\" value=\"$enddate\"></p>
				");
				
				
				echo("
				<br>
				<hr>
				<input type=\"submit\" name=\"btnSearch\" value=\"Search\"><br>
				</fieldset>
				</form>
				<p>
				");
			}
			

	?>
			
            </div>

        </div>
        <!-- /.row -->
	

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Project Helios 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- Google Analytics Script -->
	<script type="text/javascript" src="js/googleanalyticsscript.js"></script>

</body>

</html>
