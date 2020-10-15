<div class="form-group row">
    <div class="col-lg-3">
    <label for="nombre" class="col-xs-4 control-label requerido">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}" required >
    </div>
    <div class="col-lg-3">
                    <label for="tipodedocumento" class="col-xs-4 control-label requerido">Tipo de documento</label>
                    <select name="tipodedocumento" id="tipodedocumento" class="form-control select2bs4" style="width: 100%;">
                        <option value="">---seleccione---</option>
                        <option value="DNI">DNI</option>
                        <option value="CC">CC</option>
                        <option value="PASAPORTE">PASAPORTE</option>
                        </select>
    </div>
    <div class="col-lg-3">
        <label for="documento" class="col-xs-4 control-label requerido">Documento</label>
        <input type="documento" name="documento" id="documento" class="form-control" value="{{old('documento', $data->documento ?? '')}}" required >
    </div>
    <div class="col-lg-3">
        <label for="estado" class="col-xs-4 control-label requerido">Estado</label>
                    <select name="estado" id="estado" class="form-control select2bs4" style="width: 100%;">
                    <option value="">---seleccione el estado---</option>
                    <option value="1">activo</option>
                    <option value="0">inactivo</option>
                    </select>
        </div>
</div>

