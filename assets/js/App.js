$(document).ready(function(){

    //welcome message
    $("#welcome-message").hide();
    $(".btn").click(function(){
        $("#welcome-message").toggle("slow");
    });

    //Grid Animation when clicking on button
    $("#teamButton").click(function(){
        $(".card").animate({
            height: '600px'
        }, 5000, function() {
            // Animation complete.
        });
    });

    $(".card").hover(
        function(){
            $(this).animate({ height: '900px' }, "slow");
            $(this).animate({fontSize: '3em'}, "slow");
            //$(this).find("h5").css({ "color": "#9F522B", "font-size": "1.5em" });
        },
        function(){
            $(this).animate({ height: '' }, 200); // Reset height to default
            $(this).find("h5").css({ "color": "", "font-size": "" }); // Reset font color and size
        }
    );
});

