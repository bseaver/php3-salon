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
            return $this->contact_info;
        }

        function setId($id)
        {
            $this->id = (int) $id;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function setContactInfo($new_contact_info)
        {
            $this->contact_info = (string) $new_contact_info;
        }

        function save()
        {
            $name = addslashes($this->getName());
            $contact_info = addslashes($this->getContactInfo());

            $GLOBALS['DB']->exec("INSERT INTO stylists
                (name, contact_info) VALUES
                ('$name', '$contact_info');"
            );
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $output = array();
            $results = $GLOBALS['DB']->query("SELECT * FROM stylists ORDER BY name;");
            foreach ($results as $result) {
                $stylist = new Stylist(
                    $result['name'],
                    $result['contact_info'],
                    $result['id']
                );
                array_push($output, $stylist);
            }
            return $output;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }

        static function findById($id)
        {
            $results = $GLOBALS['DB']->query("SELECT * FROM stylists WHERE id = $id;");
            foreach ($results as $result) {
                $stylist = new Stylist(
                    $result['name'],
                    $result['contact_info'],
                    $result['id']
                );
            }
            return $stylist;
        }

        function update($new_name, $new_contact_info)
        {
            $this->setName(addslashes($new_name));
            $this->setContactInfo(addslashes($new_contact_info));

            $GLOBALS['DB']->exec(
                "UPDATE stylists SET
                    name = '{$this->getName()}',
                    contact_info = '{$this->getContactInfo()}'
                WHERE id = {$this->getId()};"
            );
        }

        function delete()
        {
            $GLOBALS['DB']->exec(
                "DELETE FROM stylists
                    WHERE id = {$this->getId()};"
            );
        }
    }
?>
