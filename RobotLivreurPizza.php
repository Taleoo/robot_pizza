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

    /** @var string $Message Le message affiché à l'écran. */
    private $MessageEcran = "";

    /** @var integer CAPA_AFFICH Constante représentant le nombre maximal de caractères affichés à l'écran */
    private const CAPA_AFFICH = 255;

    /**
     * Titre de l'aide en ligne. Exemple : Création d'un objet de type RobotLivreurPizza
     *
     * Description de l'aide en ligne. Exemple : À la création d'un objet de type RobotLivreurPizza...
     *
     * Renseigner la ligne suivante s'il y a un paramètre. Ajouter autant de ligne d'information que de paramètre de la fonction.
     * @param <Type du paramètre> <nom de la variable : $...> <Description du paramètre : à quoi sert-il, quelle(s) valeur(s) lui donner, etc. ?>
     */
    public function __construct() {
        // J'ai mis ça là, mais à vous de voir si c'est utile...
    }

    // Méthodes publiques

    /**
     * Renseigner l'aide en ligne...
     */
    public function Avancer( float $Distance ) {
        $this->AfficherMessage( sprintf( 'J\'avance de %f mètres.',
                        $Distance ) );
    }

    /**
     * Renseigner l'aide en ligne...
     */
    public function Reculer() {
        // Le robot affiche la distance sur laquelle il recule
    }

    /**
     * Renseigner l'aide en ligne...
     */
    public function TournerDroite() {
        // Le robot affiche le nombre de degrés vers la droite dont il tourne sur lui-même
    }

    /**
     * Renseigner l'aide en ligne...
     */
    public function TournerGauche() {
        // Le robot affiche le nombre de degrés vers la gauche dont il tourne sur lui-même
    }

    /**
     * Renseigner l'aide en ligne...
     */
    public function MonterPlateau() {
        # Le robot possède un plateau pour transporter la pizza.
        # Au plus bas, le plateau est à 40cm au-dessus du sol.
        # Le plateau est fixé sur un verrin qui peut monter ou descendre.
        # Selon les modèles de robot, le verrin peut monter plus ou moins haut.
        # La hauteur maximale du verrin (donc du plateau) est fixe (une constante).
        # Je vous laisse libre de déteriner cette hauteur maximale.
        # Il faudra vérifier que le robot ne reçoit pas un ordre de monter le plateau en dehors de la plage (hauteur minimum / hauteur maximum) possible.
        # Le robot affiche la hauteur en centimètres à laquelle monte le plateau.
    }

    /**
     * Renseigner l'aide en ligne...
     */
    public function DescendrePlateau() {
        /* Cette méthode est-elle utile ? */
        /* N'est-elle pas redondante avec MonterPLateau() ? */
        /* Vous pouvez la conserver, mais sans dupliuer le code de MonterPLateau() */
        /* ou bien renommer MonterPlateau() pour rendre le code plus lisible. */
    }

    /**
     * Renseigner l'aide en ligne...
     */
    public function PousserPizzaSurPlateau() {
        /*
         * Au bord du plateau, le robot possède une spatule coudée qui se glisse sous la pizza pour la pousser hors du plateau.
         * Le robot affiche la confirmation qu'il a poussé la pizza hors du plateau.
         */
    }

    /**
     * Renseigner l'aide en ligne...
     */
    public function TirerPizzaSurPlateau() {
        /*
         * À côté du plateau, une pince permet au robot d'attraper la pizza pour la glisser sur le plateau.
         * Le robot affiche un message de confirmation que la pizza a bien était tirée et est maintenant sur le plateau.
         */
    }

    /**
     * Renseigner l'aide en ligne...
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
        if( self::CAPA_AFFICH < strlen( $MessagePossible ) ) {  // Vous pouvez modifier le code déja écrit...
            // Ecrire le code pour réduire la taille du message si nécessaire...
        }
        return $MessagePossible;
    }

}

// Ecrivez ci-dessous le code qui sera transmis à votre robot pour aller chercher votre pizza dans le four et l'apporter à votre bureau
// En imaginant que vous possédez ce robot, et que vous êtes installé·e à votre bureau, programmez le robot pour qu'il vous rapporte votre pizza toute chaude.
// Donnez des ordres au robot en fonction de la réalité de votre logement.
// Le robot peut partir de n'importe quel point (sous votre bureau, un placard, un coin de votre cuisine).
// On considère que la porte du four est ouverte, et qu'elle n'empêche pas le robot d'atteindre la pizza.
// Le robot doit déposer la pizza dans une assiette posée au bord de votre bureau.
// La dernière instruction que le robot devra exécuter est de vous souhaiter un bon appétit.