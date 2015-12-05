function bind_action() {

    $(document).on('click', '.button_modif_article', function() {
        var id = $('.id_modif').val();
        var url = Routing.generate('learn_project_modif_article', { id : id });
        
        window.location.href = url;
    });
    
    $(document).on('click', '.button_suppr_article', function() {
        var id = $('.id_suppr').val();
        var url = Routing.generate('learn_project_suppr_article', { id : id });
        
        window.location.href = url;
    });
}

$(document).ready(function() {

    bind_action();

});
