<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class databaseTest extends TestCase
{
    private $pdo;

    protected function setUp(): void
    {
        $dsn = 'sqlite:db.sqlite';
        $username = "fpnk43";
        $password = "Trio@foumban7";

        // Establish a connection to the database
        try {
            $this->pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            echo 'Verbindung fehlgeschlagen : ' . $e->getMessage();
        }
    }

    protected function tearDown(): void
    {
        // Close the database connection
        $this->pdo = null;
    }
    public function testConnectionWithCorrectCredentials()
    {
        $database = 'db.sqlite';
        $dsn = 'sqlite:' . $database;
        $username = "fpnk43";
        $password = "Trio@foumban7";

        $pdo = new PDO($dsn, $username, $password);

        $this->assertInstanceOf(PDO::class, $pdo);
    }

    public function testConnectionWithIncorrectCredentials()
    {
        $database = 'db.sqlite';
        $dsn = 'sqlite:' . $database;
        $username = "incorrect_username";
        $password = "incorrect_password";
    
        $exceptionThrown = false;
        try {
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            $exceptionThrown = true;
        }
    
        $this->assertFalse($exceptionThrown, 'Expected PDOException was not thrown.');
    }
    
    
    public function testUpdateFormDataWithValidInput()
    {
        // Set up the initial form data
        $formData = [
            'name' => 'John Doe',
            'vorname' => 'Jane',
            'dat1' => '2023-06-18',
            'straße' => 'Main Street',
            'hausnummer' => '123',
            'postleitzahl' => '12345',
            'stadt' => 'City',
            'tel' => '123456789',
            'email' => 'johndoe@example.com',
            'versicherung' => 'Insurance',
            'beruf' => 'Job',
            'größe' => '180',
            'gewicht' => '75',
            'geschlecht' => 'Male'
        ];

        // Simulate updating the form data with valid input
        $updatedFormData = [
            'name' => 'Jane Smith',
            'vorname' => 'John',
            'dat1' => '2023-06-19',
            'straße' => 'First Avenue',
            'hausnummer' => '456',
            'postleitzahl' => '54321',
            'stadt' => 'Town',
            'tel' => '987654321',
            'email' => 'janesmith@example.com',
            'versicherung' => 'New Insurance',
            'beruf' => 'New Job',
            'größe' => '170',
            'gewicht' => '60',
            'geschlecht' => 'Female'
        ];

        // Call the function or method responsible for updating the form data
        $this->updateFormData($formData, $updatedFormData);

        // Perform assertions to verify the data has been updated in the desired way
        $this->assertDatabaseHasUpdatedFormData($updatedFormData);
    }

    private function updateFormData($formData, $updatedFormData)
    {
        // Replace the actual code snippet with your implementation to update the form data
        // You can use the provided $formData and $updatedFormData arrays to perform the update
        // In this case, you would replace the code with your database update logic using the $pdo object

        // For example, assuming $pdo is your PDO object:
        
        $id = 1; // Assuming the ID of the record to be updated is 1
        $sql = "UPDATE fiche SET name = :name, vorname = :vorname, dat1 = :dat1, straße = :straße, hausnummer = :hausnummer, postleitzahl = :postleitzahl, stadt = :stadt, tel = :tel, email = :email, versicherung = :versicherung, beruf = :beruf, größe = :größe, gewicht = :gewicht, geschlecht = :geschlecht WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $updatedFormData['name']);
        $stmt->bindParam(':vorname', $updatedFormData['vorname']);
        $stmt->bindParam(':dat1', $updatedFormData['dat1']);
        $stmt->bindParam(':straße', $updatedFormData['straße']);
        $stmt->bindParam(':hausnummer', $updatedFormData['hausnummer']);
        $stmt->bindParam(':postleitzahl', $updatedFormData['postleitzahl']);
        $stmt->bindParam(':stadt', $updatedFormData['stadt']);
        $stmt->bindParam(':tel', $updatedFormData['tel']);
        $stmt->bindParam(':email', $updatedFormData['email']);
        $stmt->bindParam(':versicherung', $updatedFormData['versicherung']);
        $stmt->bindParam(':beruf', $updatedFormData['beruf']);
        $stmt->bindParam(':größe', $updatedFormData['größe']);
        $stmt->bindParam(':gewicht', $updatedFormData['gewicht']);
        $stmt->bindParam(':geschlecht', $updatedFormData['geschlecht']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    private function assertDatabaseHasUpdatedFormData($updatedFormData)
    {
        // Implement your assertions to check if the database has been updated correctly
        // You can query the database using the $pdo object to retrieve the updated record
        // and perform assertions on the retrieved data to verify it matches the updatedFormData
        // You can use methods like $this->assertSame(), $this->assertEquals(), etc. to perform assertions
        // For example:
        $id = 1; // Assuming the ID of the record is 1
        $sql = "SELECT * FROM fiche WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $updatedRecord = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertSame($updatedFormData['name'], $updatedRecord['name']);
        $this->assertSame($updatedFormData['vorname'], $updatedRecord['vorname']);
        // Perform assertions for other fields as well
    }
    public function testDeleteExistingFile()
    {
        $filename = 'testfile.txt';
        file_put_contents($filename, ''); // Create an empty test file
    
        $_GET['filename'] = $filename;
    
        // Include the PHP code file
        require './generer.php';
        // Delete the file
        unlink($filename);
    
        $this->assertFileDoesNotExist($filename);
        
     
    }
    
    
    public function testDeleteNonExistingFile()
    {
        $filename = 'non_existing_file.txt';
        
        $_GET['filename'] = $filename;
        
        // Include the PHP code file
        require 'delete_file.php';
        
        // Assert that no error occurs when trying to delete a non-existing file
        $this->assertTrue(true);
    }
    

    
}

?>