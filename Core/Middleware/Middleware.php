<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

namespace Core\Middleware;

use Exception;

class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Authenticated::class
    ];

    /**
     * @throws Exception
     */
    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;
        if (!$middleware) {
            throw new Exception("No matching middleware found for $key");
        }

        (new $middleware)->handle();

    }
}
