<?php
include 'phpMussel.php';
class MaliciousTest extends PHPUnit_Framework_TestCase
	{
	public function testIsMalicious()
		{
        // Arrange
        $a = phpMussel('_testfiles/ascii_standard_testfile.txt');
        // Assert
        $this->assertEquals(2, $a);
		}
	}
?>
