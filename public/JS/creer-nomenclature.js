/**
 * Construit la table de nomenclature à partir des données JSON injectées par Twig.
 */

const donnees         = JSON.parse(document.getElementById('app-data').textContent);

const dossier         = donnees.dossier;
const lignes          = donnees.lignes;
const matiereVide     = donnees.col_matiere_vide;
const observationVide = donnees.col_observation_vide;

const template = document.getElementById('ligne');
const tbody    = document.querySelector('#nomenclature tbody');

// Masquer les en-têtes des colonnes vides
if (matiereVide)     document.querySelector('th.matiere').hidden     = true;
if (observationVide) document.querySelector('th.observation').hidden = true;

// Construire les lignes
lignes.forEach(ligne => {
    const tr            = template.content.cloneNode(true);
    const cheminImage   = `/supports/${dossier}/images/${ligne.fichier.slice(0, -4)}png`;
    const cheminFichier = `/supports/${dossier}/fichiers/${ligne.fichier}`;
    const designation   = ligne.quantite > 1
        ? `${ligne.nom} (x${ligne.quantite})`
        : ligne.nom;

    tr.querySelector('.repere').textContent      = ligne.repere;
    tr.querySelector('.designation').textContent = designation;
    tr.querySelector('.matiere').textContent     = ligne.matiere ?? '';
    tr.querySelector('.observation').textContent = ligne.observation ?? '';

    if (matiereVide)     tr.querySelector('.matiere').hidden     = true;
    if (observationVide) tr.querySelector('.observation').hidden = true;

    const img = tr.querySelector('img');
    img.src = cheminImage;
    img.alt = ligne.nom;

    const lien = tr.querySelector('a');
    lien.href = cheminFichier;

    tbody.appendChild(tr);
});
