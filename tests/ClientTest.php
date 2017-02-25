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

    function test_Client_getAll_stylist_id()
    {
        // Arrange
        $stylist1 = new Stylist('James', '555-1212');
        $stylist2 = new Stylist('Alison', '555-1212');
        $stylist1->save();
        $stylist2->save();

        $client1 = new Client('Tony','444-1111', $stylist1->getId());
        $client2 = new Client('Mike','555-1111', $stylist2->getId());
        $client3 = new Client('Francy','555-2222', $stylist1->getId());

        // Act
        $client1->save();
        $client2->save();
        $client3->save();

        $all_clients = Client::getAll($stylist1->getId());

        // Assert
        $this->assertEquals([$client3, $client1], $all_clients);
    }

    function test_Client_deleteAllByStylist()
    {
        // Arrange
        $stylist1 = new Stylist('James', '555-1212');
        $stylist2 = new Stylist('Alison', '555-1212');
        $stylist1->save();
        $stylist2->save();

        $client1 = new Client('Tony','444-1111', $stylist1->getId());
        $client2 = new Client('Mike','555-1111', $stylist2->getId());
        $client3 = new Client('Francy','555-2222', $stylist1->getId());

        // Act
        $client1->save();
        $client2->save();
        $client3->save();
        Client::deleteAllByStylist($stylist1->getId());

        $all_clients = Client::getAll();

        // Assert
        $this->assertEquals([$client2], $all_clients);
    }

    function test_Client_findById()
    {
        // Arrange
        $stylist1 = new Stylist('James', '555-1212');
        $stylist2 = new Stylist('Alison', '555-1212');
        $stylist1->save();
        $stylist2->save();

        $client1 = new Client('Tony','444-1111', $stylist1->getId());
        $client2 = new Client('Mike','555-1111', $stylist2->getId());
        $client3 = new Client('Francy','555-2222', $stylist1->getId());

        $client1->save();
        $client2->save();
        $client3->save();

        // Act
        $found_client = Client::findById($client2->getId());

        // Assert
        $this->assertEquals($client2, $found_client);
    }

    function test_Client_update()
    {
        // Arrange
        $stylist1 = new Stylist('James', '555-1212');
        $stylist1->save();
        $stylist2 = new Stylist('Tony', '555-0000');
        $stylist2->save();
        $client1 = new Client('Jen', '555-3333', $stylist1->getId());
        $client1->save();

        // Act
        $new_stylist_id = $stylist2->getId();
        $client1->update('Jennifer', '503-555-3333', $new_stylist_id);
        $found_client = Client::findById($client1->getId());

        // Assert
        $this->assertEquals(
            'Jennifer-503-555-3333-' . $new_stylist_id,
            $found_client->getName() . '-' . $found_client->getContactInfo() . '-' . $found_client->getStylistId()
        );
    }



}
?>
