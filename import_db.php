<?
    function api_to_sql($servername, $username, $password, $dbname) {  
        ini_set('max_execution_time', 1020);
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        require_once('request.php');
        $offset = 0;
        $limit = 501;
        for ($x = 0; $x <= 72; $x++) {
            $result = post_req($offset, $limit);
                foreach ($result as $value) {
                    $stmt = $conn->prepare("INSERT INTO Newmedicals (
                        box_group_id, 
                        box_group_name, 
                        certificate_number, 
                        certificate_date, 
                        producer_name, 
                        medicine_mark_id, 
                        name_ru, 
                        name_uz, 
                        name_en, 
                        inn_name, 
                        atc_code, 
                        medicine_name, 
                        pharmacotherapeutic_group, 
                        pharmacotherapeutic_group_code, 
                        currency_name, 
                        price_date, 
                        price, 
                        wholesale_price, 
                        retail_price, 
                        price_base, 
                        wholesale_price_base, 
                        retail_price_base)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                    $stmt->bind_param("issssissssssssssssssss",
                        $value['box_group_id'],
                        $value['box_group_name_ru'],
                        $value['certificate']['certificate_number'],
                        $value['certificate']['certificate_date'],
                        $value['medicine_mark']['producer']['producer_name'],
                        $value['medicine_mark']['medicine_mark_id'],
                        $value['medicine_mark']['medicine_mark_name_ru'],
                        $value['medicine_mark']['medicine_mark_name_uz'],
                        $value['medicine_mark']['medicine_mark_name_en'],
                        $value['medicine_mark']['inn_name'],
                        $value['medicine_mark']['atc_code'],
                        $value['medicine']['medicine_name'],
                        $value['certificate']['pharmacotherapeutic_group'],
                        $value['certificate']['pharmacotherapeutic_group_code'],
                        $value['reference_price']['currency_name'],
                        $value['reference_price']['price_date'],
                        $value['reference_price']['price'],
                        $value['reference_price']['wholesale_price'],
                        $value['reference_price']['retail_price'],
                        $value['reference_price']['price_base'],
                        $value['reference_price']['wholesale_price_base'],
                        $value['reference_price']['retail_price_base'],
                    );
                    $stmt->execute();
                    echo "New records created successfully";
                    $stmt->close();
                }

            $limit = $limit + 500;
            $offset = $offset + 500;
            sleep(1);
        }
    }
?>
