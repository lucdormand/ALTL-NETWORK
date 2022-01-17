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
                                'Timeout',
                                'OK'
                            ],
                            datasets: [{
                                label: 'Trame(s) échouée(s)',
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
                                'Disabled',
                                'Good'
                            ],
                            datasets: [{
                                label: 'Perte(s) d\'intégrité des données',
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

// NON TERMINE
// $(document).ready(function () {
//     $.ajax({
//         type: "POST",
//         url: "inc/ajaxdash5.php",
//         data: {
//             data: 'count'
//         },
//         dataType: "json",
//         success: function (date) {
//             console.log('ajaxD5 ok')
//             console.log(date)
//             $.each(date, function(i) {
//                 window["count_" + date[i]["date"].replace('-','_')]
//                 console.log("count_" + date[i]["date"].replace('-','_'))
//                 // window[i+date[i]["date"]]
//                 // console.log(i+' '+date[i]["date"])
//             });
//
//
//
//             const data = {
//                 labels: ['Jan', 'Fev', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'],
//                 datasets: [{
//                     label: 'My First Dataset',
//                     data: [count_2020_12, count_2020_12, count_2020_12, count_2020_12, count_2020_12, count_2020_12, count_2020_12],
//                     fill: false,
//                     borderColor: 'rgb(75, 192, 192)',
//                     tension: 0.1
//                 }]
//             };
//
//             const config = {
//                 type: 'bar',
//                 data: data,
//                 options: {
//                     responsive: true,
//                 }
//             };
//             const myChart = new Chart(
//                 document.querySelector('#graph4'),
//                 config
//             );
//
//         }
//     })
// })




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




