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

            ?>
            
        <hr>
        </form>

        <?php

            $page = isset($_REQUEST["p"]) ? (int) $_REQUEST["p"] : 0;

            $start_time = microtime(true);
            $query_parts = explode(" ", $query);
            $last_word_query = end($query_parts);
            
            require "engines/yandex.php";
            
            $results = get_text_results($query, $page);
            print_elapsed_time($start_time);
            print_text_results($results);

            echo "<div class=\"next-page-button-wrapper\">";

                if ($page != 0)
                {
                    print_next_page_button("&lt;&lt;", 0, $query);
                    print_next_page_button("&lt;", $page - 10, $query);
                }

                for ($i=$page / 10; $page / 10 + 10 > $i; $i++)
                    print_next_page_button($i + 1, $i * 10, $query);

                print_next_page_button("&gt;", $page + 10, $query);

            echo "</div>";
        ?>

<?php require "misc/footer.php"; ?>