$( document ).ready(function() {
    $(".tile").height($("#tile1").width());
    $(".carousel").height($("#tile1").width());
     $(".item").height($("#tile1").width());
     
    $(window).resize(function() {
    if(this.resizeTO) clearTimeout(this.resizeTO);
    this.resizeTO = setTimeout(function() {
        $(this).trigger('resizeEnd');
    }, 10);
    });
    
    $(window).bind('resizeEnd', function() {
        $(".tile").height($("#tile1").width());
        $(".carousel").height($("#tile1").width());
        $(".item").height($("#tile1").width());
    });

});



function confirmBeforeDelete($string){
	
	$(".form_delete").submit(function (event) {

    	var x = confirm($string);
        
        if (x) 
            return true;
        
        else {

            event.preventDefault();
            return false;
        }

    });
}