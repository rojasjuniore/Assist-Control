<h2>Impregnancia Simetría</h2><hr>
<div class="row">
    {{--                <div class="col-sm-12">--}}
    <div style="width: 100%; height:55px;" class="progress">
        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $result['reino']["animal"]; ?>%; font-size: 30px; " aria-valuenow="<?php echo $result['reino']["animal"]; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $result['reino']["animal"]; ?>%</div>
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $result['reino']["vegetal"]; ?>%; font-size: 30px; " aria-valuenow="<?php echo $result['reino']["vegetal"]; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $result['reino']["vegetal"]; ?>%</div>
        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $result['reino']["mineral"]; ?>%; font-size: 30px; " aria-valuenow="<?php echo $result['reino']["mineral"]; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $result['reino']["mineral"]; ?>%</div>
    </div>
    {{--                </div>--}}
</div>
<div class="row">
    {{--                <div style="width: 100%" class="col-sm-12">--}}
    <div style="width: <?php echo $result['reino']["animal"]; ?>%; color: red; font-weight: bold">
        <?php echo $result['reino']["animal"]; ?>% Animal
    </div>
    <div style="width: <?php echo $result['reino']["vegetal"]; ?>%; color: green; font-weight: bold">
        <?php echo $result['reino']["vegetal"]; ?>% Vegetal
    </div>
    <div style="width: <?php echo $result['reino']["mineral"]; ?>%; color: blue; font-weight: bold">
        <?php echo $result['reino']["mineral"]; ?>% Mineral
    </div>
    {{--                </div>--}}
</div>
