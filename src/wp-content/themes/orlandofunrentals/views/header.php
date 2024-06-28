<?php
$custom_logo_id = get_theme_mod('custom_logo');
$logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
$menu_items = get_field('menu_item', 'option');
$owner_login_button = get_field('owner_login_button', 'option');
$languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
$languages = apply_filters('wpml_active_languages', $languages);
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
        <div class="language-selector relative ml-8 uppercase group">
          <button class="language-selector__btn">
            <?php foreach ($languages as $lang) : ?>
              <?php if (!$lang['active']) continue; ?>
              <?php echo substr($lang['native_name'], 0, 3); ?>
            <?php endforeach; ?>
            <svg class="group-hover:rotate-180" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 10L12 14L16 10" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
          <div id="select-lang" class="language-selector__switcher group-hover:block">
            <?php foreach ($languages as $lang) : ?>
              <?php if ($lang['active']) continue; ?>
              <a href="<?php echo $lang['url']; ?>">
                <?php echo substr($lang['native_name'], 0, 3); ?>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="container-bt-owner">
          <a href="<?php echo $owner_login_button['url']; ?>" target="<?php echo $owner_login_button['target']; ?>" class="bt-owner-login"><?php echo $owner_login_button['title']; ?></a>
        </div>
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
      <li class="menu-mob-owner"><a href="<?php echo $owner_login_button['url']; ?>" target="<?php echo $owner_login_button['target']; ?>" class="bt-owner-login bt-owner-login-mobile"><?php echo $owner_login_button['title']; ?></a></li>
      <li class="menu-mob-lang">
        <label>Language:</label>
        <div class="menu-mob-lang-container">
          <?php foreach ($languages as $lang) : ?>
            <a href="<?php echo $lang['url']; ?>" class="button_simple"><?php echo substr($lang['native_name'], 0, 3); ?></a>
          <?php endforeach; ?>
      </li>
    </ul>
  </div>
</nav>
