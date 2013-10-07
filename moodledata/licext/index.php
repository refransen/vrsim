<?php 
require_once("lic_api.php")
?>
<head>
<title>License API Tools</title>
</head>

<body>
<center><h1>License API Tools</h1><hr/></center>
<br>
Tool checksum: 
<?php
$data = file_get_contents($licAPIConfig["tools"]);
echo(md5($data));
?>
<br/>
<br/>
<?php $file="52527d2971a98.lic";?>
<menu>
<li>Tool configuration: <?php echo validate_tools() ? "OK" : "Not ok";?>
<li>Exec available: <?php echo exec_enabled() ? "OK" : "Not ok";?>
<li>Local hardware ID: <?php echo lic_getHWID();?>
<li>License <?php  echo $file;?> validity: <?php echo lic_IsValid($file) ? "OK" : "Not ok";?>
<li>License date: <?php echo lic_LicenseDate($file)?>
<li>License ID: <?php echo lic_LicenseID($file);?>
<li>Application ID: <?php echo lic_ApplicationID($file);?>
<li>License expiration date: <?php echo lic_LimitDate($file);?>
<li>License max client: <?php echo lic_NbMaxClient($file);?>
<li>License max class: <?php echo lic_NbMaxClass($file);?>
<li>License SBC feature:
<menu>
<?php 
$feat = lic_SBCFeature($file);
if(strlen($feat) != 0) {
	$vals=split("\n+", $feat);
	if(is_array($vals)) {
		for($i = 0; $i < count($vals); $i++) echo "<li>".$vals[$i];
	}
}
?>
</menu>
</body>
