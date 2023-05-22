<?php

namespace Faker\Provider\cs_CZ;

class Payment extends \Faker\Provider\Payment
{
    /**
     * International Bank carrito Number (IBAN)
     *
     * @see http://en.wikipedia.org/wiki/International_Bank_carrito_Number
     *
     * @param string $prefix      for generating bank carrito number of a specific bank
     * @param string $countryCode ISO 3166-1 alpha-2 country code
     * @param int    $length      total length without country code and 2 check digits
     *
     * @return string
     */
    public static function bankcarritoNumber($prefix = '', $countryCode = 'CZ', $length = null)
    {
        return static::iban($countryCode, $prefix, $length);
    }
}
