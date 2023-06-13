var Tr = "2px solid green";
var Fl = "2px solid red";
function inscription(e)
{
    var check = true
    var num = 0;

    //USERNAME
    var pattern = /^[a-zA-Z0-9_\-]{2,50}$/;
    var name = $("#form_ID input[name=username]");
    if(pattern.test(name.val()) == false)
    {
        name.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {
        name.removeClass("falseform").addClass("trueform");
    }


    //FIRSTNAME
    var pattern = /^[a-zA-Z\- ]{2,50}$/;
    var name = $("#form_ID input[name=firstname]");
    if(pattern.test(name.val()) == false)
    {
        name.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {
        name.removeClass("falseform").addClass("trueform");
    }


//LASTNAME
    var pattern = /^[a-zA-Z\- ]{2,50}$/;
    var name = $("#form_ID input[name=lastname]");
    if(pattern.test(name.val()) == false)
    {
        name.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {
        name.removeClass("falseform").addClass("trueform");
    }


//EMAIL
    var pattern = /^[a-z0-9\-.]{1,50}@[a-z]{1,15}\.[a-z]{1,9}$/;
    var name = $("#form_ID input[name=email]");
    if(pattern.test(name.val()) == false)
    {
        name.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {
        name.removeClass("falseform").addClass("trueform");
    }




    //DAY
    var pattern = /^(0[1-9])|(1[0-9])|(2[0-9])|(3[0-1]){1}$/;
    var name = $("#form_ID input[name=day]");
    if(pattern.test(name.val()) == false)
    {
        name.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {
        name.removeClass("falseform").addClass("trueform");
    }


    //MONTH
    var pattern = /^(0[1-9])|(1[0-2]){1}$/;
    var name = $("#form_ID input[name=month]");
    if(pattern.test(name.val()) == false)
    {
        name.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {
        name.removeClass("falseform").addClass("trueform");
    }


    //YEAR
    var date = new Date();
    var pattern = /^[0-9]{4}$/;
    var name = $("#form_ID input[name=year]");
    var minyear = date.getFullYear()-18;
    var maxyear = date.getFullYear()-170;
    if((pattern.test(name.val()) == false) || (name.val() > minyear || name.val() < maxyear))
    {

        name.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {


        name.removeClass("falseform").addClass("trueform");
    }

    var pattern = /^(0[1-9]{1}|1[0-2]{1}){1}$/;
    var name = $("#form_ID input[name='sex']").data('sex','sex');
    var block_sex = $("#form_ID [data-sex=block_sex]");


    if(name.eq(0).prop("checked") == false && name.eq(1).prop("checked") == false)
    {
        block_sex.removeClass("trueform").addClass("falseform");

        check = false;

    }
    else
    {
        block_sex.removeClass("falseform");

    }

    var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,50}$/;
    var name = $("#form_ID input[name=password]");
    var name1 = $("#form_ID input[name=password2]");

    if((pattern.test(name.val()) == false))
    {
        name.removeClass("trueform").addClass("falseform");
        name1.removeClass("trueform").addClass("falseform");


        check = false;
    }
    else if(name.val() != name1.val())
    {
        name.removeClass("trueform").addClass("falsepassword");
        name1.removeClass("trueform").addClass("falsepassword");

        check = false;
    }
    else
    {
        name.removeClass("falseform");
        name1.removeClass("falseform");
        name.removeClass("falsepassword").addClass("trueform");
        name1.removeClass("falsepassword").addClass("trueform");


    }


    return check;


}

function inscription_password()
{




    var name = $("#form_ID input[name=password]");
    var colorT = "lime";
    var colorF = "white";
    var dt = $("#form_ID [data-password=blind-min]")

    var pattern = /[a-z]+/;
    if(pattern.test(name.val()) == true)
    {
        dt.css("color", colorT);
    }
    else
    {
        dt.css("color", colorF);
    }

    var dt = $("#form_ID [data-password=blind-maj]")
    var pattern = /[A-Z]+/;
    if(pattern.test(name.val()) == true)
    {
        dt.css("color", colorT);
    }
    else
    {
        dt.css("color", colorF);
    }

    var dt = $("#form_ID [data-password=blind-number]")
    var pattern = /[0-9]+/;
    if(pattern.test(name.val()) == true)
    {
        dt.css("color", colorT);
    }
    else
    {
        dt.css("color", colorF);
    }

    var dt = $("#form_ID [data-password=blind-specialcaracter]")
    var pattern = /[@$!%?&]+/;
    if(pattern.test(name.val()) == true)
    {
        dt.css("color", colorT);
    }
    else
    {
        dt.css("color", colorF);
    }

    var dt = $("#form_ID [data-password=blind-caracter]")
    if(name.val().length >= 8 && name.val().length <= 50)
    {
        dt.css("color", colorT);
    }
    else
    {
        dt.css("color", colorF);
    }
    var countnumber = name.val().length>50?1:0;

    if(countnumber == 1)
    {
        dt.text("- 8 caractères | vous avez dépasser le nombre de caratères autorisé");
    }
    else
        {
            dt.text("- 8 caractères.")
        }




}

function add_product()
{

    var check = true;
    //TITLE
    var pattern = /^[a-zA-Z0-9éàûâîçè!?€_\-. ]{2,100}$/;
    var name = $("#form_add_product_ID input[name=title]");
    if(pattern.test(name.val()) == false)
    {

        name.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {


        name.removeClass("falseform").addClass("trueform");
    }

    //CATEGIRY
    var name = $("#form_add_product_ID select[name=categorie]");
    nameval = name.val();

    if((nameval != 0) && (nameval == 'adventure_game' || nameval == "shooting_game" || nameval == "battle_game" || nameval == "platform_game" || nameval == "reflection_game" || nameval == "role_playing_game" || nameval == "adventure_game" || nameval == "shooting_game" || nameval == "battle_game" || nameval == "platform_game" || nameval == "reflection_game" || nameval == "role_playing_game" || nameval == "playstation_5" || nameval == "playstation_5_digital" || nameval == "playstation_4" || nameval == "xbox_serie_x" || nameval == "xbox_serie_s" || nameval == "xbox_one" || nameval == "pc_portable" || nameval == "pc_gaming" || nameval == "pop" || nameval == "realist" || nameval == "collector"))
    {

        name.removeClass("falseform").addClass("trueform");


    }
    else
    {


        name.removeClass("trueform").addClass("falseform");
        check = false;

    }



    //NEWOLD
    var name = $("#form_add_product_ID select[name=newold]");
    nameval = name.val();
    var name1 = $("#form_add_product_ID select[name=condition]");
    nameval1 = name1.val();
    if((nameval == "new") || (nameval == 'occasion' && (nameval1 == "1" || nameval1 == "2" || nameval1 == "3")))
    {

        name.removeClass("falseform").addClass("trueform");
        name1.removeClass("falseform").addClass("trueform");


    }
    else
    {


        name.removeClass("trueform").addClass("falseform");
        name1.removeClass("trueform").addClass("falseform");
        check = false;

    }

    var pattern = /^[0-9]{1,10}$/;
    var name = $("#form_add_product_ID input[name=quantity]");
    if(pattern.test(name.val()) == false)
    {

        name.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {


        name.removeClass("falseform").addClass("trueform");
    }

    var pattern = /^[a-zA-Z0-9éàûâîçè!?€_\-. \'\" ]{1,500}$/;
    var name = $("#form_add_product_ID textarea[name=description]");
    if(pattern.test(name.val()) == false)
    {

        name.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {


        name.removeClass("falseform").addClass("trueform");
    }

    var pattern = /^[0-9.,]{1,10}$/;
    var name = $("#form_add_product_ID input[name=price]");
    if(pattern.test(name.val()) == false)
    {

        name.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {


        name.removeClass("falseform").addClass("trueform");
    }

    var name = $("#form_add_product_ID input[name=image_files_1]");
    var block = $("#add_photo_ID");

    if(name.get(0).files[0] == undefined)
    {

        block.removeClass("trueform").addClass("falseform");

        check = false;
    }
    else
    {
        block.removeClass("falseform").addClass("trueform");
    }







    return check;
}