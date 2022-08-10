<?php 
    include_once("connection.php");
    class review{

        public static function addReview($customerid, $productid, $rating, $comment, $time){
            $sql = "INSERT INTO review (CustomerID, ProductID, Rating, Comment, Time) VALUES ('$customerid', '$productid', '$rating', '$comment', '$time')";
            echo $sql;
            return Insert($sql);
        }

        public static function getAllReview(){
            $sql = "SELECT * FROM review INNER JOIN product ON review.ProductID = product.ProductID";
            return Select($sql);
        }

        public static function getByIDProduct($id){
            $sql = "SELECT * FROM review WHERE ProductID = '$id'";
            return Select($sql);
        }

        public static function deleteReview($id){
            $sql = "DELETE FROM review WHERE ID = '$id'";
            return Delete($sql);

        }
        

    }



?>