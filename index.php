    <!DOCTYPE html>
    <html prefix="og: http://ogp.me/ns#">
    <head>
    <?php require_once("head.html"); ?>
        <link rel="stylesheet" href="css/index.css"/>
        <title>Acceuil</title>
    </head>
    <body>
    <?php require_once("db.php"); ?>


    <?php require_once("header.php"); ?>
    <?php if(isset($_GET['search']))
        {
            ?>
            <section class="container_product row">
                <?php
                $sql = "SELECT *, AVG(note1_opinion) as 'note1_opinion' FROM products prd INNER JOIN opinion opi on prd.ID_prd = opi.ID_prd WHERE prd.activate_prd = 1 AND prd.title_prd LIKE '%" .$_GET['search']. "%' OR prd.keyword_prd LIKE '%" .$_GET['search']. "%'  GROUP BY prd.ID_prd";
                $reqproducts = mysqli_query($conn, $sql);
                while($fetch = $reqproducts->fetch_array())
                {
                    ?>
                    <div class="products col-6 col-xs-6 col-sm-6 col-md-3 col-xl-3">
                        <article class="product row">
                            <div class="product_img">
                                <img src="<?php echo $fetch["image1_prd"];?>"/>
                            </div>
                            <div class="bar"></div>
                            <div class="product_title t1 ">
                                <a class="a_" href="product.php?product=<?php echo $fetch["ID_prd"]; ?>"><?php echo $fetch["title_prd"]?></a>
                            </div>
                            <div class="product_price">
                                <?php echo $fetch["price_prd"]; ?> €
                            </div>
                            <div class="opinion_img">
                                <?php if( $fetch["note1_opinion"] > 0)
                                {
                                    ?>

                                    <img src="<?php echo "images/" .floor($fetch["note1_opinion"]). "-etoile.png";?>"/>
                                    <?php
                                }
                                ?>
                            </div>
                        </article>
                    </div>


                    <?php
                }
                ?>



            </section>

<?php
        }
        else
        {
        ?>
    <section class="container_slider">
        <div class="slider">
            <img src="images/intro.gif"/>
        </div>
    </section>

    <section class="container_product row">
        <?php
        $sql = "SELECT *, AVG(note1_opinion) as 'note1_opinion' FROM products prd INNER JOIN opinion opi on prd.ID_prd = opi.ID_prd WHERE prd.activate_prd = 1  GROUP BY prd.ID_prd LIMIT 10";
        $reqproducts = mysqli_query($conn, $sql);
        while($fetch = $reqproducts->fetch_array())
        {
        ?>
    <div class="products col-6 col-xs-6 col-sm-6 col-md-3 col-xl-3">
        <article class="product row">
            <div class="product_img">
                <img src="<?php echo $fetch["image1_prd"];?>"/>
            </div>
            <div class="bar"></div>
            <div class="product_title t1 ">
                <a class="a_" href="product.php?product=<?php echo $fetch["ID_prd"]; ?>"><?php echo $fetch["title_prd"]?></a>
            </div>
            <div class="product_price">
                <?php echo $fetch["price_prd"]; ?> €
            </div>
            <div class="opinion_img">
                <?php if( $fetch["note1_opinion"] > 0)
                {
                    ?>

                <img src="<?php echo "images/" .floor($fetch["note1_opinion"]). "-etoile.png";?>"/>
                <?php
                }
                ?>
            </div>
        </article>
    </div>


        <?php
        }
        ?>



    </section>
    <?php
        }?>

    </body>
    </html>