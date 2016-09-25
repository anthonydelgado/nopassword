<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 9/25/16
 * Time: 3:26 PM
 */

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>noPassword</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="bower_components/materialize/dist/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/materialize/dist/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="  amber lighten-3">
<nav class="grey darken-3 white-text center">
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo center">noPassword Manager</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="https://github.com/anthonydelgado/nopassword">GitHub</a></li>
        </ul>
    </div>
</nav>
<div class="container">

    <h1 class="center">noPassword Management System</h1>

    <p class="flow-text center">
        Save your passwords once and forget them for ever
    </p>

</div>





<div class="signup">
    <div class="container">
        <div class="row">


            <div class="col s7">
                <div class="row">

                    <div class="col s12">
                        <h4 class="center">Passwords</h4>
                    </div>

                    <div class="col s12">
                        <table>
                            <thead>
                            <tr>
                                <th data-field="name">Name</th>
                                <th data-field="role">Role</th>
                                <th data-field="role">Start Date</th>
                                <th data-field="price">Monthly Rate</th>
                                <th data-field="action">Action</th>
                            </tr>
                            </thead>

                            <tbody id="employee-list">
                            <!--Example Data-->
                            <!--<tr>-->
                            <!--<td>Anthony Delgado</td>-->
                            <!--<td>Technology Hero</td>-->
                            <!--<td>2/6/1986</td>-->
                            <!--<td>$10,000</td>-->
                            <!--</tr>-->
                            <!--END Example Data-->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            <form class="col s5">
                <div class="row">

                    <div class="col s12">
                        <h4 class="center">Add Website</h4>
                    </div>

                    <div class="input-field col s6">
                        <input id="name" type="text" class="input-box">
                        <label for="name">User Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="role" type="text" class="input-box">
                        <label for="role">App/Website</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="date">Password</label>
                        <input id="date" type="password" class="input-box">
                    </div>
                    <div class="input-field col s6">
                        <input id="rate" type="text" class="input-box">
                        <label for="rate">Monthly Rate</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="input-box">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="input-box">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center">
                        <a  id="addnewuser"  class="btn btn-large waves-effect waves-light">
                            Add User
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
<footer class="page-footer  grey darken-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">HR Management</h5>
                <p class="grey-text text-lighten-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur at aut beatae delectus doloremque dolorum ducimus eligendi ex exercitationem incidunt molestiae molestias nostrum obcaecati quas qui quibusdam, quidem veritatis voluptas?
                </p>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 HR Management
            <a class="grey-text text-lighten-4 right" href="#!">powered by Firebase!</a>
        </div>
    </div>
</footer>


<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/3.4.0/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyCssPInAISDk4K-uksx1CyeEZbPLS71OMk",
        authDomain: "devlife-32a35.firebaseapp.com",
        databaseURL: "https://devlife-32a35.firebaseio.com",
        storageBucket: "devlife-32a35.appspot.com",
        messagingSenderId: "217816168589"
    };
    firebase.initializeApp(config);



    // Create a variable to reference the database
    var database = firebase.database();


    // At the initial load, get a snapshot of the current data.

    database.ref().on("value", function(snapshot) {



        // Log the value of the various properties
        console.log(snapshot.val());


        // If any errors are experienced, log them to console.
    }, function (errorObject) {

        console.log("The read failed: " + errorObject.code);

    });

    $(document).on('click', '#addnewuser', function () {

        var name = $('#name').val();
        console.log(name);
        var rate = $('#rate').val();
        console.log(rate);
        var date = $('#date').val();
        console.log(date);
        var role = $('#role').val();
        console.log(role);
        var email = $('#email').val();
        console.log(email);

        database.ref().push({ 'name': name, 'rate': rate , 'date': date , 'role': role , 'email': email });
        $(".input-box").val("");
        $(".datepicker").val("");


    });


    $(document).on('click', '.removeuser', function () {

        //    delete user
        var key =   $(this).data('key');
        //    alert(key);


        var adaRef = firebase.database().ref(key);
        adaRef.remove()
            .then(function() {
                console.log("Remove succeeded.");
                $("." + key ).fadeOut();
            })
            .catch(function(error) {
                console.log("Remove failed: " + error.message);
            });

    });

    database.ref().on("child_added", function(childSnapshot) {
        // Log everything that's coming out of snapshot
        console.log(childSnapshot.val().name);
        console.log(childSnapshot.val().rate);
        console.log(childSnapshot.val().date);
        console.log(childSnapshot.val().role);


        console.log(childSnapshot.val());

        var key = childSnapshot.getKey();

        // full list of items
        $('#employee-list').append(
            "<tr class='user-row " + key + "'>" +
            "<td> " + childSnapshot.val().name + " </td>" +
            "<td> " + childSnapshot.val().role + " </td>" +
            "<td> " + childSnapshot.val().date + " </td>" +
            "<td> " + childSnapshot.val().rate + " </td>" +
            "<td><a data-key='" + key + "' class='waves-effect waves-light removeuser btn'>Delete</a></td>" +
            "</tr>"
        );


// Handle the errors
    }, function(errorObject){
        console.log("Errors handled: " + errorObject.code)
    });


    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
</script>
<!--powered by Firebase.-->
</body>
</html>
