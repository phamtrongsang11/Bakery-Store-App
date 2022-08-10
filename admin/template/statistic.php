

<style>
    .table{
        color: white;
        background-color: #223f5a;
        word-wrap: break-word;
    }
    .table td{
        overflow: hidden;
        padding-right: 0.2rem;
    }
    .table tbody tr:hover{
        color: white;
        background-color: #2b4f70;
    }
    tr:nth-child(even){
        background-color: #17314a;
    }
    .button{
        background-color: #0075d9;
        color: white;
        border: 1px solid white;
    }
    .button:hover{
        background-color: #005b88;
        color: white;
    }
    .block-title{
        position: relative;
    }
    .block-title:before{
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
        border-bottom: #e0e0e0 1px solid;
        content:"";
    }
    .block-title h3{
        position: relative;
        color: white;
        margin-top: 2rem;
        margin-bottom: 2rem;
    }
    .block-title h3 span{
        background-color: #2a4a67;
        padding: 0 1em 0 0;
    }

    .formSelect{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        
    }
    .formSelect div{
        padding-right: 10px;
    }

    .formSelect label{
        margin: 0 15px 0 15px;
    }
    
    .formSelect button:hover{
        background-color: rgba(64,179,245);
    }
    .form-control-date {
        font-size: 18px;
        font-weight: 400;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
    }
    .titleStat{
        text-align: center;
        margin-top: 20px;
        font-size: 16px;
        font-weight: bold;
    }
    .titleStat p{
        color: white;
    }
    .stat_total{
    
        display: flex;
        flex-direction: column;
        justify-content: flex-end;

    }
    .stat_total div{
        margin-right: 20px;
        font-weight: bold;
    }
    .stat_total .titleTotal{
        color: red;
        font-size: 15px;
    }
    .block{
        background-color: #223f5a;
        margin-top: 40px;
        padding: 10px;
       
    }
    .block #barchart_material, #columnchart_material{
        padding: 20px;
    }
    #barchart_material #columnchart_material{
        
        
        display: block;
        margin: 0 auto;
        
    }
    .section_nav{
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
    }
    
    .section_nav__item{
        user-select: none;
        margin-right: 5px;
        padding: 15px;
        border-radius: 4px;
        transition: background-color .3s ease;
    }
    

    .section_nav__item:hover, .section_nav__item.nuxt_link_active{
        background-color: #07192a;
        
    }

    .section_nav__title{
        font-size: 18px;
        font-weight: 300;
        transition: color .3s ease;
    }


    
</style>

<?php
include_once("class/product.php");
include_once("class/category.php");
?>

<div>
    <div class="block-title mb-3"><h3><span>Thống Kê</span></h3></div>
    <div class="section_nav">
        <a href="index.php?action=statistic" class="section_nav__item nuxt_link_active"><span class="section_nav__title">Thông Kê Doanh Thu Theo Sản Phẩm</span></a>
        <a href="index.php?action=statistic&idAct=1" class="section_nav__item"><span class="section_nav__title">Thông Kê Doanh Thu Theo Tháng</span></a>
    </div>
    <div>
        
        <form action="index.php?action=statistic" method="post" onsubmit="return checkDate();" >
            <div class="formSelect block">
                
                <div>Loại Sản Phẩm</div>

                <select name="cate" style="margin-right: 10px" class="form-control-date">
                    <option value="<?php echo 0 ?>" selected>Tất Cả</option>
                    <?php 
                        
                        if($result=category::getAll()){
                            while($row=$result->fetch_array()){
                    ?>
                    
                    <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                    
                    <?php }
                            } 
                    ?>
                </select>
                
                <div>
                    <label for="dateFrom">Từ Ngày</label>
                    <input type="date" name="dateFrom" id="dateFrom" class="form-control-date">
                </div>
                <div>
                    <label for="dateTo">Đến Ngày</label>
                    <input type="date" name="dateTo" id="dateTo" class="form-control-date">
                </div>
                <button style="padding-left: 10px" class="btn button" type="submit">Xác nhận</button>
            </div>
        </form>
        <?php 
            if(isset($_POST['cate'])&&isset($_POST['dateFrom'])&&isset($_POST['dateTo'])){
                $cate = $_POST['cate'];
                $dateFrom = $_POST['dateFrom'];
                $dateTo = $_POST['dateTo'];
                $dateFormatFrom = date("d-m-Y", strtotime($dateFrom));  
                $dateFormatTo = date("d-m-Y", strtotime($dateTo));  

                //echo $cate."<br>".$dateFrom."<br>".$dateTo;
                if($cate!=0){
                    $result = category::getName($cate);
                    $row = $result->fetch_array();
                    $nameCate = $row[0];
                }
                else{
                    $nameCate="Tất cả";
                }
                
                if($cate != 0)
                    $result = product::getListByCateID($cate);
                else
                    $result = product::getAll();

                $totalCost = 0;

                $totalQty = 0;

                $i = 0;

                $result_sale = array();

                $result_id = array();
                
                $result_sale[$i] = ['Tên Sản Phẩm', 'Doanh Thu'];

                $result_qty[$i] = ['Tên Sản Phẩm', 'Số Lượng'];

                $result_id[$i] = ['ProductID', 'Price'];
                
                while($row = $result->fetch_array()){
                    
                    $value = 0;

                    $quantity = 0;

                    $check = 0;

                    if($cate != 0 && $result1 = product::statisticWithCate($row['ProductID'], $cate, $dateFrom, $dateTo)){
                            
                        $check=1;

                    }
                    else{

                        if($result1 = product::statistic($row['ProductID'], $dateFrom, $dateTo))
                            $check=1;

                    }

                    if($check==1){

                            
                        if($row1 = $result1->fetch_array()){

                            $quantity = round($row1[0], 0);

                            $value = round($row1[1], 2); 
                            
                            $totalQty += $quantity;

                            $totalCost += $value;
                        }
                    }
                    //$i = $row['ProductID'];
                    
                    $result_sale[$i + 1] = [$row['ProductName'], $value];

                    
                    $result_qty[$i + 1] = [$row['ProductName'], $quantity];

                    $result_id[$i + 1] = [$row['ProductID'], $row['Price']];

                    $i++;
                        

                }
                
                
                
        ?>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">


        var result_sale = <?php echo json_encode($result_sale); ?>;

       
        var title = <?php echo json_encode("Thống kê doanh thu các sản phẩm thuộc $nameCate"); ?>;

        var date = <?php echo json_encode("Từ $dateFormatFrom đến $dateFormatTo"); ?>;

        //alert(result_sale);

      

        google.charts.load('current', {'packages':['bar']});
        
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable(result_sale, false);

        var options = {
          chart: {
                title: title,
                subtitle: date
          },
          bars: 'horizontal',
          hAxis: {
                textStyle: {
                    color: '#ffffff',
                    fontSize: 15
                }
            },
            vAxis: {
                textStyle: {
                    color: '#ffffff',
                    fontSize: 15
                }
            },
            legend: {
                textStyle: {
                    color: '#ffffff',
                    fontSize: 15
                }
            },
            titleTextStyle: {
                color: '#ffffff',
                fontSize: 18
            },

            width: '100%',
        
            backgroundColor: '#223f5a',
            is3D: true
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_sale'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    
        <div class="block">
                            
            <body>
                <div id="barchart_sale" style="width: 1100px; height: 400px;"></div>
            </body>

        </div>


    <script type="text/javascript">


        var result_qty = <?php echo json_encode($result_qty); ?>;

       
        var titleqty = <?php echo json_encode("Thống kê số lượng các sản phẩm thuộc $nameCate"); ?>;

        var date = <?php echo json_encode("Từ $dateFormatFrom đến $dateFormatTo"); ?>;

        //alert(result_sale);


        google.charts.load('current', {'packages':['bar']});
        
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable(result_qty, false);

        var options = {
          chart: {
                title: titleqty,
                subtitle: date
          },
          bars: 'horizontal',
          hAxis: {
                textStyle: {
                    color: '#ffffff',
                    fontSize: 15
                }
            },
            vAxis: {
                textStyle: {
                    color: '#ffffff',
                    fontSize: 15
                }
            },
            legend: {
                textStyle: {
                    color: '#ffffff',
                    fontSize: 15
                }
            },
            titleTextStyle: {
                color: '#ffffff',
                fontSize: 18
            },

            width: '100%',
        
            backgroundColor: '#223f5a',
            is3D: true
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_qty'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

        <div class="block">
                        
            <body>
                <div id="barchart_qty" style="width: 1100px; height: 400px;"></div>
            </body>

        </div>


    <div class="block">

        <div class="titleStat"> 
                <p><?php echo "Bảng số liệu doanh thu và số lượng sản phẩm thuộc ".$nameCate?></p>
                <p><?php echo "Từ ".$dateFormatFrom." đến ".$dateFormatTo ?></p>
        </div>
        <table class="table"style="text-align: center;" id="mytable">
            <thead>
                <tr>
                    <th scope="col">Mã</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Doanh Thu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $k = 1;
                    while($k < sizeof($result_sale)){
                    
                        $record_id = $result_id[$k];
                        $record_value = $result_sale[$k];
                        $record_qty = $result_qty[$k];

                ?>

                <tr>
                    <td><?php echo $record_id[0] ?></td>
                    <td><?php echo $record_value[0] ?></td>
                    
                    <td><?php echo number_format($record_id[1], 0, ',', '.') . '₫'; //echo "$".$row['Price'] ?></td>
                    
                    

                    <td><?php echo $record_qty[1] ?></td>
                    <td><?php echo number_format($record_value[1], 0, ',', '.') . '₫';    //echo "$".$value ?></td>
                        
                    
                    
                </tr>
                <?php
                        $k++;
                    }
                ?>
                <tr>
                <td></td>
                <td></td>
                <td>Tổng cộng</td>  
                <td><?php if(isset($totalQty)) echo $totalQty ?></td>
                <td><?php if(isset($totalCost)) echo number_format($totalCost, 0, ',', '.') . '₫';    //echo "$".$totalCost ?></td>
                </tr>
        </tbody>
        </table>

    </div>
        

        <?php 
            } 
        

        ?>
        
        

</div>
<script>


function checkDate(){
    var from=document.getElementById("dateFrom");
    var to=document.getElementById("dateTo");
    
    if(from.value==""&&to.value==""){
        alert("Xin hãy nhập chọn khoảng thời gian");
        
        return false;
    }
    if(to.value < from.value){
        alert("Bạn nhập khoảng thời gian không hợp lệ")
        return false;
    }
    return true;
    
}

</script>


