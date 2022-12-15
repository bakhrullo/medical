<?
    include 'database.php';
?>
<!doctype html>
<html lang="ru">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>Детально</title>
    </head>
    <body>
        <?
            $data = $_GET['data'];
            $sql = "Select * from Newmedicals where id=$data";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $value = mysqli_fetch_assoc($result);

            } 
        ?>



<div class="container">
    <h2>ДЕТАЛЬНО</h2>
        <p>Koynizga nima kesa owani yozi qoin oka manda idea tugab qoldi! :)  </p>
        <a href="index.php"><button type="button" class="btn btn-primary btn-sm">Назад</button></a>
        <br><br> 
           <div class="row">
              <div class="col-md-12">
                 <table class="table table-bordered table-striped">
                    <tbody>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">№</td>
                          <td class="col-md-9"><?= $value['id']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">айди упоковки</td>
                          <td class="col-md-9"><?= $value['box_group_id']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">наименование лекарственного препарата</td>
                          <td class="col-md-9"><?= $value['medicine_name']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">наименование торговой марки(en)</td>
                          <td class="col-md-9"><?= $value['name_en']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">наименование производителя</td>
                          <td class="col-md-9"><?= $value['producer_name']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">наименование упоковки</td>
                          <td class="col-md-9"><?= $value['box_group_name']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">дата начала регистрационного удостоверения</td>
                          <td class="col-md-9"><?= $value['certificate_date']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">номер регистрационного удостоверения</td>
                          <td class="col-md-9"><?= $value['certificate_number']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">айди торговой марки</td>
                          <td class="col-md-9"><?= $value['medicine_mark_id']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">наименование торговой марки(ru)</td>
                          <td class="col-md-9"><?= $value['name_ru']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">наименование торговой марки(uz)</td>
                          <td class="col-md-9"><?= $value['name_uz']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">МНН</td>
                          <td class="col-md-9"><?= $value['inn_name']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">код атх</td>
                          <td class="col-md-9"><?= $value['atc_code']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">наименование фармакотерапевтической группы</td>
                          <td class="col-md-9"><?= $value['pharmacotherapeutic_group']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">дата регистрации</td>
                          <td class="col-md-9"><?= $value['reg_date']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">код фармакотерапевтической группы</td>
                          <td class="col-md-9"><?= $value['pharmacotherapeutic_group_code']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">наименование валюты</td>
                          <td class="col-md-9"><?= $value['currency_name']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">дата установки</td>
                          <td class="col-md-9"><?= $value['price_date']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">предельная цена реф цены</td>
                          <td class="col-md-9"><?= $value['price']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">оптовая цена</td>
                          <td class="col-md-9"><?= $value['wholesale_price']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">розничная цена</td>
                          <td class="col-md-9"><?= $value['retail_price']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">предельная цена</td>
                          <td class="col-md-9"><?= $value['price_base']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">оптовая цена</td>
                          <td class="col-md-9"><?= $value['wholesale_price_base']; ?></td>
                       </tr>
                       <tr>
                          <td class="col-md-3 text-right font-weight-600">дата начала регистрационного удостоверения</td>
                          <td class="col-md-9"><?= $value['retail_price_base']; ?></td>
                       </tr>
                    </tbody>
                 </table>
              </div>
           </div>
        </div>
    </body>
</html>
