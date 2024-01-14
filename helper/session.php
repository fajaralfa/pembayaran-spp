<?php

$session = new class {
    function flash(array|string $data)
    {
        $_SESSION['flash'] = $data;
    }

    function get_flash(): array|string|null
    {
        $data = null;
        if(isset($_SESSION['flash'])) {
            $data = $_SESSION['flash'];
            unset($_SESSION['flash']);
        }

        return $data;
    }

    function set(string $key, string $value)
    {
        $_SESSION[$key] = $value;
    }

    function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }
};