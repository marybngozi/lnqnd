<?php 
ob_start();
include 'includes/head.php';
$buffer = ob_get_contents();
ob_end_clean();
$buffer = str_replace("%TITLE%", "LnQ - Home", $buffer);
echo $buffer; 
?>

<?php include 'includes/body.php'; ?>

<?php include 'includes/regform.php'; ?>

<?php include 'includes/logform.php'; ?>

<?php include 'includes/footer.php'; ?>


<?php 
    foreach($_SESSION as $key=>$value){
        if($key == "captext"){
            continue;
        }
        unset($_SESSION[$key]);
    }
?>


