<div class="form-group row">
    <div class="col-lg-3">
        <label for="usuario" class="col-xs-4 control-label requerido">Usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control" value="{{old('usuario', $data->usuario ?? '')}}" required >
    </div>
    <div class="col-lg-3">
                    <label for="tipo_de_usuario" class="col-xs-4 control-label requerido">tipo de usuario</label>
                    <select name="tipo_de_usuario" id="tipo_de_usuario" class="form-control select2bs4" style="width: 100%;">
                        <option value="">---seleccione el estado---</option>
                        <option value="office">office</option>
                        <option value="movil">movil</option>
                        </select>
    </div>
    <div class="col-lg-3">
        <label for="email" class="col-xs-4 control-label requerido">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" value="{{old('email', $data->email ?? '')}}" required >
    </div>
    <div class="col-lg-3">
        <label for="empleado_id" class="col-xs-4 control-label requerido">Nombre Empleado</label>
                        <select name="empleado_id" id="empleado_id" class="form-control select2bs4" style="width: 100%;">
                        <option value="">---seleccione el empleado---</option>
                        @foreach ($Empleados as $id => $nombre)
                        <option value="{{$id}}" {{old('empleado_id', $data->id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
                        @endforeach
                        </select>
    </div>  
</div>
<div class="form-group row">
    <div class="col-lg-3">
    <label for="password" class="col-xs-4 control-label requerido">Password</label>
    <input type="password" name="password" id="password" class="form-control" value="{{old('password', $data->password ?? '')}}" minlength="6" required >
    </div>
    <div class="col-lg-3">
        <label for="remenber_token" class="col-xs-4 control-label requerido">repita el password</label>
        <input type="password" name="remenber_token" id="remenber_token" class="form-control" value="{{old('remenber_token', $data->remenber_token ?? '')}}"  minlength="6" required >
    </div>
    <div class="col-lg-3">
        <label for="activo" class="col-xs-4 control-label requerido">Estado</label>
                    <select name="activo" id="activo" class="form-control select2bs4" style="width: 100%;">
                    <option value="">---seleccione el estado---</option>
                    <option value="1">activo</option>
                    <option value="0">inactivo</option>
                    </select>
    </div>
 

    <div class="col-lg-3">
        <label for="rol_id" class="col-xs-4 control-label requerido">Rol</label>
                        <select name="rol_id" id="rol_id" class="form-control select2bs4" style="width: 100%;">
                        <option value="">---seleccione el rol---</option>
                        @foreach ($Rols1 as $id => $nombre)
                        <option value="{{$id}}" {{old('rol_id', $data->roles1[0]->id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
                        @endforeach
                        </select>
    </div>   


   

</div>
