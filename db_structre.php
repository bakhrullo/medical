<?

	//sql format
	CREATE TABLE `test_db`.`test_table` (
	`box_group_id` INT NULL DEFAULT NULL , 
	`box_group_name` VARCHAR(200) NULL DEFAULT NULL , 
	`certificate_number` VARCHAR(100) NULL DEFAULT NULL , 
	`producer_name` VARCHAR(100) NULL DEFAULT NULL , 
	`medicine_mark_id` INT NULL DEFAULT NULL , 
	`name_ru` VARCHAR(100) NULL DEFAULT NULL , 
	`name_uz` VARCHAR(100) NULL DEFAULT NULL , 
	`name_en` VARCHAR(100) NULL DEFAULT NULL , 
	`inn_name` VARCHAR(100) NULL DEFAULT NULL , 
	`atc_code` VARCHAR(50) NULL DEFAULT NULL , 
	`medicine_name` VARCHAR(100) NULL DEFAULT NULL , 
	`pharmacotherapeutic_group` VARCHAR(100) NULL DEFAULT NULL , 
	`pharmacotherapeutic_group_code` VARCHAR(50) NULL DEFAULT NULL , 
	`currency_name` VARCHAR(50) NULL DEFAULT NULL , 
	`price_date` DATE NULL DEFAULT NULL , 
	`price` FLOAT(15) NULL DEFAULT NULL , 
	`retail_price` FLOAT(15) NULL DEFAULT NULL , 
	`price_base` FLOAT(15) NULL DEFAULT NULL , 
	`wholesale_price_base` FLOAT(15) NULL DEFAULT NULL , 
	`retail_price_base` FLOAT(15) NULL DEFAULT NULL ) ENGINE = InnoDB;


	// php format
	function create_structere($servername, $username, $password, $dbname) {
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
	  		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "CREATE TABLE Newmedicals (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		box_group_id INT(10) NULL DEFAULT NULL,
		box_group_name VARCHAR(200) NULL DEFAULT NULL,
		certificate_number VARCHAR(100) NULL DEFAULT NULL,
		producer_name VARCHAR(100) NULL DEFAULT NULL,
		medicine_mark_id INT(10) NULL DEFAULT NULL,
		name_ru VARCHAR(100) NULL DEFAULT NULL,
		name_uz VARCHAR(100) NULL DEFAULT NULL,
		name_en VARCHAR(100) NULL DEFAULT NULL,
		inn_name VARCHAR(100) NULL DEFAULT NULL,
		atc_code VARCHAR(50) NULL DEFAULT NULL,
		medicine_name VARCHAR(100) NULL DEFAULT NULL,
		pharmacotherapeutic_group VARCHAR(100) NULL DEFAULT NULL,
		pharmacotherapeutic_group_code VARCHAR(50) NULL DEFAULT NULL,
		currency_name VARCHAR(50) NULL DEFAULT NULL,
		price_date VARCHAR() NULL DEFAULT NULL,
		price VARCHAR(15) NULL DEFAULT NULL,
		wholesale_price VARCHAR(15) NULL DEFAULT NULL,
		retail_price VARCHAR(15) NULL DEFAULT NULL,
		price_base VARCHAR(15) NULL DEFAULT NULL,
		wholesale_price_base VARCHAR(15) NULL DEFAULT NULL,
		retail_price_base VARCHAR(15) NULL DEFAULT NULL,,
		reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)";

		if ($conn->query($sql) === TRUE) {
			echo "Table MyGuests created successfully";
		} else {
	 		echo "Error creating table: " . $conn->error;
		}

		$conn->close();

	}
?>