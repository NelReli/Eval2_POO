<?php

// creation de la class mere Animal
abstract class Animal{

    private string $nom;
    private int $age;
    private float $poids;

    public function __construct(string $nom, int $age, float $poids){

        $this->nom = $nom;
        $this->age = $age;
        $this->poids = $poids;
    }

    // les getters
    public function getNom() :string { return ucfirst($this->nom); }
    public function getAge() :int { return ucfirst($this->age); }
    public function getPoids() :float { return $this->poids; }

    // les setters
    public function setNom($nom) :string { return $this->nom=$nom;}

    public function setAge($age) :int|string { 
        if ($age<0){
            return "Erreur : l'age ne peut pas être moins de zéro. ";
            }else{
            return $this->age=$age;
            }
        }

    public function setPoids($poids) :float|string { 
        if ($poids<0){
            return "Erreur : le poids ne peut pas être moins de zéro. ";
            }else{
            return $this->poids=$poids;
            }
        }
    
    // méthode pour récuperer le nom de la class de l objet 
    public function getType(): string {
        return get_class($this);
    }

    // méthode crier
    public function crier():string{
        return "Le cri de l'animal";
    }
}

// création des class enfant
final class Chien extends Animal
{
    public const ESPECE = "Canidé";
    public function crier(): string
    {
        return "Wouf Wouf";
    }
}

final class Chat extends Animal
{
    public const ESPECE = "Félin";
    public function crier(): string
    {
        return "Miaou";
    }
}

final class Perroquet extends Animal
{
    public const ESPECE = "Oiseau";
    public function crier(): string
    {
        return "Cui Cui";
    }
}

?>