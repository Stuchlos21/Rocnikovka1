@if (Auth::user()->status == 1 || Auth::user()->status == 2) 
    <ul class="dashboard-right-ul">
            <li class="dashboard-right-li">
                <a href="/vozidla/create" class="first_sidebar_row">Přidat vozidlo</a>
                <a href="/trida/create">Přidat třídu</a>
                <a href="/users/create">Přidat uživatele</a> 
                <a href="/hours/create">Přidat hodinu</a> 
                    <div class="dashboard-right-mezera"></div>
                <a href="/users">Žáci ve třídách</a>
                <a href="/hours">Kalendář</a>
            </li>
        </ul>
@endif



