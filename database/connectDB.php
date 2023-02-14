<?php 

// class permettant de faire la connexion à la bdd + des méthodes d'envoie de requetes

class ConnectDB{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass='', $db_host='localhost') {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    // connection à la bdd
    public function getPDO() {
        if($this->pdo === null) {
            $pdo = new PDO("mysql:dbname=$this->db_name;host=$this->db_host",$this->db_user,$this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    // préparation des requetes à envoyer plusieurs fois
    public function prepare($statement) {
        $req = $this->getPDO()->prepare($statement);
        return $req;
    }

    // méthode d'envoie d'une requete de récupération d'information
    public function queryGET($statement) {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

    // méthode d'envoie d'une requete de suppression/modification/création
    public function querySend($statement) {
        $req = $this->getPDO()->query($statement);
    }

}