<?php
    class Stylist
    {
        private $id;
        private $name;
        private $contact_info;

        function __construct($new_name = '', $new_contact_info = '', $id = null)
        {
            $this->setName($new_name);
            $this->setContactInfo($new_contact_info);
            $this->setId($id);
        }

        function getId()
        {
            return $this->id;
        }

        function getName()
        {
            return $this->name;
        }

        function getContactInfo()
        {
            return $this->link;
        }

        function setId($id)
        {
            // $this->id = (int) $id;
        }

        function setName($new_name)
        {
            // $this->name = (string) $new_name;
        }

        function setContactInfo($new_contact_info)
        {
            // $this->contact_info = (string) $new_contact_info;
        }

        function save()
        {

        }

        static function getAll()
        {

        }

        static function deleteAll()
        {

        }

        static function findById($id)
        {

        }

        function update($new_name, $new_contact_info)
        {

        }

        function delete()
        {

        }
    }
?>
