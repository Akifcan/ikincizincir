<?php 
    require_once(FCPATH.'application/libraries/Redirect_header_link.php');
    $redirect_header_link = new Redirect_header_link();
 ?>

<div class="sidebar-widget pb-50">
    <h3 class="sidebar-widget">Kategoriler</h3>

    <div class="widget-categories">
        <ul>
            <? foreach($categories as $category){ ?>
                <li><a href="<?= $redirect_header_link->redirect_to("ilanlar?ilan=$category->slug") ?>"><?= $category->category_name ?></a></li> <? } ?>
        </ul>
    </div>

</div>