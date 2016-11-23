<?php
require 'config.php';

$act = new Act(0); // call spl_autoload
$actList = $act->getAllAsArray();
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Act List</title>

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

	<!-- Custom CSS -->
	<link href="css/listview.css" rel="stylesheet">
	<script src="./js/sortable.js"></script>
	<script src="./js/actItem.js"></script>
</head>
<body>
<div class="container">
	<ul id="sortable" class="list-group">
		<?php foreach($actList as $act) {?>
			<li class="list-group-item text-info panel clearfix" id="idorder_<?=$act->actId;?>"
				<!-- act ID is shown only temporarily -->
				<span class="text-info pull-left"><?=$act->actId ?></span>
					<button class="btn btn-info pull-right" data-toggle="collapse" data-target="#act-options-navbar<?=$act->actId;?>" >
						<span class="glyphicon glyphicon-menu-hamburger"></span>
					</button>
				<br />
				<div class="collapse" id="act-options-navbar<?=$act->actId;?>">
					<a href="actview.php?acton=<?=$act->actOrderingNo ;?>" class="btn btn-info">
						<small>View</small>
					</a>
					<a href="controller/ListController.php?newActPos=<?=$act->actOrderingNo ;?>" class="btn btn-primary">
						<small>Add</small>
					</a>
					<a href="controller/ListController.php?delActPos=<?=$act->actOrderingNo;?>&delActId=<?=$act->actId?>" class="btn btn-danger"
						<small>Del</small>
					</a>
				</div>
			</li>
		<?php }?>
	</ul>
</div>

</body>
</html>