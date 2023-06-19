
<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use BaconQrCode\Decoder\Decoder;
use BaconQrCode\Common\ErrorCorrectionLevel;
use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;


/**
 * Class QRCodeTest
 * Test cases for QRCode generation and data saving
 */
class QRCodeTest extends TestCase
{
  
 
  /**
     * Test case for data saving to JSON file
     *
     * This test saves data to a JSON file and asserts that the file exists and contains the expected JSON data.
     */
    public function testDataSavingToJSONFile()
    {
        $json_file = 'anamnese.json';

        // QR-Code regenerieren
        $name = "John Doe";
        $vorname = "Jane";
        $dat1 = "1990-01-01";
        $straße = "Main Street";
        $hausnummer = "123";
        $postleitzahl = "12345";
        $stadt = "Example City";
        $tel = "1234567890";
        $email = "john.doe@example.com";
        $versicherung = "Example Insurance";
        $beruf = "Developer";
        $größe = "180 cm";
        $gewicht = "75 kg";
        $geschlecht = "Male";
        $krank = "Example Complaint";
        $anfangsdatum = "2023-06-01";
        $stark = "Yes";
        $veränderung = "No";
        $vorschreibung = "Sample Prescription";
        $periode = "Daily";
        $rauchen = "No";
        $alkohol = "Occasionally";
        $drogen = "No";
        $medikamente = "Yes";
        $name_medikament = "Medicine X";
        $stärke = "10 mg";
        $gestalt = "Tablet";
        $morgens = "1";
        $mittags = "1";
        $abends = "1";
        $nachts = "0";
        $einheit = "Pill";
        $hinweis = "Take with food";
        $grund = "Example Reason";
        $operation = "No";
        $aller = "Pollen";
        $bluthochdruck = "No";
        $herzerkrankung = "No";
        $diabetes = "No";
        $schilddrüse = "No";
        $blutfette = "No";
        $lunge = "No";
        $digestion = "No";
        $nervensystem = "No";
        $krebs = "No";
        $schlaganfall = "No";
        $herzinfarkt = "No";
        $rheumatische = "No";
        $chronische = "No";
        $infektion = "No";
        $bluthochdruck1 = "No";
        $koronare = "No";
        $diabetes1 = "No";
        $blutfette1 = "No";
        $nervensystem1 = "No";
        $krebs1 = "No";
        $schlaganfall1 = "No";
        $herzinfarkt1 = "No";

        $texte_d_entree = "Name: " . $name . "\nVorname : " . $vorname . "\nGebursdatum : " . $dat1 . "\nstraße : " . $straße . "\nhausnummer : " . $hausnummer . "\npostleitzahl : " . $postleitzahl . "\nstadt : " . $stadt . "\ntel : " . $tel . "\nemail : " . $email . "\nversicherung : " . $versicherung . "\nberuf : " . $beruf . "\ngröße : " . $größe . "\ngewicht : " . $gewicht . "\ngeschlecht : " . $geschlecht . "\nbeschwerde : " . $krank . "\nanfangsdatum : " . $anfangsdatum . "\nstark : " . $stark . "\nveränderung : " . $veränderung . "\nvorschreibung : " . $vorschreibung . "\nperiode : " . $periode . "\nrauchen : " . $rauchen . "\nalkohol : " . $alkohol . "\ndrogen : " . $drogen . "\nmedikamente : " . $medikamente . "\nname_medikament : " . $name_medikament . "\nstärke : " . $stärke . "\ngestalt : " . $gestalt . "\nmorgens : " . $morgens . "\nmittags : " . $mittags . "\nabends : " . $abends . "\nnachts : " . $nachts . "\neinheit : " . $einheit . "\nhinweis : " . $hinweis . "\ngrund : " . $grund . "\noperation : " . $operation . "\nallergien : " . $aller . "\nbluthochdruck : " . $bluthochdruck . "\herzerkrankung : " . $herzerkrankung . "\ndiabetes : " . $diabetes . "\nschilddrüse : " . $schilddrüse . "\nblutfette : " . $blutfette . "\nlunge : " . $lunge . "\ndigestion : " . $digestion . "\nnervensystem : " . $nervensystem . "\nkrebs : " . $krebs . "\nschlaganfall : " . $schlaganfall . "\nherzinfarkt : " . $herzinfarkt . "\nrheumatische : " . $rheumatische . "\nchronische : " . $chronische . "\ninfektion : " . $infektion . "\nbluthochdruck1 : " . $bluthochdruck1 . "\nkoronare : " . $koronare . "\ndiabetes1 : " . $diabetes1 . "\nblutfette1 : " . $blutfette1 . "\nnervensystem1 : " . $nervensystem1 . "\nkrebs1 : " . $krebs1 . "\nschlaganfall1 : " . $schlaganfall1 . "\nherzinfarkt1 : " . $herzinfarkt1;

        echo $texte_d_entree;

        // Run the code to save the data to the JSON file
        $json_data = json_encode($texte_d_entree, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($json_file, $json_data);

        $this->assertFileExists($json_file);
        $this->assertJsonStringEqualsJsonFile($json_file, $json_data);
    }

}


?>