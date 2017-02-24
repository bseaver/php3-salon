<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Stylist.php";
require_once "src/Client.php";

$server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);


class ClientTest extends PHPUnit_Framework_TestCase
{
    // protected function tearDown()
    // {
    //     Stylist::deleteAll();
    //     Client::deleteAll();
    // }

    function test_Stylist_get_set_construct()
    {
        // Arrange
        $stylist1 = new Client('James', '555-1212', 1);

        // Act
        $stylist2 = new Client();
        $stylist2->setName($stylist1->getName());
        $stylist2->setContactInfo($stylist1->getContactInfo());
        $stylist2->setStylistId($stylist1->getStylistId());

        // Assert
        $this->assertEquals(
            'James-555-1212-1',
            $stylist2->getName() . '-' . $stylist2->getContactInfo() . '-' . $stylist2->getStylistId()
        );
    }


}
?>
