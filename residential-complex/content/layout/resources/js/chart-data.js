var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};

	let dataS = $('[name="data-statistics"]')
	
	let dt = new Date();
	Date.prototype.addDays = function(days) {
		let date = new Date(this.valueOf());
		date.setDate(date.getDate() + (days));
		return date.getDate();
	}

	var mnt = new Array("янв", "фев", "мар", "апр", "мая",
        "июн", "июл", "авг", "сен", "окт", "ноя", "дек");
		mnt[dt.getMonth()]

	var lineChartData = {
			labels : [dt.addDays(-6),dt.addDays(-5),dt.addDays(-4),dt.addDays(-3),dt.addDays(-2),dt.addDays(-1),dt.addDays(0)],
			datasets : [
				// {
					// label: "My First dataset",
					// fillColor : "rgba(220,220,220,0.2)",
					// strokeColor : "rgba(220,220,220,1)",
					// pointColor : "rgba(220,220,220,1)",
					// pointStrokeColor : "#fff",
					// pointHighlightFill : "#fff",
					// pointHighlightStroke : "rgba(220,220,220,1)",
					// data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				// },
				{
					label: "My Second dataset",
					fillColor : "rgba(48, 164, 255, 0.2)",
					strokeColor : "rgba(48, 164, 255, 1)",
					pointColor : "rgba(48, 164, 255, 1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(48, 164, 255, 1)",
					data : [dataS[6].value,dataS[5].value,dataS[4].value,dataS[3].value,dataS[2].value,dataS[1].value,dataS[0].value]
				}
			]

		}
		
	// var barChartData = {
	// 		labels : ["January","February","March","April","May","June","July"],
	// 		datasets : [
	// 			{
	// 				fillColor : "rgba(220,220,220,0.5)",
	// 				strokeColor : "rgba(220,220,220,0.8)",
	// 				highlightFill: "rgba(220,220,220,0.75)",
	// 				highlightStroke: "rgba(220,220,220,1)",
	// 				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
	// 			},
	// 			{
	// 				fillColor : "rgba(48, 164, 255, 0.2)",
	// 				strokeColor : "rgba(48, 164, 255, 0.8)",
	// 				highlightFill : "rgba(48, 164, 255, 0.75)",
	// 				highlightStroke : "rgba(48, 164, 255, 1)",
	// 				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
	// 			}
	// 		]
	
	// 	}

	// var pieData = [
	// 			{
	// 				value: 300,
	// 				color:"#30a5ff",
	// 				highlight: "#62b9fb",
	// 				label: "Blue"
	// 			},
	// 			{
	// 				value: 50,
	// 				color: "#ffb53e",
	// 				highlight: "#fac878",
	// 				label: "Orange"
	// 			},
	// 			{
	// 				value: 100,
	// 				color: "#1ebfae",
	// 				highlight: "#3cdfce",
	// 				label: "Teal"
	// 			},
	// 			{
	// 				value: 120,
	// 				color: "#f9243f",
	// 				highlight: "#f6495f",
	// 				label: "Red"
	// 			}

	// 		];
			
	// var doughnutData = [
	// 				{
	// 					value: 300,
	// 					color:"#30a5ff",
	// 					highlight: "#62b9fb",
	// 					label: "Blue"
	// 				},
	// 				{
	// 					value: 50,
	// 					color: "#ffb53e",
	// 					highlight: "#fac878",
	// 					label: "Orange"
	// 				},
	// 				{
	// 					value: 100,
	// 					color: "#1ebfae",
	// 					highlight: "#3cdfce",
	// 					label: "Teal"
	// 				},
	// 				{
	// 					value: 120,
	// 					color: "#f9243f",
	// 					highlight: "#f6495f",
	// 					label: "Red"
	// 				}
	
	// 			];

window.onload = function(){
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true
	});
	// var chart2 = document.getElementById("bar-chart").getContext("2d");
	// window.myBar = new Chart(chart2).Bar(barChartData, {
	// 	responsive : true
	// });
	// var chart3 = document.getElementById("doughnut-chart").getContext("2d");
	// window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {responsive : true
	// });
	// var chart4 = document.getElementById("pie-chart").getContext("2d");
	// window.myPie = new Chart(chart4).Pie(pieData, {responsive : true
	// });
	
};