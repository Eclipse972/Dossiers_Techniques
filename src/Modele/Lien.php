<?php

namespace DossiersTechniques\Modele;

/**
 * Représente une liste de liens associés à un support technique.
 *
 * Classe statique : une seule liste de liens par requête.
 * Appeler creer() avant d'ajouter les liens.
 *
 * Contient la liste des liens sous forme de tableaux associatifs
 * avec les clés : url, texte.
 *
 * @example
 * // Dans un contrôleur héritant de SupportControleur :
 * public function aPropos(Request $requete, Response $reponse): Response {
 *     Lien::creer();
 *     Lien::ajouter('https://example.com',         'Documentation officielle');
 *     Lien::ajouter('https://example.com/contact', 'Fiche fournisseur');
 *
 *     return $this->renduApropos($reponse, 'archive.zip', ['Contient les fichiers CAO'], Lien::obtenir());
 * }
 */
class Lien
{
	/** @var array<int, array{url: string, texte: string}> */
	private static array $liens = [];

	/**
	 * Initialise une nouvelle liste de liens vide.
	 * À appeler avant d'ajouter les liens.
	 *
	 * @example
	 * Lien::creer();
	 */
	public static function creer(): void
	{
		self::$liens = [];
	}

	/**
	 * Ajoute un lien à la liste.
	 *
	 * @param string $url   URL du lien
	 * @param string $texte Texte affiché
	 *
	 * @example
	 * Lien::ajouter('https://example.com', 'Accueil');
	 * Lien::ajouter('https://example.com/contact', 'Contact');
	 */
	public static function ajouter(string $url, string $texte): void
	{
		self::$liens[] = [
			'url'   => $url,
			'texte' => $texte,
		];
	}

	/**
	 * Retourne la liste des liens dans l'ordre d'ajout.
	 *
	 * @return array<int, array{url: string, texte: string}>
	 */
	public static function obtenir(): array
	{
		return self::$liens;
	}

	/**
	 * Indique si la liste est vide.
	 *
	 * @example
	 * if (Lien::estVide()) {
	 *     // pas de section liens dans le template
	 * }
	 */
	public static function estVide(): bool
	{
		return empty(self::$liens);
	}
}
