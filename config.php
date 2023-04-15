<?php
    return (object) array(
        "theme" => "github_night.css",
        "curl_settings" => array(
            // CURLOPT_PROXY => "ip:port",
            // CURLOPT_PROXYTYPE => CURLPROXY_HTTP,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_USERAGENT => "Mozilla/5.0 (X11; Linux x86_64; rv:91.0) Gecko/20100101 Firefox/91.0",
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS | CURLPROTO_HTTP,
            CURLOPT_REDIR_PROTOCOLS => CURLPROTO_HTTPS | CURLPROTO_HTTP,
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_TIMEOUT => 18,
            CURLOPT_VERBOSE => false
        )
    );
?>
