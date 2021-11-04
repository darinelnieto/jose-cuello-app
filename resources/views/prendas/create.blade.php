<div class="row">
    <div class="col-12 text-center mb-4">
        <h4>formulario de registro de prendas realizadas</h4>
    </div>
    <div class="col-12">
        <form action="{{route('create.register')}}" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-12 mb-4">
                    <input type="hidden" name="user_id" value="{{auth::User()->id}}">
                    <input type="text" name="name" id="" class="form-control" placeholder="Nombre de la prenda">
                </div>
                <div class="col-12 mb-4">
                    <input type="number" name="sku" id="" class="form-control" placeholder="Número de referencia">
                </div>
                <div class="col-12 mb-4">
                    <input type="number" name="amount" id="" class="form-control" placeholder="Cantidad">
                </div>
                <div class="col-12 text-center">
                    <input type="submit" value="Enviar" class="btn btn-sm btn-dark">
                </div>
            </div>
        </form>
    </div>
</div>