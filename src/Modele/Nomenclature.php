<?php

namespace DossiersTechniques\Modele;

/**
 * Représente la nomenclature d'un support technique.
 *
 * Classe statique : une seule nomenclature par requête.
 * Appeler raz() avant d'ajouter les lignes.
 *
 * Contient la liste des lignes sous forme de tableaux associatifs
 * avec les clés : repere, nom, quantite, fichier, matiere, observation.
 */
class Nomenclature
{
    /** @var array<int, array{repere: int, nom: string, quantite: int, fichier: string, matiere: string|null, observation: string|null}> */
    private static array $lignes = [];

    /** @var bool Vrai tant qu'aucune ligne n'a de matière renseignée */
    private static bool $col_matiere_vide = true;

    /** @var bool Vrai tant qu'aucune ligne n'a d'observation renseignée */
    private static bool $col_observation_vide = true;

    /**
     * 
     * Initialise une nouvelle nomenclature vide.
     * À appeler avant d'ajouter les lignes.
     *
     * @example
     * Nomenclature::creer();
     */
    public static function creer(): void
    {
        self::$lignes               = [];
        self::$col_matiere_vide     = true;
        self::$col_observation_vide = true;
    }

    /**
     * Ajoute une ligne à la nomenclature.
     * Met à jour col_matiere_vide et col_observation_vide si besoin.
     *
     * @param int         $repere      Numéro de repère
     * @param string      $nom         Nom de la ligne
     * @param int         $quantite    Quantité
     * @param string      $fichier     Nom du fichier eDrawing associé
     * @param string|null $matiere     Matière (null si non renseignée)
     * @param string|null $observation Observation ou remarque (null si non renseignée)
     *
     * @example
     * // Sans matière ni observation
     * Nomenclature::ajouterLigne(1, 'Corps', 1, 'corps.EPRT');
     *
     * // Avec matière
     * Nomenclature::ajouterLigne(2, 'Vis CS M2-4', 4, 'Vis_CS.EPRT', 'Cu Zn 39 Pb 2');
     *
     * // Avec matière et observation
     * Nomenclature::ajouterLigne(3, 'Borne', 2, 'borne.EPRT', 'Cu Zn 15', 'Cadmié');
     */
    public static function ajouterLigne(
        int $repere,
        string $nom,
        int $quantite,
        string $fichier,
        ?string $matiere = null,
        ?string $observation = null
    ): void {
        self::$lignes[] = [
            'repere'      => $repere,
            'nom'         => $nom,
            'quantite'    => $quantite,
            'fichier'     => $fichier,
            'matiere'     => $matiere,
            'observation' => $observation,
        ];

        if ($matiere !== null)     self::$col_matiere_vide     = false;
        if ($observation !== null) self::$col_observation_vide = false;
    }

    /**
     * Retourne un tableau prêt à être passé à Twig, contenant
     * l'état des colonnes optionnelles et toutes les lignes triées par repère.
     *
     * @param string $dossier
     * @return array{
     *     col_matiere_vide: bool,
     *     col_observation_vide: bool,
     *     dossier: string,
     *     lignes: array<int, array{repere: int, nom: string, quantite: int, fichier: string, matiere: string|null, observation: string|null}>
     * }
     *
     * @example
     * $donnees = Nomenclature::preparerVue($this->dossier);
     * return $this->vue->render($reponse, 'nomenclature.html.twig', $donnees);
     */
    public static function preparerVue(string $dossier): array
    {
        $lignes = self::$lignes;
        usort($lignes, fn($a, $b) => $a['repere'] <=> $b['repere']);

        return [
            'col_matiere_vide'     => self::$col_matiere_vide,
            'col_observation_vide' => self::$col_observation_vide,
            'dossier'              => $dossier,
            'lignes'               => $lignes,
        ];
    }

    /**
     * Indique si la nomenclature est vide.
     *
     * @example
     * if (Nomenclature::estVide()) {
     *     throw new NomenclatureVideException('Aucune ligne dans la nomenclature.');
     * }
     */
    public static function estVide(): bool
    {
        return empty(self::$lignes);
    }
}
