<?php 
    include_once("connection.php");
    class invoice{

        public static function getAll(){
            $sql="SELECT * FROM invoice ORDER BY InvoiceID DESC";
            return Select($sql);
        }

        public static function getInvoiceDetail($id){
            $sql="SELECT * FROM invoicedetail where InvoiceID='$id'";
            return Select($sql);
        }

        public static function addInvoice($recepient,$date,$total,$deliveryid,$employee){
            $sql="INSERT INTO invoice (Recipient,Date,Total,DeliveryID,EmployeeID) VALUES 
            ('$recepient','$date','$total','$deliveryid','$employee')";
            return Insert($sql);
        } 
        public static function addInvoiceDetail($id,$productid,$quanity,$price,$subtotal){
            $sql="INSERT INTO invoicedetail(InvoiceID,ProductID,Quanity,Price,Subtotal) VALUES 
            ('$id','$productid','$quanity','$price','$subtotal')";
            return Insert($sql);
        }
        
        public static function getLastInvoiceID(){
            $sql="SELECT InvoiceID FROM invoice ORDER BY InvoiceID desc limit 1";
            $id=0;
            if($row=Select($sql)->fetch_array())
                $id=$row[0];
            return $id;
        }
        public static function deleteInvoice($id){
            $sql="DELETE FROM invoice WHERE InvoiceID='$id'";
            return Delete($sql);
        }
        public static function deleteInvoiceDetail($id){
            $sql="DELETE FROM invoicedetail WHERE InvoiceID='$id'";
            return Delete($sql);
        }


    }

?>