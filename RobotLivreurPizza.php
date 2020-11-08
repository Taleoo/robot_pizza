<?php

/**
 * La classe RobotLivreurPizza décrit le comportement du tout nouveau robot livreur de pizzas de JBHuet.com !
 *
 * Le nouveau robot livreur de pizzas de JBHuet.com est une formidable machine qui va chercher pour vous la pizza qui sort du four :
 * votre pizza préférée vient à vous, sans que vous ayez à bouger.
 * En pleine session de codage intense, pas possible de vous lever pour récupérer la pizza alors que le four sonne ? Pas de souci !
 * Le robot livreur de pizzas de JBHuet.com vous l'apporte sans effort, ou presque.
 * Cette merveilleuse machine se programme très simplement grâce à sa classe qui décrit très précisément tout ce qu'il peut faire pour vous.
 * Il vous suffit d'utiliser cette classe pour décrire à votre robot comment vous apporter votre délicieuse pizza.
 *
 * Ce robot perfectionné est doté d'un écran pour afficher les informations dont vous pourriez avoir besoin.
 * Vous pouvez même lui faire vous souhaiter un bon appétit !
 * NB. : ce robot étant encore à l'état de prototype, l'écran fournit actuellement ne peut afficher que des messages de 255 caractères maximum.
 * Grâce à ses capteurs (testeur de pente dans le sens du déplacement, testeur de distance aux obstacles face à lui, testeur de position de la pizza par rapport au plateau)
 * le robot peut s'adapter à de nombreuses situations.
 *
 * @author Jean-Bernard HUET <contact@jbhuet.com>
 *
 * @version 1.0.0
 *
 * PS. : les robots livreurs de pizzas existent déjà https://www.youtube.com/watch?v=rb0nxQyv7RU et https://www.youtube.com/watch?v=mIwDhnPnb4o
 */
class RobotLivreurPizza {
    //Attributs publics
    // Attributs privés

 /** @var float $HauteurVerrin Position actuelle du verrin */
    private $HauteurVerrin = 40;

 /** @var integer HAUTEUR_MAX Constante représentant la hauteur maximale que peut atteindre le verrin */
    private const HAUTEUR_MAX = 150;

 /** @var integer HAUTEUR_MIN Constante représentant la hauteur minimale que peut atteindre le verrin */
    private const HAUTEUR_MIN = 40;

 /** @var string $RobotName Le nom du robot */
    private $RobotName = "";

    /** @var string $Message Le message affiché à l'écran. */
    private $MessageEcran = "";

    /** @var integer CAPA_AFFICH Constante représentant le nombre maximal de caractères affichés à l'écran */
    private const CAPA_AFFICH = 255;

    /**
     * Création d'un objet de type RobotLivreurPizza
     * 
     * À la création d'un objet de type RobotLivreurPizza, lui fait dire son nom et une petite phrase sympathique.
     * @param string $name Le nom de votre magnifique robot!
     * @todo : Contrôler la valeur de $NouveauNom : VALIDER, NETTOYER, ECHAPPER (on laissera les stagiaires faire)
     */
    public function __construct($Name) {
        $this->AfficherMessage( sprintf( "<br>Mon nom est %s. Ravi de servir votre estomac maître!",
                        $Name) );
        $this->RobotName = $Name;
        
    }

    // Méthodes publiques

    /**
     * Fonction pour changer le nom d'un robot.
     * 
     * @param string $NouveauNom Le nom qui remplacera l'ancien.
     * @todo : Contrôler la valeur de $NouveauNom : VALIDER, NETTOYER, ECHAPPER (on laissera les stagiaires faire)
     */
    public function SetName( string $NouveauNom ) {
        $this->RobotName = $NouveauNom;
    }

    /**
     * Fonction qui permet au robot d'avancer en ligne droite sur x mètres et d'afficher la distance parcourue sur l'écran.
     * 
     * @param float $Distance Float qui représente la distance que le robot va parcourir.
     */
    public function Avancer( float $Distance ) {
        $this->AfficherMessage( sprintf( '<br>J\'avance de %d mètres.',
                        $Distance ) );
    }

    /**
     * Fonction qui permet au robot de reculer en ligne droite sur x mètres et d'afficher la distance parcourue sur l'écran.
     * 
     * @param float $Distance Float qui représente la distance que le robot va parcourir.
     */
    public function Reculer( float $Distance ) {
        $this->AfficherMessage( sprintf( '<br>J\'avance de %d mètres.',
                        $Distance) );
        // Le robot affiche la distance sur laquelle il recule
    }

    /**
     * Fonction qui permet au robot de tourner sur lui-même vers la droite de x degrés et d'afficher la rotation effectuée.
     * 
     * @param float $Degre Float qui représente le nombre de dégrés dont le robot tournera et le sens de rotation.
     */
    public function TournerDroite( float $Degre) {
        $this->AfficherMessage( sprintf( '<br>Je tourne de %d degrés à droite.',
                        $Degre ) );
        // Le robot affiche le nombre de degrés vers la droite dont il tourne sur lui-même
    }
        /**
     * Fonction qui permet au robot de tourner sur lui-même vers la gauche de x degrés et d'afficher la rotation effectuée.
     * 
     * @param float $Degre Float qui représente le nombre de dégrés dont le robot tournera et le sens de rotation.
     */
    public function TournerGauche( float $Degre ) {
        $this->AfficherMessage( sprintf( '<br>Je tourne de %d degrés à gauche.',
                        $Degre ) );
        // Le robot affiche le nombre de degrés vers la gauche dont il tourne sur lui-même
    }

    /**
     * Fonction qui permet au robot de faire monter et descendre son plateau tout en vérifiant qu'il ne dépasse pas la hauteur minimale et maximale.
     * Affiche la hauteur et la direction des déplacements du verrin.
     * 
     * @param float $Hauteur Float qui représente la hauteur à ajouter ou soustraire à la position actuelle du verrin.
     * @param bool $Sens Booléen qui représente le sens de déplacement du plateau : true pour déplacer vers le haut et false pour déplacer vers le bas.
     * @var float $HauteurVerrin La hauteur actuelle du verrin.
     * @var integer HAUTEUR_MAX Constante représentant la hauteur maximale que peut atteindre le verrin.
     * @var integer HAUTEUR_MIN Constante représentant la hauteur minimale que peut atteindre le verrin.
     */
    public function HauteurPlateau(float $Hauteur, bool $Sens) {

        if ( $Sens ){
            if( self::HAUTEUR_MAX > $this->HauteurVerrin + $Hauteur ){
                $this->HauteurVerrin =+ $Hauteur;
                $this->AfficherMessage( sprintf( '<br>Le plateau est monté de %d cm.',
                        $Hauteur ) );
            } else {
                $this->AfficherMessage( sprintf( '<br>Impossible de monter aussi haut !') );
                
            }
        } else {
            if( self::HAUTEUR_MIN < $this->HauteurVerrin - $Hauteur ){
                $this->HauteurVerrin =- $Hauteur;
                $this->AfficherMessage( sprintf( '<br>Le plateau est descendu de %d cm.',
                        $Hauteur ) );
            } else {
                $this->AfficherMessage( sprintf( '<br>Impossible de descendre aussi bas !') );
            }
        }
    }

    /**
     * Fonction qui permet au robot d'activer la spatule coudée pour pousser la pizza du plateau vers l'assiette et qui nous annonce le résultat.
     */
    public function PousserPizzaSurPlateau() {
        $this->AfficherMessage( sprintf( "<br>La pizza a été déposée sur l'assiette!" ) );
        /*
         * Au bord du plateau, le robot possède une spatule coudée qui se glisse sous la pizza pour la pousser hors du plateau.
         * Le robot affiche la confirmation qu'il a poussé la pizza hors du plateau.
         */
    }

    /**
     * Fonction qui permet au robot d'activer la pince qui récupère la pizza dans le four et la dépose sur son plateau et qui nous annonce le résultat.
     */
    public function TirerPizzaSurPlateau() {
        $this->AfficherMessage( sprintf( "<br>La pizza a été tirée sur le plateau !" ) );
        /*
         * À côté du plateau, une pince permet au robot d'attraper la pizza pour la glisser sur le plateau.
         * Le robot affiche un message de confirmation que la pizza a bien était tirée et est maintenant sur le plateau.
         */
    }

    /**
     * Fonction d'affichage d'un message sur l'écran du robot en passant par la fonction de test de longueur.
     * 
     * @param string $Message String contenant le message à afficher.
     */
    public function AfficherMessage( string $Message ) {
        $this->MessageEcran = $this->TesterLongueurMessage( $Message );
        print($this->MessageEcran );
    }

    // Méthodes privées

    /**
     * Vérifie que le message à afficher ne dépasse pas la capacité de l'écran
     *
     * La méthode privée TesterLongueurMessage teste si le message passé en paramètre dépasse la capacité d'affichage de l'écran.
     * Si le message dépasse la capacité de l'écran, tous les caractères au-delà de la capacité maximale de l'écran sont supprimés
     *    et "..." est ajouté à la fin du nouveau message.
     * NB. : la longueur maximale du nouveau message ("..." compris) ne peut pas dépasser la capacité d'affichage de l'écran.
     *
     * @link https://www.php.net/manual/fr/language.oop5.constants.php Pour comprendre la notation self::CAPA_AFFICH
     * @link https://www.php.net/manual/fr/function.strlen.php Pour savoir ce que fait la fonction PHP strlen
     *
     * @param string $MessagePossible Valeur du message avant réduction de la longueur si celle-ci dépasse la capacité de l'écran
     * @return string Valeur du message après réduction éventuelle de la longueur
     */
    private function TesterLongueurMessage( string $MessagePossible ): string {
        if( self::CAPA_AFFICH < strlen( $MessagePossible ) ) {  
            $MessagePossible = substr($MessagePossible, 0, 252) . "...";
        }
        return $MessagePossible;
    }

}

$Roboto1 = new RobotLivreurPizza('Jean-bernard');
$Roboto1->Avancer(2);
$Roboto1->TournerDroite(90);
$Roboto1->HauteurPlateau(10, 1);
$Roboto1->TirerPizzaSurPlateau();
$Roboto1->HauteurPlateau(10, 0);
$Roboto1->TournerGauche(90);
$Roboto1->Avancer(1.5);
$Roboto1->TournerDroite(90);
$Roboto1->Avancer(5);
$Roboto1->TournerGauche(90);
$Roboto1->Avancer(2);
$Roboto1->TournerDroite(45);
$Roboto1->HauteurPlateau(80, 1);
$Roboto1->PousserPizzaSurPlateau();
$Roboto1->HauteurPlateau(80, 0);
$Roboto1->AfficherMessage("<br>Bon appétit bien sûr!");