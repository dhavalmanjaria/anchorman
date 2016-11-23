<?php
require 'config.php';

$act = new Act(); // call spl_autoload
if (isset($_GET['acton'])) {
	$acton = $_GET['acton'];
	global $act;
	$act = Act::getActByOrderingNo($acton);
} else {
	die("ActOn is not set");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $act->actName ?></title>

	<!-- Bootstrap stuff -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- Latest compiled JavaScript -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<!-- So it works on mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 

   <!-- x-editable (bootstrap version) -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/js/bootstrap-editable.min.js"></script>
    

	<style>
	* {
	font-family: Open Sans;
	line-height: 1.6;
	}

	.custom-p-1 {
		font-size:20px;
		padding: 1%;
	}

	.custom-form-1 > input {	
		margin-right: 1%;
		margin-top: 1%;
	}
	</style>

	<script src="./js/editable.js"></script>

</head>
<body>
	<div class="container">
	<div class="panel-group">
		<button id="edit-name" class="btn pull-right edit-button" style="margin-top: 2em">Edit</button>	
		<div class="panel">
			<div style="padding:1em">
				<form id="name-form" action="#">				
				</form>					
				<h3 id="name-text"><?=$act->actName ?></h3>
				<p class="text-info">Participant 1, Participant 2</p>
			</div>
		</div>

	
	<div class="panel-group">
		<div class=" panel panel-info">
			<p class="custom-p-1">
				<strong>Intro</strong><button id="edit-intro" class="btn pull-right edit-button" >Edit</button>
			</p>
			
			
			<div style="padding:1em">
				<form id="intro-form" action="#">				
				</form>
				<p id="intro-text" class="custom-p-1"><?=$act->intro ;?></p>
			</div> 
		</div>
		
		
		<div class="panel panel-info">
			<p class="custom-p-1">
				<strong>Outro</strong><button id="edit-outro" class="btn pull-right edit-button">Edit</button>
			</p>
			
			<div style="padding:1em">
				<form id="outro-form" action="#">				
				</form>
				<p id="outro-text" class="custom-p-1"><?=$act->outro ;?></p>
			</div> 
			
		</div>
		<div class="panel panel-info">
			<a data-toggle="collapse" href="#other-info-table">
				<p class="custom-p-1">Other Information</p>
			</a>
		</div>
		<div id="other-info-table" class="panel-collapse collapse">
			<table class="table">
				<tbody>
					<tr>
						<td>Act ID:</td><td id="actId"><?=$act->actId;?></td>						
					</tr>
					<tr>
						<td >Current Ordering:</td><td id="acton"><?=$act->actOrderingNo;?></td>						
					</tr>
				</tbody>
			</table>
		</div>		
	</div>
	
	<form style="margin-right: 1em;" class="pull-left" action='actview.php' method='get'>
		<input type='hidden' name='acton' value='<?=$act->actOrderingNo  - 1;?>' /> 
		<button type='submit' class='btn btn-info'>
			<span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Prev
		</button>
	</form>
	
	<form class='pull-left' action='actview.php' method='get'>
		<input type='hidden' name='acton' value='<?=$act->actOrderingNo  + 1;?>' /> 
		<button type='submit' class='btn btn-info'>
			Next&nbsp;<span class="glyphicon glyphicon-chevron-right"></span>
		</button>
	</form>
	
	<form class='pull-right' action='listview.php' method='get'>
		 
		<button type='submit' class='btn btn-danger'>
			Close&nbsp;<span class="glyphicon glyphicon-remove"></span>
		</button>
	</form>
</div>
</div>
</body>
</html>

