<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Stylist.php";

$server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);


class StylistTest extends PHPUnit_Framework_TestCase
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

    function test_Stylist_save_getAll_deleteAll()
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

    function test_Stylist_findById()
    {
        // Arrange
        $stylist1 = new Stylist('John', 'john@hairy.com');
        $stylist2 = new Stylist('Alison', '555-1212');
        $stylist1->save();
        $stylist2->save();

        // Act
        $stylist3 = Stylist::findById( $stylist1->getId() );

        // Assert
        $this->assertEquals($stylist1, $stylist3);
    }

    function test_Stylist_update()
    {
        // Arrange
        $stylist1 = new Stylist("John O'Hanlin", 'john@hairy.com');
        $new_name = "John O'Malley";
        $new_contact_info = 'john@hair.net';

        $stylist2 = new Stylist('Alison', '555-1212');
        $stylist1->save();
        $stylist2->save();

        // Act
        $stylist1->update($new_name, $new_contact_info);

        $updated_name = '';
        $updated_contact_info = '';
        $stylists = Stylist::getAll();
        foreach ($stylists as $stylist) {
            if ($stylist->getId() == $stylist1->getId()) {
                $updated_name = $stylist->getName();
                $updated_contact_info = $stylist->getContactInfo();
            }
        }

        // Assert
        $this->assertEquals($new_name . '+' . $new_contact_info, $updated_name . '+' . $updated_contact_info);
    }

    function test_Stylist_delete()
    {
        // Arrange
        $stylist1 = new Stylist("John O'Hanlin", 'john@hairy.com');
        $stylist2 = new Stylist('Alison', '555-1212');
        $stylist1->save();
        $stylist2->save();

        // Act
        $stylist1->delete();

        // Assert
        $this->assertEquals([$stylist2], Stylist::getAll());
    }

}
?>
