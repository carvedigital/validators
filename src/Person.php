<?php namespace Carve\Validators;

class Person {

    /**
     * Validate a UK national insurance number
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function nationalInsuranceNumber($attribute, $value, $parameters)
    {
        $validation_expression = '/^((A[ABEHKLMPRSTWXYZ])|(B[ABEHKLMT])|(C[ABEHKLR])|(E[ABEHKLMPRSTWXYZ])|(GY)|(H[ABEHKLMPRSTWXYZ])|(J[ABCEGHJKLMNPRSTWXYZ])|(K[ABEHKLMPRSTWXYZ])|(L[ABEHKLMPRSTWXYZ])|(M[AWX])|(N[ABEHLMPRSWXYZ])|(O[ABEHKLMPRSX])|(P[ABCEGHJLMNPRSTWXY])|(R[ABEHKMPRSTWXYZ])|(S[ABCGHJKLMNPRSTWXYZ])|(T[ABEHKLMPRSTWXYZ])|(W[ABEKLMP])|(Y[ABEHKLMPRSTWXYZ])|(Z[ABEHKLMPRSTWXY]))\d{6}([A-D]|\s)$/i';

        return (preg_match($validation_expression, $value) > 0 ? true : false);
    }

    /**
     * Validate a UK Unique Tax Payer Reference Number
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function utr($attribute,$value,$parameters)
    {
        $validation_expression = '/\d{10}/i';

        return (preg_match($validation_expression, $value) > 0 ? true : false);
    }

}
