console.log('oui')
$(window).on('load',function() {
    $('.flexslider').flexslider({
        animation:"slide",
        slideshow: true,
        slideshowSpeed: 7000,
        controlNav: false,
    });
})
VANTA.NET({
    el: "#js_bg",
    mouseControls: true,
    touchControls: true,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    scale: 1.00,
    scaleMobile: 1.00,
    color: 0x3fff6c,
    backgroundColor: 0x0,
    maxDistance: 28.00,
    spacing: 20.00
})

VANTA.GLOBE({
    el: "#js_bg2",
    mouseControls: true,
    touchControls: true,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    scale: 1.00,
    scaleMobile: 1.00,
    color: 0x3fff60,
    backgroundColor: 0x0
})
VANTA.GLOBE({
    el: "#js_bg3",
    mouseControls: true,
    touchControls: true,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    scale: 1.00,
    scaleMobile: 1.00,
    color: 0x3fff60,
    backgroundColor: 0x0
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
sr.reveal('.box1',{
    origin: 'left',
    duration: 2500,
    distance: '100%',
});
sr.reveal('.box2',{
    origin: 'right',
    duration: 2500,
    distance: '100%',
});
sr.reveal('.box3',{
    origin: 'bottom',
    duration: 2500,
    distance: '100%',
});




//CHARTS and BUTTONS
if (window.location.href.includes("dashboard") || window.location.href.includes("ip"))  {
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "inc/ajax2.php?request=protocol",
            data: {
                data: 'count'
            },
            dataType: "json",
            success: function (total_count) {
                console.log(window.location.href)
                console.log('ajaxD ok')
                console.log(total_count)

                //TROUVE LE NOMBRE DE TRAMES DE CHAQUE TYPE

                $.each(total_count, function(i) {
                    window["count_" + total_count[i]["protocol_name"].replace('.','')] = total_count[i]["COUNT(*)"]

                    console.log("count_" + total_count[i]["protocol_name"].replace('.',''))
                });
                if (typeof count_ICMP === 'undefined') {
                    count_ICMP = 0
                }
                if (typeof count_UDP === 'undefined') {
                    count_UDP = 0
                }
                if (typeof count_TCP === 'undefined') {
                    count_TCP = 0
                }
                if (typeof count_TLSv12 === 'undefined') {
                    count_TLSv12 = 0
                }

                var total_trames = 0

                //TROUVE LE TOTAL DES TRAMES POUR POURCENTAGES
                $.each(total_count, function(i) {
                    total_trames = total_trames + parseInt(total_count[i]["COUNT(*)"])
                    console.log(total_trames)
                });

                const data = {
                    labels: [
                        'ICMP',
                        'UDP',
                        'TCP',
                        'TLSv1.2'
                    ],
                    datasets: [{
                        label: 'Total des trames',
                        data: [count_ICMP, count_UDP, count_TCP, count_TLSv12],
                        backgroundColor: [
                            'rgb(181,242,149)',
                            'rgb(169,250,236)',
                            'rgb(190,169,250)',
                            'rgb(243,129,15)'
                        ]
                    }]
                };


                function hoverLegend(){

                }

                const config = {
                    type: 'polarArea',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Les Protocoles',
                                font: {
                                    size: 20,
                                    family: 'Arvo',
                                },
                            },
                            legend: {
                                display: true,
                                onHover: hoverLegend,
                                labels: {
                                    font: {
                                        size: 10,
                                        family: 'Poppins',
                                        weight: 700
                                    }
                                }
                            }
                        }
                    }
                };
                const myChart = new Chart(
                    document.querySelector('#graph1'),
                    config
                );

                const dataP = {
                    labels: [
                        'ICMP',
                        'UDP',
                        'TCP',
                        'TLSv1.2'
                    ],
                    datasets: [{
                        label: 'Total des trames',
                        data: [Math.round(count_ICMP*100/total_trames), Math.round(count_UDP*100/total_trames), Math.round(count_TCP*100/total_trames), Math.round(count_TLSv12*100/total_trames)],
                        backgroundColor: [
                            'rgb(181,242,149)',
                            'rgb(169,250,236)',
                            'rgb(190,169,250)',
                            'rgb(243,129,15)'
                        ]
                    }]
                };


                function hoverLegend(){

                }

                const configP = {
                    type: 'pie',
                    data: dataP,
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Les Protocoles (en pourcentages)',
                                font: {
                                    size: 20,
                                    family: 'Arvo',
                                },
                            },

                            legend: {
                                display: true,
                                onHover: hoverLegend,
                                labels: {
                                    font: {
                                        size: 10,
                                        family: 'Poppins',
                                        weight: 700
                                    }
                                }
                            }
                        }
                    }
                };
                const myChartP = new Chart(
                    document.querySelector('#graph1P'),
                    configP
                );

            }
        })
    })

    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "inc/ajax2.php?request=timeout",
            data: {
                data: 'count'
            },
            dataType: "json",
            success: function (count_timeout) {
                console.log('ajaxD2 ok')
                console.log(parseInt(count_timeout[0]['COUNT(*)']));

                $.ajax({
                    type: "POST",
                    url: "inc/ajax2.php?request=count_total",
                    data: {
                        data: 'count'
                    },
                    dataType: "json",
                    success: function (count_total) {
                        console.log('ajaxD3 ok')
                        console.log(count_total)

                        const dif = ([count_total[0]["COUNT(*)"]] - [count_timeout[0]["COUNT(*)"]]);
                        const a = parseInt(count_timeout[0]['COUNT(*)']);
                        const data = {
                            labels: [
                                'Echouée',
                                'Succès'
                            ],
                            datasets: [{
                                label: 'Taux de requête',
                                data: [a, dif],
                                backgroundColor: [
                                    'rgb(186,13,50)',
                                    'rgb(181,242,149)',
                                ]
                            }]
                        };

                        const config = {
                            type: 'bar',
                            data: data,
                            options: {
                                responsive: true,
                                plugins: {
                                    title: {
                                        display: true,
                                        text: 'Taux de requêtes échouées',
                                        font: {
                                            size: 20,
                                            family: 'Arvo',
                                        },
                                    },
                                    legend: {
                                        display: true,
                                        labels: {
                                            font: {
                                                size: 10,
                                                family: 'Poppins',
                                                weight: 700
                                            }
                                        }
                                    }
                                }

                            }
                        };
                        const myChart = new Chart(
                            document.querySelector('#graph2'),
                            config
                        );

                    }
                })
            }
        })
    })

    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "inc/ajax2.php?request=protocol_checksum",
            data: {
                data: 'count'
            },
            dataType: "json",
            success: function (count_protocol_checksum_status) {
                console.log('ajaxD4 ok')
                console.log(count_protocol_checksum_status[0])

                $.ajax({
                    type: "POST",
                    url: "inc/ajax2.php?request=count_total",
                    data: {
                        data: 'count'
                    },
                    dataType: "json",
                    success: function (count_total) {
                        console.log('ajaxD3 ok')
                        console.log(count_total)

                        const dif = ([count_total[0]["COUNT(*)"]] - [count_protocol_checksum_status[0]["COUNT(*)"]]);
                        const a = parseInt(count_protocol_checksum_status[0]['COUNT(*)'])
                        const data = {
                            labels: [
                                'Désactivé',
                                'Activé'
                            ],
                            datasets: [{
                                label: 'Status sur l\'intégrité des données',
                                data: [a, dif],
                                backgroundColor: [
                                    'rgb(186,13,50)',
                                    'rgb(181,242,149)',
                                ]
                            }]
                        };

                        const config = {
                            type: 'bar',
                            data: data,
                            options: {
                                responsive: true,
                                plugins: {
                                    title: {
                                        display: true,
                                        text: 'Taux d\'intégrité des données',
                                        font: {
                                            size: 20,
                                            family: 'Arvo',
                                        },
                                    },
                                    legend: {
                                        display: true,
                                        labels: {
                                            font: {
                                                size: 10,
                                                family: 'Poppins',
                                                weight: 700
                                            }
                                        }
                                    }
                                }

                            }
                        };
                        const myChart = new Chart(
                            document.querySelector('#graph3'),
                            config
                        );

                    }
                })
            }
        })
    })
    let percentage = 0
    $(".dashboardBtn").click(function () {
        console.log('ok')
        $(".graph1Nb").toggle()
        $(".graph1Percent").toggle()
        if (percentage == 0) {
            $(".dashboardBtn p").html("Voir en nombres absolus")
            percentage = 1
        } else {
            $(".dashboardBtn p").html("Voir en pourcentages")
            percentage = 0
        }

    })
    let ip_details = 0
    $(".ipBtn").click(function () {
        $(".ip_table").toggle()
        $(".details_table").toggle()
        if (ip_details == 0) {
            $(".ipBtn p").html("Masquer les détails")
            ip_details = 1
        } else {
            $(".ipBtn p").html("Afficher les détails")
            ip_details = 0
        }

    })

}





$(function() {
    var words = [
            'CHEZ ALTL NETWORK',
            'VOTRE SECURITÉ EST NOTRE PRIORITÉ',
            'NOUS SOMMES DISPONIBLES 24H/24',

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


if (window.location.href.includes("add")) {
    $.ajax({
        type: "POST",
        url: "asset/json/frames.json",
        success: function(response) {
            $.ajax({
                type: "POST",
                url: "inc/ajax.php",
                // contentType: "application/json",
                // dataType: "json",
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
                    location.href = "dashboard.php"
                }
            })
        }
    })
}

if (window.location.href.includes("update")) {
    $.ajax({
        type: "POST",
        url: "asset/json/frames.json",
        success: function(response) {
            $.ajax({
                type: "POST",
                url: "inc/ajax.php?action=update",
                // contentType: "application/json",
                // dataType: "json",
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
                    location.href = "dashboard.php"
                }
            })
        }
    })
}

$(document).ready(function () {

    $("#btnDetailTrame").click('on', function (e) {
        e.preventDefault();
        if (window.location.href == 'http://localhost/projets/projet-reseau/logs.php') {
            alert('Veuillez sélectionner une trame en dessous pour voir les détails de cette dernière.')
        } else if (window.location.href == 'http://localhost/projets/projet-reseau/dashboard.php') {
            alert('Vous n\'êtes pas sur la page des logs')
        }
    });
    $("#btnDetailProtocol").click('on', function (e) {
        e.preventDefault();
        if (window.location.href == 'http://localhost/projets/projet-reseau/logs.php') {
            alert('Veuillez sélectionner un protocol en dessous pour voir les détails de cette dernière.')
        } else if (window.location.href == 'http://localhost/projets/projet-reseau/dashboard.php') {
            alert('Vous n\'êtes pas sur la page des logs')
        }
    });
});

//Burger menu
let burgerMenuOpen = 0
$('.headerBurger').click(function () {
    if (burgerMenuOpen == 0) {
        $('.burgerMenu').fadeIn(200)
        burgerMenuOpen = 1
    } else {
        $('.burgerMenu').fadeOut(200)
        burgerMenuOpen = 0
    }


    console.log('click')
})

//Dashboard menu
let dashMenuOpen = 0
$('.detailsBtn').click(function () {
    console.log('click')
    if (dashMenuOpen == 0) {
        $('#dashboard_home ul').fadeIn(200)
        dashMenuOpen = 1
    } else {
        $('#dashboard_home ul').fadeOut(200)
        dashMenuOpen = 0
    }
    console.log('click')
})

let logsMenuOpen = 0
$('.detailsBtn').click(function () {
    console.log('click')
    if (logsMenuOpen == 0) {
        $('.protocols').fadeIn(200)
        logsMenuOpen = 1
    } else {
        $('.protocols').fadeOut(200)
        logsMenuOpen = 0
    }
    console.log('click')
})
let tramesMenuOpen = 0

$('.detailsBtn').click(function () {
    console.log('click')
    if (tramesMenuOpen == 0) {
        $('.protocols').fadeIn(200)
        tramesMenuOpen = 1
    } else {
        $('.protocols').fadeOut(200)
        tramesMenuOpen = 0
    }
    console.log('click')
})
var $window = $(window);
function checkWidth() {
    var windowsize = $window.width();
    if (windowsize > 680) {
        if (tramesMenuOpen == 0) {
            $('.protocols').fadeIn(10)
            if( $(".protocols").css('display') == 'block') {
                $('.protocols').css("display", "flex")
            }
            tramesMenuOpen = 1
        }
        if (logsMenuOpen == 0) {
            $('.protocols').fadeIn(10)
            if( $(".protocols").css('display') == 'block') {
                $('.protocols').css("display", "flex")
            }
            logsMenuOpen = 1
        }
        if (dashMenuOpen == 0) {
            $('.protocols').fadeIn(10)
            if( $(".protocols").css('display') == 'block') {
                $('.protocols').css("display", "flex")
            }
            dashMenuOpen = 1
        }
        tramesMenuOpen = 1
        logsMenuOpen = 1
        dashMenuOpen = 1
        console.log('screen')
        } else {
        tramesMenuOpen = 0;
        console.log('small')

        if (tramesMenuOpen == 1) {
            $('.protocols').fadeOut(10)
            tramesMenuOpen = 0
            if( $(".protocols").css('display') == 'flex') {
                $('.protocols').css("display", "block")
            }

        }
        if (logsMenuOpen == 1) {
            $('.protocols').fadeOut(10)
            logsMenuOpen = 0
            if( $(".protocols").css('display') == 'flex') {
                $('.protocols').css("display", "block")
            }
        }
        if (dashMenuOpen == 1) {
            $('.protocols').fadeOut(10)
            dashMenuOpen = 0
            if( $(".protocols").css('display') == 'flex') {
                $('.protocols').css("display", "block")
            }
        }
    }
    }


$(window).resize(checkWidth);
if (localStorage.getItem('cookiesAcceptedALTL') === null) {
    console.log('vide');
    $('.cookiesBox').show();
    $('.cookiesBox').css('display','flex')
    $('.cookiesBox .accept').on('click', function () {
        localStorage.setItem('cookiesAcceptedALTL', 'on')
        $('.cookiesBox').fadeOut(150);
    })
    $('.cookiesBox .refuse').on('click', function () {
        localStorage.setItem('cookiesAcceptedALTL', 'off')
        $('.cookiesBox').fadeOut(150);
    })
} else {
    console.log(localStorage.getItem('cookiesAcceptedALTL'))
}

