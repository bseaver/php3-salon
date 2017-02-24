<?php
    class Client
    {
        private $id;
        private $name;
        private $contact_info;
        private $stylist_id;

        function __construct($new_name = '', $new_contact_info = '', $new_stylist_id = null, $id = null)
        {
            $this->setName($new_name);
            $this->setContactInfo($new_contact_info);
            $this->setStylistId($new_stylist_id);
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

        function getStylistId()
        {
            return $this->stylist_id;
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

        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = (int) $new_stylist_id;
        }

        function save()
        {
            // $name = addslashes($this->getName());
            // $contact_info = addslashes($this->getContactInfo());
            //
            // $GLOBALS['DB']->exec("INSERT INTO clients
            //     (name, contact_info, stylist_id) VALUES
            //     ('$name', '$contact_info', $this->getStylistId());"
            // );
            // $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll($stylist_id)
        {
            // $output = array();
            // $results = $GLOBALS['DB']->query(
            //     "SELECT * FROM clients
            //     WHERE stylist_id = $stylist_id
            //     ORDER BY name;"
            // );
            // foreach ($results as $result) {
            //     $client = new Client(
            //         $result['name'],
            //         $result['contact_info'],
            //         $result['stylist_id'],
            //         $result['id']
            //     );
            //     array_push($output, $client);
            // }
            // return $output;
        }

        static function deleteAll()
        {
            // $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function deleteAllByStylist($stylist_id)
        {
            // $GLOBALS['DB']->exec(
            //     "DELETE FROM clients
            //     WHERE stylist_id = $stylist_id;"
            // );
        }

        static function findById($id)
        {
            // $results = $GLOBALS['DB']->query("SELECT * FROM clients WHERE id = $id;");
            // foreach ($results as $result) {
            //     $stylist = new Stylist(
            //         $result['name'],
            //         $result['contact_info'],
            //         $result['stylist_id'],
            //         $result['id']
            //     );
            // }
            // return $stylist;
        }

        function update($new_name, $new_contact_info, $new_stylist_id)
        {
            // $this->setName(addslashes($new_name));
            // $this->setContactInfo(addslashes($new_contact_info));
            //
            // $GLOBALS['DB']->exec(
            //     "UPDATE stylists SET
            //         name = '{$this->getName()}',
            //         contact_info = '{$this->getContactInfo()}',
            //         stylist_id = {$this->getStylistId()}
            //     WHERE id = {$this->getId()};"
            // );
        }

        function delete()
        {
            // $GLOBALS['DB']->exec(
            //     "DELETE FROM clients
            //         WHERE id = {$this->getId()};"
            // );
        }
    }
?>
