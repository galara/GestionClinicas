<?php
/* @var $this PacientesController */
/* @var $dataProvider CActiveDataProvider */
Yii::app()->params['moduloActivo'] = $this->selectedItem;

$this->breadcrumbs = array(
    'Citas',
);
?>

<!--ventana modal para el calendario-->
<div class="modal fade" id="events-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="height: 500px;">
            <div class="modal-body">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<h1>Agenda de citas médicas</h1>

<?php if (!is_null($this->mensaje)): ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <?php echo $this->mensaje ?>
    </div>
<?php endif; ?>

<hr>
<div class="page-header">
    <div class="pull-right form-inline">
        <?php echo CHtml::link('Agendar Cita', '/GestionClinicas/citas/create', array('class'=>'btn btn-success')) ?>
        <div class="btn-group">
            <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
            <button class="btn" data-calendar-nav="today">Hoy</button>
            <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
        </div>
        <div class="btn-group">
            <button class="btn btn-warning" data-calendar-view="year">Año</button>
            <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
            <button class="btn btn-warning" data-calendar-view="week">Semana</button>
            <button class="btn btn-warning" data-calendar-view="day">Día</button>
        </div>
    </div>
</div>	
<div>
    <label>
        Haga click sobre una cita para ver sus detalles
    </label>
</div>
<div class="col-md-offset-1">
    <div id="calendar"></div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/public/bower_components/underscore/underscore-min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/public/bower_components/bootstrap-calendar/js/calendar.js"></script>

<script type="text/javascript">
    (function($) {
        //creamos la fecha actual
        var date = new Date();
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth() + 1).toString().length === 1 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1).toString();
        var dd = date.getDate().toString().length === 1 ? "0" + date.getDate().toString() : date.getDate().toString();
        //establecemos los valores del calendario
        var options = {
            modal: '#events-modal',
            modal_type: 'ajax',
            events_source: '<?php echo Yii::app()->request->baseUrl; ?>/citas/getcitas',
            view: 'month',
            language: 'es-ES',
            tmpl_path: '<?php echo Yii::app()->request->baseUrl; ?>/public/bower_components/bootstrap-calendar/tmpls/',
            tmpl_cache: false,
            day: yyyy + "-" + mm + "-" + dd,
            time_start: '9:00',
            time_end: '20:00',
            time_split: '10',
            width: '100%',
            onAfterEventsLoad: function(events)
            {
                if (!events)
                {
                    return;
                }
                var list = $('#eventlist');
                list.html('');
                $.each(events, function(key, val)
                {
                    $(document.createElement('li'))
                            .html('<a href="' + val.url + '">' + val.title + '</a>')
                            .appendTo(list);
                });
            },
            onAfterViewLoad: function(view)
            {
                $('.page-header h3').text(this.getTitle());
                $('.btn-group button').removeClass('active');
                $('button[data-calendar-view="' + view + '"]').addClass('active');
            },
            classes: {
                months: {
                    general: 'label'
                }
            }
        };
        var calendar = $('#calendar').calendar(options);
        $('.btn-group button[data-calendar-nav]').each(function()
        {
            var $this = $(this);
            $this.click(function()
            {
                calendar.navigate($this.data('calendar-nav'));
            });
        });
        $('.btn-group button[data-calendar-view]').each(function()
        {
            var $this = $(this);
            $this.click(function()
            {
                calendar.view($this.data('calendar-view'));
            });
        });
        $('#first_day').change(function()
        {
            var value = $(this).val();
            value = value.length ? parseInt(value) : null;
            calendar.setOptions({first_day: value});
            calendar.view();
        });
    }(jQuery));
</script>
