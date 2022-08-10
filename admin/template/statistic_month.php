

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
        <a href="index.php?action=statistic" class="section_nav__item"><span class="section_nav__title">Thông Kê Doanh Thu Theo Sản Phẩm</span></a>
        <a href="index.php?action=statistic&idAct=1" class="section_nav__item nuxt_link_active"><span class="section_nav__title">Thông Kê Doanh Thu Theo Tháng</span></a>
    </div>
    
    
    <?php 
        $array_value_month = array();
        $array_qty_month = array();
        
        $array_value_month[0] = ['Tháng', 'Doanh Thu'];
        $array_qty_month[0] = ['Tháng', 'Số Lượng'];

        $totalQtyYear = 0;
        $totalCostYear = 0;

        for($i = 0; $i < 12; $i++){
            $value_month_cost = 0;
            $value_month_quanitity = 0;
            if($resultMonth = product::statisticMonth($i + 1))
                if($rowMonth = $resultMonth->fetch_array()){
                    $value_month_quanitity = round($rowMonth[0],2);
                    $value_month_cost = round($rowMonth[1],2);
                    $totalQtyYear += $value_month_quanitity;
                    $totalCostYear += $value_month_cost;
                    
                }

            $k = $i + 1;
            $array_value_month[$k] = [" $k", $value_month_cost];
            $array_qty_month[$k] = [" $k", $value_month_quanitity];

        }
    
    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type='text/javascript'>
      

        var array_value_month = <?php echo json_encode($array_value_month); ?>;
        //alert(array_value_month);
        
        
       
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable(array_value_month, false);
        
        var options = {
            chart: {
                title: 'Thông kê doanh thu theo tháng',
                
            },
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

        var chart = new google.charts.Bar(document.getElementById('columnchart_sale_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        
    }   

    
    </script>


    <script type='text/javascript'>
      

        var array_qty_month = <?php echo json_encode($array_qty_month); ?>;
        //alert(array_value_month);
        
        
       
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable(array_qty_month, false);
        
        var options = {
            chart: {
                title: 'Thông kê số lượng bán theo tháng',
                
            },
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

        var chart = new google.charts.Bar(document.getElementById('columnchart_qty_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        
    }   

    
    </script>
    
    
    
    <div class="block">
        <body>
            <div id="columnchart_sale_material" style="width: 1100px; height: 400px;"></div>
        </body>
    </div>

    <div class="block">
        <body>
            <div id="columnchart_qty_material" style="width: 1100px; height: 400px;"></div>
        </body>
    </div>

    <div class="block">

        <div class="titleStat"> 
                <p><?php echo "Bảng số liệu doanh thu theo tháng"?></p>

        </div>
        <table class="table"style="text-align: center;" id="mytable">
            <thead>
                <tr>
                    <th scope='col'>Tháng</th>
                    <?php
                        /*
                        for($i = 1; $i <= 12; $i++)
                            echo "<th scope='col'>Tháng $i</th>";
                        */

                    ?>
                    <th scope='col'>Số Lượng</th>
                    <th scope='col'>Doanh Thu</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $k = 1;
                    while($k <= 12){
                    
                        
                        $record_value = $array_value_month[$k];
                        $record_qty = $array_qty_month[$k];

                ?>

                <tr>
                    <td><?php echo $k ?></td>
                    <td><?php echo $record_qty[1] ?></td>
                    
                    <td><?php echo number_format($record_value[1], 0, ',', '.') . '₫'; //echo "$".$row['Price'] ?></td>
                    
                
                    
                </tr>
                <?php
                        $k++;
                    }
                ?>
                <tr>
                
                <td>Tổng cộng</td>  
                <td><?php if(isset($totalQtyYear)) echo $totalQtyYear ?></td>
                <td><?php if(isset($totalCostYear)) echo number_format($totalCostYear, 0, ',', '.') . '₫';    //echo "$".$totalCost ?></td>
                </tr>
        </tbody>
        </table>

    </div>



        

        
        

        

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


