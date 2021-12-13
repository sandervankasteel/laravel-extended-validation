<?php

namespace LaravelExtendedValidation\Rules\Network;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class IPv4 implements Rule
{
    private $privateIPRanges = [
        '10.0.0.0' => '10.255.255.255',
        '172.16.0.0' => '172.16.255.255',
        '192.168.0.0' => '192.168.255.255',
    ];

    private $allowPrivateIpAddress;

    public function __construct($allowPrivateIpAddress = false)
    {
        $this->allowPrivateIpAddress = $allowPrivateIpAddress;
    }

    public function passes($attribute, $value): bool
    {
        $octets = Str::of($value)
            ->explode('.');

        if($octets->count() !== 4) {
            return false;
        }

        foreach ($octets as $octet) {
            $octet = (int) $octet;

            if($octet < 0 || $octet > 255) {
                return false;
            }
        }

        if($this->isInPrivateIpAddressRange($value) && !$this->allowPrivateIpAddress) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return ':attribute does not contain a valid IP address';
    }

    private function isInPrivateIpAddressRange($ipAddress)
    {
        $ipAddressLong = ip2long($ipAddress);

        foreach($this->privateIPRanges as $startAddress => $endAddress) {
            $startAddressLong = ip2long($startAddress);
            $endAddressLong = ip2long($endAddress);

            if($ipAddressLong >= $startAddressLong && $ipAddressLong <= $endAddressLong) {
                return true;
            }
        }

        return false;
    }
}