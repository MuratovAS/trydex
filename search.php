<?php 
    require "misc/header.php";

    $config = require "config.php";
    require "misc/tools.php";
?>

<title>
<?php
  $query = htmlspecialchars(trim($_REQUEST["q"]));
  echo $query;
?> - TrydeX</title>
</head>
    <body>
        <form class="sub-search-container" method="get" autocomplete="off">
            <h1 class="logomobile"><a class="no-decoration" href="./">Tryde<span class="X">X</span></a></h1>
            <input type="text" name="q"
                <?php
                    $query_encoded = urlencode($query);

                    if (1 > strlen($query) || strlen($query) > 256)
                    {
                        header("Location: ./");
                        die();
                    }

                    echo "value=\"$query\"";
                ?>
            >
            <br>
            <?php
                foreach($_REQUEST as $key=>$value)
                {
                    if ($key != "q" && $key != "p")
                    {
                        echo "<input type=\"hidden\" name=\"" . htmlspecialchars($key) . "\" value=\"" . htmlspecialchars($value) . "\"/>";
                    }
                }

                $type = isset($_REQUEST["t"]) ? (int) $_REQUEST["t"] : 0;
                echo "<button class=\"hide\" name=\"t\" value=\"$type\"/></button>";
            ?>
            
        <hr>
        </form>

        <?php

            $page = isset($_REQUEST["p"]) ? (int) $_REQUEST["p"] : 0;

            $start_time = microtime(true);
            $query_parts = explode(" ", $query);
            $last_word_query = end($query_parts);
            if (substr($query, 0, 1) == "!" || substr($last_word_query, 0, 1) == "!")
                check_ddg_bang($query);
            
            require "engines/yandex/text.php";
            
            $results = get_text_results($query, $page);
            print_elapsed_time($start_time);
            print_text_results($results);

            echo "<div class=\"next-page-button-wrapper\">";

                if ($page != 0)
                {
                    print_next_page_button("&lt;&lt;", 0, $query, $type);
                    print_next_page_button("&lt;", $page - 10, $query, $type);
                }

                for ($i=$page / 10; $page / 10 + 10 > $i; $i++)
                    print_next_page_button($i + 1, $i * 10, $query, $type);

                print_next_page_button("&gt;", $page + 10, $query, $type);

            echo "</div>";
        ?>

    </body>
</html>