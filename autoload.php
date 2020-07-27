<?php

if (file_exists('./env.php')) {
    include 'env.php';
}

if (!function_exists('envi')) {
    function envi($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return $default;
        }

        return $value;
    }
}

?>
