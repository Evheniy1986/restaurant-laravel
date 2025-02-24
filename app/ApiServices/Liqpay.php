<?php

namespace App\ApiServices;

class Liqpay
{
    private $public_key;
    private $private_key;

    public function __construct($public_key, $private_key)
    {
        $this->public_key = $public_key;
        $this->private_key = $private_key;
    }

    public function cnbForm($params)
    {
        $data = base64_encode(json_encode($params));

        $signature = base64_encode(sha1($this->private_key . $data . $this->private_key, true));

        return '
            <form method="POST" action="https://www.liqpay.ua/api/3/checkout" accept-charset="utf-8">
                <input type="hidden" name="data" value="' . $data . '" />
                <input type="hidden" name="signature" value="' . $signature . '" />
                <button class="btn btn-success" type="submit">Оплатить</button>
            </form>';
    }
}

