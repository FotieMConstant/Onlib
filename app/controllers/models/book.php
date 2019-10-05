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

class Book {
 
    private $Adm_id;
    private $catId;
    private $title;
    private $publisher;
    private $publishDate;
    private $postDate;
    private $edition;
    private $author;
    private $nubPages;
    private $book;
    private $audioBook;
    private $coverPic;
    private $description;
    private $subscriptionPrice;
    private $pyaBook;
    private $subscriptions;

 
	
 
	public function getName() {
		return $this->name;
	}
 
	public function isAdult() {
		return $this->age >= 18?"an Adult":"Not an Adult";
	}
    
    public function createBook($title, $publisher,  $publishDate, $postDate, $edition, $author, $nubPages, $book, $audioBook, $coverPic, $catId, $description, $subscriptionPrice, $pyaBook){
        include("config.php");

        $this->Adm_id = 1;
        $this->catId = $catId;
        $this->title = $title;
        $this->publisher = $publisher;
        $this->publishDate = $publishDate;
        $this->postDate = $postDate;
        $this->edition = $edition;
        $this->author = $author;
        $this->nubPages = $nubPages;
        $this->book = $book;
        $this->audioBook = $audioBook;
        $this->coverPic = $coverPic;
        $this->description = $description;
        $this->subscriptionPrice = $subscriptionPrice;
        $this->pyaBook = $pyaBook;
        $this->subscriptions = 0;
       
    
        
        // Insert record
        $query = "INSERT INTO book(Adm_id, catId, title, publisher, publishDate, postDate, edition, author, nubPages, book, audioBook, coverPic, description, subscriptionPrice, pyaBook, subscriptions) 
        VALUES('{$this->Adm_id}','".$this->catId."','".$this->title."','".$this->publisher."','".$this->publishDate."','".$this->postDate."','".$this->edition."','".$this->author."','".$this->nubPages."','".$this->book."','".$this->audioBook."','".$this->coverPic."','".$this->description."','".$this->subscriptionPrice."','".$this->pyaBook."','".$this->subscriptions."')";
        mysqli_query($con,$query);
        echo '
                  <div id="css-only-modals">
                  <input id="modal1" class="css-only-modal-check" type="checkbox" checked/>
                  <div class="css-only-modal">
                  <label for="modal1" class="css-only-modal-close"><a href="../../views/admin/addbook.php"><i class="fa fa-times fa-2x"></i></a></label>
                  <h2>Information</h2>
                    <hr />
                  <center><img src="../../views/admin/img/icons/success.png" width="80" height="80"><br/><br/>
                    <strong>Great!</strong> , <span class="badge badge-primary">'.$this->title.'</span> published successfully.<br/>
                    Go to site: <a target="_BLANK" href="http://localhost/ONLIB/Project%20ONLIB/app/views/library">Visit here</a>
                  </center>
                  <br/><br/>
                    <label for="modal1" class="css-only-modal-btn btn btn-primary btn-lg">Okay</label>
                  </div>
                  <div id="screen-shade"></div>
                  </div>
             ';

    }
  
 
   
  
    
  }
?>