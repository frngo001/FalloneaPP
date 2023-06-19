<?php

use PHPUnit\Framework\TestCase;
require 'vendor/autoload.php';

class deleteTest extends TestCase
{
    private $pdo;

    /**
     * Set up the test environment.
     */
    protected function setUp(): void
    {
        // Create an in-memory SQLite database connection
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->createTable();
    }

    /**
     * Tear down the test environment.
     */
    protected function tearDown(): void
    {
        // Drop the table after each test
        $this->dropTable();
    }

    /**
     * Create the fiche table.
     */
    private function createTable()
    {
        $table = "CREATE TABLE IF NOT EXISTS fiche (
            id INTEGER PRIMARY KEY,
            name TEXT,
            age INTEGER,
            gender TEXT
        )";
        $this->pdo->exec($table);
    }

    /**
     * Drop the fiche table.
     */
    private function dropTable()
    {
        $this->pdo->exec("DROP TABLE IF EXISTS fiche");
    }

    /**
     * Test deleting a record from the fiche table.
     */
    private function addFormData($formData)
{
    // Replace the actual code snippet with your implementation to add the form data
    // You can use the provided $formData array to perform the insert
    // In this case, you would replace the code with your database insert logic using the $pdo object

    // For example, assuming $pdo is your PDO object:
    $insertQuery = "INSERT INTO fiche (name) VALUES (:name)";
    $insertStatement = $this->pdo->prepare($insertQuery);
    $insertStatement->bindValue(':name', $formData['name']);
    $insertStatement->execute();
}

    public function testDeleteRecordFromFicheTable()
    {
        try {
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

            $this->addFormData($updatedFormData);

            // Create a DELETE query to delete the record
            $deleteQuery = "DELETE FROM fiche WHERE name='Jane Smith'";
            $deleteResult = $this->pdo->exec($deleteQuery);
        
            if ($deleteResult === false) {
                echo "Delete failed: ";
                var_dump($this->pdo->errorInfo());
                exit;
            }
        
            // Include the PHP code file
            require './delete.php';
        
            // Assert that the record is deleted from the fiche table
            $selectQuery = "SELECT * FROM fiche WHERE name='Jane Smith'";
            $statement = $this->pdo->query($selectQuery);
            $record = $statement->fetch(PDO::FETCH_ASSOC);
            $this->assertFalse($record, 'Record was not deleted from the fiche table.');
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }
    
}


?>