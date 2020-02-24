<div class="mx-auto chart-circle chart-circle-xs" data-value="{{ $persen/100 }}" data-thickness="3" data-color="blue">
    <canvas width="40" height="40"></canvas>
    <div class="chart-circle-value">{{ $persen }}%</div>
</div>

<script>
    /**  */
    if ($('.chart-circle').length) {
        $('.chart-circle').each(function() {
        let $this = $(this);

        $this.circleProgress({
            fill: {
            color: '#49a5e4'
            },
            size: $this.height(),
            startAngle: -Math.PI / 4 * 2,
            emptyFill: '#F4F4F4',
            lineCap: 'round'
        });
        });
    }
</script>
