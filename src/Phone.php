<?php
namespace Carve\Validators;

/**
 * A bunch of methods for checking for various types of UK phone number.
 */
class Phone {

    /**
     * Loose validation for any UK phone number. 10 or 11 digits; first must be zero.
     * Second digit can be anything except zero. Currently 04 and 06 are unused, but may be opened in the future.
     * Most numbers are 11 digits. 10-digit numbers are rare.
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function phoneNumber($attribute, $value, $parameters)
    {
        return $this->doPhoneValidation($value, '/^0[1258]\d{8,9}$/')   //these ranges can be 10 or 11 digits.
            || $this->doPhoneValidation($value, '/^0[379]\d{9}$/');     //these ranges can only be 11 digits.
    }

    /**
     * Validates a UK mobile number. 11 digits; start with 07, but not 070.
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function mobileNumber($attribute, $value, $parameters)
    {
        return $this->doPhoneValidation($value, '/^07[1-9]\d{8}$/');
    }

    /**
     * Validates a UK landline number. 10 or 11 digits; starts 01 or 02.
     * (does not include 03 numbers; these are charged as landlines but are explicitly non-geographic)
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function landlineNumber($attribute, $value, $parameters)
    {
        return $this->doPhoneValidation($value, '/^0[12]\d{8,9}$/i');
    }

    /**
     * Validates a UK 'freefone' number. 10 or 11 digits. Start 080, 0500.
     * (mostly 0800, occasionally 0808. 0500 numbers are very rare but do exist)
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function freeNumber($attribute, $value, $parameters)
    {
        return $this->doPhoneValidation($value, '/^0((80\d)|(500))\d{6,7}$/i');
    }

    /**
     * Validates a UK business number. 10 or 11 digits. Start 01, 02, 03, 08, 0500 or mobile.
     * (excludes most premium numbers, but includes 087, etc as some businesses still use them)
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function businessNumber($attribute, $value, $parameters)
    {
        return $this->doPhoneValidation($value, '/^0[128]\d{8,9}$/')
            || $this->doPhoneValidation($value, '/^03\d{9}$/')
            || $this->freeNumber($attribute, $value, $parameters)
            || $this->mobileNumber($attribute, $value, $parameters);
    }

    /**
     * Validates a UK premium-rate number. 11 digits. 09, 084, 087, 070.
     * (numbers where the owner of the number receives money for taking the call, even if only a small amount)
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function premiumNumber($attribute, $value, $parameters)
    {
        return $this->doPhoneValidation($value, '/^0(70|9\d|84|87)\d{7,8}$/');
    }

    //-------------------------------------
    
    /**
     * Common functionality shared by all the phone validators.
     */
    private function doPhoneValidation($value, $regex)
    {
        $value = preg_replace('/[\s-]/', '', $value); //strip out all whitespace.
        $value = preg_replace('/^(\+44|0044)/', '0', $value); //convert international formal to UK local format for easier validation.
        return preg_match($regex, $value) > 0;
    }
}
