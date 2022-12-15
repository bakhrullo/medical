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
            if (isset($_POST['search_submit'])) {
               $search = $_POST['searchs'];
               $sql = "Select * from Newmedicals where name_ru like '%$search%' or name_uz like '%$search%' or name_en like '%$search%' or producer_name like '%$search%'";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '
                    <div class="table-responsive">
                        <table class="table table-bordered table table-sm table table-striped">
                            <h4 align="center">Результаты</h4>
                            <a href="index.php"><button type="button" class="btn btn-primary">Назад</button></a>
                            <br><br>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">айди упоковки</th>
                                    <th scope="col">наименование лекарственного препарата</th>
                                    <th scope="col">наименование торговой марки(en)</th>
                                    <th scope="col">наименование производителя</th>
                                    <th scope="col">наименование упоковки</th>
                                    <th scope="col">дата начала регистрационного удостоверения</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>';
                            $count = 0;
                            while ($value = mysqli_fetch_assoc($result)) {
                                echo '
                                
                                <tr>
                                    <td>'.$value['id'].'</td>
                                    <td>'.$value['box_group_id'].'</td>
                                    <td>'.$value['medicine_name'].'</td>
                                    <td>'.$value['name_en'].'</td>
                                    <td>'.$value['producer_name'].'</td>
                                    <td>'.$value['certificate_number'].'</td>
                                    <td>'.$value['certificate_date'].'</td>
                                    <td><a href="detail.php?data='.$value['id'].'">Подробнее</a></td>
                                 </tr>';
                                $count += 1;
                                if ($count > 100) {
                                    break;
                                }
                                }
                                echo '
                            </tbody>
                        </table>
                    </div>';

                    } else {
                        echo '
                            <div class="container">
                                <div class="alert alert-dark" role="alert">
                                    <h4 class="alert-heading">По вашему запросу ничего не найдено!</h4>
                                    <p>Hullas buyoqqayam uzundan uzun nimadur yozvorasrsiz.</p>
                                    <hr>
                                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                                    <a href="index.php"><button type="button" class="btn btn-primary">Назад</button></a>
                                </div>
                            </div>';
                    }
               }
            }
        ?>
    </body>
</html>