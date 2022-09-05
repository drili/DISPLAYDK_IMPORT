<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update old WDR titles with new</title>
</head>
<body>
    <div>
        <h1>Update old WDR titles with new</h1>
    </div>

    <div>
        <?php
            // --- Connect to DB
            // $mysqli = new mysqli("localhost","root","","display_dk_test");
            // $mysqli = new mysqli("mysql40.unoeuro.com","display_dk","G4mehAanfFxE","display_dk_db");
            $mysqli->set_charset("utf8");

            // - Check connection
            if ($mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
            } else {
                echo "<h5>Connected!</h5>";
            }
            

            // --- CSV Functions
            $open = fopen("displaydata-products.csv", "r");
            $data = fgetcsv($open, 0, ";");

            $iterator = 0;
            while (($data = fgetcsv($open, 0, ";")) !== FALSE) {
                if ($iterator < 10000 && $iterator > 0) {
                    $old_sku = $data[0];
                    $new_sku = $mysqli -> real_escape_string($data[7]);

                    // echo "<pre>";
                    //     var_dump($data[0]);
                    //     var_dump($data[7]);
                    // echo "</pre>";

                    // echo $old_sku . "</br>";
                    // echo $new_sku . "</br>";
                    // echo "<hr></br>";

                    // --- Update quantity row [titles]
                    // $sql_select_quantities = 'SELECT id, title, filters 
                    // FROM wp_wdr_rules
                    // WHERE title = \'QUANTITY_["'.$old_sku.'"]\'';
                    // $sql_select_quantities_result = $mysqli->query($sql_select_quantities);
                    // echo $sql_select_quantities . "<br><br>";

                    // while ($row = $sql_select_quantities_result->fetch_assoc()) {
                    //     $old_title = $row["title"];
                    //     $new_title = 'QUANTITY_["'.$new_sku.'"]';

                    //     echo "old_title: " . $old_title . "</br><br>";
                    //     echo "new_title: " . $new_title . "</br><br>";

                    //     $sql_update_wdr_titles = 'UPDATE wp_wdr_rules SET title = \''.$new_title.'\'
                    //     WHERE title = \'QUANTITY_["'.$old_sku.'"]\'';
                    //     echo $sql_update_wdr_titles . "</br><br><hr>";
                    //     if ($mysqli->query($sql_update_wdr_titles) === TRUE) {
                    //         echo "Record updated successfully";
                    //     } else {
                    //         echo "Error updating record: " . $mysqli->error;
                    //     }

                    //     echo "<hr>";
                    // }

                    // --- Update ean rows [titles]
                    // $sql_select_ean = 'SELECT id, title, filters 
                    // FROM wp_wdr_rules
                    // WHERE title = \'ean_'.$old_sku.'\'';
                    // $sql_select_ean_result = $mysqli->query($sql_select_ean);
                    // echo $sql_select_ean . "<br><br>";

                    // while ($row = $sql_select_ean_result->fetch_assoc()) {
                    //     $old_title = $row["title"];
                    //     $new_title = 'ean_'.$new_sku.'';

                    //     echo "old_title: " . $old_title . "</br><br>";
                    //     echo "new_title: " . $new_title . "</br><br>";

                    //     $sql_update_wdr_titles = 'UPDATE wp_wdr_rules SET title = \''.$new_title.'\'
                    //     WHERE title = \'ean_'.$old_sku.'\'';
                    //     echo $sql_update_wdr_titles . "</br><br><hr>";
                    //     if ($mysqli->query($sql_update_wdr_titles) === TRUE) {
                    //         echo "Record updated successfully";
                    //     } else {
                    //         echo "Error updating record: " . $mysqli->error;
                    //     }

                    //     echo "<hr>";
                    // }

                    // --- Update reseller rows [titles]
                    // $sql_select_reseller = 'SELECT id, title, filters 
                    // FROM wp_wdr_rules
                    // WHERE title = \'reseller_'.$old_sku.'\'';
                    // $sql_select_reseller_result = $mysqli->query($sql_select_reseller);
                    // echo $sql_select_reseller . "<br><br>";

                    // while ($row = $sql_select_reseller_result->fetch_assoc()) {
                    //     $old_title = $row["title"];
                    //     $new_title = 'reseller_'.$new_sku.'';

                    //     echo "old_title: " . $old_title . "</br><br>";
                    //     echo "new_title: " . $new_title . "</br><br>";

                    //     $sql_update_wdr_titles = 'UPDATE wp_wdr_rules SET title = \''.$new_title.'\'
                    //     WHERE title = \'reseller_'.$old_sku.'\'';
                    //     echo $sql_update_wdr_titles . "</br><br><hr>";
                    //     if ($mysqli->query($sql_update_wdr_titles) === TRUE) {
                    //         echo "Record updated successfully";
                    //     } else {
                    //         echo "Error updating record: " . $mysqli->error;
                    //     }

                    //     echo "<hr>";
                    // }
                }

                $iterator++;
            }
        ?>
    </div>
</body>
</html>