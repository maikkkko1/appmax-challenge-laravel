<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><span class="font-weight-bold" id="product_id"></span> - Deletar produto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Você tem certeza que deseja deletar esse produto?</p>
            </div>
            <div class="modal-footer">
            <form id="deleteForm" action="" method="POST">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="DELETE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </form>
            </div>
          </div>
    </div>
</div>
<script>
    /** Recebe o produto da tela de listagem e então popula os campos. */
    $('#deleteProductModal').on('show.bs.modal', e => {
        const idProduct = $(e.relatedTarget).data('idproduct');

        $('#product_id').html(idProduct);

        /** Seta a action do form com o id do produto a ser removido. */
        $('#deleteForm').attr('action', `/product/${idProduct}`);
    });
</script>
