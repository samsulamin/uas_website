<?php
class koneksi {
   private $server = "localhost";
   private $username = "id4994154_samsulamin";
   private $password = "samsulamin13";
   private $db = "id4994154_data_mahasiswa";

    function getKoneksi() {
        return new mysqli($this->server, $this->username,$this->password,$this->db);
    }
}

?>