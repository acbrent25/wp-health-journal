jQuery(document).ready(function($d){
    console.log('wp health journal plugin js loaded');

    $(".add button").click(function(e){
        e.preventDefault();
        
        $(".measurement-form").last().clone({
            withDataAndEvents: true,
        }).appendTo("#measurement-form");
    })
});