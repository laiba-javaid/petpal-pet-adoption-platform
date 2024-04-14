$(document).ready(function(){

    //welcome message
    $("#welcome-message").hide();
    $(".btn").click(function(){
        $("#welcome-message").toggle("slow");
    });

    //Animation when clicking on button
    $("#teamButton").click(function(){
        $('html, body').animate({
            scrollTop: $(".team-section").offset().top
          }, 800);
    });

    //Grid animation when hovering over grid items or cards
    $(".card" ).hover(function(){
        $(this).animate({
            height: '+=150px',
            marginTop: '-=15px',       
            },300);     
        $(this).css({ transform: "scale(1.08)",cursor:"pointer"});
        $(this).find("h5").css({"color":"#9F522B", "font-weight":"bold", "font-size":"1.5em"});
    },
        function(){
        $(this).animate({
                height: '-=150px',
                marginTop: '+=15px',              
            },300);
            $(this).css( {transform: "",cursor:""});
        $(this).find("h5").css({"color":"", "font-weight":"", "font-size":""});
    }
    );

    //Modal Image Gallery
    $('.c-img').click(function(){
        // Get the source of the clicked image
        var src = $(this).attr('src');
        
        // Set the source of the modal image
        $('#modalImage').attr('src', src);

        // Show the modal
        $('#imageModal').modal('show');
    });


    //Adjusting padding top of carousel items





});

