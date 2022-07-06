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
        // $mysqli = new mysqli("localhost","root","","display_dk_test");
        $mysqli = new mysqli("mysql40.unoeuro.com","display_dk","G4mehAanfFxE","display_dk_db");
        
        // Check connection
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        } else {
            echo "<h5>Connected!</h5>";
        }

        // --- CSV Functions
        $open = fopen("DisplayPrisData3.csv", "r");
        $data = fgetcsv($open, 0, ";");

        $iterator = 0;
        $arr_total = [];
        while (($data = fgetcsv($open, 0, ";")) !== FALSE) 
        {
            if ($iterator < 10000 && $iterator > 0) {
                $data_new = preg_replace("/<.+>/sU", "", $data);
                $array_default[] = $data_new;
                if ($data_new[1] != "1" && !empty($data_new[1]) && strlen($data_new[1]) > 1) {
                    
                }
                if (!empty($data_new)) {
                    $str_arr = preg_split ("/\;/", $data_new[1]);
                    $array_quantities[] = $str_arr;
                    $array_ids[] = $data_new[0];

                    $arr_total_inner = [];
                    $array_quantities_2 = [
                        "quantities" => $data_new[1],
                        "prodids" => $data_new[0],
                        "prices" => $data_new[2]
                    ];
                    array_push($arr_total_inner, $array_quantities_2);
                    array_push($arr_total, $arr_total_inner);
                }
                
                // $array[] = $data_new[0]; // - PRODUCT IDS
                // $array[] = $data_new[43]; // - RANGES
                // $array[] = $data_new[16]; // - RANGES
            }
            $iterator++;
        }
        echo "array_quantities:";
        echo "<pre>";
            // var_dump($arr_total);
        echo "</pre>";
        echo "<br><hr>";

        $array_quantities_modified = [];
        $array_quantity_groups_test = [];
        $array_sqls_ranges = [];
        $array_sqls_ranges_new = [];
        for ($i=0; $i < count($arr_total); $i++) {
            ${"temp_array_" . $i} = [];
            
            $array_quantities_split = preg_split("/\;/", $arr_total[$i][0]["quantities"]);
            $array_prices_split = preg_split("/\;/", $arr_total[$i][0]["prices"]);
            // echo "<pre>";
            // var_dump($array_quantities_split);
            // echo "</pre>";
            for ($i2=0; $i2 < count($array_quantities_split) ; $i2++) {
                if ($i2 == 0) {
                    ${"array_test".$i} = [
                        "prisgruppe_".$i2 => [
                            "quant_1" => $array_quantities_split[$i2],
                            "quant_2" => $array_quantities_split[$i2+1],
                            "price" => str_replace(",", ".", $array_prices_split[$i2])
                        ]
                    ];
                } else {
                    if (!empty($array_quantities_split[$i2+1])) {
                        ${"array_test".$i} = [
                            "prisgruppe_".$i2 => [
                                "quant_1" => strval($array_quantities_split[$i2]+1),
                                "quant_2" => $array_quantities_split[$i2+1],
                                "price" => str_replace(",", ".", $array_prices_split[$i2])
                            ]
                        ];
                    } else {
                        ${"array_test".$i} = [
                            "prisgruppe_".$i2 => [
                                "quant_1" => strval($array_quantities_split[$i2]+1),
                                "price" => str_replace(",", ".", $array_prices_split[$i2])
                            ]
                        ];
                    }
                }
                
                array_push(${"temp_array_" . $i}, ${"array_test".$i});
            }
            array_push($array_quantity_groups_test, [
                "quantities" => ${"temp_array_" . $i},
                "prodid" => $arr_total[$i][0]["prodids"]
            ]);
            
            ${"array_sqls_ranges_new_inner".$i} = [];
            for ($i3=0; $i3 < count($array_quantity_groups_test[$i]["quantities"]); $i3++) {
                $iterator_1 = $i3 + 1;
                // echo "count:" . count($array_quantity_groups_test[$i]["quantities"]) . "<br>";
                echo "<pre>";
                if (isset($array_quantity_groups_test[$i]["quantities"][$i3]["prisgruppe_".$i3.""]["quant_1"])) {
                    // var_dump($array_quantity_groups_test[$i]["quantities"][$i3]["prisgruppe_".$i3.""]["quant_1"]);

                    ${"str_quant_1".$i3} = $array_quantity_groups_test[$i]["quantities"][$i3]["prisgruppe_".$i3.""]["quant_1"];
                    ${"str_price".$i3} = $array_quantity_groups_test[$i]["quantities"][$i3]["prisgruppe_".$i3.""]["price"];
                    $value = 100;
                    $notsetvalue = "9999";

                    $str = '\"'.$iterator_1.'\":{\"from\":\"'.${"str_quant_1".$i3}.'\",\"to\":\"'.$notsetvalue.'\",\"type\":\"fixed_price\",\"value\":\"'.${"str_price".$i3}.'\",\"label\":\" Prisgruppe '.$iterator_1.'\"}';
                }
                if (isset($array_quantity_groups_test[$i]["quantities"][$i3]["prisgruppe_".$i3.""]["quant_2"])) {
                    // var_dump($array_quantity_groups_test[$i]["quantities"][$i3]["prisgruppe_".$i3.""]["quant_2"]);

                    ${"str_quant_2".$i3} = $array_quantity_groups_test[$i]["quantities"][$i3]["prisgruppe_".$i3.""]["quant_2"];
                    ${"str_price".$i3} = $array_quantity_groups_test[$i]["quantities"][$i3]["prisgruppe_".$i3.""]["price"];
                    $value = 100;

                    $str = '\"'.$iterator_1.'\":{\"from\":\"'.${"str_quant_1".$i3}.'\",\"to\":\"'.${"str_quant_2".$i3}.'\",\"type\":\"fixed_price\",\"value\":\"'.${"str_price".$i3}.'\",\"label\":\" Prisgruppe '.$iterator_1.'\"}';

                }
                
                echo "</pre>";
                
                echo $str;
                array_push(${"array_sqls_ranges_new_inner".$i}, $str);
            }

            echo "<pre>";
                // var_dump(${"array_sqls_ranges_new_inner".$i});
            echo "</pre>";

            $prod_id = '["' . $array_quantity_groups_test[$i]["prodid"] . '"]';
            ${"sql_str".$i} = "INSERT INTO `wp_wdr_rules` (`enabled`, `deleted`, `exclusive`, `title`, `priority`, `apply_to`, `filters`, `conditions`, `product_adjustments`, `cart_adjustments`, `buy_x_get_x_adjustments`, `buy_x_get_y_adjustments`, `bulk_adjustments`, `set_adjustments`, `other_discounts`, `date_from`, `date_to`, `usage_limits`, `rule_language`, `used_limits`, `additional`, `max_discount_sum`, `advanced_discount_message`, `discount_type`, `used_coupons`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
                (1, 0, 0, 'PRODUKT_".$prod_id."', ".$i.", NULL, '{\"1\":{\"type\":\"product_sku\",\"method\":\"in_list\",\"value\":".$prod_id.",\"product_variants\":[]}}', '{\"2\":{\"type\":\"user_role\",\"options\":{\"operator\":\"not_in_list\",\"value\":[\"ean\"]}},\"3\":{\"type\":\"user_role\",\"options\":{\"operator\":\"not_in_list\",\"value\":[\"reseller\"]}}}', '{\"cart_label\":\"\"}', '[]', '[]', '[]', '{\"operator\":\"product_cumulative\",\"ranges\":{".implode(", ", ${"array_sqls_ranges_new_inner".$i})."},\"cart_label\":\"\"}', '{\"cart_label\":\"\"}', NULL, NULL, NULL, 0, '[]', NULL, '{\"condition_relationship\":\"and\"}', NULL, '{\"display\":\"0\",\"badge_color_picker\":\"#ffffff\",\"badge_text_color_picker\":\"#000000\",\"badge_text\":\"\"}', 'wdr_bulk_discount', '[]', 1, '2022-04-11 17:27:46', 1, '2022-04-11 17:27:46')";

            // echo ${"sql_str".$i} . "<br><br><hr>";

            if ($mysqli->query(${"sql_str".$i}) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . ${"sql_str".$i} . "<br>" . $mysqli->error;
            }
              
        }

        echo "array_quantity_groups_test:";
        echo "<pre>";
            var_dump($array_quantity_groups_test);
        echo "</pre>";

        // - SQL RANGES
       
        
    ?>
</body>
</html>