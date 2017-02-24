<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Stylist.php";

$server = 'mysql:host=localhost:8889;dbname=salon_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);


class CuisineTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Stylist::deleteAll();
    }

    function test_Stylist_get_set_construct()
    {
        // Arrange
        $stylist1 = new Stylist('James', '555-1212');

        // Act
        $stylist2 = new Stylist();
        $stylist2->setName($stylist1->getName());
        $stylist2->setContactInfo($stylist1->getContactInfo());

        // Assert
        $this->assertEquals('James-555-1212', $stylist2->getName() . '-' . $stylist2->getContactInfo());
    }

    function test_Stylist_save_getAll_delete_All()
    {
        // Arrange
        $stylist1 = new Stylist('James', '555-1212');
        $stylist2 = new Stylist('Alison', '555-1212');

        // Act
        $stylist1->save();
        $stylist2->save();
        $all_stylists = Stylist::getAll();

        // Assert
        $this->assertEquals([$stylist2, $stylist1], $all_stylists);
    }

}
?>
