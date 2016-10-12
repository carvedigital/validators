<?php
namespace Carve\Validators;

class PhoneTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider provider_testPhoneNumberValid
	 */
	public function testPhoneNumberValid($number)
	{
		$obj = new Phone();
		$result = $obj->phoneNumber(null, $number, null);
		$this->assertTrue($result);
	}
    public function provider_testPhoneNumberValid()
    {
        return array_merge(
            $this->validMobiles(),
            $this->validLandlines(),
            $this->valid03ngns(),
            $this->valid084and087(),
            $this->valid09Premium(),
            $this->validFree()
        );
    }

	/**
	 * @dataProvider provider_testMobileNumberValid
	 */
	public function testMobileNumberValid($number)
	{
		$obj = new Phone();
		$result = $obj->mobileNumber(null, $number, null);
		$this->assertTrue($result);
	}
    public function provider_testMobileNumberValid()
    {
        return $this->validMobiles();
    }

	/**
	 * @dataProvider provider_testLandlineNumberValid
	 */
	public function testLandlineNumberValid($number)
	{
		$obj = new Phone();
		$result = $obj->landlineNumber(null, $number, null);
		$this->assertTrue($result);
	}
    public function provider_testLandlineNumberValid()
    {
        return $this->validLandlines();
    }

	/**
	 * @dataProvider provider_testFreeNumberValid
	 */
	public function testFreeNumberValid($number)
	{
		$obj = new Phone();
		$result = $obj->freeNumber(null, $number, null);
		$this->assertTrue($result);
	}
    public function provider_testFreeNumberValid()
    {
        return $this->validFree();
    }

	/**
	 * @dataProvider provider_testBusinessNumberValid
	 */
	public function testBusinessNumberValid($number)
	{
		$obj = new Phone();
		$result = $obj->businessNumber(null, $number, null);
		$this->assertTrue($result);
	}
    public function provider_testBusinessNumberValid()
    {
        return array_merge(
            $this->validMobiles(),
            $this->validLandlines(),
            $this->valid03ngns(),
            $this->valid084and087(),
            $this->validFree()
        );
    }

	/**
	 * @dataProvider provider_testPremiumNumberValid
	 */
	public function testPremiumNumberValid($number)
	{
		$obj = new Phone();
		$result = $obj->premiumNumber(null, $number, null);
		$this->assertTrue($result);
	}
    public function provider_testPremiumNumberValid()
    {
        return array_merge(
            $this->valid084and087(),
            $this->valid09Premium()
        );
    }

    //---------------------------------------

	/**
	 * @dataProvider provider_testPhoneNumberInvalid
	 */
	public function testPhoneNumberInvalid($number)
	{
		$obj = new Phone();
		$result = $obj->phoneNumber(null, $number, null);
		$this->assertFalse($result);
	}
    public function provider_testPhoneNumberInvalid()
    {
        return array_merge(
            $this->invalidMobiles(),
            $this->invalidLandlines(),
            $this->invalid03ngns(),
            $this->invalid084and087(),
            $this->invalidFree(),
            $this->invalid09Premium(),
            $this->invalidNumber()
        );
    }

	/**
	 * @dataProvider provider_testMobileNumberInvalid
	 */
	public function testMobileNumberInvalid($number)
	{
		$obj = new Phone();
		$result = $obj->mobileNumber(null, $number, null);
		$this->assertFalse($result);
	}
    public function provider_testMobileNumberInvalid()
    {
        return array_merge(
            $this->invalidMobiles(),
            $this->validLandlines(),
            $this->valid03ngns(),
            $this->valid084and087(),
            $this->validFree(),
            $this->valid09Premium(),
            $this->invalidNumber()
        );
    }

	/**
	 * @dataProvider provider_testLandlineNumberInvalid
	 */
	public function testLandlineNumberInvalid($number)
	{
		$obj = new Phone();
		$result = $obj->landlineNumber(null, $number, null);
		$this->assertFalse($result);
	}
    public function provider_testLandlineNumberInvalid()
    {
        return array_merge(
            $this->validMobiles(),
            $this->invalidLandlines(),
            $this->valid03ngns(),
            $this->valid084and087(),
            $this->validFree(),
            $this->valid09Premium(),
            $this->invalidNumber()
        );
    }

	/**
	 * @dataProvider provider_testFreeNumberInvalid
	 */
	public function testFreeNumberInvalid($number)
	{
		$obj = new Phone();
		$result = $obj->freeNumber(null, $number, null);
		$this->assertFalse($result);
	}
    public function provider_testFreeNumberInvalid()
    {
        return array_merge(
            $this->validMobiles(),
            $this->validLandlines(),
            $this->valid03ngns(),
            $this->valid084and087(),
            $this->invalidFree(),
            $this->valid09Premium(),
            $this->invalidNumber()
        );
    }

	/**
	 * @dataProvider provider_testBusinessNumberInvalid
	 */
	public function testBusinessNumberInvalid($number)
	{
		$obj = new Phone();
		$result = $obj->businessNumber(null, $number, null);
		$this->assertFalse($result);
	}
    public function provider_testBusinessNumberInvalid()
    {
        return array_merge(
            $this->invalidMobiles(),
            $this->invalidLandlines(),
            $this->invalid03ngns(),
            $this->invalid084and087(),
            $this->invalidFree(),
            $this->valid09Premium(),
            $this->invalidNumber()
        );
    }

	/**
	 * @dataProvider provider_testPremiumNumberInvalid
	 */
	public function testPremiumNumberInvalid($number)
	{
		$obj = new Phone();
		$result = $obj->premiumNumber(null, $number, null);
		$this->assertFalse($result);
	}
    public function provider_testPremiumNumberInvalid()
    {
        return array_merge(
            $this->validMobiles(),
            $this->validLandlines(),
            $this->valid03ngns(),
            $this->invalid084and087(),
            $this->validFree(),
            $this->invalid09Premium(),
            $this->invalidNumber()
        );
    }

    //---------------------------------------

	private function validMobiles()
	{
		return [
			['07956 123456'],
			['07956 123 456'],
			['07956123456'],
			['+447956123456'],
			['00447956123456'],
		];
	}

	private function validLandlines()
	{
		return [
			['01234567890'],
			['01234 567890'],
			['0123456789'],
			['+441234567890'],
			['00441234567890'],
			['02084567890'],
			['0208 456 7890'],
		];
	}

	private function valid03ngns()
	{
		return [
			['03234567890'],
			['+443234567890'],
			['00443234567890'],
		];
	}

	private function validFree()
	{
		return [
			['08004567890'],
			['0800456789'],
			['08084567890'],
			['05004567890'],
		];
	}

	private function valid084and087()
	{
		return [
			['08454567890'],
			['08704567890'],
			['0845456789'],
			['0870456789'],
		];
	}

	private function valid09Premium()
	{
		return [
			['09234567890'],
		];
	}

    //---------

	private function invalidMobiles()
	{
		return [
			['079561234567'],   // too long
			['0795612345'],     // too short
		];
	}

	private function invalidLandlines()
	{
		return [
			['012345678901'],   //too long
			['022345678'],      //too short
		];
	}

	private function invalid03ngns()
	{
		return [
			['032345678901'],   //too long
			['0323456789'],     //too short
		];
	}

	private function invalidFree()
	{
		return [
			['080045678901'],   //too long
			['080045678'],      //too short
			['050045678901'],   //too long
			['050045678'],      //too short
		];
	}

	private function invalid084and087()
	{
		return [
			['084545678901'],   //too long
			['087045678901'],   //too long
			['084545678'],      //too short
			['087045678'],      //too short
		];
	}

	private function invalid09Premium()
	{
		return [
			['092345678901'],   //too long
			['092345678'],      //too short
		];
	}

    //these numbers aren't valid for any type.
	private function invalidNumber()
	{
		return [
			['0923d567890'],    //contains a letter
			['01234567*90'],    //contains a symbol
			['00123456790'],    //second digit zero
			['0045123456790'],  //international, but not UK
			['+45123456790'],   //international, but not UK
		];
	}

}
