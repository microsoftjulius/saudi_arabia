'use strict';
$(document).ready(function() {
    setTimeout(function() {
        floatchart()
    }, 700);
    $(window).on('resize', function() {
        floatchart();
    });
    $('#mobile-collapse').on('click', function() {
        setTimeout(function() {
            floatchart();
        }, 700);
    });
});

function floatchart() {
    // [ average11-chart ] start

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("average-chart11", am4charts.XYChart);
    // Add data
    chart.data = [{
        "date": "2018-01-1",
        "price": 180
    }, {
        "date": "2018-01-2",
        "price": 252
    }, {
        "date": "2018-01-3",
        "price": 185
    }, {
        "date": "2018-01-4",
        "price": 189
    }, {
        "date": "2018-01-5",
        "price": 158
    }, {
        "date": "2018-01-6",
        "price": 200
    }, {
        "date": "2018-01-7",
        "price": 187
    }, {
        "date": "2018-01-8",
        "price": 180
    }, {
        "date": "2018-01-9",
        "price": 252
    }, {
        "date": "2018-01-10",
        "price": 185
    }, {
        "date": "2018-01-11",
        "price": 268
    }, {
        "date": "2018-01-12",
        "price": 158
    }, {
        "date": "2018-01-13",
        "price": 200
    }, {
        "date": "2018-01-14",
        "price": 187
    }, {
        "date": "2018-01-15",
        "price": 180
    }, {
        "date": "2018-01-16",
        "price": 252
    }, {
        "date": "2018-01-17",
        "price": 185
    }, {
        "date": "2018-01-18",
        "price": 250
    }, {
        "date": "2018-01-19",
        "price": 158
    }, {
        "date": "2018-01-20",
        "price": 200
    }, {
        "date": "2018-01-21",
        "price": 187
    }, {
        "date": "2018-01-22",
        "price": 180
    }, {
        "date": "2018-01-23",
        "price": 252
    }, {
        "date": "2018-01-24",
        "price": 185
    }, {
        "date": "2018-01-25",
        "price": 295
    }, {
        "date": "2018-01-26",
        "price": 158
    }, {
        "date": "2018-01-27",
        "price": 200
    }, {
        "date": "2018-01-28",
        "price": 90
    }];

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0;
    dateAxis.renderer.grid.template.disabled = true;
    dateAxis.startLocation = 0.6;
    dateAxis.endLocation = 0.4;
    dateAxis.renderer.labels.template.disabled = true;
    dateAxis.renderer.inside = true;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.logarithmic = true;
    valueAxis.renderer.minGridDistance = 0;
    valueAxis.renderer.grid.template.disabled = true;
    valueAxis.renderer.inside = true;
    valueAxis.renderer.labels.template.disabled = true;

    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "price";
    series.dataFields.dateX = "date";
    series.strokeWidth = 3;
    series.tooltipText = "{valueY.value}";
    series.stroke = am4core.color("#4680ff");
    series.strokeWidth = 3;
    series.fillOpacity = 1;
    var gradient = new am4core.LinearGradient();
    gradient.addColor(am4core.color("#4680ff"), 0.2);
    gradient.addColor(am4core.color("#4680ff"), 0);
    gradient.rotation = 90;
    series.fill = gradient;

    // Add cursor
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.fullWidthLineX = true;
    chart.cursor.lineX.strokeWidth = 0;
    chart.cursor.lineX.fill = am4core.color("#fff");
    chart.cursor.lineX.fillOpacity = 0;
    chart.padding(0, 0, 0, 0);

    // [ average11-chart ] end

    // [ average12-chart ] start

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("average-chart12", am4charts.XYChart);
    // Add data
    chart.data = [{
        "date": "2018-01-1",
        "price": 180
    }, {
        "date": "2018-01-2",
        "price": 252
    }, {
        "date": "2018-01-3",
        "price": 185
    }, {
        "date": "2018-01-4",
        "price": 189
    }, {
        "date": "2018-01-5",
        "price": 158
    }, {
        "date": "2018-01-6",
        "price": 200
    }, {
        "date": "2018-01-7",
        "price": 187
    }, {
        "date": "2018-01-8",
        "price": 180
    }, {
        "date": "2018-01-9",
        "price": 252
    }, {
        "date": "2018-01-10",
        "price": 185
    }, {
        "date": "2018-01-11",
        "price": 268
    }, {
        "date": "2018-01-12",
        "price": 158
    }, {
        "date": "2018-01-13",
        "price": 200
    }, {
        "date": "2018-01-14",
        "price": 187
    }, {
        "date": "2018-01-15",
        "price": 180
    }, {
        "date": "2018-01-16",
        "price": 252
    }, {
        "date": "2018-01-17",
        "price": 185
    }, {
        "date": "2018-01-18",
        "price": 250
    }, {
        "date": "2018-01-19",
        "price": 158
    }, {
        "date": "2018-01-20",
        "price": 200
    }, {
        "date": "2018-01-21",
        "price": 187
    }, {
        "date": "2018-01-22",
        "price": 180
    }, {
        "date": "2018-01-23",
        "price": 252
    }, {
        "date": "2018-01-24",
        "price": 185
    }, {
        "date": "2018-01-25",
        "price": 295
    }, {
        "date": "2018-01-26",
        "price": 158
    }, {
        "date": "2018-01-27",
        "price": 200
    }, {
        "date": "2018-01-28",
        "price": 90
    }];

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0;
    dateAxis.renderer.grid.template.disabled = true;
    dateAxis.startLocation = 0.6;
    dateAxis.endLocation = 0.4;
    dateAxis.renderer.labels.template.disabled = true;
    dateAxis.renderer.inside = true;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.logarithmic = true;
    valueAxis.renderer.minGridDistance = 0;
    valueAxis.renderer.grid.template.disabled = true;
    valueAxis.renderer.inside = true;
    valueAxis.renderer.labels.template.disabled = true;

    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "price";
    series.dataFields.dateX = "date";
    series.strokeWidth = 3;
    series.tooltipText = "{valueY.value}";
    series.stroke = am4core.color("#11c15b");
    series.strokeWidth = 3;
    series.fillOpacity = 1;
    var gradient = new am4core.LinearGradient();
    gradient.addColor(am4core.color("#11c15b"), 0.2);
    gradient.addColor(am4core.color("#11c15b"), 0);
    gradient.rotation = 90;
    series.fill = gradient;

    // Add cursor
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.fullWidthLineX = true;
    chart.cursor.lineX.strokeWidth = 0;
    chart.cursor.lineX.fill = am4core.color("#fff");
    chart.cursor.lineX.fillOpacity = 0;
    chart.padding(0, 0, 0, 0);

    // [ average12-chart ] end

    // [ average13-chart ] start

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("average-chart13", am4charts.XYChart);
    // Add data
    chart.data = [{
        "date": "2018-01-1",
        "price": 180
    }, {
        "date": "2018-01-2",
        "price": 252
    }, {
        "date": "2018-01-3",
        "price": 185
    }, {
        "date": "2018-01-4",
        "price": 189
    }, {
        "date": "2018-01-5",
        "price": 158
    }, {
        "date": "2018-01-6",
        "price": 200
    }, {
        "date": "2018-01-7",
        "price": 187
    }, {
        "date": "2018-01-8",
        "price": 180
    }, {
        "date": "2018-01-9",
        "price": 252
    }, {
        "date": "2018-01-10",
        "price": 185
    }, {
        "date": "2018-01-11",
        "price": 268
    }, {
        "date": "2018-01-12",
        "price": 158
    }, {
        "date": "2018-01-13",
        "price": 200
    }, {
        "date": "2018-01-14",
        "price": 187
    }, {
        "date": "2018-01-15",
        "price": 180
    }, {
        "date": "2018-01-16",
        "price": 252
    }, {
        "date": "2018-01-17",
        "price": 185
    }, {
        "date": "2018-01-18",
        "price": 250
    }, {
        "date": "2018-01-19",
        "price": 158
    }, {
        "date": "2018-01-20",
        "price": 200
    }, {
        "date": "2018-01-21",
        "price": 187
    }, {
        "date": "2018-01-22",
        "price": 180
    }, {
        "date": "2018-01-23",
        "price": 252
    }, {
        "date": "2018-01-24",
        "price": 185
    }, {
        "date": "2018-01-25",
        "price": 295
    }, {
        "date": "2018-01-26",
        "price": 158
    }, {
        "date": "2018-01-27",
        "price": 200
    }, {
        "date": "2018-01-28",
        "price": 90
    }];

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0;
    dateAxis.renderer.grid.template.disabled = true;
    dateAxis.startLocation = 0.6;
    dateAxis.endLocation = 0.4;
    dateAxis.renderer.labels.template.disabled = true;
    dateAxis.renderer.inside = true;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.logarithmic = true;
    valueAxis.renderer.minGridDistance = 0;
    valueAxis.renderer.grid.template.disabled = true;
    valueAxis.renderer.inside = true;
    valueAxis.renderer.labels.template.disabled = true;

    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "price";
    series.dataFields.dateX = "date";
    series.strokeWidth = 3;
    series.tooltipText = "{valueY.value}";
    series.stroke = am4core.color("#ff5252");
    series.strokeWidth = 3;
    series.fillOpacity = 1;
    var gradient = new am4core.LinearGradient();
    gradient.addColor(am4core.color("#ff5252"), 0.2);
    gradient.addColor(am4core.color("#ff5252"), 0);
    gradient.rotation = 90;
    series.fill = gradient;

    // Add cursor
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.fullWidthLineX = true;
    chart.cursor.lineX.strokeWidth = 0;
    chart.cursor.lineX.fill = am4core.color("#fff");
    chart.cursor.lineX.fillOpacity = 0;
    chart.padding(0, 0, 0, 0);

    // [ average13-chart ] end

    // [ average14-chart ] start

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("average-chart14", am4charts.XYChart);
    // Add data
    chart.data = [{
        "date": "2018-01-1",
        "price": 180
    }, {
        "date": "2018-01-2",
        "price": 252
    }, {
        "date": "2018-01-3",
        "price": 185
    }, {
        "date": "2018-01-4",
        "price": 189
    }, {
        "date": "2018-01-5",
        "price": 158
    }, {
        "date": "2018-01-6",
        "price": 200
    }, {
        "date": "2018-01-7",
        "price": 187
    }, {
        "date": "2018-01-8",
        "price": 180
    }, {
        "date": "2018-01-9",
        "price": 252
    }, {
        "date": "2018-01-10",
        "price": 185
    }, {
        "date": "2018-01-11",
        "price": 268
    }, {
        "date": "2018-01-12",
        "price": 158
    }, {
        "date": "2018-01-13",
        "price": 200
    }, {
        "date": "2018-01-14",
        "price": 187
    }, {
        "date": "2018-01-15",
        "price": 180
    }, {
        "date": "2018-01-16",
        "price": 252
    }, {
        "date": "2018-01-17",
        "price": 185
    }, {
        "date": "2018-01-18",
        "price": 250
    }, {
        "date": "2018-01-19",
        "price": 158
    }, {
        "date": "2018-01-20",
        "price": 200
    }, {
        "date": "2018-01-21",
        "price": 187
    }, {
        "date": "2018-01-22",
        "price": 180
    }, {
        "date": "2018-01-23",
        "price": 252
    }, {
        "date": "2018-01-24",
        "price": 185
    }, {
        "date": "2018-01-25",
        "price": 295
    }, {
        "date": "2018-01-26",
        "price": 158
    }, {
        "date": "2018-01-27",
        "price": 200
    }, {
        "date": "2018-01-28",
        "price": 90
    }];

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0;
    dateAxis.renderer.grid.template.disabled = true;
    dateAxis.startLocation = 0.6;
    dateAxis.endLocation = 0.4;
    dateAxis.renderer.labels.template.disabled = true;
    dateAxis.renderer.inside = true;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.logarithmic = true;
    valueAxis.renderer.minGridDistance = 0;
    valueAxis.renderer.grid.template.disabled = true;
    valueAxis.renderer.inside = true;
    valueAxis.renderer.labels.template.disabled = true;

    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "price";
    series.dataFields.dateX = "date";
    series.strokeWidth = 3;
    series.tooltipText = "{valueY.value}";
    series.stroke = am4core.color("#FF9800");
    series.strokeWidth = 3;
    series.fillOpacity = 1;
    var gradient = new am4core.LinearGradient();
    gradient.addColor(am4core.color("#FF9800"), 0.2);
    gradient.addColor(am4core.color("#FF9800"), 0);
    gradient.rotation = 90;
    series.fill = gradient;

    // Add cursor
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.fullWidthLineX = true;
    chart.cursor.lineX.strokeWidth = 0;
    chart.cursor.lineX.fill = am4core.color("#fff");
    chart.cursor.lineX.fillOpacity = 0;
    chart.padding(0, 0, 0, 0);

    // [ average14-chart ] end



    // [ revenue-scroll ] start
    var px = new PerfectScrollbar('.revenue-scroll', {
        wheelSpeed: .5,
        swipeEasing: 0,
        wheelPropagation: 1,
        minScrollbarLength: 40,
    });
    // [ revenue-scroll ] end

    // [ real1-chart ] start

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("real1-chart", am4charts.XYChart);
    // Add data
    var data = [];
    var visits = 10;
    var i = 0;

    for (i = 0; i <= 30; i++) {
        visits -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
        visits = (visits > -5 && visits < 5) ? visits : 0;
        visits = (visits < 0) ? 0 : visits;
        chart.data.push({
            date: new Date().setSeconds(i - 30),
            value: visits
        });
    }

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0;
    dateAxis.renderer.grid.template.disabled = true;
    dateAxis.startLocation = 0.6;
    dateAxis.endLocation = 0.4;
    dateAxis.renderer.labels.template.disabled = true;
    dateAxis.renderer.inside = true;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.logarithmic = false;
    valueAxis.renderer.minGridDistance = 1;
    valueAxis.renderer.grid.template.disabled = true;
    valueAxis.renderer.inside = true;
    valueAxis.renderer.labels.template.disabled = true;

    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "value";
    series.dataFields.dateX = "date";
    series.strokeWidth = 2;
    series.tooltipText = "{valueY.value}";
    series.fill = am4core.color("#ff5252");
    series.stroke = am4core.color("#ff5252");
    chart.padding(0, 0, 0, 0);

    // [ real1-chart ] end

    // [ real2-chart ] start

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("real2-chart", am4charts.XYChart);
    // Add data
    var data = [];
    var visits = 10;
    var i = 0;

    for (i = 0; i <= 30; i++) {
        visits -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
        visits = (visits > -5 && visits < 5) ? visits : 0;
        visits = (visits < 0) ? 0 : visits;
        chart.data.push({
            date: new Date().setSeconds(i - 30),
            value: visits
        });
    }

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0;
    dateAxis.renderer.grid.template.disabled = true;
    dateAxis.startLocation = 0.6;
    dateAxis.endLocation = 0.4;
    dateAxis.renderer.labels.template.disabled = true;
    dateAxis.renderer.inside = true;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.logarithmic = false;
    valueAxis.renderer.minGridDistance = 1;
    valueAxis.renderer.grid.template.disabled = true;
    valueAxis.renderer.inside = true;
    valueAxis.renderer.labels.template.disabled = true;

    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "value";
    series.dataFields.dateX = "date";
    series.strokeWidth = 2;
    series.tooltipText = "{valueY.value}";
    series.fill = am4core.color("#4680ff");
    series.stroke = am4core.color("#4680ff");
    chart.padding(0, 0, 0, 0);

    // [ real2-chart ] end

    // [ real3-chart ] start

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("real3-chart", am4charts.XYChart);
    // Add data
    var data = [];
    var visits = 10;
    var i = 0;

    for (i = 0; i <= 30; i++) {
        visits -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
        visits = (visits > -5 && visits < 5) ? visits : 0;
        visits = (visits < 0) ? 0 : visits;
        chart.data.push({
            date: new Date().setSeconds(i - 30),
            value: visits
        });
    }

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0;
    dateAxis.renderer.grid.template.disabled = true;
    dateAxis.startLocation = 0.6;
    dateAxis.endLocation = 0.4;
    dateAxis.renderer.labels.template.disabled = true;
    dateAxis.renderer.inside = true;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.logarithmic = false;
    valueAxis.renderer.minGridDistance = 1;
    valueAxis.renderer.grid.template.disabled = true;
    valueAxis.renderer.inside = true;
    valueAxis.renderer.labels.template.disabled = true;

    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "value";
    series.dataFields.dateX = "date";
    series.strokeWidth = 2;
    series.tooltipText = "{valueY.value}";
    series.fill = am4core.color("#11c15b");
    series.stroke = am4core.color("#11c15b");
    chart.padding(0, 0, 0, 0);

    // [ real3-chart ] end

    // [ real4-chart ] start

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("real4-chart", am4charts.XYChart);
    // Add data
    var data = [];
    var visits = 10;
    var i = 0;

    for (i = 0; i <= 30; i++) {
        visits -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
        visits = (visits > -5 && visits < 5) ? visits : 0;
        visits = (visits < 0) ? 0 : visits;
        chart.data.push({
            date: new Date().setSeconds(i - 30),
            value: visits
        });
    }

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0;
    dateAxis.renderer.grid.template.disabled = true;
    dateAxis.startLocation = 0.6;
    dateAxis.endLocation = 0.4;
    dateAxis.renderer.labels.template.disabled = true;
    dateAxis.renderer.inside = true;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.logarithmic = false;
    valueAxis.renderer.minGridDistance = 1;
    valueAxis.renderer.grid.template.disabled = true;
    valueAxis.renderer.inside = true;
    valueAxis.renderer.labels.template.disabled = true;

    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "value";
    series.dataFields.dateX = "date";
    series.strokeWidth = 2;
    series.tooltipText = "{valueY.value}";
    series.fill = am4core.color("#FF9800");
    series.stroke = am4core.color("#FF9800");
    chart.padding(0, 0, 0, 0);

    // [ real4-chart ] end

    // [ subject-scroll ] start
    var px = new PerfectScrollbar('.subject-scroll', {
        wheelSpeed: .5,
        swipeEasing: 0,
        wheelPropagation: 1,
        minScrollbarLength: 40,
    });
    // [ subject-scroll ] end
    cryptochart()
}

function cryptochart() {
    // [ crypto-chart ] start

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("crypto-chart", am4charts.XYChart);

    // Add data
    var databtc = [];
    var dataeth = [];
    var dataltc = [];
    var visits = 10;
    var i = 0;

    for (i = 0; i <= 80; i++) {
        visits -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
        databtc.push({
            date: new Date().setSeconds(i - 30),
            value: Math.abs(visits)
        });
    }

    chart.addData(databtc);
    chart.invalidateRawData();

    for (i = 0; i <= 80; i++) {
        visits -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
        dataeth.push({
            date: new Date().setSeconds(i - 30),
            value: Math.abs(visits)
        });
    }

    for (i = 0; i <= 80; i++) {
        visits -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
        dataltc.push({
            date: new Date().setSeconds(i - 30),
            value: Math.abs(visits)
        });
    }

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0;
    dateAxis.startLocation = 0.6;
    dateAxis.endLocation = 0.4;
    dateAxis.renderer.opposite = true;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.renderer.grid.template.disabled = true;
    valueAxis.renderer.inside = true;

    // Create series
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = "value";
    series.dataFields.dateX = "date";
    series.strokeWidth = 2;
    series.tooltipText = "{valueY.value}";
    series.strokeWidth = 3;
    series.fillOpacity = 1;
    series.tooltip.getFillFromObject = false;
    series.tooltip.background.fill = am4core.color("#ff5252");


    var gradient = new am4core.LinearGradient();
    gradient.addColor(am4core.color("#ff5252"), 0.2);
    gradient.addColor(am4core.color("#ff5252"), 0);
    gradient.rotation = 90;
    series.fill = gradient;
    series.stroke = am4core.color("#ff5252");

    // Add cursor
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.fullWidthLineX = true;
    chart.cursor.lineX.strokeWidth = 0;
    chart.cursor.lineX.fillOpacity = 0;

    chart.padding(0, 0, 0, 0);

    $('.data-btc').on('click', function() {
        chart.removeData(90);
        chart.addData(databtc);
        chart.invalidateRawData();
    });

    $('.data-eth').on('click', function() {
        chart.removeData(90);
        chart.addData(dataeth);
        chart.invalidateRawData();
    });

    $('.data-ltc').on('click', function() {
        chart.removeData(90);
        chart.addData(dataltc);
        chart.invalidateRawData();
    });
    // [ crypto-chart ] end
}
