<section class="container-fluid  customSectionHero 
    @if($category->name == "Abbigliamento")
    imgAbbigliamento
    @elseif($category->name == "Console")
    imgConsole
    @elseif($category->name == "Elettrodomestici")
    imgElettrodomestici
    @elseif($category->name == "Giocattoli")
    imgGiocattoli
    @elseif($category->name == "Auto")
    imgAuto
    @elseif($category->name == "Giardinaggio")
    imgGiardinaggio
    @elseif($category->name == "Sport")
    imgSport
    @elseif($category->name == "Libri")
    imgLibri
    @elseif($category->name == "Gioielli")
    imgGioielli
    @elseif($category->name == "Cucina")
    imgCucina
    @endif
">

</section>