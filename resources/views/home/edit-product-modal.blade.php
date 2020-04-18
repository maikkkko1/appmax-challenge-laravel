<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm" action="" method="POST">
                {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-group">
                        <label class="col-form-label">SKU:</label>
                        <input type="text" disabled required class="form-control" id="sku" name="sku">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Título:</label>
                        <input type="text" required class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Descrição:</label>
                        <textarea class="form-control" required name="description" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Quantidade:</label>
                        <input type="number" required class="form-control" id="quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Preço:</label>
                        <input type="text" required class="form-control" id="editPrice" name="price">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    /** Recebe o produto da tela de listagem e então popula os campos. */
    $('#editProductModal').on('show.bs.modal', e => {
        const product = $(e.relatedTarget).data('product');

        /** Seta a action do form com o id do produto a ser editado. */
        $('#updateForm').attr('action', `/product/${product.id}`);

        Object.keys(product).forEach(key => {
            $(`#${key}`).val(product[key]);
        });

        $('#editPrice').maskMoney({
            decimal: ",",
            thousands: "."
        });
    });
</script>
