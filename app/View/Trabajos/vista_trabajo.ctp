<div class="gallery-env">
    <div class="row">
        <div class="col-sm-12">
            <h2>TRABAJO</h2>
        </div>
    </div>
    <hr>
    <?php foreach ($imagenes as $im): ?>
      <div class="row">
          <div class="col-sm-6" data-tag="1d">
              <article class="image-thumb">

                  <a href="#" class="image">
                      <img src="<?php echo $this->webroot . $im['Imagene']['url']; ?>" />
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
                      <td><?php echo $im['Imagene']['cantidad']; ?></td>
                  </tr>
                  <tr>
                      <td><b>Cantidad imagenes: </b></td>
                      <td><?php echo $im['Imagene']['cantidad_imagenes']; ?></td>
                  </tr>
              </table>
              <h2>Colores Utilizados</h2>
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

                  <div class="col-sm-6">

                      <div class="tile-progress tile-orange">

                          <div class="tile-header">
                              <h3>Yellow</h3>
                              <span>Gama de color usado en el grafico..</span>
                          </div>

                          <div class="tile-progressbar">
                              <span data-fill="<?php echo $im['Imagene']['y']; ?>%"></span>
                          </div>

                          <div class="tile-footer">
                              <h4>
                                  <span class="pct-counter"><?php echo $im['Imagene']['y']; ?></span>% uso
                              </h4>

                              <span>so far in our blog and our website</span>
                          </div>
                      </div>

                  </div>

                  <div class="col-sm-6">

                      <div class="tile-progress tile-primary">

                          <div class="tile-header">
                              <h3>Black</h3>
                              <span>Gama de color usado en el grafico.</span>
                          </div>

                          <div class="tile-progressbar">
                              <span data-fill="<?php echo $im['Imagene']['k']; ?>%"></span>
                          </div>

                          <div class="tile-footer">
                              <h4>
                                  <span class="pct-counter">0</span>% increase
                              </h4>

                              <span>so far in our blog and our website</span>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>    
    <?php endforeach; ?>
    <div class="row">
        <div class="col-sm-6">
            <?php echo $this->Html->link('Realizar Trabajo', array('action' => 'genera_trabajo', $trabajo['Trabajo']['id']), array('class' => 'btn btn-blue btn-block')); ?>
        </div>
    </div>
</div>