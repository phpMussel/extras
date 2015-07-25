<?php
include 'phpMussel.php';
class MaliciousTest extends PHPUnit_Framework_TestCase {
	
	public function testAsciiStandard() {
		$a = phpMussel('_testfiles/ascii_standard_testfile.txt');
		$this->assertEquals(2, $a);
	}
	
	public function testCoex() {
		$a = phpMussel('_testfiles/coex_testfile.rtf');
		$this->assertEquals(2, $a);
	}
	
	public function testExeStandard() {
		$a = phpMussel('_testfiles/exe_standard_testfile.exe');
		$this->assertEquals(2, $a);
	}
	
	public function testGeneralStandard() {
		$a = phpMussel('_testfiles/general_standard_testfile.txt');
		$this->assertEquals(2, $a);
	}
	
	public function testGraphicsStandard() {
		$a = phpMussel('_testfiles/graphics_standard_testfile.gif');
		$this->assertEquals(2, $a);
	}
	
	public function testHtmlStandard() {
		$a = phpMussel('_testfiles/html_standard_testfile.html');
		$this->assertEquals(2, $a);
	}
	
	public function testMd5() {
		$a = phpMussel('_testfiles/md5_testfile.txt');
		$this->assertEquals(2, $a);
	}
	
	public function testMetadataTar() {
		$a = phpMussel('_testfiles/metadata_testfile.tar');
		$this->assertEquals(2, $a);
	}
	
	public function testMetadataTxtGz() {
		$a = phpMussel('_testfiles/metadata_testfile.txt.gz');
		$this->assertEquals(2, $a);
	}
	
	public function testMetadataZip() {
		$a = phpMussel('_testfiles/metadata_testfile.zip');
		$this->assertEquals(2, $a);
	}
	
	public function testOle() {
		$a = phpMussel('_testfiles/ole_testfile.ole');
		$this->assertEquals(2, $a);
	}
	
	public function testPdfStandard() {
		$a = phpMussel('_testfiles/pdf_standard_testfile.pdf');
		$this->assertEquals(2, $a);
	}
	
	public function testPeSectional() {
		$a = phpMussel('_testfiles/pe_sectional_testfile.exe');
		$this->assertEquals(2, $a);
	}
	
	public function testSwfStandard() {
		$a = phpMussel('_testfiles/swf_standard_testfile.swf');
		$this->assertEquals(2, $a);
	}
	
	public function testXdpStandard() {
		$a = phpMussel('_testfiles/xdp_standard_testfile.xdp');
		$this->assertEquals(2, $a);
	}
}
?>
