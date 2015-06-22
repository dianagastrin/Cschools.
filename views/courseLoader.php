<script>
    'use strict';
    angular.module('cschools.home',[]).value('courses', [
        <?php
            $query = "SELECT Course_Name FROM upload GROUP BY Course_Name";
            $res = db_query($query);
            if(!$res){
                pop_error("error sending your message");
            }
            for($i=0; $i < mysqli_num_rows($res); $i++){
                $row = mysqli_fetch_assoc($res);
                echo "{ id:" . $i . ", name: '". $row['Course_Name'] ."'},";
            }
        ?>
    ]);
</script>