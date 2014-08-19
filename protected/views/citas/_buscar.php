<div class="modal fade" id="modalBuscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="col-md-12">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Buscar Profesional</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class='input-group'>
                            <input type="text" name="clave" id="clave" class="form-control">
                            <span class="input-group-addon" >
                                <a href="" onclick="_buscar('profesional')">
                                    <span class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modalBuscar"></span>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div id="dataTarget"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a href="#" class="btn btn-primary" id="deleteButton">Aceptar</a>
                </div>
            </div>
        </div>
    </div>
</div>
