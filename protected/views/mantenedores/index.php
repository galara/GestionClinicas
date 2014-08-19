<?php Yii::app()->params['moduloActivo'] = 'mantenedores'; ?>
<section>
    <div class="row">
        <div class="col-lg-12">
            <h2>Módulos para la edicion de componentes</h2>
            <hr class="star-primary">
        </div>
    </div>
    <div class="row col-md-12">
        <h4>Personas</h4>
    </div>
    <div class="row">
        <div class="col-md-3">
            <a href="/gestionclinicas/profesionales" class="thumbnail">
                 <img src="holder.js/100%x100/vine/text:Profesionales" alt="...">
            </a>
        </div>
        <div class="col-md-3">
            <a href="/gestionclinicas/pacientes" class="thumbnail">
                 <img src="holder.js/100%x100/lava/text:Pacientes" alt="...">
            </a>
        </div>
        <div class="col-md-3">
            <a href="/gestionclinicas/usuarios" class="thumbnail">
                 <img src="holder.js/100%x100/sky/text:Usuarios" alt="...">
            </a>
        </div>
    </div>
    <hr>
    <div class="row col-md-12">
        <h4>Geografía</h4>
    </div>
    <div class="row">
        <div class="col-md-3">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/regiones" class="thumbnail">
                <img data-src="holder.js/100%x100/sky/text:Regiones/auto" alt="...">
            </a> 
        </div>
        <div class="col-md-3">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/provincias" class="thumbnail">
                <img data-src="holder.js/100%x100/vine/text:Provincias" alt="...">
            </a>
        </div>
        <div class="col-xs-6 col-md-3">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/comunas" class="thumbnail">
                <img src="holder.js/100%x100/lava/text:Comunas" alt="...">
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/ciudades" class="thumbnail">
                 <img src="holder.js/100%x100/sky/text:Ciudades" alt="...">
            </a>
        </div>
    </div>
    <hr>
</section>
  
