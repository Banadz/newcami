$(window).on('load', function() {
    $('#preloader1').fadeOut('slow');
});

// =================================================

$(document).ready(function() {
    // Simuler un chargement
    simulateLoading();
});

function simulateLoading() {
    var progress = 0;
    var interval = setInterval(function() {
        progress += 10;
        $('#progress').css('width', progress + '%');
        if (progress >= 100) {
            clearInterval(interval);
            $('#preloader2').fadeOut('slow');
        }
    }, 30);
}



// =======================================================

function showAuthPreloader() {
    $('#preloader2').fadeIn('slow');
}

function hideAuthPreloader() {
    $('#preloader2').fadeOut('slow');
}


$(window).on('load', function() {
    $('#preloader1').fadeOut('slow');
});

// =================================================

$(document).ready(function() {
    // Simuler un chargement
    simulateLoading();
});

function simulateLoading() {
    var progress = 0;
    var interval = setInterval(function() {
        progress += 10;
        $('#progress').css('width', progress + '%');
        if (progress >= 100) {
            clearInterval(interval);
            $('#preloader2').fadeOut('slow');
        }
    }, 30);
}



// =======================================================

function showAuthPreloader() {
    $('#preloader2').fadeIn('slow');
}

function hideAuthPreloader() {
    $('#preloader2').fadeOut('slow');
}

