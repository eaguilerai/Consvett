<!-- 
 Name: index_head.php
 Description: Head section of the index view.
 Author: Erasmo Aguilera
 Creation date: October 9, 2014
-->

<script>
    /*$(document).ready(function() {
        var dialog = $("#options-dialog").dialog({
            autoOpen: false,
            height: 300,
            width: 350,
            modal: true,
            buttons: {
                "Aceptar": function() {},
                "Cancelar": function() { dialog.dialog("close"); }
            },
            close: function() {}
        });
        
        $("#options-button").button().on("click", function {
           dialog.dialog("open"); 
        });
    })*/
    $(function(){
        var dialog = $("#options-dialog").dialog({
            autoOpen: false
        });
        $("#options-button").click(function(){
            dialog.dialog("open");
        });
    });
</script>