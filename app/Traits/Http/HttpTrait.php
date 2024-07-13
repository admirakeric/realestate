<?php
namespace App\Traits\Http;

use App\Models\User;

trait HttpTrait{
    /**
     * @return string
     *
     * Get IP address from user
     */
    public function getIpAddr(): string{
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }
}
