<div class="modal fade" id="createOrden" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modalFormCreateOrder" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3 class="h4">Registro de nueva orden</h3>
                    </div>
                    <div class="col-12">
                        <form action="{{route('create.order')}}" method="post" class="form-create-product" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12 col-lg-6">
                                    <label for="name">Nombre del producto:</label>
                                    <input type="text" name="name" class="form-control" id="">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label for="sku">Número de referencia:</label>
                                    <input type="text" name="sku" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-lg-6">
                                    <label for="quantity">Cantidad solicitada:</label>
                                    <input type="number" name="quantity" class="form-control" id="">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label for="customer_name">Nombre de cliente o empresa:</label>
                                    <input type="text" name="customer_name" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-lg-6">
                                    <label for="deadline">Fecha de entrega:</label>
                                    <input type="date" name="deadline" class="form-control" id="">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label for="">Agregue una imagen del producto:</label>
                                    <input type="file" name="file" class="select-field-product" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-sm btn-dark" value="ENVIAR">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>