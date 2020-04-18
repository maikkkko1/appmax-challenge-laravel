<div class="modal fade" id="downProductModal" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><span class="font-weight-bold" id="product_id_down"></span> - Baixar produto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Insira abaixo a quantidade que deseja baixar deste produto.</p>

              <form id="downForm" action="" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-form-label">Quantidade para baixar:</label>
                    <input type="number" required class="form-control" name="downQuantity">
                    <small >Quantidade disponível: <span id="available_quantity" class="font-weight-bold text-success"></span></small>
                </div>

                <p id="quantity-error" style="visibility: hidden" class="font-weight-bold text-danger text-center">Quantidade indisponível!</p>

                <input type="text" hidden id="qtd">
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button onclick="downProduct()" type="button" class="btn btn-primary">Confirmar</button>
            </div>
          </div>
    </div>
</div>
<script>
    function downProduct(ref) {
        const form = $('#downForm');

        const availableQuantity = $('#qtd').val();
        const quantity = $('input[type=number][name=downQuantity]').val();

        if (Number(quantity) > Number(availableQuantity)) {
            return $('#quantity-error').css("visibility", "visible");
        } else {
            $('#quantity-error').css("visibility", "hidden");
        }

        form.submit();
    }

    $('#downProductModal').on('show.bs.modal', e => {
        const product = $(e.relatedTarget).data('product');

        $('#product_id_down').html(product.id);
        $('#available_quantity').html(product.quantity);
        $('#qtd').val(product.quantity);

        /** Seta a action do form com o id do produto a ser baixado. */
        $('#downForm').attr('action', `/product/down/${product.id}`);
    });
</script>
