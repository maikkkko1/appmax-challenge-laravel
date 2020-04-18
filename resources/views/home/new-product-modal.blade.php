<div class="modal fade" id="newProductModal" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/product') }}" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-form-label">SKU:</label>
                        <input type="text" required class="form-control" name="sku">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Título:</label>
                        <input type="text" required class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Descrição:</label>
                        <textarea class="form-control" required name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Quantidade:</label>
                        <input type="number" required class="form-control" name="quantity">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Preço:</label>
                        <input type="text" required class="form-control" id="newPrice" name="price">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  $('#newProductModal').on('show.bs.modal', e => {
        $('#newPrice').maskMoney({
            decimal: ",",
            thousands: "."
        });
    });
</script>
