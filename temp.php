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
        $mysqli = new mysqli("localhost","root","","display_dk_test");

        // Check connection
        if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        } else {
            echo "<h5>Connected!</h5>";
        }

        // --- CSV Functions
        $open = fopen("DisplayPrisData2.csv", "r");
        $data = fgetcsv($open, 0, ";");

        $iterator = 0;
        while (($data = fgetcsv($open, 0, ";")) !== FALSE) 
        {
            if ($iterator < 1500 && $iterator > 500) {
                $data_new = preg_replace("/<.+>/sU", "", $data);
                $array_default[] = $data_new;
                if ($data_new[1] != "1" && !empty($data_new[1]) && strlen($data_new[1]) > 1) {
                    
                }
                $str_arr = preg_split ("/\;/", $data_new[1]);
                $array_quantities[] = $str_arr;

                $array_quantities_2 = [
                    "quantities" => $array_quantities
                ];
                // $array[] = $data_new[0]; // - PRODUCT IDS
                // $array[] = $data_new[43]; // - RANGES
                // $array[] = $data_new[16]; // - RANGES
            }
            $iterator++;
        }
        echo "array_quantities:";
        echo "<pre>";
            //var_dump($array_quantities_2);
        echo "</pre>";
        echo "<br><hr>";

        $array_quantities_modified = [];
        for ($i=0; $i < count($array_quantities); $i++) {
            ${"temp_array_" . $i} = [];
            
            if(!empty($array_quantities[$i][0])) {
                ${"temp_array_inner_1".$i} = [];
                array_push(${"temp_array_inner_1".$i}, $array_quantities[$i][0]);
            }
            if(!empty($array_quantities[$i][1])) {
                array_push(${"temp_array_inner_1".$i}, $array_quantities[$i][1]);
            }
            if(!empty($array_quantities[$i][2])) {
                $value = $array_quantities[$i][1] + 1;
                ${"temp_array_inner_2".$i} = [];
                array_push(${"temp_array_inner_2".$i}, strval($value));
                array_push(${"temp_array_inner_2".$i}, $array_quantities[$i][2]);
            }
            if(!empty($array_quantities[$i][3])) {
                $value = $array_quantities[$i][2] + 1;
                ${"temp_array_inner_3".$i} = [];
                array_push(${"temp_array_inner_3".$i}, strval($value));
                array_push(${"temp_array_inner_3".$i}, $array_quantities[$i][3]);
            }
            if(!empty($array_quantities[$i][4])) {
                $value = $array_quantities[$i][3] + 1;
                ${"temp_array_inner_4".$i} = [];
                array_push(${"temp_array_inner_4".$i}, strval($value));
                array_push(${"temp_array_inner_4".$i}, $array_quantities[$i][4]);
            }
            if(!empty($array_quantities[$i][5])) {
                $value = $array_quantities[$i][4] + 1;
                ${"temp_array_inner_5".$i} = [];
                array_push(${"temp_array_inner_5".$i}, strval($value));
                array_push(${"temp_array_inner_5".$i}, $array_quantities[$i][5]);
            }
            if(!empty($array_quantities[$i][6])) {
                $value = $array_quantities[$i][5] + 1;
                ${"temp_array_inner_6".$i} = [];
                array_push(${"temp_array_inner_6".$i}, strval($value));
                array_push(${"temp_array_inner_6".$i}, $array_quantities[$i][6]);
            }
            if(!empty($array_quantities[$i][7])) {
                $value = $array_quantities[$i][5] + 1;
                ${"temp_array_inner_7".$i} = [];
                array_push(${"temp_array_inner_7".$i}, strval($value));
                array_push(${"temp_array_inner_7".$i}, $array_quantities[$i][7]);
            }

            if (!empty(${"temp_array_inner_1".$i})) {
                array_push(${"temp_array_" . $i}, ${"temp_array_inner_1".$i});
            }
            if (!empty(${"temp_array_inner_2".$i})) {
                array_push(${"temp_array_" . $i}, ${"temp_array_inner_2".$i});

                ${"temp_array_inner_last".$i} = [];
                array_push(${"temp_array_inner_last" . $i}, strval(${"temp_array_" . $i}[count(${"temp_array_" . $i})-1][1]+1));
                array_push(${"temp_array_" . $i}, ${"temp_array_inner_last".$i});
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
            // ${"test_array_test" . $i} = [
            //     "pris_1" => 'xxx',
            //     "pris_2" => 'xxx',
            //     "pris_3" => 'xxx',
            //     "pris_4" => 'xxx',
            //     "pris_5" => 'xxx',
            //     "pris_6" => 'xxx',
            //     "pris_7" => 'xxx',
            // ];
            // array_push(${"temp_array_" . $i}, ${"test_array_test" . $i});
            array_push($array_quantities_modified, ${"temp_array_" . $i});
        }
        $last_array = $array_quantities_modified[count($array_quantities_modified)-1];
        $last_array_inner = $last_array[count($last_array)-1];
        echo "array_quantities_modified";
        echo "<pre>";
            var_dump($array_quantities_modified);
        echo "</pre>";
    ?>
</body>
</html>