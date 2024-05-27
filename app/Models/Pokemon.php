<?php

/**
 * 1 Table = 1 Modèle
 */
class Pokemon extends CoreModel
{
    // 1 colonne de la table = 1 propriété du Modèle
    private $name;
    private $hp;
    private $attack;
    private $defense;
    private $spe_attack;
    private $spe_defense;
    private $speed;
    private $number;


    /**
     * Retourne la liste de tous les films
     *
     * @return Pokemon[]
     */
    public function findAll()
    {
        // On prépare la requete
        $sql = '
            SELECT * FROM `pokemon`
        ';

        // Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // j'execute ma requête pour récupérer les catégories
        $pdoStatement = $pdo->query($sql);

        // fetchAll avec l'argument FETCH_CLASS renvoie un array qui contient tous mes résultats sous la forme d'objets de la classe spécifiée en 2e argument
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Pokemon');

        return $results;
    }

    /**
     * Retourne un film en fonction de son ID
     *
     * @param int $id
     * @return Pokemon
     */
    public function find($id)
    {

        // écrire la requête SQL
        $sql = "SELECT * FROM `pokemon` WHERE `id`=" . $id;

        // Je vais récupérer la connexion à la DB
        $pdo = Database::getPDO();

        // j'exécute ma requête pour récupérer les catégories
        $pdoStatement = $pdo->query($sql);

        // Récupérer mes résultats
        // fetchClass permettra de transformer les données de la DB sous forme d'objets de la classe
        $pokemon = $pdoStatement->fetchObject('Pokemon');
        return $pokemon;
    }

    /**
     * Retourne un film en fonction de son ID
     *
     * @param int $id
     * @return Pokemon
     */
    public function findWithDetails($id)
    {

        // écrire la requête SQL
        $sql = 
        "SELECT pokemon.* , type.name, type.color
                FROM pokemon
                INNER JOIN pokemon_type ON pokemon_number=pokemon.number
                INNER JOIN `type` ON type_id = type.id
                WHERE pokemon.id=". $id;


        // Je vais récupérer la connexion à la DB
        $pdo = Database::getPDO();

        // j'exécute ma requête pour récupérer les catégories
        $pdoStatement = $pdo->query($sql);

        // Récupérer mes résultats
        // fetchClass permettra de transformer les données de la DB sous forme d'objets de la classe
        $film = $pdoStatement->fetchObject('Pokemon');
        return $film;
    }
    

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of hp
     */ 
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set the value of hp
     *
     * @return  self
     */ 
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get the value of attack
     */ 
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Set the value of attack
     *
     * @return  self
     */ 
    public function setAttack($attack)
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get the value of defense
     */ 
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     *
     * @return  self
     */ 
    public function setDefense($defense)
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get the value of spe_attack
     */ 
    public function getSpeAttack()
    {
        return $this->spe_attack;
    }

    /**
     * Set the value of spe_attack
     *
     * @return  self
     */ 
    public function setSpeAttack($spe_attack)
    {
        $this->spe_attack = $spe_attack;

        return $this;
    }

    /**
     * Get the value of spe_defense
     */ 
    public function getSpeDefense()
    {
        return $this->spe_defense;
    }

    /**
     * Set the value of spe_defense
     *
     * @return  self
     */ 
    public function setSpeDefense($spe_defense)
    {
        $this->spe_defense = $spe_defense;

        return $this;
    }

    /**
     * Get the value of speed
     */ 
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set the value of speed
     *
     * @return  self
     */ 
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */ 
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }
}