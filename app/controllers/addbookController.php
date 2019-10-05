<?php
//importing book class
include("models/book.php");

//Controller for all actions on the Addbook page
class addbookController{

    public function publish($title, $publisher,  $publishDate, $postDate, $edition, $author, $nubPages, $book, $audioBook, $coverPic, $catId, $description, $subscriptionPrice, $pyaBook){

        $Book = new Book();
        $Book->createBook($title, $publisher,  $publishDate, $postDate, $edition, $author, $nubPages, $book, $audioBook, $coverPic, $catId, $description, $subscriptionPrice, $pyaBook);


    }
}


?>