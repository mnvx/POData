<?php


namespace UnitTests\POData\Providers\Metadata\Type;

use POData\Providers\Metadata\Type\Binary;
use POData\Providers\Metadata\Type\Boolean;
use POData\Providers\Metadata\Type\Byte;
use POData\Providers\Metadata\Type\Char;
use POData\Providers\Metadata\Type\DateTime;
use POData\Providers\Metadata\Type\Decimal;
use POData\Providers\Metadata\Type\Double;
use POData\Providers\Metadata\Type\Guid;
use POData\Providers\Metadata\Type\Int16;
use POData\Providers\Metadata\Type\Int32;
use POData\Providers\Metadata\Type\Int64;
use POData\Providers\Metadata\Type\IType;
use POData\Providers\Metadata\Type\Navigation;
use POData\Providers\Metadata\Type\Null1;
use POData\Providers\Metadata\Type\SByte;
use POData\Providers\Metadata\Type\Single;
use POData\Providers\Metadata\Type\StringType;
use POData\Providers\Metadata\Type\TypeCode;
use POData\Providers\Metadata\Type\VoidType;

class BooleanTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @return IType
	 */
	public function getAsIType()
	{
		return new Boolean();
	}

	public function testConstructorAndDefaultValues()
	{
		$type = $this->getAsIType();

		$actual = get_object_vars($type);

		$expected = array(

		);

		$this->assertEquals($expected, $actual);

	}


	public function testGetFullTypeName()
	{
		$type = $this->getAsIType();

		$actual = $type->getFullTypeName();

		$this->assertEquals("Edm.Boolean", $actual);

	}

	public function testGetTypeCode()
	{
		$type = $this->getAsIType();

		$actual = $type->getTypeCode();

		$this->assertEquals(TypeCode::BOOLEAN, $actual);

	}

	public function testCompatibleWith()
	{
		$type = $this->getAsIType();

		$this->assertFalse( $type->isCompatibleWith(new Binary()) );
		$this->assertTrue( $type->isCompatibleWith(new Boolean()) );
		$this->assertFalse( $type->isCompatibleWith(new Byte()) );
		$this->assertFalse( $type->isCompatibleWith(new Char()) );
		$this->assertFalse( $type->isCompatibleWith(new DateTime()) );
		$this->assertFalse( $type->isCompatibleWith(new Decimal()) );
		$this->assertFalse( $type->isCompatibleWith(new Double()) );
		$this->assertFalse( $type->isCompatibleWith(new Guid()) );
		$this->assertFalse( $type->isCompatibleWith(new Int16()) );
		$this->assertFalse( $type->isCompatibleWith(new Int32()) );
		$this->assertFalse( $type->isCompatibleWith(new Int64()) );
		$this->assertFalse( $type->isCompatibleWith(new Null1()) );
		$this->assertFalse( $type->isCompatibleWith(new SByte()) );
		$this->assertFalse( $type->isCompatibleWith(new Single()) );
		$this->assertFalse( $type->isCompatibleWith(new StringType()) );
		$this->assertFalse( $type->isCompatibleWith(new VoidType()) );



	}

	public function testValidateSuccess()
	{
		$type = $this->getAsIType();

		$in = "true";
		$out = null;
		$this->assertTrue($type->validate($in, $out));

		$this->assertSame("true", $out);


		$in = "false";
		$out = null;
		$this->assertTrue($type->validate($in, $out));

		$this->assertSame("false", $out);
	}


	public function testValidateFailure()
	{

		$type = $this->getAsIType();

		$in = "True";
		$out = null;
		$this->assertFalse($type->validate($in, $out));


		$in = "falsE";
		$out = null;
		$this->assertFalse($type->validate($in, $out));

		$in = "";
		$out = null;
		$this->assertFalse($type->validate($in, $out));


		$in = "afeaf";
		$out = null;
		$this->assertFalse($type->validate($in, $out));
	}


	public function testConvert()
	{

		$type = $this->getAsIType();

		$value = "afaefasevaswee";
		$actual = $type->convert($value);

		$expected = false;
		$this->assertSame($expected, $actual);


		$value = "True";
		$actual = $type->convert($value);

		$expected = false;
		$this->assertSame($expected, $actual);

		$value = "true";
		$actual = $type->convert($value);

		$expected = true;
		$this->assertSame($expected, $actual);
	}

	public function testConvertToOData()
	{

		$type = $this->getAsIType();

		$value = true;
		$actual = $type->convertToOData($value);

		$expected = "true";
		$this->assertSame($expected, $actual);


		$value = false;
		$actual = $type->convertToOData($value);

		$expected = "false";
		$this->assertSame($expected, $actual);
	}



	/**************
	 *
	 *  Begin Type Specific Tests
	 *
	 */
}