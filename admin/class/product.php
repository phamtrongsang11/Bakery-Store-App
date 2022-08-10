<?php 
    include_once("connection.php");
    class product{
        
        public $CategoryID, $ProducerID, $ProductName, $Weight, $Ser, $Calory, $Ing, $Des, $Amount, $Image, $Price, $Cost, $Profit;

        public function __construct($CategoryID, $ProducerID, $ProductName, $Weight, $Ser, $Calory, $Ing, 
        $Des, $Amount, $Image, $Cost, $Profit, $Price){
            $this->CategoryID = $CategoryID;
            $this->ProducerID = $ProducerID;
            $this->ProductName = $ProductName;
            $this->Weight = $Weight;
            $this->Ser = $Ser;
            $this->Calory = $Calory;
            $this->Ing = $Ing;
            $this->Des = $Des;
            $this->Amount = $Amount;
            $this->Image = $Image;
            $this->Cost = $Cost;
            $this->Profit = $Profit;
            $this->Price = $Price;
            
        }

        public static function insert($product){
            $sql="INSERT INTO product (CategoryID,ProducerID,ProductName,Weight,Serving,Calory,Ingredient,Description,Amount,Image,
            Cost,Profit,Price) VALUES ('$product->CategoryID','$product->ProducerID','$product->ProductName','$product->Weight','$product->Ser','$product->Calory',
            '$product->Ing','$product->Des','$product->Amount','$product->Image','$product->Cost','$product->Profit','$product->Price')";
            return Insert($sql);
        }
        /*
        public static function update($product,$id){
            $sql="UPDATE product SET CategoryID='$product->CategoryID',ProducerID='$product->ProducerID',
            ProductName='$product->ProductName',Weight='$product->Weight',Serving='$product->Ser',Calory='$product->Calory'
            Ingredient='$product->Ing',Description='$product->Des',Image='$product->Image',
            Cost='$product->Cost',Profit='$product->Profit',Price='$product->Price' 
            WHERE ProductID = '$id'";
            return Update($sql);
        }*/
        public static function update($ProductName,$CategoryID,$ProducerID,$Weight,$Ser,$Calory,$Ing,$Des,$Image,$Cost,$Profit,$Price,$id){
            $sql="UPDATE product SET CategoryID='$CategoryID',ProducerID='$ProducerID',ProductName='$ProductName',
            Weight='$Weight',Serving='$Ser',Calory='$Calory',Ingredient='$Ing',Description='$Des',Image='$Image',
            Cost='$Cost',Profit='$Profit',Price='$Price'
            WHERE ProductID = '$id'";
            return Update($sql);
        }

        public static function update_withoutImage($ProductName,$CategoryID,$ProducerID,$Weight,$Ser,$Calory,$Ing,$Des,$Cost,$Profit,$Price,$id){
            $sql="UPDATE product SET CategoryID='$CategoryID',ProducerID='$ProducerID',ProductName='$ProductName',
            Weight='$Weight',Serving='$Ser',Calory='$Calory',Ingredient='$Ing',Description='$Des',
            Cost='$Cost',Profit='$Profit',Price='$Price'
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
            $sql="SELECT * FROM product ORDER BY ProductID ASC LIMIT 5";
            return Select($sql);
        }
        public static function getNew9(){
            $sql="SELECT * FROM product ORDER BY ProductID ASC LIMIT 9";
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
            $sql="SELECT Amount FROM product WHERE ProductID = '$productID'";
            return Select($sql)->fetch_array()[0];
            
        }
        public static function updateQty($productID, $qty){
            $sql="UPDATE product SET Amount='$qty' WHERE ProductID='$productID'";
            
            return Update($sql);
        }

        public static function getPrice($id){
            $sql="SELECT Price FROM product where ProductID='$id'";
            $row=Insert($sql)->fetch_array();
            return $row[0];
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

        public static function checkKey($id){
            $sql="SELECT COUNT(ProductID) FROM orderdetail WHERE ProductID='$id'";
            return insert($sql)->fetch_array();
        }

        public static function statisticWithCate($id,$cate,$dateFrom,$dateTo){
            $sql="SELECT SUM(invoicedetail.Quanity),SUM(invoicedetail.SubTotal) 
                FROM invoicedetail INNER JOIN product ON product.ProductID=invoicedetail.ProductID
                WHERE InvoiceID IN(SELECT InvoiceID FROM invoice WHERE cast(Date as DATE) BETWEEN '$dateFrom' AND '$dateTo')
                AND product.CategoryID=$cate
                GROUP BY invoicedetail.ProductID HAVING invoicedetail.ProductID=$id";
            return Select($sql);
        }

        public static function statistic($id,$dateFrom,$dateTo){
            $sql="SELECT SUM(invoicedetail.Quanity),SUM(invoicedetail.SubTotal) 
            FROM invoicedetail
            WHERE InvoiceID IN(SELECT InvoiceID FROM orders WHERE cast(Date as DATE) BETWEEN '$dateFrom' AND '$dateTo')
            GROUP BY ProductID HAVING ProductID = $id";
            return Select($sql);
        }

        public static function statisticMonth($month){
            $sql="SELECT SUM(invoicedetail.Quanity),SUM(invoicedetail.SubTotal) 
            FROM invoicedetail
            WHERE InvoiceID IN (SELECT InvoiceID FROM invoice WHERE MONTH(Date) = '$month')";
        
            return Select($sql);
        }

        public static function getIDStatus($id){
            $sql="SELECT Status FROM product WHERE ProductID='$id'";
            $row=Select($sql)->fetch_array();
            return $row[0];
        }

        public static function getNameStatus($id){
            $sql="SELECT Name FROM status_product WHERE ID='$id'";
            $row=Select($sql)->fetch_array();
            return $row[0];
        }

        public static function updateStatus($id,$amount){
            //echo $amount;
            if($amount <= 5 && $amount > 0){
                $sql="UPDATE product Set Status=2 WHERE ProductID='$id'";
            }
            else if($amount == 0){
                $sql="UPDATE product Set Status=3 WHERE ProductID='$id'";
            }
            else {
                $sql="UPDATE product Set Status=1 WHERE ProductID='$id'";
            }
           // else
             //   $sql="UPDATE product Set Status=3 WHERE ProductID='$id'";
            return Update($sql);
        }

        public static function getByProducerID($id){
            $sql="SELECT * FROM product WHERE ProducerID='$id'";
            return Select($sql);
        }
        public static function checkName($name){
            $sql="SELECT COUNT(ProductID) FROM product WHERE ProductName='$name'";
            return Select($sql)->fetch_array();
        }
        public static function checkQuantity($id){
            $sql="SELECT Amount FROM product WHERE ProductID = '$id'";
            return Select($sql)->fetch_array();
        }

        public static function getCost($id){
            $sql = "SELECT Cost FROM product WHERE ProductID = '$id'";
            return Select($sql)->fetch_array();
        }

        public static function updateCost($id,$cost){
            $sql = "UPDATE product SET Cost = '$cost' WHERE ProductID = '$id'";
            return Update($sql);
        }

        public static function getDiscount($id){
            $today = date("y/m/d");
            
            $sql="SELECT Percent FROM discountdetail WHERE ProductID = '$id' AND DiscountID IN 
            (SELECT DiscountID FROM discount WHERE DateFrom <= '$today' AND DateTo >= '$today')";
            return Select($sql);
        }

        public static function getExpirationDatAll(){
            $sql = "SELECT ReceiveID, product.ProductID, ProductName, ExpirationDate FROM product INNER JOIN receivenotedetail
            ON product.ProductID = receivenotedetail.ProductID ORDER BY ExpirationDate ASC";
            return Select($sql);
        }

        public static function getExpirationDatByID($id){
            $sql = "SELECT ExpirationDate FROM receivenotedetail WHERE ProductID = '$id' AND DATE(ExpirationDate) >= DATE(NOW()) 
            ORDER BY ExpirationDate ASC LIMIT 1";
            return Select($sql);
        }

    }

?>