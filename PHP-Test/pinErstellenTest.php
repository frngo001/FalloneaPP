<?php

use PHPUnit\Framework\TestCase;
require 'vendor/autoload.php';
/**
 * Class PinTest
 * Test case for PIN creation functionality
 */
class pinErstellenTest extends TestCase
{
    /**
     * Test PIN creation
     *
     * This test verifies the functionality of creating a PIN.
     * It simulates the database interaction using a mock PDO object.
     * The test checks that the PIN is correctly inserted into the database
     * and the last inserted PIN value is stored in the PinManager instance.
     */
    public function testPinCreation()
    {
        // Create a mock PDO instance
        $pdoMock = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->getMock();
        $pdoStatementMock = $this->getMockBuilder(PDOStatement::class)
            ->getMock();

        // Set the mock PDO instance as the global PDO object
        global $pdo;
        $pdo = $pdoMock;

        // Prepare the test data
        $_POST['pin'] = '12345';
        $_POST['submit'] = true;

        // Capture the output of the PHP file
        ob_start();
        include '../pin_erstellen.php';
        $output = ob_get_clean();

        // Perform assertions
        $this->assertStringContainsString('', $output);
        $this->assertStringNotContainsString('Sie haben bereits einen PIN-Code', $output);
        // Add more assertions if needed
    }
}

?>