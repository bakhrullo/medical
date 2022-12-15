<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Список</title>
  </head>
<body>
    <?php
        session_start();

        if (isset($_POST['limit-records'])) {
            $_SESSION["limit"] = $_POST['limit-records'];
        }

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        if (isset($_SESSION['limit'])) {
            $no_of_records_per_page = $_SESSION['limit'];
        } else {
            $no_of_records_per_page = 100;
        }

        $offset = ($pageno-1) * $no_of_records_per_page;
        include 'database.php';

        $total_pages_sql = "SELECT COUNT(*) FROM Newmedicals";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM Newmedicals LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
        }
        mysqli_close($conn);
    ?>
    <ul class="pagination">
        <li><a href="?pageno=1">Первый</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Предыдуший</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Следующий</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Последний</a></li>
    </ul>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form method="post">
                    <select name="limit-records" id="limit-records">
                        <option disabled="disabled" selected="selected">---ЛИМИТЫ---</option>
                          <?php foreach([10,100,500,1000,5000] as $limit): ?>
                            <option <?php if( isset($_SESSION["limit"]) && $_SESSION["limit"] == $limit ) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
                          <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit">ОТПРАВИТЬ</button>
                </form>
            </div>
            <div class="col-sm-6">
                <form method="post" action="search.php">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="найти" name="searchs" required>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary" name="search_submit">Поиск</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    

    <div class="table-responsive" style="height: 600px; overflow-y: auto;">
          <table class="table table-bordered table table-sm table table-striped">
            <caption>Список лекарств</caption>
            <thead>
              <tr>
                <th scope="col">№</th>
                <th scope="col">айди упоковки</th>
                <th scope="col">наименование лекарственного препарата</th>
                <th scope="col">наименование торговой марки(en)</th>
                <th scope="col">наименование производителя</th>
                <th scope="col">номер регистрационного удостоверения</th>
                <th scope="col">дата начала регистрационного удостоверения</th>
                <th scope="col"></th>
               <!--  
                
                
                <th scope="col">наименование упоковки</th>
                <th scope="col">ид торговой марки</th>
                <th scope="col">наименование торговой марки(ru)</th>
                <th scope="col">наименование торговой марки(uz)</th>
                <th scope="col">МНН</th>
                <th scope="col">код атх</th>
                <th scope="col">наименование фармакотерапевтической группы</th>
                <th scope="col">дата регистрации</th>
                <th scope="col">код фармакотерапевтической группы</th>
                <th scope="col">наименование валюты</th>
                <th scope="col">дата установки</th>
                <th scope="col">предельная цена реф цены</th>
                <th scope="col">оптовая цена</th>
                <th scope="col">розничная цена</th>
                <th scope="col">предельная цена</th>
                <th scope="col">оптовая цена</th>
                <th scope="col">розничная цена</th>
                <th scope="col">дата начала регистрационного удостоверения</th> -->
              </tr>
            </thead>
            <tbody>
              <? foreach ($res_data as $value) :  ?> 
                <tr>
                  <td><?= $value['id']; ?></td>
                  <td><?= $value['box_group_id']; ?></td>
                  <td><?= $value['medicine_name']; ?></td>
                  <td><?= $value['name_en']; ?></td>
                  <td><?= $value['producer_name']; ?></td>
                  <td><?= $value['certificate_number']; ?></td>
                  <td><?= $value['certificate_date']; ?></td>
                  <td><a href="detail.php?data=<?= $value['id'] ?>">Подробнее</a></td>
                  <!-- 
                  <td><?= $value['box_group_name']; ?></td>
                  <td><?= $value['medicine_mark_id']; ?></td>
                  <td><?= $value['name_ru']; ?></td>
                  <td><?= $value['name_uz']; ?></td>
                  <td><?= $value['inn_name']; ?></td>
                  <td><?= $value['atc_code']; ?></td>
                  <td><?= $value['pharmacotherapeutic_group']; ?></td>
                  <td><?= $value['reg_date']; ?></td>
                  <td><?= $value['pharmacotherapeutic_group_code']; ?></td>
                  <td><?= $value['currency_name']; ?></td>
                  <td><?= $value['price_date']; ?></td>
                  <td><?= $value['price']; ?></td>
                  <td><?= $value['wholesale_price']; ?></td>
                  <td><?= $value['retail_price']; ?></td>
                  <td><?= $value['price_base']; ?></td>
                  <td><?= $value['wholesale_price_base']; ?></td>
                  <td><?= $value['retail_price_base']; ?></td> -->
                </tr>
                <? endforeach; ?>
              
            </tbody>
          </table>    
        </div>
    </body>
</html>