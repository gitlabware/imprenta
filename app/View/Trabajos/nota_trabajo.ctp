
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td style="font-weight: bold;font-size: 17px;color: #090300; text-align: center;">Trabajo #<?php echo sprintf("%06d",$trabajo['Trabajo']['id']);?></td>
                <td style="font-weight: bold;font-size: 17px;color: #090300; text-align: center;"><img src="<?php echo $this->webroot; ?>images/logo@2x.png" width="80" alt="" /></td>
                <td style="font-weight: bold;font-size: 17px;color: #090300; text-align: center;"><?php echo date("d/m/Y");?></td>
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <td style="font-weight: bold;font-size: 15px;color: #090300; width: 30%;">Cliente</td>
                <td style="color: #090300;"><?php echo $trabajo['Cliente']['nombre']." --- ".$trabajo['Cliente']['nit'];?></td>
            </tr>
            <tr>
                <td style="font-weight: bold;font-size: 15px;color: #090300; width: 30%;">Descripcion</td>
                <td style="color: #090300;"><?php echo $trabajo['Trabajo']['descripcion'];?></td>
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <td style="font-weight: bold;font-size: 15px;color: #090300;">Papel</td>
                <td style="color: #090300;"><?php echo $trabajo['Insumo']['nombre'];?></td>
                <td style="font-weight: bold;font-size: 15px;color: #090300;">Cantidad</td>
                <td style="color: #090300;"><?php echo $trabajo['Trabajo']['cantidad'];?></td>
            </tr>
        </table>
        <table class="table table-bordered">
            <?php foreach ($imagenes as $im):?>
            <tr>
                <td style="width: 30%;">
                    <img src="<?php echo $this->webroot.$im['Imagene']['url']; ?>" width="100" alt="" />
                </td>
                <td style="font-weight: bold;font-size: 15px;color: #090300;">
                    <?php echo "C[".$im['Imagene']['c']."], Y[".$im['Imagene']['y']."], M[".$im['Imagene']['m']."], K[".$im['Imagene']['k']."]"?>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
<div class="row hidden-print">
    <div class="col-md-3">
        <button class="btn btn-primary btn-icon" type="button" onclick="window.print();">Imprimir<i class="entypo-print"></i></button>
    </div>
</div>