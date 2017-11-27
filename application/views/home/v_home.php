<section>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!-- <title>Data Peserta Diklat &raquo; XX</title>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script> -->
<link rel="stylesheet" href="assets/jqx.base.css" type="text/css" />
<script src="<?php echo assets_url();?>/grafik/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="<?php echo assets_url();?>/grafik/jqwidgets/jqxcore.js" type="text/javascript"></script>
<script src="<?php echo assets_url();?>/grafik/jqwidgets/jqxdraw.js" type="text/javascript"></script>
<script src="<?php echo assets_url();?>/grafik/jqwidgets/jqxchart.core.js" type="text/javascript"></script>
<script src="<?php echo assets_url();?>/grafik/jqwidgets/jqxdata.js" type="text/javascript"></script> 

<!-- load library jquery dan highcharts -->
 <!-- <script src="<?php echo assets_url();?>/grafik/js/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="<?php echo assets_url();?>/grafik/highcharts/highcharts.js" type="text/javascript"></script>
  <script src="<?php echo assets_url();?>/grafik/highcharts/exporting.js" type="text/javascript"></script>
  <script src="<?php echo assets_url();?>/grafik/highcharts/highcharts-3d.js" type="text/javascript"></script>
  <script src="<?php echo assets_url();?>/grafik/chart/Chart.min.js" type="text/javascript"></script>-->
  
<!-- end load library -->
<div style="float: left; height: 150px; width: 100%;"></div>

<div id="chartStatusCalon" style="float: left; height: 400px; width: 50%;"> 
<script type="text/javascript">
$(document).ready(function () {
// memanggil data array dengan JSON
var source =
     {
         datatype: "json",
         datafields: [
               { name: 'hasil' },
                { name: 'total' }
         ],
         url: '<?php echo base_url() ?>index.php/Home/survey_framework'
     };
var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
// pengaturan jqxChart
    var settings = {
        title: "Status ",
        description: "Calon Peserta",
        enableAnimations: true,
        showLegend: true,
        showBorderLine: true,
        legendLayout: { left: 10, top: 160, width: 300, height: 200, flow: 'vertical' },
        padding: { left: 5, top: 5, right: 5, bottom: 5 },
        titlePadding: { left: 0, top: 0, right: 0, bottom: 10 },
        source: dataAdapter,
        colorScheme: 'scheme03',
        seriesGroups:
           [
            {
              type: 'pie',
              showLabels: true,
              series:
                [
                  { 
                     dataField: 'total',
                     displayText: 'hasil',
                     labelRadius: 170,
                     initialAngle: 15,
                     radius: 145,
                     centerOffset: 0,
                     formatFunction: function (value) {
                                        if (isNaN(value))
                                            return value;
                                            return parseFloat(value);
                                        },
                  }
                ]
             }
           ]
         };
       // Menampilkan Chart
      $('#chartStatusCalon').jqxChart(settings);
   });
</script>
</div>

<div id="ChartJumlahPendaftar" style="float: left; height: 400px; width: 50%;">     
<script type="text/javascript">
$(document).ready(function () {
// memanggil data array dengan JSON
		var source =
	     {
	         datatype: "json",
	         datafields: [
	               { name: 'bulan' },
	                { name: 'total' }
	         ],
	         url: '<?php echo base_url() ?>index.php/Home/survey_daftar_user'
	     };
	   var dataAdapter = new $.jqx.dataAdapter(source,
		{
			autoBind: true,
			async: false,
			downloadComplete: function () { },
			loadComplete: function () { },
			loadError: function () { }
		});
// pengaturan jqxChart
		var settings = {
			title: "Grafik Jumlah Pendaftar",
        	description: "Per Bulan",
			// title: "Grafik Jumlah Pendaftar ",
			showLegend: true,
			padding: { left: 5, top: 5, right: 5, bottom: 5 },
			titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
			source: dataAdapter,
			categoryAxis:
				{
					text: 'Category Axis',
					textRotationAngle: 0,
					dataField: 'bulan',
					formatFunction: function (value) {
						return $.jqx.dataFormat.formatdate(value, 'dd/MM/yyyy');
					},
					showTickMarks: true,
					tickMarksInterval: Math.round(dataAdapter.records.length / 6),
					tickMarksColor: '#888888',
					unitInterval: Math.round(dataAdapter.records.length / 6),
					showGridLines: true,
					gridLinesInterval: Math.round(dataAdapter.records.length / 3),
					gridLinesColor: '#888888',
					axisSize: 'auto'                    
				},
			colorScheme: 'scheme05',
			seriesGroups:
				[
					{
						type: 'line',
						valueAxis:
						{
							displayValueAxis: true,
							description: 'Jumlah Pendaftar',
							//descriptionClass: 'css-class-name',
							axisSize: 'auto',
							tickMarksColor: '#888888',
							unitInterval: 20,
							minValue: 0,
							maxValue: 100                          
						},
						series: [
								{ dataField: 'total', displayText: 'jumlah' }
						  ]
					}
				]
		};
       // Menampilkan Chart
      $('#ChartJumlahPendaftar').jqxChart(settings);
   });
</script>     
</div>

<div id="ChartFavDiklat" style="float: left; height: 400px; width: 50%;"> 
<script type="text/javascript">
$(document).ready(function () {
// memanggil data array dengan JSON
		var source =
	     {
	         datatype: "json",
	         datafields: [
	               { name: 'nama_diklat' },
	                { name: 'jumlah' }
	         ],
	         url: '<?php echo base_url() ?>index.php/Home/survey_diklat_fav'
	     };
	   var dataAdapter = new $.jqx.dataAdapter(source,
		{
			autoBind: true,
			async: false,
			downloadComplete: function () { },
			loadComplete: function () { },
			loadError: function () { }
		});
// pengaturan jqxChart
		var settings = {
                title: "5 Diklat terfavorite",
                description: " ",
                showLegend: true,
                enableAnimations: true,
                padding: { left: 20, top: 5, right: 20, bottom: 5 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
                source: dataAdapter,
                categoryAxis:
                    {
                        dataField: 'nama_diklat',
                        showGridLines: true,
                        flip: false
                    },
                colorScheme: 'scheme01',
  seriesGroups:
	[
		{
			type: 'column',
			orientation: 'horizontal',
			columnsGapPercent: 100,
			toolTipFormatSettings: { thousandsSeparator: ',' },
			valueAxis:
			{
				flip: true,
				unitInterval: 5,
				maxValue: 50,
				displayValueAxis: true,
				description: '',
				formatFunction: function (value) {
					return parseInt(value / 1);
				}
			},
			series: [
					{ dataField: 'jumlah', displayText: 'Jumlah dipilih' }
				]
		}
	]
		};
            // setup the chart
            $('#ChartFavDiklat').jqxChart(settings);
        });
</script>
</div>

</section>
		