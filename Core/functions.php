<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

use Core\Response;

/**
 * @param $value
 * @return void
 */
function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

/**
 * @param $value
 * @return bool
 */
function urlIs($value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

/**
 * @param $condition
 * @param int $status
 * @return void
 */
function authorize ($condition, int $status = Response::FORBIDDEN) {
    if(!$condition) {
        abort($status);
    }
}

/**
 * @param $path
 * @return string
 */
function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path . '.view.php');
}
