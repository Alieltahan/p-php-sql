<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

namespace Core\Middleware;

class Authenticated
{
    public function handle()
    {
        if (!$_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}