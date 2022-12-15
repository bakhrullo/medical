<section >
    <div class="table-responsive">
        <table class="table table-bordered table table-sm">
          <caption>Список пользователей</caption>
          <thead>
            <tr>
              <th scope="col">ид упоковки</th>
              <th scope="col">наименование упоковки</th>
              <th scope="col">номер регистрационного удостоверения</th>
              <th scope="col">дата начала регистрационного удостоверения</th>
              <th scope="col">наименование производителя</th>
              <th scope="col">ид торговой марки</th>
              <th scope="col">наименование торговой марки(ru)</th>
              <th scope="col">наименование торговой марки(uz)</th>
              <th scope="col">наименование торговой марки(en)</th>
              <th scope="col">МНН</th>
              <th scope="col">код атх</th>
              <th scope="col">наименование лекарственного препарата</th>
              <th scope="col">наименование фармакотерапевтической группы</th>
              <th scope="col">код фармакотерапевтической группы</th>
              <th scope="col">наименование валюты</th>
              <th scope="col">дата установки</th>
              <th scope="col">предельная цена реф цены</th>
              <th scope="col">оптовая цена</th>
              <th scope="col">розничная цена</th>
              <th scope="col">предельная цена</th>
              <th scope="col">оптовая цена</th>
              <th scope="col">розничная цена</th>
              <th scope="col">дата начала регистрационного удостоверения</th>
            </tr>
          </thead>
          <tbody>
            <?
                require_once('request.php');
                $res = post_req();
                
                $results_per_page = 100;  
                $number_of_result = count($res)
                $number_of_page = ceil ($number_of_result / $results_per_page);

                 if (!isset ($_GET['page']) ) {  
                $page = 1;  
                    } else {  
                $page = $_GET['page'];  
                }  
                $page_first_result = ($page-1) * $results_per_page;
                
                foreach ($res as $value) {
                    echo "<tr>
                    <td>" 
                    . $value['box_group_id'] . 
                    "</td><td>" 
                    . $value['box_group_name_ru'] .
                    "</td><td>"
                    . $value['certificate']['certificate_number'] .
                    "</td><td>"
                    . $value['certificate']['certificate_date'] .
                    "</td><td>"
                    . $value['medicine_mark']['producer']['producer_name'] .
                    "</td><td>"
                    . $value['medicine_mark']['medicine_mark_id'] .
                    "</td><td>"
                    . $value['medicine_mark']['medicine_mark_name_ru'] .
                    "</td><td>"
                    . $value['medicine_mark']['medicine_mark_name_uz'] .
                    "</td><td>"
                    . $value['medicine_mark']['medicine_mark_name_en'] .
                    "</td><td>"
                    . $value['medicine_mark']['inn_name'] .
                    "</td><td>"
                    . $value['medicine_mark']['atc_code'] .
                    "</td><td>"
                    . $value['medicine']['medicine_name'] .
                    "</td><td>"
                    . $value['certificate']['pharmacotherapeutic_group'] .
                    "</td><td>"
                    . $value['certificate']['pharmacotherapeutic_group_code'] .
                    "</td><td>"
                    . $value['reference_price']['currency_name'] .
                    "</td><td>"
                    . $value['reference_price']['price_date'] .
                    "</td><td>"
                    . $value['reference_price']['price'] .
                    "</td><td>"
                    . $value['reference_price']['wholesale_price'] .
                    "</td><td>"
                    . $value['reference_price']['retail_price'] .
                    "</td><td>"
                    . $value['reference_price']['price_base'] .
                    "</td><td>"
                    . $value['reference_price']['wholesale_price_base'] .
                    "</td><td>"
                    . $value['reference_price']['retail_price_base'] .
                    "</td></tr>";
                }  
            ?>
          </tbody>
        </table>    
    </div>
</section>
