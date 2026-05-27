/**
 * accueil.js
 * Génère dynamiquement les vignettes des supports techniques.
 *
 * Données  : JSON injecté par Twig dans  <script id="app-data">
 * Structure : template HTML déclaré dans <template id="vignette">
 *
 * Le tableau est organisé en lignes de NB_COLONNES colonnes.
 */

const NB_COLONNES = 6;

/**
 * Lit les données JSON injectées par Twig.
 *
 * @returns {Array} Liste des supports, ou tableau vide si absent / invalide.
 */
function lireAppData() {
    const balise = document.getElementById('app-data');
    if (!balise) return [];
    try {
        return JSON.parse(balise.textContent);
    } catch (e) {
        console.error('accueil.js : impossible de parser #app-data', e);
        return [];
    }
}

/**
 * Crée une cellule <td> en clonant le <template id="vignette">
 * et en remplissant ses emplacements avec les données du support.
 *
 * @param {HTMLTemplateElement} template  Le template à cloner.
 * @param {Object}              support   Objet { nom, image, dossier }.
 * @returns {HTMLTableCellElement}
 */
function creerVignette(template, support) {
    const clone = template.content.cloneNode(true);

    clone.querySelector('a').href           = `/${support.dossier}/MES`;
    clone.querySelector('img').src          = `/Supports/${support.dossier}/images/${support.image}`;
    clone.querySelector('img').alt          = support.nom;
    clone.querySelector('span').textContent = support.nom;

    // cloneNode(true) retourne un DocumentFragment ; on récupère
    // le <td> racine pour pouvoir l'ajouter à la ligne.
    return clone.firstElementChild;
}

/* ---- programme principal ------------------------------------------------------------------ */
const tableau  = document.querySelector('section table');
if (!tableau)  console.error('accueil.js : <table> introuvable dans <section>');

const template = document.getElementById('vignette');
if (!template) console.error('accueil.js : <template id="vignette"> introuvable');

let ligne = null;

lireAppData().forEach((support, index) => {
    if (index % NB_COLONNES === 0) {
        ligne = document.createElement('tr');
        tableau.appendChild(ligne);
    }
    ligne.appendChild(creerVignette(template, support));
});