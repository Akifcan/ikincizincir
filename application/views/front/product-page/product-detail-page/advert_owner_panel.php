    <? if($this->session->userdata('user')->id ==$product_detail->user_id){ ?>

    	<div class="modal fade" id="deactiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    		<div class="modal-dialog" role="document">
    			<div class="modal-content">
    				<div class="modal-header">
    					<h5 class="modal-title" id="exampleModalLabel"><b><?= $product_detail->name ?></b> isimli ilanımı kaldır.</h5>
    					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
    					</button>
    				</div>
    				<div class="p-5">
    					Sayın <?= $this->session->userdata('user')->username ?>, <b><i><?= $product_detail->name ?></i></b> isimli ilanınızı kaldırmak istiyor musunuz?
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-secondary" data-dismiss="modal">İptal Et</button>
    					<button
                      tableName="<?= $table_name ?>"
                      productNumber="<?= $product_detail->product_number ?>"
                      id="deactiveProduct" 
                      type="button" 
                      class="btn btn-primary">Evet, ilanımı kaldırmak istiyorum.</button>
                  </div>
              </div>
          </div>
      </div>

      <div class="alert alert-info">
          <p>Bu İlanı <b><?= $product_detail->added_date ?></b> tarhinde vermişsiniz.</p>
          <p>
            <? if($table_name == 'bicycles'){ ?>
                <a href="<?= base_url() ?><?= "/Bicycle/edit_bicycle/$product_detail->slug/$product_detail->product_number" ?>">
                    <button class="btn btn-info">İlanımı Düzenle</button>
                </a>
            <? }else if($table_name == 'spare_parts'){ ?>
                <a href="<?= base_url("Spare_part/edit_spare_part/$product_detail->slug/$product_detail->product_number") ?>">
                    <button class="btn btn-info">İlanımı Düzenle</button>
                </a>
            <? } ?>
            <button class="btn btn-danger" data-toggle="modal" data-target="#deactiveModal">İlanımı Kaldır</button>
        </p>    
    </div>
<? } ?>
