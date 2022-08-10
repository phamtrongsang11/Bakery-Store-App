		
<?php
if(isset($_GET['action'])){	
	$act=$_GET['action'];
    switch($act){
        case "product":
            if(isset($_GET['idAct'])){
                $id=$_GET['idAct'];
                switch($id){
                    case 1:
                        include_once("addProduct.php");
                        break;
                    case 2:
                        include_once("editProduct.php");
                        break;
                    case 3:
                        include_once("productimage.php");
                        break;
                }
            }
            else
                include_once("product.php");
            break;
        case "category";
            if(isset($_GET['idAct'])){
                $id=$_GET['idAct'];
                switch($id){
                    case 1:
                        include_once("addCate.php");
                        break;
                    case 2:
                        include_once("editCate.php");
                        break;
                }
            }
            else
                include_once("cate.php");
            break;
        case "producer";
            if(isset($_GET['idAct'])){
                $id=$_GET['idAct'];
                switch($id){
                    case 1:
                        include_once("addProducer.php");
                        break;
                    case 2:
                        include_once("editProducer.php");
                        break;
                }
            }
            else
                include_once("producer.php");
            break;
        case "customer";
            include_once("customer.php");
            break;
        case "catalogue";
            include_once("cata.php");
            break;
        case "privilege";
            if(isset($_GET['idAct'])){
                $id=$_GET['idAct'];
                switch($id){
                    case 0:
                        include_once("detailPriv.php");
                        break;
                    case 1:
                        include_once("addPriv.php");
                        break;
                    case 2:
                        include_once("editPriv.php");
                        break;
                }
            }
            else
                include_once("priv.php");
            break;
            case "employee";
            if(isset($_GET['idAct'])){
                $id=$_GET['idAct'];
                switch($id){
                    case 1:
                        include_once("addEmp.php");
                        break;
                    case 2:
                        include_once("editEmp.php");
                        break;
                }
            }
            else
                include_once("emp.php");
            break;
            case "discount";
            if(isset($_GET['idAct'])){
                $id=$_GET['idAct'];
                switch($id){
                    case 1:
                        include_once("addDiscount.php");
                        break;
                    case 2:
                        include_once("editDiscount.php");
                        break;
                    case 3:
                        include_once("detailDiscount.php");
                        break;
                    case 4:
                        include_once("addDetailDiscount.php");
                        break;
                    case 5:
                        include_once("actAddDetailDiscount.php");
                        break;
                }
            }
            else
                include_once("discount.php");
            break;
            case "order";
            if(isset($_GET['idAct'])){
                $id=$_GET['idAct'];
                switch($id){
                    case 1:
                        include_once("orderdetail.php");
                        break;
                    case 2:
                        include_once("addOrder.php");
                        break;
                    case 3:
                        include_once("actOrder.php");
                        break;
                }
            }
            else
                include_once("order.php");
            break;
            case "invoice";
            if(isset($_GET['idAct'])){
                $id=$_GET['idAct'];
                switch($id){
                    case 1:
                        include_once("addInvoice.php");
                        break;
                    case 2:
                        include_once("actInvoice.php");
                        break;
                    case 3:
                        include_once("invoicedetail.php");
                        break;
                }
            }
            else
                include_once("invoice.php");
            break;
            case "deliverynote";
            if(isset($_GET['idAct'])){
                $id=$_GET['idAct'];
                switch($id){
                    case 1:
                        include_once("deliverynotedetail.php");
                        break;
                }
            }
            else
                include_once("deliverynote.php");
            break;
            case "receivenote";
            if(isset($_GET['idAct'])){
                $id = $_GET['idAct'];
                switch($id){
                    case 1:
                        include_once("receivenotedetail.php");
                        break;
                    case 2:
                        include_once("addreceivenote.php");
                        break;
                    case 3:
                        include_once("actReceiveNote.php");
                        break;
                }
            }
            else
                include_once("receivenote.php");
            break;

            case "checkinventory";
            if(isset($_GET['idAct'])){
                $id = $_GET['idAct'];
                switch($id){
                    case 1:
                        include_once("detailcheckinventory.php");
                        break;
                    case 2:
                        include_once("addcheckinventory.php");
                        break;
                    case 3:
                        include_once("actcheckinventory.php");
                        break;
                }
            }
            else
                include_once("checkinventory.php");
            break;

            case "statistic";
                if(isset($_GET['idAct'])){
                    $id = $_GET['idAct'];
                    switch($id){
                        case 1:
                            include_once("statistic_month.php");
                            break;
                        
                    }
                }
                else
                    include_once("statistic.php");
                break;
            case "expiration";
                include_once("expirationDate.php");
                break;
            case "review";
            include_once("review.php");
            break;
            
    }
	
}
else
	include_once("product.php");
?>