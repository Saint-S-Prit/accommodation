$(document).ready(function(){

    //add student
    createStudent();


    //add room
    createRoom();



});

$('#adresse').hide();
$('#sholarship').hide();
$('#housing').hide();
$('#room').hide();

    //add field dynamic
    $(document).on('click','#cholarshipsroom',function(){

        if( $('input[name=cholarshipsroom]').is(':checked') ){
            
            $('#housing').show();
            $('#sholarship').show();
            $('#room').show();
        }
    });

    $(document).on('click','#cholarships',function(){

        if( $('input[name=cholarships]').is(':checked') ){

            $('#sholarship').show();
            $('#adresse').show();
        }
    });

    $(document).on('click','#nocholarships',function(){

            if( $('input[name=nocholarships]').is(':checked')){

                $('#adresse').show();
        }
    });


    //function for add new student
    function createStudent(){
        var matricule = $('#student1_matricule').val();
        var firstname = $('#student1_firstName').val();
        var lastname = $('#student1_lastName').val();
        var birthday = $('#student1_birthday').val();
        var email = $('#student1_email').val();
        var phone = $('#student1_phone').val();

    //valide field one by one
    $('#student1_matricule').keyup(function ()
    {
        var matricule = $('#student1_matricule').val();
        // vérifier si la matricule
        var reg = /^[a-zA-Z0-9@]{3,15}$/;
        if (reg.test(matricule))
        {
            $('#valideMatricule').html("valide");
            $('#ErreurMatricule').html("");
        }
        else
        {
            $('#valideMatricule').html("");
            $('#ErreurMatricule').html("Must be 6-15 characters long. ");
            
        }
    });

    $('#student1_firstName').keyup(function ()
    {
         var firstname = $('#student1_firstName').val();
        // vérifier si la firstname
        var reg = /^[a-zA-Z0-9@]{3,15}$/;
        if (reg.test(firstname))
        {
            $('#valideFirstname').html("valide");
            $('#ErreurFirstname').html("");
        }
        else
        {
            $('#valideFirstname').html("");
            $('#ErreurFirstname').html("Must be 6-15 characters long. ");
            
        }
    });


    $('#student1_lastName').keyup(function ()
    {
         var lastname = $('#student1_lastName').val();
        // vérifier si la lastname
        var reg = /^[a-zA-Z0-9@]{3,15}$/;
        if (reg.test(lastname))
        {
            $('#valideLastname').html("valide");
            $('#ErreurLastname').html("");
        }
        else
        {
            $('#valideLastname').html("");
            $('#ErreurLastname').html("Must be 6-15 characters long. ");
            
        }
    });

    $('#student1_birthday').keyup(function ()
    {
        var birthday = $('#student1_birthday').val();
         var regbirthday =/^([0-2][0-9]|(3)[0-1])[/.-](((0)[0-9])|((1)[0-2]))[/.-]\d{4}$/i;
            if (regbirthday.test(birthday))
            {
                $('#valideBirthday').html("valide");
                $('#ErreurBirthday').html("");
            }
            else
            {
                $('#valideBirthday').html("");
                $('#ErreurBirthday').html('your date is note valid !');
            }
    });

    $('#student1_email').keyup(function ()
    {
        var email = $('#student1_email').val();
        var regMail =/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
        if (regMail.test(email))
        {
            $('#valideEmail').html("valide");
            $('#ErreurEmail').html("");
        }
        else
        {
            $('#valideEmail').html("");
            $('#ErreurEmail').html('your mail is note valid !');
        }
    });


    $('#student1_phone').keyup(function ()
    {
        var phone = $('#student1_phone').val();
        var regPhone =/^7[0,5-8]{1}[0-9]{7}$/;
        if (regPhone.test(phone))
        {
            $('#validePhone').html("valide");
            $('#ErreurPhone').html("");
        }
        else
        {
            $('#validePhone').html("");
            $('#ErreurPhone').html('your mail is note valid !');
        }
    });



    $('#addStudent').on('submit',function(e)
    {

        var error = false;
        // var sholarship = $('#student1_sholarship').val();
        // var housing = $('#student1_housing').val();
        // var room = $('#student1_room').val();

        var matricule = $('#student1_matricule').val();
        var firstname = $('#student1_firstName').val();
        var lastname = $('#student1_lastName').val();
        var birthday = $('#student1_birthday').val();
        var email = $('#student1_email').val();
        var phone = $('#student1_phone').val();

        //if valide fields are not empty
        if (matricule != "" && firstname != "" && lastname != "" && email != "" && phone != "" && birthday != "") {

            error = true;
            alert('Valide!');
        }
        else
        {
            e.preventDefault();
            error = false;
            alert('remplir tous!');
        }
    });




}

  //function for add new room
    function createRoom(){

        $('#room1_nameRoom').keyup(function ()
        {
            var nameRoom = $('#room1_nameRoom').val();
            var reg = /^[a-zA-Z0-9@]{2,5}$/;
            if (reg.test(nameRoom))
            {
                $('#validenameRoom').html("valide");
                $('#ErreurnameRoom').html("");
            }
            else
            {
                $('#validenameRoom').html("");
                $('#ErreurnameRoom').html("Must be 6-15 characters long. ");

            }
        });


        $('#addRoom').on('submit',function(e)
        {

            var error = false;

            var typeRoom = $('#room1_typeRoom').val();
            var nameRoom = $('#room1_nameRoom').val();

            //if valide fields are not empty
            if (nameRoom != "" &&  typeRoom != "") {

                error = true;
                alert('Valide!');
            }
            else
            {
                e.preventDefault();
                error = false;
                alert('remplir tous!');
            }
        });
    };


