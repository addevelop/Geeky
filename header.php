<?php session_start();
require_once("db.php");?>
<head>
    <link rel="stylesheet" href="css/header.css"/>
</head>

<!--------------------------------------CONNECTION----------------------------------->
<?php

if(!isset($_SESSION['ID_connect']))
{
?>
<section id="connection_ID" class="h-100 w-100 connection">

    <form class="row formulary p-4" method="POST" action="formulary/formulary_inscription_connection.php">
        <div class=" w-100" style="position: relative; top: 0; text-align: right; color: #ffffff; cursor: pointer;">
            <p id="back_connect">retour</p>
        </div>

        <div class="w-100">
            <h1 class="title_formulary">Connexion</h1>
        </div>
        <?php
        if(isset($_GET['error_connection']))
        {
            echo "<b class='w-100 col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 d-block text-center' style='color: #ffe6e6; font-size: 1.2rem;'>L'identifiant ou le mot de passe est inccorect</b>";
        }
        ?>
        <div class="container_input col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12">
            <input name="username" type="text" class="input" placeholder="Nom d'utilisateur"/>
        </div>
        <div class="container_input col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12">
            <input name="password" type="password" class="input" placeholder="Mot de passe" />
        </div>
        <div class="container_input col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 submit_input">
            <input class="input_sub input" value="Connexion" name="form_connection" type="submit"/>
        </div>
    </form>

</section>
<?php
}
?>
<!--------------------------------------BUTTON OPEN MENU----------------------------------->

<div id="openMenu" >
    <span style="transition-duration: 1s;">&#10132;</span>
</div>
<!--------------------------------------HEADER----------------------------------->

<header>
    <section class="container_logo">
        <div class="logo w-100 h-100">
            <a class="h-100" href="index.php"><img class="img_logo" src="images/Logo_blanc.png"/></a>
        </div>
    </section>
<section class="container_menu">
    <div class="w-100">
        <ul class="w-100 menu">
            <li class="title_menu_del h2">Jeux
                <ul class="h4">
                    <li><a href="products.php?category=game&subcategory=adventure_game">jeux d'aventure</a></li>
                    <li><a href="products.php?category=game&subcategory=shooting_game">jeux de tir</a></li>
                    <li><a href="products.php?category=game&subcategory=battle_game">jeux de combat</a></li>
                    <li><a href="products.php?category=game&subcategory=platform_game">jeux de plateforme</a></li>
                    <li><a href="products.php?category=game&subcategory=reflection_game">jeux de reflexion</a></li>
                    <li><a href="products.php?category=game&subcategory=role_playing_game">jeux de role</a></li>
                </ul>
            </li>
            <li class="title_menu_del h2">Consoles
                <ul class="h4">
                    <li><a href="products.php?category=console&subcategory=playstation_5">PS5 5</a></li>
                    <li><a href="products.php?category=console&subcategory=playstation_5_digital">PS5 5 Digial</a></li>
                    <li><a href="products.php?category=console&subcategory=playstation_4">PS4</a></li>
                    <li><a href="products.php?category=console&subcategory=xbox_serie_x">Xbox série X</a></li>
                    <li><a href="products.php?category=console&subcategory=xbox_serie_s">Xbox série S</a></li>
                    <li><a href="products.php?category=console&subcategory=xbox_one">Xbox One</a></li>
                    <li><a href="products.php?category=console&subcategory=pc">PC Portable</a></li>
                    <li><a href="products.php?category=console&subcategory=tour_gaming">PC Gaming</a></li>
                </ul>
            </li>
            <li class="title_menu_del h2">Figurines
                <ul class="h4">
                    <li><a href="products.php?category=figurine&subcategory=pop">POP</a></li>
                    <li><a href="products.php?category=figurine&subcategory=realist">Réaliste</a></li>
                    <li><a href="products.php?category=figurine&subcategory=collector">Collector</a></li>
                </ul>
            </li>
            <li class="title_menu_del h2">Occasion
                <ul class="h4">
                    <li><a href="#">Consoles</a></li>
                    <li><a href="#">Jeux</a></li>
                    <li><a href="#">Figurines</a></li>
                </ul>
            </li>
        </ul>
    </div>
</section>
    <section class="container_menu_search">
        <div class="menu_search">
            <div class="search">
                <form action="index.php" method="GET" class="form_search">
                <input class="input_search" type="search" name="search" placeholder="rechercher..."/>
                    <input class="button_search" type="submit" value="" name="toSearch"/>
                </form>
            </div>
            <div class="container_compte">
                <a class="a_ panier" href="shopping_basket.php">
                <div class="panier">
                    <div class="panier_img" style="width: auto; height: 100%;">
                    <img src="images/panier_logo.png"/>

                    </div>
                    <div class="panier_cpt">
                        <div style="">

                            <?php
                            if(isset($_SESSION["ID_connect"])) {
                                $sqlprdcount = "SELECT SUM(quantity_sb) as 'quantity_sb' FROM shopping_basket WHERE ID_user = " . $_SESSION["ID_connect"] . " ;";
                                $reqprdcount = mysqli_query($conn, $sqlprdcount);
                                while ($fetchCount = $reqprdcount->fetch_array()) {
                                    echo $fetchCount["quantity_sb"];
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                </a>
                <div class="compte">
                    <ul class="w-100 menu_compte">
                        <li class="title_compte">

                            <img style="width: 50px; height: 50px;" src="images/compte_logo.png"/>

                            <?php if(isset($_SESSION["ID_connect"]) AND $_SESSION["ID_connect"] > 0)

                            {?>
                            <div style="position: absolute;width: 10px;height:10px; background-color:green;display:inline-block; top:10px;"></div>

                            <ul class="h4">
                                <?php
                                if(isset($_SESSION["status"]) AND $_SESSION["status"] == "admin")
                                {
                                    ?>
                                    <li><a id="connect" href="admin.php">Espace admin</a></li>
                                    <div></div>
                                <?php
                                }
                                ?>
                                <li><a id="connect" href="editcompte.php">Infomations personnelles</a></li>
                                <div></div>
                                <li><a id="connect" href="orders.php">Mes commandes</a></li>
                                <div></div>
                                <li><a id="connect" href="myproducts.php">Mes produits</a></li>
                                <div></div>
                                <li><a href="addproduct.php">Ajouter un produit</a></li>
                                <div></div>
                                <li><a style="color:#ff4d4d" href="disconnect.php">Deconnexion</a></li>


                            </ul>
                                <?php }else{ ?>
                            <ul class="h4">
                                <li><a id="connect" href="#">Connexion</a></li>
                                <div class=""></div>
                                <li><a href="inscription.php">Inscription</a></li>
                            </ul>
                                <?php } ?>



                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </section>
    <script>


        $(document).ready(function() {
    var _open = 0;
    if($(document).width() <= 1230) {


//button open menu
            $("#openMenu").click(function () {

               md()
            })

        function md()
        {
            if(_open == 0) {
                $("header").css("transform", "translateX(0)");
                $("#openMenu").css({"transform": "translateX(" + ($(window).width() - $("#openMenu").width()) + "px)", "border-radius": "0 0 0 10px"});
                $("#openMenu > span").css("transform", "rotate(180deg)");
                _open = 1;
            }
            else
            {
                $("header").css("transform", "translateX(-100%)");
                $("#openMenu").css({"transform": "translateX(0)", "border-radius": "0 0 10px 0"});
                $("#openMenu > span").css("transform", "rotate(0deg)");
                _open = 0;
            }
        }
    }
        })

        <?php
        if(isset($_GET['error_connection']) AND !isset($_GET['connected']))
            {
                ?>
        connection(1);
        <?php
            }
        else if(isset($_GET['connected']))
        {
            ?>
        connection(0);
        <?php
        }

        ?>

        //connection
        $("#connect").click(function(){

            connection(1);



        })

        function connection(n)
        {
            if(n == 1) {
                $("body").css("overflow", "hidden");
                $("#connection_ID").css("display", "flex");
            }
            else if(n == 0)
            {
                $("body").css("overflow", "auto");
                $("#connection_ID").css("display", "none");
            }
        }
        //back connection
        $("#back_connect").click(function(){

            connection(0);



        })

    </script>
</header>