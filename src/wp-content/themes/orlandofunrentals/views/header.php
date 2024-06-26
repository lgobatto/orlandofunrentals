<?php
$custom_logo_id = get_theme_mod('custom_logo');
$logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
$menu_items = get_field('menu_item', 'option');
$owner_login_button = get_field('owner_login_button', 'option');
$languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
$menu_items = array_map(function ($item) {
  if (array_key_exists('menu_link', $item)) {
    return [
      'url' => $item['menu_link']['url'],
      'title' => $item['menu_link']['title']
    ];
  }
}, $menu_items);
?>

<header class="header-top">
  <div class="topo">
    <div class="div_logo">
      <a href="https://orlandofunrentals.com/">
        <img src="<?php echo reset($logo_image); ?>" alt="Orlando Fun Rentals" title="Orlando Fun Rentals">
      </a>
    </div>
    <div>
      <nav id="menuDesktop" class="menuDesktop">
        <ul>
          <?php foreach ($menu_items as $menu_item) : ?>
            <?php if (empty($menu_item['url']) || empty($menu_item['title'])) continue; ?>
            <li><a href="<?php echo $menu_item['url']; ?>"><?php echo $menu_item['title']; ?></a></li>
          <?php endforeach; ?>
        </ul>
        <div class="container-bt-owner"><button class="bt-owner-login">Owner Log In</button></div>
      </nav>
    </div>
  </div>
</header>
<div class="header-height"></div>
<nav id="mob-menu" class="mob-menu theme">
  <div id="menuToggle"><input id="checkedMobMenu" type="checkbox"><span></span><span></span><span></span>
    <ul id="menuMobile" class="menu-mobile">
      <li class="menu-mob-img"><a href="/home"><img src="<?php echo reset($logo_image); ?>" alt="Orlando Fun Rentals" title="Orlando Fun Rentals"></a></li>
      <?php foreach ($menu_items as $menu_item) : ?>
        <?php if (empty($menu_item['url']) || empty($menu_item['title'])) continue; ?>
        <li><a href="<?php echo $menu_item['url']; ?>"><?php echo $menu_item['title']; ?></a></li>
      <?php endforeach; ?>
      <li class="menu-mob-owner"><button class="bt-owner-login bt-owner-login-mobile">Owner Log In</button></li>
      <li class="menu-mob-lang"><label>Language:</label>
        <!-- <div class="menu-mob-lang-container"><button class="button_simple">POR</button><button class="button_simple active">ENG</button><button class="button_simple">ESP</button></div> -->
      </li>
    </ul>
  </div>
</nav>
