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

class User {
 
    private $fname;
    private $lname;
    private $password;
    private $email;
    private $phone;
    private $reg_date;
    private $gender;
    private $picture;
    private $sub_books;
 
	
 
	public function getName() {
		return $this->name;
	}
 
	public function isAdult() {
		return $this->age >= 18?"an Adult":"Not an Adult";
	}
    
    public function createUser($fname, $lname, $password, $email, $phone, $reg_date, $gender, $picture, $sub_books = 0 ){
        include("config.php");

        //Encrypting the password
        $password = crypt($password,'encrypt');

        $this->fname = $fname;
        $this->lname = $lname;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->reg_date = $reg_date;
        $this->gender = $gender;
        $this->picture = $picture;
        $this->sub_books = $sub_books;
    

        // Insert record
        $query = "INSERT INTO normaluser(fname, lname, password, email, phone, regDate, gender, picture, subBooks) VALUES('".$this->fname."','".$this->lname."','".$this->password."','".$this->email."','".$this->phone."','".$this->reg_date."','".$this->gender."','".$this->picture."','".$this->sub_books."')";

        mysqli_query($con,$query);
        
        echo '
                  <div id="css-only-modals">
                  <input id="modal1" class="css-only-modal-check" type="checkbox" checked/>
                  <div class="css-only-modal">
                  <label for="modal1" class="css-only-modal-close"><a href="../../views/loginform.php"><i class="fa fa-times fa-2x"></i></a></label>
                  <h2>Welcome, '.$this->fname.'</h2>
                    <hr />
                  <center><img src="admin/img/icons/success.png" width="80" height="80"><br/><br/>
                    <strong>Great!</strong> account creation was successful. <br> You can now login
                  </center>
                  <br/><br/>
                    <label for="modal1" class="css-only-modal-btn btn btn-primary btn-lg">Okay</label>
                  </div>
                  <div id="screen-shade"></div>
                  </div>
             ';

    }


    // public 'loginUser()' method
    public function loginUser($email, $password){
      //Decrypting the password
      $password = crypt($password,'encrypt');
      include ("config.php");
      
      session_start(); // Starting Session
      $error=''; // Variable To Store Error Message
  
      
  
      // SQL query to fetch information of registerd admin users and finds user match.
      $query = "SELECT * FROM normaluser WHERE email = '$email' AND password = '$password' LIMIT 1";
      $result = mysqli_query($con, $query);
      

      $rows = mysqli_num_rows($result);

      if ($rows == 1) {
      $_SESSION['login_user'] = $email; // Initializing Session
      $_SESSION['Fname'] = $userName;
      header("location: ../../app/views/library"); // Redirecting To Other Page

      } else {
      $error = '
      <div id="css-only-modals">
      <input id="modal1" class="css-only-modal-check" type="checkbox" checked/>
      <div class="css-only-modal">
      <label for="modal1" class="css-only-modal-close"><a href="../../app/views/loginform.php"><i class="fa fa-times fa-2x"></i></a></label>
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