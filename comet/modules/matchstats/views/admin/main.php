<script src="<?php echo base_url(); ?>assets/admin/js/flotr2.min.js"></script>
<?php 
  $wins = 300;
  $draws = 45;
  $loses = 120;
  $total = $wins + $draws + $loses;
?>

<div class="cms-progress">
  <div class="wins" style="width: <?php echo round($wins/$total*100, 3); ?>%;"></div>
  <div class="draws" style="width: <?php echo round($draws/$total*100, 3); ?>%;"></div>
  <div class="loses" style="width: <?php echo round($loses/$total*100, 3); ?>%;"></div>
</div>

<div style="background: #33b5e5; padding: 20px; margin: 20px 0;">
  <div id="flotr" style="width: 100%; height: 300px; margin-top: 20px;"></div>
</div>

<script>
  (function basic(container) {

    var
    d1 = [
        [0, 3],
        [4, 8],
        [8, 5],
        [9, 13],
        [14, 17],
        [18, 25],
        [26, 12]
    ]

    // Draw Graph
    graph = Flotr.draw(container, [d1], {
        colors: ['#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'],
        shadowSize: 0,
        points: {
            show: true
        },
        lines: {
            show: true
        },
        xaxis: {
            minorTickFreq: 4
        },
        grid: {
            color: "#ffffff",
            minorVerticalLines: true,
            backgroundColor: null,
            tickColor: "#72d7f2",
            outlineWidth: 0,
            verticalLines: false,
            minorVerticalLines: false
        }
    });
})(document.getElementById("flotr"));
</script>