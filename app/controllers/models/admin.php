<!-- Styling for the modal after action performed -->
<style media="screen">

        hr {
        opacity: 0.3;
        border-color: #000;
        }

        #css-only-modals {
        position: fixed;
        pointer-events: none;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 10000000;
        text-align: center;
        white-space: nowrap;
        height: 100%;
        }

        #css-only-modals:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -0.25em;
        }

        .css-only-modal-check {
        pointer-events: auto;
        }

        .css-only-modal-check:checked ~ .css-only-modal {
        opacity: 1;
        pointer-events: auto;
        }

        .css-only-modal {
        width: 40%;
        background: #FFF;
        z-index: 1;
        display: inline-block;
        position: relative;
        pointer-events: auto;
        padding: 25px;
        text-align: right;
        border-radius: 4px;
        white-space: normal;
        display: inline-block;
        vertical-align: middle;
        opacity: 0;
        pointer-events: none;
        }

        .css-only-modal h2 {
        text-align: center;
        }

        .css-only-modal p {
        text-align: left;
        }

        .css-only-modal-close {
        position: absolute;
        top: 25px;
        right: 25px;
        }

        .css-only-modal-check {
        display: none;
        }

        .css-only-modal-check:checked ~ #screen-shade {
        opacity: 0.5;
        pointer-events: auto;
        }

        #screen-shade {
        opacity: 0;
        background: #000;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        pointer-events: none;
        transition: opacity 0.8s;
        }

        .stripe > .container > p,
        .stripe > .container > ul {
        text-align: left;
        padding: 35px;
        margin: 0;
        }

        .stripe > .container > hr {
        margin: 50px 0;
        }

        #nav-spacer {
        display: block;
        height: 50px;
        }

        .stripe {
        width: 100%;
        text-align: center;
        overflow: hidden;
        }

        .default {
        color: White;
        background: DarkCyan;
        }

        .inverse {
        color: DarkCyan;
        background: White;
        }

        .grey {
        color: White;
        background: DimGrey;
        }

        .grey-light {
        color: DimGrey;
        background: White;
        }

        .color {
        color: DarkOrange;
        }
</style>


<?php



class admin {

    

    // public 'loginAdmin()' method
    public function loginAdmin($email, $password){
    include ("config.php");
    
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message

 

    // SQL query to fetch information of registerd admin users and finds user match.
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password' LIMIT 1";
    $result = mysqli_query($con, $query);
    
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
    $_SESSION['login_user']=$email; // Initializing Session
    header("location: ../../app/views/admin"); // Redirecting To Other Page
    echo "found in DB";
    } else {
    $error = '
    <div id="css-only-modals">
    <input id="modal1" class="css-only-modal-check" type="checkbox" checked/>
    <div class="css-only-modal">
    <label for="modal1" class="css-only-modal-close"><a href="index.php"><i class="fa fa-times fa-2x"></i></a></label>
    <h2>Error!</h2>
      <hr />
    <center><img src="../../app/views/admin/img/icons/error.png" width="80" height="80" alt="error image"><br/><br/>
      <strong>'.$email.'</strong>, Please check your E-mail or Password and try again.
    </center>
    <br/><br/>
      <label for="modal1" class="css-only-modal-btn btn btn-primary btn-lg">Okay</label>
    </div>
    <div id="screen-shade"></div>
    </div>
        
            ';
    echo $error;
    }
    mysqli_close($con); // Closing Connection
   



        
    }
}

?>
