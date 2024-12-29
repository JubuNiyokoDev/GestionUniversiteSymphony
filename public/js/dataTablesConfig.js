$(document).ready(function () {
    $('.dataTable').DataTable({
        "paging": true,       // Activation de la pagination
        "lengthChange": true, // Choix du nombre d'entrées à afficher
        "searching": true,    // Activation de la recherche
        "info": true,         // Affichage du texte "Showing X to Y of Z entries"
        "pageLength": 10,     // Nombre d'entrées affichées par défaut
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json", // Traduction française
            "lengthMenu": "Afficher _MENU_ entrées",
            "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
            "paginate": {
                "previous": "Précédent",
                "next": "Suivant"
            }
        }
    });
});
