<?php
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once("head.html"); ?>
    <link rel="stylesheet" href="css/formulary.css"/>
    <link rel="stylesheet" href="css/style.css"/>

    <title>Ajout produit</title>


</head>
<body class="ecran">
<?php require_once("header.php"); ?>
    <section class="container_center">

        <fieldset class="container_formulary">
            <legend class="fs-1 title_formulary">
                <h1>Ajout d'un produit</h1>
            </legend>
            <div class="formulary">
                <form class="row formulary_form" method="POST" id="form_add_product_ID" action="formulary/basket.php" onsubmit="return add_product()" enctype="multipart/form-data">

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input" type="text" name="title" placeholder="Titre de produit"/></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-6 col-xl-6 container_input">
                        <select name="categorie" class="input_select">
                            <option value="0">------Catégorie------</option>
                            <optgroup label="Jeux">
                                <option value="adventure_game">Jeu d'aventure</option>
                                <option value="shooting_game">Jeu de tir</option>
                                <option value="battle_game">Jeu de combat</option>
                                <option value="platform_game">Jeu de plateforme</option>
                                <option value="reflection_game">Jeu de réflexion</option>
                                <option value="role_playing_game">Jeu de rôle</option>
                            </optgroup>
                            <optgroup label="Console">
                                <option value="playstation_5">Playstation 5</option>
                                <option value="playstation_5_digital">Playstation 5 Digital</option>
                                <option value="playstation_4">Playstation 4</option>
                                <option value="xbox_serie_x">Xbox Série X</option>
                                <option value="xbox_serie_s">Xbox Série S</option>
                                <option value="xbox_one">Xbox One</option>
                                <option value="pc_portable">PC portable</option>
                                <option value="pc_gaming">PC Gaming</option>
                            </optgroup>
                            <optgroup label="Figurines">
                                <option value="pop">POP</option>
                                <option value="realist">Réaliste</option>
                                <option value="collector">Collector</option>
                            </optgroup>

                        </select>
                    </div>
                        <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-6 col-xl-6 container_input">
                            <select id="etat_ID" name="newold" class="input_select" onclick="conditions()">
                                <option>------État------</option>
                                <option value="new">Neuf/Neuve</option>
                                <option value="occasion">Occasion</option>

                            </select>
                        </div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input mt-4">
                        <select id="condition_ID" name="condition" style="display: none;" class="input_select">
                            <option>------Conditions------</option>
                            <option value="1">Bon état</option>
                            <option value="2">État moyen</option>
                            <option value="3">Mauvais état</option>

                        </select>
                    </div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input mt-4"><h6>Quantity : </h6></div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input mt-4"><h6>Référence : </h6></div>

                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><input class="input_area w-50" name="quantity" type="number" value="1"/></div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><input class="input_area" name="reference" type="text"/></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input mt-4"><h6>Description : </h6></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><textarea onkeyup="countNumber(this.value)" name="description" class="input_area"></textarea><br/><p><span id="count_ID">0</span>/500</p></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-6 col-xl-6 container_input "><h6>Mots clé : </h6></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><textarea name="keyword" class="input_area"></textarea></div>


                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><h6>Prix : </h6></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input_area w-50" name="price" type="text"/>€</div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input text-center mt-4"><a onclick="back_picture(1)" id="add_photo_ID" class="button_pictures">Ajouter des photos</a></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input text-center"><a>(formats accepté : png, jpg, jpeg) </a></div>

                    <section id="container_file_ID" class="container_file">

                            <fieldset class="container_pictures">
                                <legend class="fs-1 title_formulary">
                                    <h1>Ajouter des photos</h1>
                                </legend>
                                <div class="formulary_pictures">
                                    <div class=" w-100" style="position: relative; top: 0; text-align: right; color: white; cursor: pointer;">
                                        <p id="back_pictures" onclick="back_picture(2)">retour</p>
                                    </div>
                            <article class="formulary_form row">
                                <div class="col-12 col-xs-12 col-s-3 col-sm-3 col-md-3 col-xl-3 p_file mt-3">
                                    <label class="label_img" for="image1"><img id="img1" style="width: auto; height: 100%;" src="images/addPictures.png" /></label><input class="input_file"  onchange="preview(this, 1)" id="image1" type="file" name="image_files_1" accept="image/png, image/jpg, image/jpeg"/></div>
                                <div class="col-12 col-xs-12 col-s-3 col-sm-3 col-md-3 col-xl-3 p_file mt-3"><label class="label_img" for="image2"><img id="img2" style="width: auto; height: 100%;" src="images/addPictures.png" /></label><input class="input_file" onchange="preview(this, 2)" id="image2" name="image_files_2" type="file" accept="image/png, image/jpg, image/jpeg"/></div>
                                <div class="col-12 col-xs-12 col-s-3 col-sm-3 col-md-3 col-xl-3 p_file mt-3"><label class="label_img" for="image3"><img id="img3" style="width: auto; height: 100%;" src="images/addPictures.png" /></label><input class="input_file" onchange="preview(this, 3)" id="image3" type="file" name="image_files_3" accept="image/png, image/jpg, image/jpeg"/></div>
                                <div class="col-12 col-xs-12 col-s-3 col-sm-3 col-md-3 col-xl-3 p_file mt-3"><label class="label_img" for="image4"><img id="img4" style="width: auto; height: 100%;" src="images/addPictures.png" /></label><input class="input_file" onchange="preview(this, 4)"  name="image_files_4" id="image4" type="file" accept="image/png, image/jpg, image/jpeg"/></div>



                            </article>
                                </div>
                            </fieldset>

                    </section>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input submit_input"><input class="input input_sub" type="submit" name="form_addproduct" value="Valider"/></div>

                </form>
            </div>
        </fieldset>
    </section>
<script>
    //open and close block to upload images
    function back_picture(n)
    {

        if(n == 1)
        {
            $("#container_file_ID").css("display", "flex");
            $("body").css("overflow", "hidden");
        }
        else if(n == 2)
        {
            $("#container_file_ID").css("display", "none");
            $("body").css("overflow", "auto");

        }
    }

    function conditions()
    {
        console.log($("#etat_ID").val());
        if($("#etat_ID").val() == "occasion")
        {
            $("#condition_ID").css("display", "block");
        }
        else
        {
            $("#condition_ID").css("display", "none");
        }
    }


    //preview image
    function preview(input, num){

        var file = $(input).get(0).files[0];
        console.log(file);

        if(file) {
            console.log(file)
            var reader = new FileReader();

            reader.onload = function () {
                $("#img"+num).attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
        }

        //count charactere of description
        function countNumber(n)
    {
        console.log(n.length);
        $("#count_ID").text(n.length);
    }
</script>
<script src="js/check.js"></script>
</body>
</html>


