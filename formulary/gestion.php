<?php
session_start();
require_once("../db.php");
/*-------------------------------------------------ACTIVE/DESACTIVE USER WITH STATUS ADMIN------------------------------------------------*/

if(isset($_POST['numeroid']))
{
    $sql = $conn->prepare("UPDATE users SET activate_user = '" .$_POST['activate']. "' WHERE ID_user = " .$_POST['numeroid']. "");
    $sql->execute();
}
/*-------------------------------------------------ACTIVE/DESACTIVE ORDER WITH STATUS ADMIN------------------------------------------------*/

if(isset($_POST['numero_order']))
{
    $sql = $conn->prepare("UPDATE orders SET activate_ord = '" .$_POST['activate']. "' WHERE numero_ord = '" .$_POST['numero_order']. "'");
    $sql->execute();
}

/*-------------------------------------------------ACTIVE/DESACTIVE USER WITH STATUS ADMIN------------------------------------------------*/

if(isset($_POST['idproduct']))
{
    $sql = $conn->prepare("UPDATE products SET activate_prd = '" .$_POST['activate']. "' WHERE ID_prd = " .$_POST['idproduct']. "");
    $sql->execute();
}