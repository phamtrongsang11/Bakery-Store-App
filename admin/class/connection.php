<?php 
        function connect(){
            $conn=new mysqli("localhost","root","","bakery");
            if($conn->connect_error){
                die("Connect failed: ".$conn->connect_error);
            }
            return $conn;
        }

        function executeStatement($sql){
            $conn=connect();
			$result=$conn->query($sql);
            $conn->close();
            return $result;
        }

        function Select($sql){
            $result=executeStatement($sql);
            if($result->num_rows<=0){
                //echo ("0 result");
                return 0;
            }
            return $result;
        }
        function Insert($sql){
            $result=executeStatement($sql);
            if(!$result){
                die("Error inserting record: ".$sql."<br>");
            }
            return $result;
        }
		
        function Update($sql){
            $result=executeStatement($sql);
            if(!$result){
                die("Error updating record: ".$sql."<br>");
            }
            return $result;
        }		
		
        function Delete($sql){
            $result=executeStatement($sql);
            if(!$result){
                die("Error deleting record: ".$sql."<br>");

            return $result;
        }		

    }

?>