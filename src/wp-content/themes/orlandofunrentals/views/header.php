<?php
$menu_items = get_field('menu_item', 'option');
$owner_login_button = get_field('owner_login_button', 'option');
$languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
$menu_items = array_map(function ($item) {
  if(array_key_exists('menu_link', $item))
  {
    return [
      'url' => $item['menu_link']['url'],
      'title' => $item['menu_link']['title']
    ];
  }
}, $menu_items);
?>
<header id='topMenu' class='header_top theme'>
  <div class='header-container '>
    <a class='logo-link' alt='Orlando Fun Rentals' title='Orlando Fun Rentals' href="https://www.orlandofunrentals.com"></a>
    <div class='menu'>
      <nav>
        <?php if ($menu_items) : ?>
          <ul>
            <?php foreach ($menu_items as $menu_item) : ?>
              <?php if (empty($menu_item['url']) || empty($menu_item['title'])) continue; ?>
              <li class='col_link'><a href="<?php echo $menu_item['url']; ?>"><?php echo $menu_item['title']; ?></a></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </nav>
    </div>
    <div class='menu_Idioma'>
      <?php if ($owner_login_button) : ?>
        <div class='member-loginbtn'>
          <a target="_blank" href="<?php echo $owner_login_button['url']; ?>" class="bt-action-white"><?php echo $owner_login_button['title']; ?></a>
        </div>
      <?php endif; ?>
      <div class='menu_Idioma-nav'>
        <?php if ($languages) : ?>
          <?php foreach ($languages as $lang) : ?>
            <a href="<?php echo $lang['url']; ?>" id="lang_<?php echo $lang['language_code']; ?>"><?php echo substr($lang['native_name'], 0, 3); ?></a>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>
<div class='header-height'>
</div>
<nav id='mob-menu' class='mob-menu theme'>
  <div id="menuToggle">
    <input id='checkedMobMenu' type="checkbox" (click)="removeFixed()" />
    <span></span>
    <span></span>
    <span></span>
    <ul id="menuMobile">
      <li class='menu-mob-img' alt='Columbia Vacation Homes' title='Columbia Vacation Homes'>
      </li>
      <li class='col_link'><a href="https://www.orlandofunrentals.com/'">HOME</a></li>
      <?php if ($menu_items) : ?>
        <?php foreach ($menu_items as $menu_item) : ?>
          <?php if (empty($menu_item['url']) || empty($menu_item['title'])) continue; ?>
          <li class='col_link'><a href="<?php echo $menu_item['url']; ?>"><?php echo $menu_item['title']; ?></a></li>
        <?php endforeach; ?>
      <?php endif; ?>
      <li class='menu-mob-lang'>
        <a href='#' id='lang_pt' [ngClass]="{'active': userLang === 'pt' }" (click)="selectLanguage('pt',$event); setMenuMob();">POR</a>
        <a id='lang_en' href='#' [ngClass]="{'active': userLang === 'en' }" (click)="selectLanguage('en',$event); setMenuMob();">ENG</a>
        <a href='#' id='lang_es' [ngClass]="{'active': userLang === 'es' }" (click)="selectLanguage('es',$event); setMenuMob();">ESP</a>
      </li>
      <?php if ($owner_login_button) : ?>
        <li class='menu-mob-phone'>
          <a target="_blank" href="<?php echo $owner_login_button['url']; ?>" class="bt-action-white"><?php echo $owner_login_button['title']; ?></a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
