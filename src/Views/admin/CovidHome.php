<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/covid.css">
    <title>Covid</title>
</head>

<body>
    <div class="container">
        <div class="home__statistical-nav">
            <ul>
                <li>
                    <span>Tình hình dịch cả nước</span>
                </li>
            </ul>
        </div>

        <div class="home__juncture-flex">
            <div class="box-juncture" id="location">
                <div class="table-left">
                    <div class="row head"><span class="city">Tỉnh/TP</span><span class="total">Tổng số ca</span><span class="daynow">24 giờ qua</span><span class="die">Tử vong</span></div>
                    <div class="tbody">

                    </div>
                </div>

            </div>
            <div class="box-juncture">
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/highcharts-more.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                    <div id="container"></div>

                </figure>


            </div>
        </div>

    </div>

    <script>
        function formatted(n) {
            const numberFormatter = Intl.NumberFormat('en-US');
            const formatted = numberFormatter.format(n);
            return formatted.replace(",", ".");
        }
        $.ajax({
            url: "https://api.apify.com/v2/key-value-stores/EaCBL1JNntjR3EakU/records/LATEST?disableRedirect=true",
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                data.locations.forEach(element => {
                    let total = formatted(element.cases);
                    let casesToday = formatted(element.casesToday);
                    let death = formatted(element.death);

                    $(".tbody").append(`
                    <div class="row">
                        <span class="city">${element.name}</span>
                        <span class="total">${total}</span>
                        <span class="daynow red">+${casesToday}</span>
                        <span class="die">${death}</span>
                    </div>
                    `);
                });

                var dateArr = [];
                var casesArr = [];
                var avgCases7dArr = [];
                data.overview.forEach(element => {
                    dateArr.push(element.date);
                    casesArr.push(element.cases);
                    avgCases7dArr.push(element.avgCases7day);
                })


                Highcharts.chart('container', {
                    chart: {
                        zoomType: 'xy'
                    },
                    title: {
                        text: ''
                    },
                    xAxis: [{
                        categories: dateArr,
                    }],
                    yAxis: [{ // Primary yAxis
                        labels: {
                            format: '',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                        title: {
                            text: '',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        }
                    }, { // Secondary yAxis
                        title: {
                            text: '',
                            style: {
                                color: Highcharts.getOptions().colors[0]
                            }
                        },
                        labels: {
                            format: '{value}',
                            style: {
                                color: 'grey',
                            }
                        },
                        opposite: true
                    }],

                    tooltip: {
                        shared: true
                    },

                    series: [{
                        name: 'SỐ CA NHIỄM',
                        type: 'column',
                        yAxis: 1,
                        data: casesArr,
                        color: 'grey',
                        tooltip: {
                            pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: <b>{point.y} CA<br/></b> '
                        }
                    }, {
                        name: 'TRUNG BÌNH TRONG 7 NGÀY',
                        type: 'spline',
                        yAxis: 1,
                        data: avgCases7dArr,
                        color: 'red',
                        tooltip: {
                            pointFormat: '<br/>({series.name}: {point.y} CA)'
                        }
                    }, ]
                });

            }
        })
    </script>
    <script>


    </script>
</body>

</html>