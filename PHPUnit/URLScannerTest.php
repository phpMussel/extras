<?php
include 'phpMussel.php';
class URLScannerTest extends PHPUnit_Framework_TestCase {
	
	/*public function testURLScanner_base64() {
		$a = phpMussel('urlscanner_tests/base64.txt');
		$this->assertEquals(2, $a);
	}*/

	/*public function testURLScanner_base64_2() {
		$a = phpMussel('urlscanner_tests/base64_2.txt');
		$this->assertEquals(2, $a);
	}*/
	
	/*public function testURLScanner_hex() {
		$a = phpMussel('urlscanner_tests/hex.txt');
		$this->assertEquals(2, $a);
	}*/
	
	/*public function testURLScanner_hex_lit() {
		$a = phpMussel('urlscanner_tests/hex_lit.txt');
		$this->assertEquals(2, $a);
	}*/
	
	/*public function testURLScanner_hex_lit_2() {
		$a = phpMussel('urlscanner_tests/hex_lit_2.txt');
		$this->assertEquals(2, $a);
	}*/

	public function testURLScanner_html_escape() {
		$a = phpMussel('urlscanner_tests/html_escape.txt', false,true);
		$this->assertEquals(2, $a);
	}
	
	public function testURLScanner_javascript_escape() {
		$a = phpMussel('urlscanner_tests/javascript_escape.txt');
		var_dump($a);
		$this->assertEquals(2, $a);
	}
	
	public function testURLScanner_linebreaks() {
		$a = phpMussel('urlscanner_tests/linebreaks.txt');
		$this->assertEquals(2, $a);
	}
	
	public function testURLScanner_normal() {
		$a = phpMussel('urlscanner_tests/normal.txt');
		$this->assertEquals(2, $a);
	}
	
	public function testURLScanner_protocol_less() {
		$a = phpMussel('urlscanner_tests/protocol_less.txt');
		$this->assertEquals(2, $a);
	}
	
	public function testURLScanner_single_quotes() {
		$a = phpMussel('urlscanner_tests/single_quotes.txt');
		$this->assertEquals(2, $a);
	}
	
	public function testURLScanner_sql_escape() {
		$a = phpMussel('urlscanner_tests/sql_escape.txt');
		$this->assertEquals(2, $a);
	}
	
	public function testURLScanner_unicode() {
		$a = phpMussel('urlscanner_tests/unicode.txt');
		$this->assertEquals(2, $a);
	}
	
	public function testURLScanner_urlencoded() {
		$a = phpMussel('urlscanner_tests/urlencoded.txt');
		$this->assertEquals(2, $a);
	}
	
	public function testURLScanner1_urlencoded_2() {
		$a = phpMussel('urlscanner_tests/urlencoded_2.txt');
		$this->assertEquals(2, $a);
	}
	

}
?>
