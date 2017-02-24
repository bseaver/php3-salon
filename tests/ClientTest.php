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
    protected function tearDown()
    {
        Stylist::deleteAll();
        Client::deleteAll();
    }

    function test_Client_get_set_construct()
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

    function test_Client_getAll_stylist_id_deleteAll()
    {
        // Arrange
        $stylist1 = new Stylist('James', '555-1212');
        $stylist2 = new Stylist('Alison', '555-1212');
        $stylist1->save();
        $stylist2->save();

        $client1 = new Client('Tony','444-1111', $stylist1->getId());
        $client2 = new Client('Mike','555-1111', $stylist2->getId());

        // Act
        $client1->save();
        $client2->save();
        $all_clients = Client::getAll();

        // Assert
        $this->assertEquals([$client2, $client1], $all_clients);
    }



}
?>
