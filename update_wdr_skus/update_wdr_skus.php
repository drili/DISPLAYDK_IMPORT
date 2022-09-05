<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update old WDR sku's with new</title>
</head>
<body>
    <div>
        <h1>Update old WDR sku's with new</h1>
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
                    $new_sku = $data[7];

                    // echo "<pre>";
                    //     var_dump($data[0]);
                    //     var_dump($data[7]);
                    // echo "</pre>";

                    // echo $old_sku . "</br>";
                    // echo $new_sku . "</br>";
                    // echo "<hr></br>";

                    // --- Update quantity rows first
                    // $sql_select_quantities = 'SELECT id, title, filters 
                    // FROM wp_wdr_rules
                    // WHERE title LIKE "%QUANTITY_[\"'.$old_sku.'\"]%"
                    // AND filters LIKE "%'.$old_sku.'%"';
                    // echo $sql_select_quantities;

                    // $sql_select_quantities_result = $mysqli->query($sql_select_quantities);
                    // while ($row = $sql_select_quantities_result->fetch_assoc()) {
                    //     $old_filters_value = $row["filters"];
                    //     $new_filters_value = str_replace($old_sku, $new_sku, $old_filters_value);

                    //     echo "old_filters_value: " . $old_filters_value . "</br>";
                    //     echo "new_filters_value: " . $new_filters_value . "</br>";

                    //     $sql_update_quantities_filter = "UPDATE wp_wdr_rules SET filters = '".$new_filters_value."'
                    //     WHERE title LIKE '%QUANTITY_[\"".$old_sku."\"]%'
                    //     AND filters LIKE '%".$old_sku."%'";
                    //     echo $sql_update_quantities_filter . "</br>";

                    //     if ($mysqli->query($sql_update_quantities_filter) === TRUE) {
                    //         echo "Record updated successfully";
                    //     } else {
                    //         echo "Error updating record: " . $mysqli->error;
                    //     }

                    //     echo "<hr>";
                    // }

                    // --- Update ean rows
                    // $sql_select_ean = "SELECT id, title, filters 
                    // FROM wp_wdr_rules
                    // WHERE title='ean_".$old_sku."'";
                    // echo $sql_select_ean;

                    // $sql_select_ean_result = $mysqli->query($sql_select_ean);
                    // while ($row = $sql_select_ean_result->fetch_assoc()) {
                    //     $old_filters_value = $row["filters"];
                    //     $new_filters_value = '{"1":{"type":"product_sku","method":"in_list","value":["'.$new_sku.'"],"product_variants":[]}}';

                    //     echo "old_filters_value: " . $old_filters_value . "</br>";
                    //     echo "new_filters_value: " . $new_filters_value . "</br>";
                    //     echo "<hr>";

                    //     $sql_update_ean_filters = "UPDATE wp_wdr_rules SET filters = '".$new_filters_value."'
                    //     WHERE title='ean_".$old_sku."'";
                    //     if ($mysqli->query($sql_update_ean_filters) === TRUE) {
                    //         echo "Record updated successfully";
                    //     } else {
                    //         echo "Error updating record: " . $mysqli->error;
                    //     }
                    // }

                    // --- Update reseller rows
                    // $sql_select_reseller = "SELECT id, title, filters 
                    // FROM wp_wdr_rules
                    // WHERE title='reseller_".$old_sku."'";
                    // echo $sql_select_reseller;

                    // $sql_select_reseller_result = $mysqli->query($sql_select_reseller);
                    // while ($row = $sql_select_reseller_result->fetch_assoc()) {
                    //     $old_filters_value = $row["filters"];
                    //     $new_filters_value = '{"1":{"type":"product_sku","method":"in_list","value":["'.$new_sku.'"],"product_variants":[]}}';

                    //     echo "old_filters_value: " . $old_filters_value . "</br>";
                    //     echo "new_filters_value: " . $new_filters_value . "</br>";
                    //     echo "<hr>";

                    //     $sql_update_reseller_filters = "UPDATE wp_wdr_rules SET filters = '".$new_filters_value."'
                    //     WHERE title='reseller_".$old_sku."'";
                    //     if ($mysqli->query($sql_update_reseller_filters) === TRUE) {
                    //         echo "Record updated successfully - reseller";
                    //     } else {
                    //         echo "Error updating record: " . $mysqli->error;
                    //     }
                    // }
                }

                $iterator++;
            }
        ?>
    </div>
</body>
</html>