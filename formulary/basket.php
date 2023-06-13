<?php
session_start();
require_once("../db.php");
if(isset($_SESSION['ID_connect'])) {

    /*-------------------------------------------------ADD PRODUCT ON BASKET------------------------------------------------*/
    if (isset($_POST["add_basket"])) {
        echo $_POST["ID_product"];
        $id = $_POST["ID_product"];
        $quantity = $_POST["quantity"];


        $id = mysqli_real_escape_string($conn, $id);


        //Check if the product that you want add already exist in your basket
        $sqlprd = "SELECT * FROM shopping_basket WHERE ID_prd = " . $id . " AND ID_user = " . $_SESSION["ID_connect"] . ";";
        $reqprd = mysqli_query($conn, $sqlprd);
        $prd = mysqli_fetch_array($reqprd);
        $row_prd = mysqli_num_rows($reqprd);

        //if no exist we add this product with the quantity requested in your basket
        if ($row_prd == 0) {
            $insertSB = $conn->prepare("INSERT INTO shopping_basket(quantity_sb, ID_prd, ID_user) VALUES(?,?,?)");
            $insertSB->bind_param('iii', $quantity, $id, $_SESSION["ID_connect"]);
            $insertSB->execute();
            header('Location:../shopping_basket.php');
            //if already exist we just added the new quantity on the old quantity in the same products who are in your basket
        } else if ($row_prd > 0) {
            $quantity = floor($quantity + $prd["quantity_sb"]);
            $insertSB = $conn->prepare("UPDATE shopping_basket SET quantity_sb = ? WHERE ID_prd = ? AND ID_user = ?");
            $insertSB->bind_param('iii', $quantity, $id, $_SESSION["ID_connect"]);
            $insertSB->execute();
            header('Location:../shopping_basket.php');
        }
    }

    /*-------------------------------------------------ADD NEW PRODUCT------------------------------------------------*/

    if (isset($_POST["form_addproduct"])) {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $category = "";
        $subcategory = $_POST["categorie"];
        $newold = $_POST["newold"];
        $condition = $_POST["condition"];
        $quantity = $_POST["quantity"];
        $reference = $_POST["reference"];
        $keyword = $_POST["keyword"];
        $price = $_POST["price"];
        $activate = 1;
        echo 'test';

        //Validation from all input
        if (strlen($title) < 100) {
            if ($subcategory == "adventure_game" or $subcategory == "shooting_game" or $subcategory == "battle_game" or $subcategory == "platform_game" or $subcategory == "reflection_game" or $subcategory == "role_playing_game" or $subcategory == "adventure_game" or $subcategory == "shooting_game" or $subcategory == "battle_game" or $subcategory == "platform_game" or $subcategory == "reflection_game" or $subcategory == "role_playing_game" or $subcategory == "playstation_5" or $subcategory == "playstation_5_digital" or $subcategory == "playstation_4" or $subcategory == "xbox_serie_x" or $subcategory == "xbox_serie_s" or $subcategory == "xbox_one" or $subcategory == "pc_portable" or $subcategory == "pc_gaming" or $subcategory == "pop" or $subcategory == "realist" or $subcategory == "collector") {
                if ($subcategory == "adventure_game" or $subcategory == "shooting_game" or $subcategory == "battle_game" or $subcategory == "platform_game" or $subcategory == "reflection_game" or $subcategory == "role_playing_game" or $subcategory == "adventure_game" or $subcategory == "shooting_game" or $subcategory == "battle_game" or $subcategory == "platform_game" or $subcategory == "reflection_game" or $subcategory == "role_playing_game") {
                    $category = "game";
                } else if ($subcategory == "playstation_5" or $subcategory == "playstation_5_digital" or $subcategory == "playstation_4" or $subcategory == "xbox_serie_x" or $subcategory == "xbox_serie_s" or $subcategory == "xbox_one" or $subcategory == "pc_portable" or $subcategory == "pc_gaming") {
                    $category = "console";
                } else if ($subcategory == "pop" or $subcategory == "realist" or $subcategory == "collector") {
                    $category = "figurines";
                }
                if ($newold == "new" or ($newold == "occasion" and $condition == "1" or $condition == "2" or $condition == "3")) {
                    //expression regular check
                    if (preg_match("/^[0-9]{1,10}$/", $quantity) == 1) {
                        if (preg_match("/^[a-zA-Z0-9 ]{0,15}$/", $reference) == 1) {

                            //check if image 1 exist
                            if (isset($_FILES['image_files_1']) and $_FILES["image_files_1"]["tmp_name"] != "" and (exif_imagetype($_FILES['image_files_1']['tmp_name']) == 2 || exif_imagetype($_FILES['image_files_1']['tmp_name']) == 3)) {
                                //in first time we INSERT the new product ine the database without image(s)
                                $sqladdProduct = $conn->prepare("INSERT INTO products(title_prd, description_prd, category_prd, subcategory_prd, newold_prd, condition_prd, quantity_prd, price_prd, ref_prd, keyword_prd, ID_user, activate_prd) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
                                $sqladdProduct->bind_param('sssssiisssii', $title, $description, $category, $subcategory, $newold, $condition, $quantity, $price, $reference, $keyword, $_SESSION['ID_connect'], $activate);
                                $sqladdProduct->execute();
                                $lastid = mysqli_insert_id($conn);
                                //any new product has an oppinion for it to appear in the index.php
                                $sqlopi = $conn->prepare("INSERT INTO opinion(ID_user, ID_prd) VALUES(?,?)");
                                $sqlopi->bind_param('ii', $_SESSION["ID_connect"], $lastid);
                                $sqlopi->execute();

                                $chemin = array(); //the path to move the image(s)
                                $chemin2 = array(); //the path who are stocked in the database
                                $img = array(); //array of image(s)
                                //loop to add the path in a chemin and chemin1 if image exist
                                for ($i = 1; $i <= 4; $i++) {
                                    if (isset($_FILES["image_files_" . $i]) and $_FILES["image_files_" . $i]["tmp_name"] != "" and (exif_imagetype($_FILES['image_files_' . $i]['tmp_name']) == 2 || exif_imagetype($_FILES['image_files_' . $i]['tmp_name']) == 3)) {
                                        array_push($chemin, "../products/IMG_" . $i . "_" . $category . "_" . $subcategory . "_" . $newold . "_" . $lastid . ".png");
                                        array_push($chemin2, "products/IMG_" . $i . "_" . $category . "_" . $subcategory . "_" . $newold . "_" . $lastid . ".png");

                                        array_push($img, $_FILES['image_files_' . $i]['tmp_name']);
                                    } else {
                                        array_push($chemin, 'null');
                                        array_push($chemin2, 'null');


                                        array_push($img, 'null');

                                    }

                                }
                                $i = 0;
                                $num = 1;
                                //loop to move image on file website
                                while ($i != 4) {
                                    if ($img[$i] != 'null') {

                                        move_uploaded_file($img[$i], $chemin[$i]);

                                        //in second time we add image one to one on the database with UPDATE SQL
                                        $sqlimg = $conn->prepare("UPDATE products SET image" . $num . "_prd = ? WHERE ID_prd = ?");
                                        $sqlimg->bind_param('si', $chemin2[$i], $lastid);
                                        $sqlimg->execute();
                                    }
                                    $num++;
                                    $i++;
                                }
                                if ($i == 4) {
                                    header('Location: ../index.php');
                                }
                            } else {
                                echo "probleme image principale";
                                $_SESSION["error_addproduct"] = "Votre image principale n'est pas conforme";
                            }

                        } else {
                            echo "reference";
                            $_SESSION["error_addproduct"] = "La référence n'est pas valide";

                        }
                    } else {
                        echo "quantity";
                        $_SESSION["error_addproduct"] = "La quantitée n'est pas valide";

                    }
                } else {
                    echo "new occasion";
                    $_SESSION["error_addproduct"] = "veuillez sélectionner l'état de votre produit";

                }
            } else {
                echo "categorie";
                $_SESSION["error_addproduct"] = "Votre image principale n'est pas conforme";

            }
        } else {
            echo "title";
            $_SESSION["error_addproduct"] = "Votre image principale n'est pas conforme";

        }


    }

    /*-------------------------------------------------ADD NEW ORDER------------------------------------------------*/


    if (isset($_GET['orders'])) {
        //select all from shopping basket of the user to recover the total price and total quantity
        $sql = "SELECT * FROM shopping_basket shb INNER JOIN products prd ON shb.ID_prd = prd.ID_prd WHERE shb.ID_user = '" . $_SESSION['ID_connect'] . "'";
        $sqli = mysqli_query($conn, $sql);
        $check = 0;
        while($reqfetch = $sqli->fetch_array())
        {
            $valid = $reqfetch['quantity_sb']>$reqfetch['quantity_prd']?1:0;
            $check+=$valid;

        }
        if ($check == 0) {
            //$price = $reqfetch['price'];
            $rows = "SELECT COUNT(*) as 'countR' FROM orders WHERE ID_user = " . $_SESSION['ID_connect'] . " GROUP BY numero_ord";
            $rows = mysqli_query($conn, $rows);
            $row = mysqli_num_rows($rows);
            //creation of the order number
            $numero_order = "GK-v1-" . $_SESSION['ID_connect'] . ($row + 1) . "";

            $status = '0'; //fixation of state from the order
            $list = "";
            $date = date("Y-m-d");//date order
            $activate_ord = 1;
            //loop for add all different product who are in the shopping basket of the user
            $sql = "SELECT * , (shb.quantity_sb * prd.price_prd) as 'price' FROM shopping_basket shb INNER JOIN products prd ON shb.ID_prd = prd.ID_prd WHERE shb.ID_user = " . $_SESSION['ID_connect'] . "";
            $sqli = mysqli_query($conn, $sql);
            while ($fetch = $sqli->fetch_array()) {


                $insertOrd = $conn->prepare("INSERT INTO orders(ID_prd, ID_user, numero_ord, quantity_ord, price_ord, status_ord, date_ord, activate_ord) VALUES(?,?,?,?,?,?,?,?)");
                $insertOrd->bind_param('iisisssi', $fetch['ID_prd'], $_SESSION['ID_connect'], $numero_order, $fetch['quantity_sb'], $fetch['price'], $status, $date, $activate_ord);
                $insertOrd->execute();


            }


            //clear the shopping_basket
            $UPDATEShopping_basket = $conn->prepare("DELETE FROM shopping_basket WHERE ID_user = " . $_SESSION['ID_connect'] . "");
            $UPDATEShopping_basket->execute();

            $sql = "SELECT * FROM orders ord INNER JOIN products prd ON ord.ID_prd = prd.ID_prd WHERE ord.numero_ord = '" .$numero_order. "'";
            $sqli = mysqli_query($conn, $sql);
            while($quantityfetch = $sqli->fetch_array())
            {
                $quantity = $quantityfetch['quantity_prd'] - $quantityfetch['quantity_ord'];
                $sql = $conn->prepare("UPDATE products SET quantity_prd = " .$quantity. " WHERE ID_prd =" .$quantityfetch['ID_prd']. "");
                $sql->execute();

            }


            header("Location:../message.php?new_order=" . $numero_order . "");
        } else {
            echo "quantité de produit inssufisante";
        }
    }
}
