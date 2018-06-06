<?php

class Vue_PingouinsDB {

    private $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }

    function getVue_pingouinsId($id) {
        try {
            $query = "SELECT * FROM PINGOUINS where ID=:id";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue('id', $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }

    public function suppPingouin(array $data) {
        $query = "DELETE FROM PINGOUINS WHERE ID = :id";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id', $data['id'], PDO::PARAM_STR);

            $resultset->execute();
        } catch (PDOException $e) {
            print "<br/>Echec de la suppression";
            print $e->getMessage();
        }
    }

    function getVue_pingouinProduit() {
        try {
            $query = "SELECT * FROM PINGOUINS";
            $resultset = $this->_db->prepare($query);

            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }

}
