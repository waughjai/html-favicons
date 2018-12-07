<?php

use PHPUnit\Framework\TestCase;
use WaughJ\HTMLFavicons\HTMLFavicons;
use WaughJ\FileLoader\FileLoader;
use WaughJ\Directory\Directory;

class HTMLFaviconsTest extends TestCase
{
	public function testBasic()
	{
		$favicons = new HTMLFavicons( "Favicon World" );
		$this->assertContains( '<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">', $favicons->getHTML() );
		$this->assertContains( '<meta name="application-name" content="Favicon World">', $favicons->getHTML() );
	}

	public function testWithLoader()
	{
		$favicons = new HTMLFavicons( "Favicon World", new FileLoader([ 'directory-url' => 'https://www.example.com/favicons', 'directory-server' => new Directory([ getcwd(), 'tests', 'favicons' ]) ]) );
		$this->assertContains( '<link rel="apple-touch-icon" sizes="180x180" href="https://www.example.com/favicons/apple-touch-icon.png?m=', $favicons->getHTML() );
		$this->assertContains( '<meta name="msapplication-config" content="https://www.example.com/favicons/browserconfig.xml?m=', $favicons->getHTML() );
	}
}
