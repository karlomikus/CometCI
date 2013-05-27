<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

<?php $total = $data->totalWins + $data->totalLoses + $data->totalDraws; ?>

<div class="row-fluid">
  <div class="span3 cms-box">
    <div class="header-white">
      <h4 class="header-thin">Win rate</h4>
    </div>
    <div id="winrate" style="height: 300px;"></div>
  </div>
  <div class="span9 cms-box">&nbsp;</div>
</div>

<script>
  new Morris.Donut({
    element: 'winrate',
    data: [
      {label: "Wins", value: <?php echo $data->totalWins; ?>},
      {label: "Loses", value: <?php echo $data->totalLoses; ?>},
      {label: "Draws", value: <?php echo $data->totalDraws; ?>}
    ],
    colors: ['#22c7b6', '#D64644', '#FCC063']
  });
</script>