<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>INDEX.HTML</h1>
    <?php 
        // --- Connect to DB
        $mysqli = new mysqli("mysql40.unoeuro.com","display_dk","G4mehAanfFxE","display_dk_db");

        // Check connection
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        } else {
            echo "<h5>Connected!</h5>";
        }

        // --- CSV Functions
        $open = fopen("Display-produktdata-08042022.csv", "r");
        $data = fgetcsv($open, 0, ";");

        $iterator = 0;
        while (($data = fgetcsv($open, 0, ";")) !== FALSE) 
        {
            if ($iterator < 10) {
                $data_new = preg_replace("/<.+>/sU", "", $data);
                // $array[] = $data_new[0]; // - PRODUCT IDS
                // $array[] = $data_new[43]; // - RANGES
                // $array[] = $data_new[16]; // - RANGES
                if (!empty($data_new[43]) && $data_new[43] != "1" && strlen($data_new[43]) > 1) {
                    $str_arr = preg_split ("/\;/", $data_new[43]);
                    array_unshift($str_arr, $data_new[16]);
                    array_unshift($str_arr , $data_new[0]);
                    $array_quantities[] = $str_arr;
                    
                }
            }
            $iterator++;
        }
        
        echo "array_quantities:";
        echo "<pre>";
            var_dump($array_quantities);
        echo "</pre>";

        echo "<br><hr>";

        // echo "<pre>";
        //     var_dump($array_quantities);
        // echo "</pre>";
        $array_quantities_modified = [];
        for ($i=0; $i < count($array_quantities); $i++) {
            ${"temp_array_" . $i} = [];
            
            if(!empty($array_quantities[$i][2])) {
                ${"temp_array_inner_1".$i} = [];
                array_push(${"temp_array_inner_1".$i}, $array_quantities[$i][2]);
            }
            if(!empty($array_quantities[$i][3])) {
                array_push(${"temp_array_inner_1".$i}, $array_quantities[$i][3]);
            }
            if(!empty($array_quantities[$i][3])) {
                $value = $array_quantities[$i][2] + 1;
                ${"temp_array_inner_2".$i} = [];
                array_push(${"temp_array_inner_2".$i}, strval($value));
                array_push(${"temp_array_inner_2".$i}, $array_quantities[$i][3]);
            }
            if(!empty($array_quantities[$i][4])) {
                $value = $array_quantities[$i][3] + 1;
                ${"temp_array_inner_3".$i} = [];
                array_push(${"temp_array_inner_3".$i}, strval($value));
                array_push(${"temp_array_inner_3".$i}, $array_quantities[$i][4]);
            }
            if(!empty($array_quantities[$i][5])) {
                $value = $array_quantities[$i][4] + 1;
                ${"temp_array_inner_4".$i} = [];
                array_push(${"temp_array_inner_4".$i}, strval($value));
                array_push(${"temp_array_inner_4".$i}, $array_quantities[$i][5]);
            }
            if(!empty($array_quantities[$i][6])) {
                $value = $array_quantities[$i][5] + 1;
                ${"temp_array_inner_5".$i} = [];
                array_push(${"temp_array_inner_5".$i}, strval($value));
                array_push(${"temp_array_inner_5".$i}, $array_quantities[$i][6]);
            }
            if(!empty($array_quantities[$i][7])) {
                $value = $array_quantities[$i][6] + 1;
                ${"temp_array_inner_6".$i} = [];
                array_push(${"temp_array_inner_6".$i}, strval($value));
                array_push(${"temp_array_inner_6".$i}, $array_quantities[$i][7]);
            }
            if(!empty($array_quantities[$i][8])) {
                $value = $array_quantities[$i][7] + 1;
                ${"temp_array_inner_7".$i} = [];
                array_push(${"temp_array_inner_7".$i}, strval($value));
                array_push(${"temp_array_inner_7".$i}, $array_quantities[$i][8]);
            }

            if (!empty(${"temp_array_inner_1".$i})) {
                array_push(${"temp_array_" . $i}, ${"temp_array_inner_1".$i});
            }
            if (!empty(${"temp_array_inner_2".$i})) {
                array_push(${"temp_array_" . $i}, ${"temp_array_inner_2".$i});
            }
            if (!empty(${"temp_array_inner_3".$i})) {
                array_push(${"temp_array_" . $i}, ${"temp_array_inner_3".$i});
            }
            if (!empty(${"temp_array_inner_4".$i})) {
                array_push(${"temp_array_" . $i}, ${"temp_array_inner_4".$i});
            }
            if (!empty(${"temp_array_inner_5".$i})) {
                array_push(${"temp_array_" . $i}, ${"temp_array_inner_5".$i});
            }
            if (!empty(${"temp_array_inner_6".$i})) {
                array_push(${"temp_array_" . $i}, ${"temp_array_inner_6".$i});
            }
            if (!empty(${"temp_array_inner_7".$i})) {
                array_push(${"temp_array_" . $i}, ${"temp_array_inner_7".$i});
            }

            array_push($array_quantities_modified, ${"temp_array_" . $i});
        }

        echo "array_quantities_modified";
        echo "<pre>";
            var_dump($array_quantities_modified);
        echo "</pre>";

        echo "<hr></br>";

        $array_sqls_ranges = [];
        for ($i=0; $i < count($array_quantities_modified); $i++) { 
            ${"sql_ranges_array_".$i} = [];
            ${"value_".$i} = $i+10;
            if (!empty($array_quantities_modified[$i][0][0])) {
                ${"str_1".$i} = '\"1\":{\"from\":\"'.$array_quantities_modified[$i][0][0].'\",\"to\":\"'.$array_quantities_modified[$i][0][1].'\",\"type\":\"percentage\",\"value\":\"'.${"value_".$i}.'\",\"label\":\" Prisgruppe 1\"}';
                array_push(${"sql_ranges_array_".$i}, ${"str_1".$i});
            }
            if (!empty($array_quantities_modified[$i][1][0])) {
                ${"str_1".$i} = '\"2\":{\"from\":\"'.$array_quantities_modified[$i][1][0].'\",\"to\":\"'.$array_quantities_modified[$i][1][1].'\",\"type\":\"percentage\",\"value\":\"'.${"value_".$i}.'\",\"label\":\" Prisgruppe 2\"}';
                array_push(${"sql_ranges_array_".$i}, ${"str_1".$i});
            }
            if (!empty($array_quantities_modified[$i][2][0])) {
                ${"str_1".$i} = '\"3\":{\"from\":\"'.$array_quantities_modified[$i][2][0].'\",\"to\":\"'.$array_quantities_modified[$i][2][1].'\",\"type\":\"percentage\",\"value\":\"'.${"value_".$i}.'\",\"label\":\" Prisgruppe 3"}';
                array_push(${"sql_ranges_array_".$i}, ${"str_1".$i});
            }
            if (!empty($array_quantities_modified[$i][3][0])) {
                ${"str_1".$i} = '\"4\":{\"from\":\"'.$array_quantities_modified[$i][3][0].'\",\"to\":\"'.$array_quantities_modified[$i][3][1].'\",\"type\":\"percentage\",\"value\":\"'.${"value_".$i}.'\",\"label\":\" Prisgruppe 4\"}';
                array_push(${"sql_ranges_array_".$i}, ${"str_1".$i});
            }
            if (!empty($array_quantities_modified[$i][4][0])) {
                ${"str_1".$i} = '\"5\":{\"from\":\"'.$array_quantities_modified[$i][4][0].'\",\"to\":\"'.$array_quantities_modified[$i][4][1].'\",\"type\":\"percentage\",\"value\":\"'.${"value_".$i}.'\",\"label\":\" Prisgruppe 5\"}';
                array_push(${"sql_ranges_array_".$i}, ${"str_1".$i});
            }
            if (!empty($array_quantities_modified[$i][5][0])) {
                ${"str_1".$i} = '\"6\":{\"from\":\"'.$array_quantities_modified[$i][5][0].'\",\"to\":\"'.$array_quantities_modified[$i][5][1].'\",\"type\":\"percentage\",\"value\":\"'.${"value_".$i}.'\",\"label\":\" Prisgruppe 6\"}';
                array_push(${"sql_ranges_array_".$i}, ${"str_1".$i});
            }
            if (!empty($array_quantities_modified[$i][6][0])) {
                ${"str_1".$i} = '{\"7\":{\"from\":\"'.$array_quantities_modified[$i][6][0].'\",\"to\":\"'.$array_quantities_modified[$i][6][1].'\",\"type\":\"percentage\",\"value\":\"'.${"value_".$i}.'\",\"label\":\" Prisgruppe 7\"}';
                array_push(${"sql_ranges_array_".$i}, ${"str_1".$i});
            }
            if (!empty($array_quantities_modified[$i][7][0])) {
                ${"str_1".$i} = '{\"8\":{\"from\":\"'.$array_quantities_modified[$i][7][0].'\",\"to\":\"'.$array_quantities_modified[$i][7][1].'\",\"type\":\"percentage\",\"value\":\"'.${"value_".$i}.'\",\"label\":\" Prisgruppe 8\"}';
                array_push(${"sql_ranges_array_".$i}, ${"str_1".$i});
            }
            
            array_push($array_sqls_ranges, ${"sql_ranges_array_".$i});
            //'{\"1\":{\"from\":\"1\",\"to\":\"10\",\"type\":\"percentage\",\"value\":\"1\",\"label\":\"1\"}'
        }

        echo "array_sqls_ranges:";
        echo "<pre>";
            var_dump($array_sqls_ranges);
        echo "</pre>";
        echo "<hr></br>";
        
        $sql_ranges_concat = [];
        $iterator_prods = 0;
        for ($i=0; $i < count($array_sqls_ranges); $i++) {
                $prod_id = "[\"".$array_quantities[$iterator_prods][0]."\"";
                ${"sql_str".$i} = "INSERT INTO `display_wdr_rules` (`id`, `enabled`, `deleted`, `exclusive`, `title`, `priority`, `apply_to`, `filters`, `conditions`, `product_adjustments`, `cart_adjustments`, `buy_x_get_x_adjustments`, `buy_x_get_y_adjustments`, `bulk_adjustments`, `set_adjustments`, `other_discounts`, `date_from`, `date_to`, `usage_limits`, `rule_language`, `used_limits`, `additional`, `max_discount_sum`, `advanced_discount_message`, `discount_type`, `used_coupons`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
                (8003, 1, 0, 0, 'TEST', 8003, NULL, '{\"1\":{\"type\":\"product_sku\",\"method\":\"in_list\",\"value\":".$prod_id.",\"product_variants\":[]}}', '{\"2\":{\"type\":\"user_role\",\"options\":{\"operator\":\"not_in_list\",\"value\":[\"ean\"]}},\"3\":{\"type\":\"user_role\",\"options\":{\"operator\":\"not_in_list\",\"value\":[\"reseller\"]}}}', '{\"cart_label\":\"\"}', '[]', '[]', '[]', '{\"operator\":\"product_cumulative\",\"ranges\":{".implode(", ", $array_sqls_ranges[$i])."},\"cart_label\":\"\"}', '{\"cart_label\":\"\"}', NULL, NULL, NULL, 0, '[]', NULL, '{\"condition_relationship\":\"and\"}', NULL, '{\"display\":\"0\",\"badge_color_picker\":\"#ffffff\",\"badge_text_color_picker\":\"#000000\",\"badge_text\":\"\"}', 'wdr_bulk_discount', '[]', 1, '2022-04-11 17:27:46', 1, '2022-04-11 17:27:46')";
                
            ${"sql_concat_range".$i} = [];
            array_push($sql_ranges_concat, ${"sql_str".$i});
            echo "prodID:";
            var_dump($array_quantities[$iterator_prods][0]);
            $iterator_prods++;
        }
        echo "<pre>";
            var_dump($sql_ranges_concat);
        echo "</pre>";
        echo "<hr></br>";
    ?>
</body>
</html>