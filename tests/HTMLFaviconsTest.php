<?php

use PHPUnit\Framework\TestCase;
use WaughJ\HTMLFavicons\HTMLFavicons;

class HTMLFaviconsTest extends TestCase
{
	public function testObjectWorks()
	{
		$object = new HTMLFavicons();
		$this->assertTrue( is_object( $object ) );
	}
}
