<?php

use PHPUnit\Framework\TestCase;
require 'vendor/autoload.php';


class PinLoginTest extends TestCase
{
    public function testPinLogin()
    {
        // Create a mock PDO instance
        $pdoMock = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->getMock();
        $pdoStatementMock = $this->getMockBuilder(PDOStatement::class)
            ->getMock();

        $pdoMock->expects($this->any())
            ->method('query')
            ->willReturn($pdoStatementMock);
        $pdoStatementMock->expects($this->any())
            ->method('rowCount')
            ->willReturn(0);

        // Set the mock PDO instance as the global PDO object
        global $pdo;
        $pdo = $pdoMock;

        // Prepare the test data
        $_POST['pin'] = '12345';
        $_POST['submit'] = true;

        // Capture the output of the PHP file
        ob_start();
        include '../pin.php';
        $output = ob_get_clean();

        // Perform assertions
        $this->assertStringContainsString('', $output);
        $this->assertStringNotContainsString('falsche pin', $output);
        $this->assertStringContainsString('', $output);
        $this->assertStringNotContainsString('<form method="POST">', $output);
        $this->assertStringNotContainsString('<label for="access-pin">Geben Sie Ihren Pin ein :</label>', $output);
        $this->assertStringNotContainsString('<input type="password" id="access-pin" maxlength="5" name="pin">', $output);
        $this->assertStringNotContainsString('<button type="submit" id="access-button" name="submit">Weiter</button>', $output);
        $this->assertStringNotContainsString('<p><a href="pin_erstellen.php">Pin erstellen</a></p>', $output);

        $this->assertStringNotContainsString('falsche pin', $output);
        $this->assertStringNotContainsString('Sie haben noch kein PIN erstellt', $output);
        $this->assertStringNotContainsString('<p  style=\'background:#DF6762;color:#160101;text-align:center;\'>', $output);
        $this->assertStringNotContainsString('<p  style=\'background:#55E723;color:#021E01;text-align:center;\'>', $output);

       
    }
}
?>