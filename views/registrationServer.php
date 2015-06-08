  <?php
        var_dump($_REQUEST);
        foreach ($_REQUEST as $key => $val) {
            $$key = $val;
            if (gettype($val) != "array") {
                echo "The value of <strong>$key</strong> is <strong> $val </strong><br>";
            } else {
                echo "For the <strong>$key</strong> array:<br>";
                foreach ($val as $valKey => $valVals) {
                    echo "&nbsp;&nbsp;&nbsp;The value of <strong>$valKey</strong> is <strong> $valVals </strong><br>";
                }
            }
        }      
        var_dump($_FILES);

        move_uploaded_file($_FILES["img"]["tmp_name"], "../" . $_FILES["img"]["name"]);
       echo "The file ". $_FILES["img"]["name"]. " with the size of ".$_FILES["img"]["size"]."B was uploaded";
        ?>