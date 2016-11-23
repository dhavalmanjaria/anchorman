"use strict";

$(function() {
    $("#sortable").sortable({
        axis: 'y',
        update: function(event, ui) {
            console.log('function called');
            var listOrder = $(this).sortable('serialize');
            $.ajax({
                type: 'POST',
                url: './controller/ListController.php',
                data: listOrder,
                success : function(response) {
                   location.reload();
                },
                error: function() {
                    console.log("AJAX thing did not work");
                }
            });
        }
    }); // end sortable

    $("#sortable").disableSelection();
});