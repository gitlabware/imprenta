<div class="gallery-env">
    <div class="row">
        <div class="col-sm-12">
            <h2>TRABAJO</h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tr>
                    <td><b>Cliente:</b></td>
                    <td colspan="3"><?php echo $trabajo['Cliente']['nombre'] ?></td>                    
                </tr>
                <tr>
                    <td><b>Descripcion:</b></td>
                    <td><?php echo $trabajo['Trabajo']['descripcion'] ?></td>
                    <td><b>Cantidad: </b></td>
                    <td><?php echo $trabajo['Trabajo']['cantidad_imagenes']; ?></td>
                </tr>                               
                <tr>
                    <td><b>Papel: </b></td>
                    <td colspan="3"><?php echo $trabajo['Insumo']['nombre']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php foreach ($imagenes as $im): ?>
      <div class="row">
          <div class="col-sm-6" data-tag="1d">
              <article class="image-thumb">
                  <a href="#" class="image">
                      <img src="<?php echo $this->webroot . $im['Imagene']['url']; ?>" style="height: 440px; width: auto; display: block; margin-left: auto; margin-right: auto" />
                  </a>

                  <div class="image-options">
                      <a href="#" class="edit"><i class="entypo-pencil"></i></a>
                      <a href="#" class="delete"><i class="entypo-cancel"></i></a>
                  </div>
              </article>
          </div>
          <div class="col-sm-6">
              <h3>Calculo de Costos</h3>
              <div class="row">
                  <div class="col-sm-12">
                      <table class="table table-condensed table-bordered table-hover table-striped">
                          <tr>
                              <td><b>Base:</b></td>
                              <td><?php echo $im['Imagene']['base'] ?> cm.</td>                    
                              <td><b>Altura:</b></td>
                              <td><?php echo $im['Imagene']['altura'] ?> cm.</td>                    
                          </tr>
                          <tr>
                              <td><b>Porcentaje:</b></td>
                              <td><?php echo $im['Imagene']['porcentaje'] ?> %</td>
                              <td><b>Precio por hoja: </b></td>
                              <td><?php echo $trabajo['Trabajo']['cantidad_imagenes']; ?></td>
                          </tr>                               
                          <tr>
                              <td><b>Papel: </b></td>
                              <td colspan="3"><?php echo $trabajo['Insumo']['nombre']; ?></td>
                          </tr>
                      </table>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-6">
                      <div class="tile-progress tile-aqua">
                          <div class="tile-header">
                              <h3>Cyan</h3>
                              <span>Gama de color usado en el grafico.</span>
                          </div>
                          <div class="tile-progressbar">
                              <span data-fill="<?php echo $im['Imagene']['c']; ?>%"></span>
                          </div>
                          <div class="tile-footer">
                              <h4>
                                  <span class="pct-counter"><?php echo $im['Imagene']['c']; ?></span>% uso
                              </h4>
                              <span>Utilizado en la imagen</span>
                          </div>
                      </div>

                  </div>

                  <div class="col-sm-6">

                      <div class="tile-progress tile-pink">

                          <div class="tile-header">
                              <h3>Magenta</h3>
                              <span>Gama de color usado en el grafico.</span>
                          </div>

                          <div class="tile-progressbar">
                              <span data-fill="<?php echo $im['Imagene']['m']; ?>%"></span>
                          </div>

                          <div class="tile-footer">
                              <h4>
                                  <span class="pct-counter"><?php echo $im['Imagene']['c']; ?></span>% uso
                              </h4>

                              <span>so far in our blog and our website</span>
                          </div>
                      </div>

                  </div> 

              </div>

              <div class="row">
                  <div class="col-sm-6">

                      <div class="tile-progress tile-orange">

                          <div class="tile-header">
                              <h3>Amarillo</h3>
                              <span>Gama de color usado en el grafico..</span>
                          </div>
                          <div class="tile-progressbar">
                              <span data-fill="<?php echo $im['Imagene']['y']; ?>%"></span>
                          </div>
                          <div class="tile-footer">
                              <h4>
                                  <span class="pct-counter"><?php echo $im['Imagene']['y']; ?></span>% uso
                              </h4>

                              <span>Utilizado en la imagen</span>
                          </div>
                      </div>

                  </div>

                  <div class="col-sm-6">

                      <div class="tile-progress tile-primary">

                          <div class="tile-header">
                              <h3>Negro</h3>
                              <span>Gama de color usado en el grafico.</span>
                          </div>

                          <div class="tile-progressbar">
                              <span data-fill="<?php echo $im['Imagene']['k']; ?>%"></span>
                          </div>

                          <div class="tile-footer">
                              <h4>
                                  <span class="pct-counter">0</span>% uso
                              </h4>

                              <span>Utilizado en la imagen</span>
                          </div>
                      </div>
                  </div>
              </div>

          </div>

      </div>
    <?php endforeach; ?>

    <?php
    $redisabled = '';
    $nodisabled = 'disabled';
    if ($trabajo['Trabajo']['estado'] == 1) {
      $redisabled = 'disabled';
      $nodisabled = '';
    }
    ?>
    <div class="row">
        <div class="col-sm-6">
<?php echo $this->Html->link('Realizar Trabajo', array('action' => 'genera_trabajo', $trabajo['Trabajo']['id']), array('class' => 'btn btn-blue btn-block', $redisabled)); ?>
        </div>
        <div class="col-sm-6">
<?php echo $this->Html->link('Ver Nota', array('action' => 'nota_trabajo', $trabajo['Trabajo']['id']), array('class' => 'btn btn-black btn-block', $nodisabled)); ?>
        </div>
    </div>
</div>