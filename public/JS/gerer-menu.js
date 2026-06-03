const urlCourante = window.location.pathname;

// Parcourt tous les li du menu
document.querySelectorAll('nav > ul > li').forEach(li => {

    const lien = li.querySelector(':scope > a');

    if (urlCourante.startsWith(lien.getAttribute('href'))) {
        lien.id = 'menu-actif';

        // On affiche le sous-menu s'il existe
        const sousMenu = li.querySelector(':scope > ul');
        if (sousMenu) {
            sousMenu.style.display = 'block';

            // Parcourt les li des sous-menu
            sousMenu.querySelectorAll(':scope > li').forEach(liEnfant => {

                const lienEnfant = liEnfant.querySelector(':scope > a');

                // Si l'URL courante correspond exactement
                if (urlCourante === lienEnfant.getAttribute('href')) {
                    lienEnfant.id = 'sous-menu-actif';
                }
            });
        }
    }
});