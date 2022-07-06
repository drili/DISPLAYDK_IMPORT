<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Files Update Test</h1>

    <?php
        // --- CSV Functions
        $open = fopen("Show-Down_2022_CSV_SHORT.csv", "r");
        $data = fgetcsv($open, 0, ";");

        $iterator = 0;
        $arr_total = [];
        while (($data = fgetcsv($open, 0, ";")) !== FALSE) 
        {
            if ($iterator < 10000 && $iterator > 1) {
                $data_new = preg_replace("/<.+>/sU", "", $data);

                $array_csv[] = $data_new;
                $arr_total_inner = [];
                $arr = [
                    "prod_id" => $data_new[0],
                    "art_nr_deres" => $data_new[1],
                    "price_1" => $data_new[7], 
                    "price_2" => $data_new[8],
                    "price_3" => $data_new[9],
                    "price_4" => $data_new[10],
                    "price_5" => $data_new[11],
                    "price_6" => $data_new[12],
                    "price_7" => $data_new[13],
                    "reseller_pris" => $data_new[14],
                    "ean_pris" => $data_new[15]
                ];
                
                array_push($arr_total_inner, $arr);
                array_push($arr_total, $arr_total_inner);
            }
            $iterator++;
        }


        echo "CSV Data: </br>";
        // echo "<pre>";
        //     var_dump($arr_total);
        // echo "</pre>";

        for ($i=0; $i < count($arr_total); $i++) {
            if (!empty($arr_total[$i][0]["prod_id"])) {
                $test_val = "";
                $test_val .= strval($arr_total[$i][0]["price_1"]);
                $test_val .= ",".strval($arr_total[$i][0]["price_2"]);
                echo $test_val;
                echo "<pre>";
                    var_dump($arr_total[$i]);
                echo "</pre>";
            } 
            
            // ${"sql_str".$i} = "INSERT INTO `display_wdr_rules` (`enabled`, `deleted`, `exclusive`, `title`, `priority`, `apply_to`, `filters`, `conditions`, `product_adjustments`, `cart_adjustments`, `buy_x_get_x_adjustments`, `buy_x_get_y_adjustments`, `bulk_adjustments`, `set_adjustments`, `other_discounts`, `date_from`, `date_to`, `usage_limits`, `rule_language`, `used_limits`, `additional`, `max_discount_sum`, `advanced_discount_message`, `discount_type`, `used_coupons`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
            //     (1, 0, 0, 'PRODUKT_".$prod_id."', ".$i.", NULL, '{\"1\":{\"type\":\"product_sku\",\"method\":\"in_list\",\"value\":".$prod_id.",\"product_variants\":[]}}', '{\"2\":{\"type\":\"user_role\",\"options\":{\"operator\":\"not_in_list\",\"value\":[\"ean\"]}},\"3\":{\"type\":\"user_role\",\"options\":{\"operator\":\"not_in_list\",\"value\":[\"reseller\"]}}}', '{\"cart_label\":\"\"}', '[]', '[]', '[]', '{\"operator\":\"product_cumulative\",\"ranges\":{".implode(", ", ${"array_sqls_ranges_new_inner".$i})."},\"cart_label\":\"\"}', '{\"cart_label\":\"\"}', NULL, NULL, NULL, 0, '[]', NULL, '{\"condition_relationship\":\"and\"}', NULL, '{\"display\":\"0\",\"badge_color_picker\":\"#ffffff\",\"badge_text_color_picker\":\"#000000\",\"badge_text\":\"\"}', 'wdr_bulk_discount', '[]', 1, '2022-04-11 17:27:46', 1, '2022-04-11 17:27:46')";
        }
    ?>
</body>
</html>