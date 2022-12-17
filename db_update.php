<?
	ini_set('max_execution_time', 2200);
	include 'database.php';
	require_once ('request.php');
	require_once ('notification.php');
	require __DIR__ . '/vendor/autoload.php';
	$limit = 101;
	$offset = 0;
	$count = 0;
	$path = __DIR__ .'/new-file.json';
	$fp = fopen($path, 'w');
		try {
			while (true) {
				$result = post_req($offset, $limit);
				if (strlen($result) == 2) {
				 	fclose($fp);
				 	$fp_2 = fopen($path, 'a');
				 	fwrite($fp_2, ']');
				 	fclose($fp_2);
				 	$success_msg = 'Json file успешно создан!';
				 	admin_notif($success_msg);
				 	break;
					}

				$second_resault = substr($result, 0, -1);
				if ($count == 0) {
					fwrite($fp, $second_resault);
				} else {
					$third_resault = substr_replace($second_resault, ',', 0, 0);
					fwrite($fp, $third_resault);
				}

				$limit += 100;
		        $offset += 100;
		        $count += 1;
		        sleep(1);		
			}
		} catch (\Exception $e) {
			$err = 'Ошибка при полученн json';
			admin_notif($err);
			die();	
		}

	$query = "TRUNCATE TABLE Newmedicals";
	$trunc = mysqli_query($conn, $query);
	if($trunc !== FALSE)
		{
		   	$success_msg = 'База успешо очищена!';
			admin_notif($success_msg);
		}
		else
		{
		   	$err = 'Ошибка при очищение базы';
			admin_notif($err);
			die();	
		}

	use \JsonMachine\Items;
	$items = Items::fromFile(__DIR__ .'/new-file.json');
	foreach ($items as $value) {
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
                        $value->box_group_id,
                        $value->box_group_name_ru,
                        $value->certificate->certificate_number,
                        $value->certificate->certificate_date,
                        $value->medicine_mark->producer->producer_name,
                        $value->medicine_mark->medicine_mark_id,
                        $value->medicine_mark->medicine_mark_name_ru,
                        $value->medicine_mark->medicine_mark_name_uz,
                        $value->medicine_mark->medicine_mark_name_en,
                        $value->medicine_mark->inn_name,
                        $value->medicine_mark->atc_code,
                        $value->medicine->medicine_name,
                        $value->certificate->pharmacotherapeutic_group,
                        $value->certificate->pharmacotherapeutic_group_code,
                        $value->reference_price->currency_name,
                        $value->reference_price->price_date,
                        $value->reference_price->price,
                        $value->reference_price->wholesale_price,
                        $value->reference_price->retail_price,
                        $value->reference_price->price_base,
                        $value->reference_price->wholesale_price_base,
                        $value->reference_price->retail_price_base,
                    );
                    $stmt->execute();
                    $stmt->close();
	}
	$finally_success_msg = 'База успешно обновлено!';
	admin_notif($finally_success_msg);
?>