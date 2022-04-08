<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome Quotation</title>
	<style>.center{text-align: center; display: block; padding-bottom: 30px;}
#container { margin: 10px; border: 1px solid #D0D0D0; box-shadow: 0 0 8px #D0D0D0; }.successmsg{color:green;text-align:center;}</style>
</head>
<body>

<div id="container">
<h1 class="successmsg">Thanks!! Form is submitted</h1>
<a class="center" href="<?php echo site_url('carquote/users_details');?>">Go Back</a>
</div>
</body>
</html>