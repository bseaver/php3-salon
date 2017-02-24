<?php

require_once "src/Stylist.php";

class CuisineTest extends PHPUnit_Framework_TestCase
{

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


}
?>
