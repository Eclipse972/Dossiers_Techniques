<?php

namespace DossiersTechniques\Modele;

/**
 * Représente la nomenclature d'un support technique.
 *
 * Contient la liste des lignes sous forme de tableaux associatifs
 * avec les clés : repere, nom, quantite, fichier, matiere, observation.
 */
class Nomenclature
{
    /** @var array<int, array{repere: int, nom: string, quantite: int, fichier: string, matiere: string|null, observation: string|null}> */
    private array $lignes = [];

    /** @var bool Vrai tant qu'aucune ligne n'a de matière renseignée */
    private bool $col_matiere_vide = true;

    /** @var bool Vrai tant qu'aucune ligne n'a d'observation renseignée */
    private bool $col_observation_vide = true;

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
     * $nomenclature->ajouterLigne(1, 'Corps', 1, 'corps');
     *
     * // Avec matière
     * $nomenclature->ajouterLigne(2, 'Vis CS M2-4', 4, 'Vis_CS', 'Cu Zn 39 Pb 2');
     *
     * // Avec matière et observation
     * $nomenclature->ajouterLigne(3, 'Borne', 2, 'borne', 'Cu Zn 15', 'Cadmié');
     */
    public function ajouterLigne(
        int $repere,
        string $nom,
        int $quantite,
        string $fichier,
        ?string $matiere = null,
        ?string $observation = null
    ): void {
        $this->lignes[] = [
            'repere'      => $repere,
            'nom'         => $nom,
            'quantite'    => $quantite,
            'fichier'     => $fichier,
            'matiere'     => $matiere,
            'observation' => $observation,
        ];

        if ($matiere !== null)     $this->col_matiere_vide     = false;
        if ($observation !== null) $this->col_observation_vide = false;
    }

    /**
     * Retourne un tableau prêt à être passé à Twig, contenant
     * l'état des colonnes optionnelles et toutes les lignes triées par repère.
     *
     * @return array{
     *     col_matiere_vide: bool,
     *     col_observation_vide: bool,
     *     lignes: array<int, array{repere: int, nom: string, quantite: int, fichier: string, matiere: string|null, observation: string|null}>
     * }
     *
     * @example
     * $donnees = $nomenclature->preparerVue();
     * return $this->vue->render($reponse, 'nomenclature.html.twig', $donnees);
     */
    public function preparerVue(): array
    {
        $lignes = $this->lignes;
        usort($lignes, fn($a, $b) => $a['repere'] <=> $b['repere']);

        return [
            'col_matiere_vide'     => $this->col_matiere_vide,
            'col_observation_vide' => $this->col_observation_vide,
            'lignes'               => $lignes,
        ];
    }

    /**
     * Indique si la nomenclature est vide.
     *
     * @example
     * if ($nomenclature->estVide()) {
     *     throw new NomenclatureVideException('Aucune ligne dans la nomenclature.');
     * }
     */
    public function estVide(): bool
    {
        return empty($this->lignes);
    }
}
