<?php 
					if(isset($_POST['submit']))
					{
						if (isset($_POST['order_date']) && isset($_POST['company']) && isset($_POST['owner']) && isset($_POST['item']) &&
						isset($_POST['quantity']) && isset($_POST['weight']) && isset($_POST['request_ship'])  && isset($_POST['t_id']) && 
						isset($_POST['ship_size']) && isset($_POST['box_co']) && isset($_POST['specifi']) && isset($_POST['check_quan']))
						{
							 $host = "localhost";
							 $dbUsername = "root";
							 $dbPassword = "";
							 $dbName = "test_db";
							$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

							if ($conn->connect_error) {
							die('Could not connect to the database.');
							}
							else {
							$Select = "SELECT t_id FROM customer WHERE t_id = ? LIMIT 1";
							$Insert = "INSERT INTO customer(order_date, company, owner, item, quantity, weight, request_ship, t_id, ship_size, box_co, specifi, check_quan) values(?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)";
						$stmt = $conn->prepare($Select);
						$stmt->bind_param("t", $t_id);
						$stmt->execute();
						$stmt->bind_result($resultt_id);
						$stmt->store_result();
						$stmt->fetch();
						$rnum = $stmt->num_rows;
						if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("dsssiivviivv",$order_date, $company, $owner, $item, $quantity, $weight,$request_ship, $t_id, $ship_size, $box_co, $specifi, $check_quan);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this tracking id.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
					
?>						