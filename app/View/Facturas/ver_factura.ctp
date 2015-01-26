<div class="row">
    <div class="col-md-12">
        <div style="width: 380px;height: 650px;color: #000101;">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        IMPRENTA PRAVER S.A.<br>
                        Casa Matriz<br>
                        Calle Sucre N°123 –Zona Central<br>
                        <label style="font-weight: bold; font-size: 15px;">FACTURA ORIGINAL</label>
                    </td>
                </tr>
            </table>
            <div align="center" style="margin-top: -25px">
                <div style="border: black solid 1px; width: 300px"></div>
            </div>
            <div align="center">
                NIT : 4865946<br>
                FACTURA Nro 12<br>
                AUTORIZACI&Oacute;N Nro 100413001
            </div>
            <div align="center" style="">
                <div style="border: black solid 1px; width: 300px"></div>
            </div>
            <div style="text-align: center;">
                Actividad Económica: Venta de partes, piezas y accesorios de vehículos automotores
            </div>
            <div style="padding-left: 25px;">
                Fecha: 09/09/2013 Hora:14:23<br>
                Señor(es): líder S.R.L.<br>
                NI/CI: 3478515013
            </div>
            <div align="center" style="">
                <div style="border: black solid 1px; width: 300px"></div>
            </div>
            <div style="padding-left: 25px;padding-right: 25px;">
                <table class="table" style="border-color: black;">
                    <tr style="border-color: black;">
                        <td style="border-color: black;">CANT</td>
                        <td style="border-color: black;">CONCEP</td>
                        <td style="border-color: black;">PREC</td>
                        <td style="border-color: black;">TOTAL</td>
                    </tr>
                    <?php echo $total = 0.00;?>
                    <?php foreach ($trabajos as $tra):?>
                    <tr style="border-color: black;">
                        <td style="border-color: black;"><?php echo $tra['Trabajo']['cantidad']?></td>
                        <td style="border-color: black;"><?php echo $tra['Trabajo']['descripcion']?></td>
                        
                        <td style="border-color: black;"><?php echo $tra['Trabajo']['precio_total']?></td>
                    </tr>
                    <?php endforeach;?>
                    <tr style="border-color: black;">
                        <td style="border-color: black;"></td>
                        <td style="border-color: black;"></td>
                        <td style="border-color: black;">TOTAL Bs.</td>
                        <td style="border-color: black;"><?php echo $total;?></td>
                    </tr>
                </table>
            </div>
            <div style="margin-top: -20px; padding-left: 25px;">
                SON: <?php echo $literaltotal;?>
            </div>
            <div align="center" style="">
                <div style="border: black solid 1px; width: 300px"></div>
            </div>
            <div style="padding-left: 25px;margin-top: 7px;">
                CODIGO DE CONTROL : CD-54-9D-C9-F6<br>
                FECHA LIMITE DE EMISIÓN: 10/12/2013
            </div>
            <div align="center" style="margin-top: 5px;">
                <img src="<?php echo $this->webroot; ?>images/imageqr2.png" width="100" alt="" />
            </div>
            <div align="right" style="width: 100%; margin-top: 8px;">
                <div style="width: 80%; text-align: center;">
                    “ LA ALTERACIÓN, FALSIFICACIÓN O COMERCIALIZACIÓN ILEGAL DE ESTE DOCUMENTO, TIENE CÁRCEL ”
                </div>
            </div>
        </div>
    </div>
</div>