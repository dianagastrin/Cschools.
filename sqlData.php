
<?php
require "db.php";
db_connect();
(count($_GET) == 0) ? $page = 1 : $page = $_GET['page'];
$sql = "SELECT username, email,profile_pic FROM user JOIN user_info ON user.ID=user_info.ID";
$sqlData =db_select($sql);
$rowSpan = 3;
$startRow = $rowSpan * ($page - 1);
$lastRow=$startRow+$rowSpan;
$totalRows = sizeof($sqlData);
$lastPage = ceil($totalRows / $rowSpan);
echo "<table border='1'>"
 . "<caption>Users (Page $page of $lastPage)</caption>"
 . "<thead><tr><th>username</th><th>email</th><th>profile pic</th>"
 . "</tr></thead>";
$counter = $startRow;
    echo "<tbody>";
        while ($startRow<$lastRow&&$startRow<$totalRows) {
            #fetching each row as assoc and numeric array
            //var_dump($row);
            echo "<tr>";
         foreach($sqlData[$startRow] as $i=>$value){
             if($i=='profile_pic'&& $value!=''){
                echo "<td><a href=\"views/uploadFiles/profile/". $value ."\"> <img src= 'views/uploadFiles/profile/". $value ."' width=100px; higth=100px;></a></td>";
                }
                else
                 echo "<td>". $value ."</td>";
         }
            echo "</tr>";
            $startRow++;
        }
        echo "</tbody></table>";

$url = $_SERVER["PHP_SELF"];
$backPage = $page - 1;
$nextPage = $page + 1;
if ($page != 1) {
    echo "<a href='" . "" . "?page=1'><< </a>";
    echo "<a href='" . "" . "?page=" . $backPage . "'>< </a>";
}
echo "-";
if ($page != $lastPage) {
    echo "<a href='" . $url . "?page=" . $nextPage . "'> > </a>";
    echo "<a href='" . $url . "?page=" . $lastPage . "'>>></a>";
}
db_close();
?>

<br><a href="index.php"> Back to Website </a>
