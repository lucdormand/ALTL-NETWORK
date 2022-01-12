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




//CHARTS
if (window.location.href.includes("dashboard") || window.location.href.includes("add"))  {
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "inc/ajaxdash.php",
        data: {
            data: 'count'
        },
        dataType: "json",
        success: function (total_count) {
            console.log(window.location.href)
            console.log('ajaxD ok')
            console.log(total_count)
            $.each(total_count, function(i) {
                window["count_" + total_count[i]["protocol_name"].replace('.','')] = total_count[i]["COUNT(*)"]
                console.log("count_" + total_count[i]["protocol_name"].replace('.',''))
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

        }
    })
})

$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "inc/ajaxdash2.php",
        data: {
            data: 'count'
        },
        dataType: "json",
        success: function (count_timeout) {
            console.log('ajaxD2 ok')
            console.log(count_timeout[0])

            $.ajax({
                type: "POST",
                url: "inc/ajaxdash3.php",
                data: {
                    data: 'count'
                },
                dataType: "json",
                success: function (count_total) {
                    console.log('ajaxD3 ok')
                    console.log(count_total)

                    const data = {
                        labels: [
                            'Timeout',
                            'OK'
                        ],
                        datasets: [{
                            label: 'Trame(s) échouée(s)',
                            data: [[count_timeout[0]["COUNT(*)"]], [count_total[0]["COUNT(*)"]]],
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
        url: "inc/ajaxdash4.php",
        data: {
            data: 'count'
        },
        dataType: "json",
        success: function (count_protocol_checksum_status) {
            console.log('ajaxD4 ok')
            console.log(count_protocol_checksum_status[0])

            $.ajax({
                type: "POST",
                url: "inc/ajaxdash3.php",
                data: {
                    data: 'count'
                },
                dataType: "json",
                success: function (count_total) {
                    console.log('ajaxD3 ok')
                    console.log(count_total)

                    const data = {
                        labels: [
                            'Disabled',
                            'Good'
                        ],
                        datasets: [{
                            label: 'Perte(s) d\'intégrité des données',
                            data: [[count_protocol_checksum_status[0]["COUNT(*)"]], [count_total[0]["COUNT(*)"]]],
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
})}

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





