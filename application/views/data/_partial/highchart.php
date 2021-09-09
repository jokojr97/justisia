
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script type="text/javascript">
    
// Radialize the colors
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});
</script>

<script type="text/javascript">

      chart = new Highcharts.Chart({
         chart: {
            renderTo: 'chart1',
            type: 'column'
         },
        credits: {
            enabled: false
        },   
        title: {
            text: 'Data Kekerasan Perempuan di <?= $kabupaten ?> Tahun <?= $tahun ?>'
        },
        xAxis: {
            type: 'category',
        },
        yAxis: {
            title: {
                text: 'Justisia Institute'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f} Kasus</b><br/>'
        },

        series: [
            {
                name: "<?= $genders[0]['kat'] ?>",
                colorByPoint: true,
                data: [  
                <?php
                for ($j=0;$j<6;$j++) {
                ?>
                {
                    name: "<?= $genders[$j]['kat'] ?>",
                    y: <?= $genders[$j]['jum'] ?>,
                    // color: "#ff4a1a",
                },

                <?php } ?>              
                ]
            }
        ],
        exporting: {
            sourceWidth: 1000,
            sourceHeight: 500,
            // scale: 2 (default)
            chartOptions: {
                subtitle: null
            }
        },
        });
</script>

<?php  
for ($i=0; $i < 7 ; $i++) { 
?>
<script type="text/javascript">
  chart<?= $i+2 ?> = new Highcharts.Chart({
     chart: {
        renderTo: 'chart<?= $i+2 ?>',
        type: 'column'
     },
    credits: {
        enabled: false
    },   
    title: {
        text: '<?= $genders[$i]['kat'] ?> di <?= $kabupaten ?> Tahun <?= $tahun ?>'
    },
    xAxis: {
        type: 'category',
    },
    yAxis: {
        title: {
            text: 'Justisia Institute'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f} Kasus</b><br/>'
    },

    series: [
        {
            name: "<?= $genders[$i]['kat'] ?>",
            colorByPoint: true,
            dataSorting: {
                enabled: true,
                sortKey: 'y'
            },
            data: [                
                { name: 'Fisik', y: <?= $genders[$i]['fisik'] ?>},
                { name: 'Psikis', y: <?= $genders[$i]['psikis'] ?>},
                { name: 'Penelantaran', y: <?= $genders[$i]['penelantaran'] ?>},
                { name: 'Pemerkosaan', y: <?= $genders[$i]['pemerkosaan'] ?>},
                { name: 'Persetubuhan', y: <?= $genders[$i]['persetubuhan'] ?>},
                { name: 'pencabulan', y: <?= $genders[$i]['pencabulan'] ?>},
                { name: 'Melahirkan anak di bawah umur', y: <?= $genders[$i]['melahirkan_anak_di_bawah_umur'] ?>},
                { name: 'Kenakalan', y: <?= $genders[$i]['kenakalan'] ?>},
                { name: 'Pekerja anak', y: <?= $genders[$i]['pekerja_anak'] ?>},
                { name: 'Hak asuh anak', y: <?= $genders[$i]['hak_asuh_anak'] ?>},
                { name: 'Lain-Lain', y: <?= $genders[$i]['lain_lain'] ?>},
            ]
        }
    ],
    exporting: {
        sourceWidth: 1000,
        sourceHeight: 500,
        // scale: 2 (default)
        chartOptions: {
            subtitle: null
        }
    },
    });
</script>
<?php } ?>