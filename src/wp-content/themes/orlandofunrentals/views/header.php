<header id='topMenu' class='header_top theme'>
  <div class='header-container '>
    <a class='logo-link' alt='Orlando Fun Rentals' title='Orlando Fun Rentals' href="https://www.orlandofunrentals.com"></a>
    <div class='menu'>
      <nav>
        <ul>
          <li class='col_link'><a href="https://www.orlandofunrentals.com/#houses">Nossas casas</a></li>
          <li class='col_link'><a href="https://www.orlandofunrentals.com/#property">Quem somos</a></li>
          <li class='col_link'><a href="https://www.orlandofunrentals.com/#services">Serviços</a></li>
          <li class='col_link'><a href="https://www.orlandofunrentals.com/#questions">Perguntas</a></li>
          <li class='col_link'><a href="https://www.orlandofunrentals.com/blog">Blog</a></li>
          <li class='col_link'><a href="https://www.orlandofunrentals.com/#contacts">Contato</a></li>
        </ul>
      </nav>
    </div>
    <div class='menu_Idioma'>
      <div class='member-loginbtn'>
        <a target="_blank" href="https://ownerx.streamlinevrs.com" class="bt-action-white">Login do proprietário</a>
      </div>
      <div class='menu_Idioma-nav'>
        <a href='#' id='lang_en'>ENG</a><span>|</span>
        <a href='#' id='lang_es'>ESP</a><span>|</span>
        <a href='#' id='lang_pt'>POR</a>
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
      <li class='col_link'><a href="https://www.orlandofunrentals.com/#houses">Nossas casas</a></li>
      <li class='col_link'><a href="https://www.orlandofunrentals.com/#property">Quem somos</a></li>
      <li class='col_link'><a href="https://www.orlandofunrentals.com/#services">Serviços</a></li>
      <li class='col_link'><a href="https://www.orlandofunrentals.com/#questions">Perguntas</a></li>
      <li class='col_link'><a href="https://www.orlandofunrentals.com/blog">Blog</a></li>
      <li class='col_link'><a href="https://www.orlandofunrentals.com/#contacts">Contato</a></li>
      <li class='menu-mob-lang'>
        <a href='#' id='lang_pt' [ngClass]="{'active': userLang === 'pt' }" (click)="selectLanguage('pt',$event); setMenuMob();">POR</a>
        <a id='lang_en' href='#' [ngClass]="{'active': userLang === 'en' }" (click)="selectLanguage('en',$event); setMenuMob();">ENG</a>
        <a href='#' id='lang_es' [ngClass]="{'active': userLang === 'es' }" (click)="selectLanguage('es',$event); setMenuMob();">ESP</a>
      </li>
      <li class='menu-mob-phone'>
        <a target="_blank" href="https://ownerx.streamlinevrs.com" class="bt-action-white">Login do proprietário</a>
      </li>
    </ul>
  </div>
</nav>
