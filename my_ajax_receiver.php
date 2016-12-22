<?php
$value = $_POST['val'];

$html = "<table><tr><td>$value</td></tr></table>";







echo json_encode(array("value" => $_POST['val'], "echo" => $html));
?>
