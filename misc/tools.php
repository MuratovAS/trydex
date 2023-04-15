<?php
    function get_base_url($url)
    {
        $split_url = explode("/", $url);
        $base_url = $split_url[0] . "//" . $split_url[2] . "/";
        return $base_url;
    }

    function check_for_special_search($query)
    {
         $query_lower = strtolower($query);
         $split_query = explode(" ", $query);

         if (strpos($query_lower, "to") && count($split_query) >= 4) // currency
         {
            $amount_to_convert = floatval($split_query[0]);
            if ($amount_to_convert != 0)
                return 1;
         }
         else if (strpos($query_lower, "mean") && count($split_query) >= 2) // definition
         {
             return 2;
         }
         else if (strpos($query_lower, "ip") !== false)
         {
            return 3;
         }
         else if (strpos($query_lower, "ua") !== false)
         {
            return 4;
         }
         else if (strpos($query_lower, "weather") !== false)
         {
                return 5;
         }
         else if ($query_lower == "tor")
         {
                return 6;
         }
         else if (3 > count(explode(" ", $query))) // wikipedia
         {
             return 7;
         }
        return 0;
    }

    function get_xpath($response)
    {
        $htmlDom = new DOMDocument;
        @$htmlDom->loadHTML($response);
        $xpath = new DOMXPath($htmlDom);

        return $xpath;
    }

    function request($url)
    {
        global $config;

        $ch = curl_init($url);
        curl_setopt_array($ch, $config->curl_settings);
        $response = curl_exec($ch);

        return $response;
    }
   
    function print_elapsed_time($start_time)
        {
            $end_time = number_format(microtime(true) - $start_time, 2, '.', '');
            echo "<p id=\"time\">Получил результаты за $end_time секунды от Yandex</p> ";
        }

    function print_next_page_button($text, $page, $query)
    {
        echo "<form class=\"page\" action=\"search.php\" target=\"_top\" method=\"get\" autocomplete=\"off\">";
        foreach($_REQUEST as $key=>$value)
        {
            if ($key != "q" && $key != "p")
            {
                echo "<input type=\"hidden\" name=\"$key\" value=\"$value\"/>";
            }
        }
        echo "<input type=\"hidden\" name=\"p\" value=\"" . $page . "\" />";
        echo "<input type=\"hidden\" name=\"q\" value=\"$query\" />";
        echo "<button type=\"submit\">$text</button>";
        echo "</form>";
    }
?>
