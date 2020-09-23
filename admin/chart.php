<!DOCTYPE html>
<html>

<canvas id="bar-chart" width="800" height="500"></canvas>


</html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>

<script>

						new Chart(document.getElementById("bar-chart"),{
							type: 'bar',
							data: {
								labels:["january", "february","march","april","may","june"],
								datasets: [
								{
									label: "Performance",
									backgroundColor: ["#3e95cd","#8e5ea2","#3e95cd","#8e5ea2","#3e95cd","#8e5ea2"],
									data: [10,20,30,40,50,60]
								}
								]
							},
							options: {
								legend: { display: false},
								title: {
									display: true,
									text: 'performance chart'
								}
							}
						}
							
							
							
							
							);





</script>