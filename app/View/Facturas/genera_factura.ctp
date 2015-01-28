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
                NIT : <?php echo $datoscodigo['nit'] ?><br>
                FACTURA Nro <?php echo $datoscodigo['numero'] ?><br>
                AUTORIZACI&Oacute;N Nro <?php echo $datoscodigo['numero_autorizacion'] ?>
            </div>
            <div align="center" style="">
                <div style="border: black solid 1px; width: 300px"></div>
            </div>
            <div style="text-align: center;">
                Actividad Económica: Venta de partes, piezas y accesorios de vehículos automotores
            </div>
            <div style="padding-left: 25px;">
                Fecha: <?php echo date("Y-m-d H:i:s"); ?><br>
                Señor(es): <?php echo $cliente; ?><br>
                NI/CI: <?php echo $nitcliente; ?>
            </div>
            <div align="center" style="margin-bottom: 5px;">
                <div style="border: black solid 1px; width: 300px"></div>
            </div>
            <div style="padding-left: 25px;padding-right: 25px;">
                <table class="table" style="border-color: black;">
                    <tr style="border-color: black;">
                        <td style="border-color: black;">Concepto</td>
                        <td style="border-color: black;">TOTAL</td>
                    </tr>

                    <tr style="border-color: black;">
                        <td style="border-color: black;"><?php echo $trabajo['Trabajo']['descripcion'] ?></td>
                        <td style="border-color: black;"><?php echo $trabajo['Trabajo']['precio_total'] ?></td>
                    </tr>

                    <tr style="border-color: black;">
                        <td style="border-color: black;">TOTAL Bs.</td>
                        <td style="border-color: black;"><?php echo $trabajo['Trabajo']['precio_total'] ?></td>
                    </tr>
                </table>
            </div>
            <div style="margin-top: -20px; padding-left: 25px;">
                SON: <?php echo $literaltotal; ?>
            </div>
            <div align="center" style="">
                <div style="border: black solid 1px; width: 300px"></div>
            </div>
            <div style="padding-left: 25px;margin-top: 7px;">
                CODIGO DE CONTROL : <?php echo $datoscodigo['codigo']; ?><br>
                FECHA LIMITE DE EMISIÓN: <?php echo $datoscodigo['fechalimite']; ?>
            </div>
            <div align="center" style="margin-top: 5px;">
                <div id="codigoQRfactura">
                    
                </div>
            </div>
            <div align="right" style="width: 100%; margin-top: 8px;">
                <div style="width: 80%; text-align: center;">
                    “ LA ALTERACIÓN, FALSIFICACIÓN O COMERCIALIZACIÓN ILEGAL DE ESTE DOCUMENTO, TIENE CÁRCEL ”
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row hidden-print">
    <div class="col-md-3">
        <button class="btn btn-primary btn-icon" type="button" onclick="window.print();">Imprimir<i class="entypo-print"></i></button>
    </div>
</div>

<script>
    var textoqr = "<?php echo $datoscodigo['qr']; ?>";

    var opcionesQRejmeplar = {
        render: 'image'
        , size: 80
        , background: '#fdfdfd'
        , text: textoqr
    };
    var divSelector = '#codigoQRfactura';
</script>
<?php
$this->Html->script(array(
    'jquery.qrcode-0.10.0.js'
    , 'codigoQRini.js'
        ), array('block' => 'scriptadd'));
?>