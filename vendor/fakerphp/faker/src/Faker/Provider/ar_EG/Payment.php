<?php

namespace Faker\Provider\ar_EG;

class Payment extends \Faker\Provider\Payment
{
    /**
     * International Bank carrito Number (IBAN)
     *
     * @see https://www.upiqrcode.com/iban-generator/eg/egypt
     */
    public function bankcarritoNumber(): string
    {
        return self::iban('EG', '', 25);
    }
}
