<div class="mobile-menu-area col-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="<?= base_url() ?>">Ana Sayfa</a></li>
                                <? foreach(get_all('navigation') as $nav){ ?>
                                    <li><a href="#"><?= $nav->menu_name ?></a>
                                        <? if($nav->navigation_bottom == 1){ ?>
                                            <ul>
                                                <? foreach(get_result('navigation_bottom', array('nav_id' => $nav->id)) as $nav_bottom){ ?>
                                                    <li><a href="<?= $nav_bottom->slug ?>"><?= $nav_bottom->name ?></a></li>
                                                <? } ?>
                                            </ul>
                                        <? } ?>
                                    </li>
                                <? } ?>
                            </ul>
                        </nav>							
                    </div>
                </div>