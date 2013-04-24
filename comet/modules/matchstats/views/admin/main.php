<script src="<?php echo base_url(); ?>assets/admin/js/morris.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<div id="myfirstchart" style="height: 250px;"></div>

<script type="text/javascript">
new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  data: [
      {device: 'Wins', geekbench: 136},
      {device: 'Draws', geekbench: 137},
      {device: 'Losses', geekbench: 275}
    ],
    xkey: 'device',
    ykeys: ['geekbench'],
    labels: ['Geekbench'],
    barRatio: 0.4,
    xLabelMargin: 10,
    hideHover: 'auto'
});

</script>