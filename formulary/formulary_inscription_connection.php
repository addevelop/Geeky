<?php
session_start();
require_once("../db.php");

/*-------------------------------------------------INSCRIPTION COMPTE------------------------------------------------*/

if (isset($_POST["form_inscription"])) {
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $sex = $_POST["sex"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $status = "membre";
    $activate = 1;

    //check if the inputs are ok
    if (!empty($username) and !empty($firstname) and !empty($lastname) and !empty($email) and !empty($day) and !empty($month) and !empty($year) and isset($sex) and !empty($password) and !empty($password2)) {
        $usernamereq = "SELECT username_user FROM users WHERE username_user='" . $username . "'";
        $usernamesql = mysqli_query($conn, $usernamereq);
        $rowusername = mysqli_num_rows($usernamesql);
        $str = '/[a-z][0-9]/';
        if (strlen($username) <= 50 and $rowusername == 0) {

            if (strlen($firstname) <= 100) {
                if (strlen($lastname) <= 100) {
                    $emailreq = "SELECT email_user FROM users WHERE email_user='" . $email . "'";
                    $emailsql = mysqli_query($conn, $emailreq);
                    $rowmail = mysqli_num_rows($emailsql);

                    if (filter_var($email, FILTER_VALIDATE_EMAIL) and $rowmail == 0) {

                        $str = '/(^0[1-9]$)|(^1[0-9]$)|(^2[0-9]$)|(^3[0-1]$)/';
                        if (preg_match($str, $day) == 1) {
                            $str = '/(^0[1-9]$)|^(1[0-2]$)/';
                            if (preg_match($str, $month) == 1) {
                                $Y = date("Y");
                                if ($year >= ($Y - 150) and $year <= ($Y - 18)) {
                                    $birthday = "" . $year . "-" . $month . "-" . $day . "";
                                    if ($sex == "man" or $sex == "women") {

                                        if ($password == $password2) {
                                            $pwd = sha1($password);

                                            //insert new user
                                            $insertmbr = $conn->prepare("INSERT INTO users(username_user, firstname_user, lastname_user, email_user, birthday_user, password_user, sex_user, status_user, activate_user) VALUES(?,?,?,?,?,?,?,?,?)");
                                            $insertmbr->bind_param('ssssssssi', $username, $firstname, $lastname, $email, $birthday, $pwd, $sex, $status, $activate);
                                            $insertmbr->execute();


                                            echo "créée";
                                            header('Location: ../index.php');
                                        } else {
                                            echo "les mots de passe ne sont pas égaux";
                                            header('Location: ../inscription.php');
                                        }
                                    } else {
                                        echo "sex";
                                        header('Location: ../inscription.php');
                                    }
                                } else {
                                    echo "year";
                                    header('Location: ../inscription.php');
                                }
                            } else {
                                echo "month";
                                header('Location: ../inscription.php');
                            }
                        } else {
                            echo "day";
                            header('Location: ../inscription.php');
                        }
                    } else {
                        echo "email";
                        header('Location: ../inscription.php');
                    }
                } else {
                    //lastname trop de caractère
                    echo "lastname trop de caractère";
                    header('Location: ../inscription.php');
                }
            } else {
                //firstname trop de caractère
                echo "firstname trop de caractère";
                header('Location: ../inscription.php');
            }
        } else {
            //username trop de caractère
            echo "username";
            header('Location: ../inscription.php');
        }
    } else {


        echo "remplir les champs";
        header('Location: ../inscription.php');
    }
}

/*-------------------------------------------------MODIFICATION COMPTE------------------------------------------------*/

if (isset($_POST["form_edit"])) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];

    //Check all of inputs
    if (!empty($firstname) and !empty($lastname) and !empty($email)) {
        $str = "/^[a-zA-Z]{2,99}$/";

        if (preg_match($str, $firstname) == 1) {
            if (preg_match($str, $lastname) == 1) {
                //check if mail already not exist on database
                $emailreq = "SELECT email_user FROM users WHERE email_user='" . $email . "' AND ID_user != " . $_SESSION['ID_connect'] . "";
                $emailsql = mysqli_query($conn, $emailreq);
                $rowmail = mysqli_num_rows($emailsql);

                if (filter_var($email, FILTER_VALIDATE_EMAIL) and $rowmail == 0) {

                    //update user
                    $updatembr = $conn->prepare("UPDATE users SET firstname_user = ?, lastname_user = ?, email_user = ? WHERE ID_user = ?");
                    $updatembr->bind_param('sssi', $firstname, $lastname, $email, $_SESSION['ID_connect']);
                    $updatembr->execute();
                    echo "crée";
                    header('Location: ../editcompte.php');
                } else {
                    echo "email";
                    header('Location: ../editcompte.php');
                }
            } else {
                //lastname trop de caractère
                echo "lastname trop de caractère";
                header('Location: ../editcompte.php');
            }
        } else {
            //firstname trop de caractère
            echo "firstname trop de caractère";
            header('Location: ../editcompte.php');
        }
    } else {
        //username trop de caractère
        echo "remplir";
        header('Location: ../editcompte.php');
    }
}

/*-------------------------------------------------MODIFICATION USER WITH STATUS ADMIN------------------------------------------------*/


if (isset($_POST['form_modifier_user'])) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $address = $_POST["delivery_address"];
    $tel = $_POST['tel_number'];
    $activate = $_POST["activate"];
    $password = $_POST["password"];
    $status = $_POST["status"];

    //check inputs
    if (!empty($firstname) and !empty($lastname) and !empty($email) and !empty($username) and !empty($status)) {
        //check if username already not exist on database
        $usernamereq = "SELECT username_user FROM users WHERE username_user='" . $username . "' AND ID_user != " . $_POST['IDuser'] . "";
        $usernamesql = mysqli_query($conn, $usernamereq);
        $rowusername = mysqli_num_rows($usernamesql);

        $str = "/^[a-zA-Z0-9_-]{2,99}$/";
        if ($rowusername == 0 and preg_match($str, $username)) {
            $str = "/^[a-zA-Z]{2,99}$/";

            if (preg_match($str, $firstname) == 1) {
                if (preg_match($str, $lastname) == 1) {
                    //check if email already not exist on database
                    $emailreq = "SELECT email_user FROM users WHERE email_user='" . $email . "' AND ID_user != " . $_POST['IDuser'] . "";
                    $emailsql = mysqli_query($conn, $emailreq);
                    $rowmail = mysqli_num_rows($emailsql);

                    if (filter_var($email, FILTER_VALIDATE_EMAIL) and $rowmail == 0) {
                        $tel = $tel != "" ? $tel : null; //Condition ternaire
                        $address = $address != "" ? $address : null;
                        //if password are not empty
                        if ($password != "") {
                            $password = sha1($password);

                            //update user
                            $updatembr = $conn->prepare("UPDATE users SET username_user = ?, firstname_user = ?, lastname_user = ?, email_user = ?, password_user = ?, tel_number_user = ?, delivery_address_user = ?, status_user = ?, activate_user = ? WHERE ID_user = ?");
                            $updatembr->bind_param('ssssssssii', $username, $firstname, $lastname, $email, $password, $tel, $address, $status, $activate, $_POST['IDuser']);
                            $updatembr->execute();

                            echo "crée1";
                            header('Location: ../admingestion.php?type=1&value=');

                            //if password is empty we don't change it
                        } else if ($password == "") {
                            //update user
                            $updatembr = $conn->prepare("UPDATE users SET username_user = ?, firstname_user = ?, lastname_user = ?, email_user = ?, tel_number_user = ?, delivery_address_user = ?, status_user = ?, activate_user = ? WHERE ID_user = ?");
                            $updatembr->bind_param('sssssssii', $username, $firstname, $lastname, $email, $tel, $address, $status, $activate, $_POST['IDuser']);
                            $updatembr->execute();

                            echo "crée2";
                            header('Location: ../admingestion.php?type=1&value=');
                        } else {
                            header('Location: ../admingestion.php?type=1&value=');
                        }
                    } else {
                        echo "email";
                        header('Location: ../admingestion.php?type=1&value=');
                    }
                } else {
                    //lastname trop de caractère
                    echo "lastname trop de caractère";
                    header('Location: ../admingestion.php?type=1&value=');
                }
            } else {
                echo "username";
                header('Location: ../admingestion.php?type=1&value=');
            }
        } else {
            //firstname trop de caractère
            echo "firstname trop de caractère";
            header('Location: ../admingestion.php?type=1&value=');
        }
    } else {
        //username trop de caractère
        echo "remplir ";
        header('Location: ../admingestion.php?type=1&value=');
    }
}

/*-------------------------------------------------MODIFICATION ORDER WITH STATUS ADMIN------------------------------------------------*/

if (isset($_POST['form_modifier_order'])) {
    $address = !empty($_POST['delivery_address']) ? $_POST['delivery_address'] : null;
    $telephone = !empty($_POST['telephone']) ? $_POST['telephone'] : null;
    $status = $_POST['status'];
    $activate = $_POST['activate'];
    //check inputs
    $str = "/^[a-zA-Z0-9 .,]{2,150}$/";
    if (preg_match($str, $address) == 1 or $address == null) {
        //update tel number and address of user
        $sql = $conn->prepare("UPDATE users SET delivery_address_user = ?, tel_number_user = ? WHERE ID_user = ?");
        $sql->bind_param('sss', $address, $telephone, $_POST['IDuser']);
        $sql->execute();

        //update order
        $sql = $conn->prepare("UPDATE orders SET status_ord = ?, activate_ord = ? WHERE numero_ord = ?");
        $sql->bind_param('sss', $status, $activate, $_POST['numero_order']);
        $sql->execute();

        header('Location: ../ordergestion.php?type=1&value=');
    } else {
        echo "<br/>" . $address . "<br />";
        header('Location: ../ordergestion.php?type=1&value=');
    }
}

/*-------------------------------------------------CONNECTION COMPTE------------------------------------------------*/


if (isset($_POST["form_connection"])) {
    //check inputs
    if (!empty($_POST["username"]) and !empty($_POST["password"])) {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = sha1($_POST["password"]);
        $password = mysqli_real_escape_string($conn, $password);
        //check if username and passwor has validate
        $sqlconnect = "SELECT * FROM users WHERE username_user = '" . $username . "' AND password_user = '" . $password . "'";
        $reqconnect = mysqli_query($conn, $sqlconnect);
        $connection = mysqli_fetch_array($reqconnect);
        $row_connect = mysqli_num_rows($reqconnect);

        if ($row_connect == 1) {
            //creation variable session to navigate on the website with the same identification
            $_SESSION["ID_connect"] = $connection["ID_user"];
            $_SESSION["status"] = $connection["status_user"];
            echo "connect";
            $URL = $_SERVER['HTTP_REFERER'];
            header("Location: " . $URL . "?&connected=");
        } else {
            $URL = $_SERVER['HTTP_REFERER'];
            $tlcaracter = strlen($URL) - (3 + 1);
            $str = "";
            for ($i = $tlcaracter; $i <= (strlen($URL) - 1); $i++) {
                $str .= $URL[$i];
            }

            if ($str == ".php") {
                header("Location: " . $URL . "?error_connection=true&");
            } else {
                header("Location: " . $URL . "&error_connection=true&");
            }

            echo $str;

            //header("Location: " .$URL. "?error_connection=true&");

        }
    } else {
        echo "remplir les champs";
        header("Location: ../index.php");
    }
}


/*-------------------------------------------------MODIFICATION PRODUCT------------------------------------------------*/

if (isset($_POST['form_modifier_product'])) {

    $quantity = $_POST['quantity'];
    $activate = isset($_POST['activate']) ? $_POST['activate'] : null;
    //check inputs
    $str = "/^[0-9]{0,10}$/";
    if (preg_match($str, $quantity) == 1) {
        if ($activate != null) {
            //udpate with activation
            $sql = $conn->prepare("UPDATE products SET quantity_prd = ?, activate_prd = ? WHERE ID_prd = ?");
            $sql->bind_param('sss', $quantity, $activate, $_POST['IDprd']);
            $sql->execute();
            echo "heuuu";
            header('Location: ../product.php?product=' . $_POST['IDprd']);
        } else {

            //update quantity
            $sql = $conn->prepare("UPDATE products SET quantity_prd = ? WHERE ID_prd = ?");
            $sql->bind_param('ss', $quantity, $_POST['IDprd']);
            $sql->execute();
            echo "heuu1";
            header('Location: ../product.php?product=' . $_POST['IDprd']);
        }
    } else {
        header('Location: ../product.php?product=' . $_POST['IDprd']);
    }
}

/*-------------------------------------------------MODIFICATION PRODUCT WITH STATUS ADMIN------------------------------------------------*/

if (isset($_POST['form_product_modifier_admin'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $activate = $_POST['activate'];
    //check inputs
    $str = "/^[0-9]{0,10}$/";
    if (preg_match($str, $quantity) == 1) {


        $sqle = $conn->prepare("UPDATE products SET title_prd = ?, description_prd = ?, quantity_prd = ?, price_prd = ?, activate_prd = ? WHERE ID_prd = ?");
        $sqle->bind_param('ssssss', $title, $description, $quantity, $price, $activate, $_POST['IDprd']);
        $sqle->execute();

        $sqlt = "UPDATE products SET title_prd = '" . $title . "', description_prd = '" . $description . "', quantity_prd = " . $quantity . ", price_prd = '" . $price . "', activate_prd = " . $activate . " WHERE ID_prd = " . $_POST['IDprd'] . "";
        echo "heuuu1";
        echo "titre : " . $title . "<br /> descritption :" . $description . "<br /> quantity : " . $quantity . "<br /> price : " . $price . "<br /> activer :" . $activate . "<br /> id :" . $_POST['IDprd'] . "<br/>";
        echo "<br />" . $sqlt;
        header('Location: ../productgestion.php?type=1&value=');
    } else {
        header('Location: ../productgestion.php?type=1&value=');
    }
}
/*-------------------------------------------------DESACTIVER LE PRODUIT------------------------------------------------*/

if (isset($_GET['desactiver'])) {

    $activate = 0;
    //activate = 0 from the product
    $sql = $conn->prepare("UPDATE products SET activate_prd = ? WHERE ID_prd = ?");
    $sql->bind_param('ss', $activate, $_GET['desactiver']);
    $sql->execute();
    //delete the product from all shopping basket
    $sql = $conn->prepare("DELETE FROM shopping_basket WHERE ID_prd = " . $_GET['desactiver'] . "");
    $sql->execute();
    header('Location: ../index.php');
}


/*-------------------------------------------------DELETE PRODUCT IN YOUR BASKET------------------------------------------------*/

if (isset($_GET['delete_sb'])) {
    $sql = $conn->prepare("DELETE FROM shopping_basket WHERE ID_prd = '" . $_GET['delete_sb'] . "' AND ID_user = '" . $_SESSION['ID_connect'] . "'");
    $sql->execute();
    header('Location: ../shopping_basket.php');
}
/*-------------------------------------------------MODIFICATION QUANTITY OF PRODUCT ON BASKET------------------------------------------------*/

if (isset($_POST['modifier_quantity_sb'])) {


    $quantity = $_POST['quantity'];
    $IDprd = $_POST['IDprd'];
    //update quantity product on basket
    $sql = $conn->prepare("UPDATE shopping_basket SET quantity_sb = ? WHERE ID_user = ? AND ID_prd = ?");
    $sql->bind_param('iii', $quantity, $_SESSION['ID_connect'], $IDprd);
    $sql->execute();
    header('Location: ../shopping_basket.php');
    echo "shop";
}
