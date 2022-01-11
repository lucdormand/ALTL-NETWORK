console.log('oui')
$(window).on('load',function() {
    $('.flexslider').flexslider({
        animation:"slide"
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
        type: 'bar',
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