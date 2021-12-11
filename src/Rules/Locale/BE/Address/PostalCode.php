<?php

namespace LaravelExtendedValidation\Rules\Locale\BE\Address;

use Illuminate\Contracts\Validation\Rule;

class PostalCode implements Rule
{

    private $specialPostalCodes = [
        612, // Sinterklaas
        1005, // Verenigde Vergadering van de Gemeenschappelijke
        1006, // Raad van de Vlaamse Gemeenschapscommissie
        1007, // Assemblée de la Commission Communautaire Française
        1008, // Kamer van Volksvertegenwoordigers
        1009, // Belgische Senaat
        1011, // Vlaams Parlement
        1012, // Parlement de la communauté française
        1031, // Christelijke Sociale Organisaties
        1033, // RTL-TVI
        1035, // Ministerie van het Brussels Hoofdstedelijk Gewest
        1041, // International press center
        1043, // VRT
        1044, // RTBF
        1046, // European External Action Service
        1047, // Europees Parlement
        1048, // Europese unie - Raad
        1049, // Europese unie - Commissie
        1099, // Brussel X
        1100, // Postcheque
        1101, // Scanning
        1105, // ACTISOC
        1110, // NATO
        1212, // FOD Mobiliteit
        1733, // HighCo DATA
        1804, // Cargovil
        1818, // VTM
        1931, // Brucargo
        1934, // Office Exchange Brussels Airport Remailing
        1935, // Corporate Village
        2099, // Antwerpen X
        4099, // Liège X
        5010, // SA SudPresse
        5012, // Parlement Wallon
        5589, // Jemelle
        6075, // CSM Charleroi X
        6099, // Charleroi X
        7010, // SHAPE
        7510, // 3 Suisses
        7511, // Vitrine Magique
        7512, // DANIEL JOUVANCE
        7513, // Yves Rocher
        9075, // CSM Gent X
        9099, // Gent X
    ];

    private $checkForSpecialPostalCodes;

    public function __construct($checkForSpecialPostalCodes = false)
    {
        $this->checkForSpecialPostalCodes = $checkForSpecialPostalCodes;
    }

    public function passes($attribute, $value): bool
    {
        $value = (int) $value;

        if($this->checkForSpecialPostalCodes && in_array($value, $this->specialPostalCodes)) {
            return true;
        }

        if(!$this->checkForSpecialPostalCodes && in_array($value, $this->specialPostalCodes)) {
            return false;
        }

        if($value >= 1000 && $value <= 9992) {
            return true;
        }

        return false;
    }

    public function message(): string
    {
        return ':attribute does not contain a valid Belgium postal code';
    }
}