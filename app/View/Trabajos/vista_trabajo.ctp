<div class="gallery-env">
    <div class="row">
        <div class="col-sm-12">
            <h2>TRABAJO</h2>
        </div>
    </div>
    <hr>
    <?php foreach ($imagenes as $im):?>
    <div class="row">
        <div class="col-sm-6" data-tag="1d">
            <article class="image-thumb">

                <a href="#" class="image">
                    <img src="<?php echo $this->webroot.$im['Imagene']['url'];?>" />
                </a>

                <div class="image-options">
                    <a href="#" class="edit"><i class="entypo-pencil"></i></a>
                    <a href="#" class="delete"><i class="entypo-cancel"></i></a>
                </div>

            </article>
        </div>
        <div class="col-sm-6">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tr>
                    <td><b>Cantidad: </b></td>
                    <td><?php echo $im['Imagene']['cantidad'];?></td>
                </tr>
                <tr>
                    <td><b>Cantidad imagenes: </b></td>
                    <td><?php echo $im['Imagene']['cantidad_imagenes'];?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php endforeach;?>
    <div class="row">
        <div class="col-sm-6">
            <?php echo $this->Html->link('Realizar Trabajo',array('action' => 'genera_trabajo',$trabajo['Trabajo']['id']),array('class' => 'btn btn-blue btn-block'));?>
        </div>
    </div>
</div>