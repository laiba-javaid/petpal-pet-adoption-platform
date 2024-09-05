$(document).ready(function(){
    console.log("jQuery loaded successfully!");
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
    $("#values-section .card, #team-section .card" ).hover(function(){
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

//Owl Carousel Card Slider hover effect
$("#pet-gallery .card").hover(function(){
    // This will be executed when the mouse enters the element
    $(this).css({
        "box-shadow": "0px 4px 0px rgba(0, 0, 0, 0.05)",
        "transform": "translateY(-10px)",
        "cursor": "pointer"
    });
    $(this).find(".btn").css({
        "background-color": "#9F522B",
        "color": "white",
        "font-weight": 500,
        "font-size": "16px",
        "outline": "#7d3a1d",
        "border": "2px solid #7d3a1d"
    });
}, function(){
    // This will be executed when the mouse leaves the element
    $(this).css({
        "box-shadow": "",
        "transform": "",
        "cursor": ""
    });
    $(this).find(".btn").css({
        "background-color": "",
        "color": "",
        "font-weight": "",
        "font-size": "",
        "outline": "",
        "border": ""
    });
});

    //Modal Image Gallery
    $('.c-img').click(function(){
        // Get the source of the clicked image
        var src = $(this).attr('src');
        
        // Set the source of the modal image
        $('#modalImage').attr('src', src);

        // Show the modal
        $('#imageModal').modal('show');
    });
    //Sigup and Signun button
    const container = $('#register-container');
    const registerBtn = $('#register');
    const loginBtn = $('#login');
    const signUpPanel = $('.toggle-right');
    const signInPanel = $('.toggle-left');

    registerBtn.click(function() {
        container.addClass('active');
        signUpPanel.addClass('active');
        signInPanel.removeClass('active');
    });

    loginBtn.click(function() {
        container.removeClass('active');
        signInPanel.addClass('active');
        signUpPanel.removeClass('active');
    });

    $('#filter-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'filter_pets.php',
            method: 'GET',
            data: $(this).serialize(),
            success: function(data) {
                $('.row').html(data);
            }
        });
    });
            
           
       
});
