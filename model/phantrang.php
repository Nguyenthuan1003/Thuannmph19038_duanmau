<?php
    include 'PDO.php';
    function pdo_paging($dem,$table){
              $conn = pdo_get_connection();
              $sql = "SELECT COUNT(".$dem.") as number FROM ".$table;
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
              $number_records = $rows['number'];
              $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
              $limit = 12;
              $number_page = ceil($number_records / $limit);
              if ($current_page > $number_page){
                $current_page = $number_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $sql = "SELECT * FROM ".$table." LIMIT $start, $limit";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
         

    }
?>