<?php

class Accueil {

    // Objectif : bien accueillir les nouveaux stagiaires
    // La classe Accueil appelle chaque stagiaire par son nom.
    // La classe Accueil est capable de dire "Bonjour.", "Bonjour "+nom,
    //    "Voici un croissant" si c'est un stagiaire, "voici une chocolatine" si c'est unE stagiairE
    // Attributs
    private $NomStagiaire;
    private $SexeStagiaire;

    /**
     * Instance : Accueil - Constructeur
     * Ce constructeur construit l'instance d'un objet de type Accueil.
     * Il prend 2 paramètres : $Nom (string) et $Sexe (integer).
     *
     * @author  Jean-Bernard HUET <contact@jbhuet.com>
     *
     * @since 1.0
     *
     * @param string    $Nom    Le nom en toute lettre du stagiaire à accueillir
     * @param int   $Sexe   Le sexe du stagiaire à accueillir : 1 = Homme, 2 = Femme
     */
    public function __construct( string $Nom,
            int $Sexe ) {
        $this->SexeStagiaire = $this->ControleSexe( $Sexe );
        $this->NomStagiaire  = $Nom;
    }

    // Méthodes
    public function bonjour() {
        switch( $this->SexeStagiaire ) {
            case 1:
                printf( PHP_EOL . "Bonjour %s. Voici un croissant.",
                        $this->NomStagiaire );
                break;
            case 2:
                printf( PHP_EOL . "Bonjour %s. Voici une chocolatine.",
                        $this->NomStagiaire );
                break;
            default : break;
        }
    }

    public function SetName( string $NouveauNom ) {
        // @ToDo : Contrôler la valeur de $NouveauNom : VALIDER, NETTOYER, ECHAPPER
        $this->NomStagiaire = $NouveauNom;
    }

    public function SetSexe( int $NouveauSexe ) {
        $this->SexeStagiaire = $this->ControleSexe( $NouveauSexe );
    }

    private function ControleSexe( int $ValeurSexe ): int {
        if( ($ValeurSexe < 1) || ($ValeurSexe > 2) ) {
            $ValeurSexe = 1;
        }
        return $ValeurSexe;
    }

}

// Programme principal
$AccueilStagiaire1 = new Accueil( "Toto",
        1 );
$AccueilStagiaire1->bonjour();

$AccueilStagiaire2 = new Accueil( "Titine",
        2 );
$AccueilStagiaire2->bonjour();

$AccueilStagiaire1->SetName( "Bibi" );
$AccueilStagiaire1->bonjour();
