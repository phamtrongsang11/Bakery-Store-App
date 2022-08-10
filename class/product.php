<?php 
    include_once("connection.php");
    class product{
        
        public $CategoryID, $ProducerID, $ProductName, $Cpu, $Ram, $Har, $Des, $Amount, $Image, $Price;

        public function __construct($CategoryID, $ProducerID, $ProductName, $Cpu, $Ram, $Har, $Des, $Amount, $Image, $Price){
            $this->CategoryID = $CategoryID;
            $this->ProducerID = $ProducerID;
            $this->ProductName = $ProductName;
            $this->Cpu = $Cpu;
            $this->Ram = $Ram;
            $this->Har = $Har;
            $this->Des = $Des;
            $this->Amount = $Amount;
            $this->Image = $Image;
            $this->Price = $Price;
        }

        public static function insert($product){
            $sql="INSERT INTO product (CategoryID,ProducerID,ProductName,Cpu,Ram,Hardware,Description,Amount,Image,Price) 
            VALUES ('$product->CategoryID','$product->ProducerID','$product->ProductName','$product->Cpu','$product->Ram','$product->Har',
            '$product->Des','$product->Amount','$product->Image','$product->Price')";
            return Insert($sql);
        }
        public static function update($product,$id){
            $sql="UPDATE product SET CategoryID='$product->CategoryID',ProducerID='$product->ProducerID',
            ProductName='$product->ProductName',Cpu='$product->Cpu',Ram='$product->Ram',Hardware='$product->Har',
            Description='$product->Des',Amount='$product->Amount',Image='$product->Image',Price='$product->Price' 
            WHERE ProductID = '$id'";
            return Update($sql);
        }
        public static function update_withoutImage($ProductName,$CategoryID,$ProducerID,$Cpu,$Ram,$Har,$Des,$Amount,$Price,$id){
            $sql="UPDATE product SET CategoryID='$CategoryID',ProducerID='$ProducerID',ProductName='$ProductName',
            Cpu='$Cpu',Ram='$Ram',Hardware='$Har',Description='$Des',Amount='$Amount',Price='$Price'
            WHERE ProductID = '$id'";
            return Update($sql);
        }
        public static function delete($id){
            $sql="DELETE FROM product WHERE ProductID='$id'";
            return Delete($sql);
        }

        public static function getAll(){
            $sql="SELECT * FROM product ORDER BY ProductID DESC";
            return Select($sql);
        }
        public static function getNew(){
            $sql="SELECT * FROM product ORDER BY ProductID DESC LIMIT 5";
            return Select($sql);
        }
        public static function getNew9(){
            $sql="SELECT * FROM product ORDER BY ProductID DESC LIMIT 9";
            return Select($sql);
        }
        public static function getListByCateID($cateid){
            $sql="SELECT * FROM product WHERE CategoryID='$cateid'";
            return Select($sql);
        }

        public static function getListByCateIDs($cateid){
            $sql="SELECT * FROM product WHERE CategoryID IN ($cateid)";
            return Select($sql);
        }

        public static function getByID($productID){
            $sql="SELECT * FROM product WHERE ProductID='$productID'";
            return Select($sql);
        }

        public static function getListByID($productIDs){
            $sql="SELECT * FROM product WHERE ProductID IN ($productIDs)";
            return Select($sql);
        }

        public static function getAmount($productID){
            $sql="SELECT Amount FROM product WHERE ProductID='$productID'";
            $row=Select($sql)->fetch_array();
            return $row[0];
        }
        public static function updateQty($productID,$qty){
            $sql="UPDATE product SET Amount='$qty' WHERE ProductID='$productID'";
            echo $sql;
            return Update($sql);
        }

        public static function getAllImg($id){
            $sql="SELECT * FROM productimage where ProductID='$id'";
            return Select($sql);
        }

        public static function addImg($id,$img){
            $sql="INSERT INTO productimage (ProductID,Image) VALUES ('$id','$img')";
            return Insert($sql);
        }

        public static function deleteImg($id,$idprod){
            $sql="DELETE FROM productimage WHERE ID='$id' AND ProductID='$idprod'";
            return Delete($sql);
        }
        public static function getListByCateID_pagination($cateid,$start,$limit){
            $sql="SELECT * FROM product WHERE CategoryID='$cateid' LIMIT $start, $limit";
            return Select($sql);
        }

        public static function select_pagination($start,$limit){
            $sql="SELECT * FROM product ORDER BY ProductID DESC LIMIT $start, $limit";
            return Select($sql);
        }

        public static function select_price($min,$max){
            $sql="SELECT * FROM product WHERE Price BETWEEN $min AND $max";
            return Select($sql);
        }

        public static function select_prod_price($prod,$min,$max){
            $sql="SELECT * FROM product WHERE ProducerID IN ($prod) and Price BETWEEN $min AND $max";
            return Select($sql);
        }

       
        public static function select_cate_price($cate, $min, $max){
            $sql="SELECT * FROM product WHERE CategoryID IN ($cate) and Price BETWEEN $min AND $max";
            return Select($sql);
        }

        public static function select_discount($idDiscount){
            $sql = "SELECT * FROM discountdetail WHERE DiscountID = '$idDiscount'";
            return Select($sql);
        }

        public static function select_price_pagination($min,$max,$start,$limit){
            $sql="SELECT * FROM product WHERE Price  BETWEEN $min AND $max ORDER BY ProductID DESC LIMIT $start, $limit";
            return Select($sql);
        }

        public static function select_cate_prod_price($cate, $prod, $min, $max){
            $sql="SELECT * FROM product WHERE CategoryID IN ($cate) AND ProducerID IN ($prod) and Price BETWEEN $min AND $max";
            return Select($sql);
        }

        public static function select_cate_prod_price_pagination($cate,$prod,$min,$max,$start,$limit){
            $sql="SELECT * FROM product WHERE CategoryID IN ($cate) AND ProducerID IN ($prod) AND Price BETWEEN $min AND $max LIMIT $start, $limit";
            return Select($sql);
        }

        public static function select_cate_price_pagination($cate,$min,$max,$start,$limit){
            $sql="SELECT * FROM product WHERE CategoryID IN ($cate) AND Price BETWEEN $min AND $max LIMIT $start, $limit";
            return Select($sql);
        }

        public static function select_prod_price_pagination($prod,$min,$max,$start,$limit){
            $sql="SELECT * FROM product WHERE ProducerID IN ($prod) and Price BETWEEN $min AND $max LIMIT $start, $limit";
            return Select($sql);
        }

        public static function select_discount_pagination($idDiscount,$start,$limit){
            $sql = "SELECT * FROM product INNER JOIN discountdetail ON (product.ProductID=discountdetail.ProductID) 
            WHERE DiscountID = '$idDiscount' LIMIT $start, $limit";
            return Select($sql);
        }

        public static function getByProducer($prod){
            $sql="SELECT * FROM product WHERE ProducerID='$prod' ORDER BY ProductID DESC";
            return Select($sql);
        } 

        public static function getByProducer_pagination($prod,$start,$limit){
            $sql="SELECT * FROM product WHERE ProducerID='$prod' LIMIT $start, $limit";
            return Select($sql);
        } 
        

        public static function getByName($name){
            $sql="SELECT * FROM product WHERE ProductName LIKE '%$name%'";
            return Select($sql);
        } 

        public static function getByName_pagination($name,$start,$limit){
            $sql="SELECT * FROM product WHERE ProductName LIKE '%$name%' LIMIT $start, $limit";
            return Select($sql);
        } 

        public static function getDiscount($id){
            $today = date("y/m/d");
            
            $sql="SELECT Percent FROM discountdetail WHERE ProductID = '$id' AND DiscountID IN 
            (SELECT DiscountID FROM discount WHERE DateFrom <= '$today' AND DateTo >= '$today')";
            return Select($sql);
        }
        
        public static function getExpirationDatByID($id){
            $sql = "SELECT ExpirationDate FROM receivenotedetail WHERE ProductID = '$id' AND DATE(ExpirationDate) >= DATE(NOW()) 
            ORDER BY ExpirationDate ASC LIMIT 1";
            return Select($sql);
        }

    }

?>