/**
 * accueil.js
 * Génère dynamiquement les vignettes des supports techniques
 * à partir des données JSON reçues.
 *
 * Structure d'une vignette (cellule <td>) :
 *   <td>
 *     <a href="/Support/{dossier}">
 *       <img src="/Support/{dossier}/images/{image}" alt="{nom}" />
 *       {nom}
 *     </a>
 *   </td>
 *
 * Le tableau est organisé en lignes de 5 colonnes.
 */

const NB_COLONNES = 5;

/**
 * Lit les données JSON injectées par Twig dans la balise
 * <script type="application/json" id="app-data">.
 *
 * @returns {Array} Liste des supports, ou tableau vide si absent / invalide.
 */
function lireAppData() {
    const balise = document.getElementById('app-data');
    if (!balise) return [];
    try {
        return JSON.parse(balise.textContent);
    } catch (e) {
        console.error('accueil.js : impossible de parser app-data', e);
        return [];
    }
}

/**
 * Crée une cellule <td> contenant la vignette d'un support.
 *
 * @param {Object} support  Objet avec les propriétés nom, image, dossier.
 * @returns {HTMLTableCellElement}
 */
function creerVignette(support) {
    const td = document.createElement('td');

    const lien = document.createElement('a');
    lien.href = `/Support/${support.dossier}`;

    const img = document.createElement('img');
    img.src = `/Support/${support.dossier}/images/${support.image}`;
    img.alt = support.nom;

    lien.appendChild(img);
    lien.appendChild(document.createTextNode(support.nom));
    td.appendChild(lien);

    return td;
}

// programme principal
const tableau = document.querySelector('section table');
if (!tableau) {
	console.error('accueil.js : balise <table> introuvable dans <section>');
	return;
}
const listeSupport = lireAppData()

let ligne = null;

listeSupport.forEach((support, index) => {
	// Nouvelle ligne toutes les NB_COLONNES cellules
	if (index % NB_COLONNES === 0) {
		ligne = document.createElement('tr');
		tableau.appendChild(ligne);
	}
	ligne.appendChild(creerVignette(support));
});

