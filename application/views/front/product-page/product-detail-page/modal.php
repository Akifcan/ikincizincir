<div class="modal fade" id="reportProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b><?= $product_detail->name ?></b> isimli ilanı rapor et</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form 
      id="reportProductForm"
      processId="<?= base64_encode($table_name); ?>"
      process="<?= base64_encode($product_detail->product_number); ?>"
      >
      <div class="p-5">
        <div id="messageReport">mesaj</div>
        <select id="reportReason">
          <option selected disabled>Bu ilanı rapor sebebini seçer misiniz?</option>
          <option value="uygunsuz icerik">Uygunsuz İlan</option>
          <option value="calinti urun">Bu Ürün Çalıntı</option>
          <option value="calinti ilan">Bu İlan Benim</option>
        </select>
        <p class="text-info">Bu ilan daha önce 
              <? $report_count = get_table_count('reported_products', array('product_number' => $product_detail->product_number)) ;
              ?>
              <b><?= ($report_count == 0 ? 'Hiç rapor edilmemiş' : $report_count.' kez rapor edilmiştir.') ?></b></p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button 
        type="submit" 
        class="btn btn-primary">İlanı Rapor Et</button>
      </div>
    </div>
  </div>
</form>
</div>