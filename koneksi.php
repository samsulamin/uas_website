<?php
class koneksi {
   private $server = "localhost";
   private $username = "id4994154_uas";
   private $password = "samsulamin13";
   private $db = "id4994154_uas";

    function getKoneksi() {
        return new mysqli($this->server, $this->username,$this->password,$this->db);
    }
}

?>