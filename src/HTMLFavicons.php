<?php

declare( strict_types = 1 );
namespace WaughJ\HTMLFavicons
{
	use WaughJ\FileLoader\FileLoader;

	class HTMLFavicons
	{
		public function __construct( string $website_name, FileLoader $loader = null )
		{
			$this->website_name = $website_name;
			$this->loader = ( $loader === null ) ? new FileLoader() : $loader;
		}

		public function __toString()
		{
			return $this->getHTML();
		}

		public function getHTML() : string
		{
			return
			"
				<link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"{$this->loader->getSourceWithVersion( 'apple-touch-icon.png' )}\">
				<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"{$this->loader->getSourceWithVersion( 'favicon-32x32.png' )}\">
				<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"{$this->loader->getSourceWithVersion( 'favicon-16x16.png' )}\">
				<link rel=\"manifest\" href=\"{$this->loader->getSourceWithVersion( 'manifest.json' )}\">
				<link rel=\"mask-icon\" href=\"{$this->loader->getSourceWithVersion( 'safari-pinned-tab.svg' )}\" color=\"#5bbad5\">
				<link rel=\"shortcut icon\" href=\"{$this->loader->getSourceWithVersion( 'favicon.ico' )}\">
				<meta name=\"apple-mobile-web-app-title\" content=\"{$this->website_name}\">
				<meta name=\"application-name\" content=\"{$this->website_name}\">
				<meta name=\"msapplication-config\" content=\"{$this->loader->getSourceWithVersion( 'browserconfig.xml' )}\">
				<meta name=\"theme-color\" content=\"#ffffff\">
			";
		}

		private $website_name;
		private $loader;
	}
}
