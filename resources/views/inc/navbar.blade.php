<div class="head">
    <div class="head-nadpis">
        <p><i class="fa fa-automobile" id="fa-automobile"></i>{{config('app.name', 'AUTOŠKOLA')}}</p>
    </div>
    <a href="/hours">
    <div class="school-logo">
        <img src="/images/00082201.png" height="75" width="75">
    </div>
    </a>
    <div class="head-tel">
      <h4><i class="fa fa-mobile" id="fa-mobile"></i>+420 223 511 408</h4>
      <h4><i class="fa fa-envelope" id="fa-envelope"></i>E-mail: autoskola@gmail.com</h4>
    </div>
  </div>
  
  
  
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
  
        </div>
            <div class="nav-li">
              <li><a href="/hours" class="fa fa-home" id="home"></a></li>
              <li><a href="/cenik">Ceník</a></li>
              <li><a href="/kontakty">Kontakty</a></li>
              <li><a href="/instruktori">Naši instruktoři</a></li>
              <li><a href="/vozidla">Náš vozový park</a></li>
              <div class="dropdown1">
                  <button class="dropbtn1">Co nabízíme? <i class="fa fa-angle-double-down"></i></button>
                  <div class="dropdown-content1">
                    <a href="#">O výcviku</a>
                    <a href="#">Jak se přihlásit k výcviku?</a>
                    <a href="#">Postup výcviku</a>
                    <a href="#">Z čeho se výcvik skládá?</a>
                    <a href="#">Závěrečná zkouška</a>
                    <a href="#">Skupiny řidičských průkazů</a>
                  </div>
                  
              </div>    
          </div>
          <div class="log-reg">
              <ul>
                  @if (Auth::guest())
                      <li><a href="{{ route('login') }}" class="log-reg">Přihlásit se</a></li>
                      <!--<li><a href="{{ route('register') }}" class="log-reg">Register</a></li>-->      <!--registrace v navbaru-->
                  @else
                      <li class="dropdown">
                          <a href="#" class="log-reg" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->nickname }} <span class="caret"></span>
                          </a>
  
            
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="/hours">Kalendář</a></li>
                            
                              @if (Auth::user()->status == 1 || Auth::user()->status == 2)
                                  <li><a href="#">Všechny hodiny</a></li>
                              @else
                                  <li><a href="#">Moje hodiny</a></li>
                              @endif
                              
                              <li><a href="/changepassword">Změnit heslo</a></li>
                              <li>
                                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Odhlásit se</a>
            
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @endif
              </ul>
        </div>
    </div>
  </nav>