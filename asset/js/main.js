console.log('oui')
$(window).on('load',function() {
    $('.flexslider').flexslider({
        animation:"slide",
        slideshow: true,
        slideshowSpeed: 7000,
        controlNav: false,
    });
})

window.sr = ScrollReveal();

sr.reveal('.footer',{
    origin: 'bottom',
    duration: 2000,
    distance: '70%',
});
sr.reveal('.copyrights',{
    origin: 'bottom',
    duration: 2500,
    distance: '100%',
});


sr.reveal('.wrap2',{
    origin: 'bottom',
    duration: 2000,
    distance: '70%',

});

$(document).ready(function () {
    const data = {
        labels: [
            'Red',
            'Green',
            'Yellow',
            'Grey',
            'Blue'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [11, 16, 7, 3, 14],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
                'rgb(255, 205, 86)',
                'rgb(201, 203, 207)',
                'rgb(54, 162, 235)'
            ]
        }]
    };

    const config = {
        type: 'polarArea',
        data: data,
        options: {
            responsive: true,
        }
    };
    const myChart = new Chart(
        document.querySelector('#graph1'),
        config
    );
    console.log(myChart)
})
$(function() {
    var words = [
            'CHEZ ALTL NETWORK',
            'VOTRE SECURITÉ EST NOTRE PRIORITÉ',
            'NOUS SOMME DISPONIBLE 24H/24',

        ],
        i = 0;
    setInterval(function () {
        $("#word").fadeOut(function () {
            $(this).html(words[i = (i + 1) % words.length]).fadeIn(1500);
        })
    }, 3500,)
});

$(".scroll").click(function (){
    var section = $("." + this.id)
    $("html,body").animate({scrollTop: section.offset().top}, 'slow');
});


$('.testsAjax').ready(function ()  {

    $.ajax({
        type: "POST",
        url: "asset/json/frames.json",
        success: function(response) {
            $.ajax({
                type: "POST",
                url: "inc/ajax.php",
                // contentType: "application/json",
                dataType: "json",
                data: {
                    data:response
                },
                success: function (response) {
                    // console.log(response)
                    console.log('ajax1 ok')
                    $.each(response.data, function (i) {
                        console.log(response.data[i])
                        console.log('ajax1 ok')
                    })
                }
            })
        }
    })
})

$('.testsAjaxLogs').ready(function ()  {

    $.ajax({
        type: "POST",
        url: "asset/json/frames.json",
        success: function(response) {
            $.ajax({
                type: "POST",
                url: "inc/ajaxlogs.php",
                // contentType: "application/json",
                dataType: "json",
                data: {
                    data:response
                },
                success: function (response) {
                    // console.log(response)
                    console.log('ajax1 ok')
                    $.each(response.data, function (i) {
                        console.log(response.data[i])
                        console.log('ajax1 ok')
                    })
                }
            })
        }
    })
})