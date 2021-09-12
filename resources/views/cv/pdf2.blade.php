<html>
    <head>
    <meta charset="utf-8">
        <style>
            body {font-family: DejaVu Sans;}
            table,th,td {width: 100%; border-collapse: collapse;}
            th:first-child,td:first-child {padding-left: 5px;}
            p {padding-left: 10px; font-size: 12px;}
            h2 {margin-bottom: 0.25rem;}
        </style>
    </head>
    <body>
    <div class="grid-container">
    <table style="width:100%">
    
    <tr>
        <td align="center">
        <h3 style="color: {{$color}};">Dane osobowe</h3>
        @foreach($user as $users)
                @php
            $zdjecie = $users['zdjecie'];
        @endphp
        @if($users['zdjecie'] != 'photo.jpg')
        <img src="{{ public_path('images/') . $zdjecie }}" style="width: 100px; height: 100px">
        @endif
            <p>{{ $users['name'] }} {{$users['nazwisko']}}</p>
            <p>{{ $users['data_ur'] }}</p>
            <p>{{ $users['miasto'] }}, {{$users['kod_pocztowy']}}</p>
            <p>{{ $users['telefon'] }}</p>
            @endforeach
        </td>
        <td>
        @if(!empty($doswiadczenie[0]['nazwa_stanowiska']))
        <h3 style="color: {{$color}};">Doświadczenie</h3>
        
        @foreach($doswiadczenie as $doswiadczenies)
        @if($doswiadczenies['biezaca'] === 0)
                    <p>{{ $doswiadczenies['rok_od_d'] }} - {{ $doswiadczenies['rok_do_d'] }}</p>
                    @else
                    <p>{{ $doswiadczenies['rok_od_d'] }} - teraz</p>
                    @endif
                    <h5>{{ $doswiadczenies['nazwa_stanowiska'] }}</h5>
                    <p>{{ $doswiadczenies['miejsce'] }}</p>
                    <p>{{ $doswiadczenies['description'] }}</p>
                    @endforeach
                    @endif
                    @if(!empty($edukacja[0]['szkola']))
        <h3 style="color: {{$color}};">Edukacja</h3>
        
        @foreach($edukacja as $edukacjas)
        @if($edukacjas['uczy_sie'] === 0)
                    <p>{{ $edukacjas['rok_od_e'] }} - {{ $edukacjas['rok_do_e'] }}</p>
                    @else
                    <p>{{ $edukacjas['rok_od_e'] }} - teraz</p>
                    @endif
                    <h5>{{ $edukacjas['kierunek'] }}, {{ $edukacjas['poziom_wyksztalcenia'] }}</h5>
                    <p>{{ $edukacjas['szkola'] }}</p>
                    @endforeach
                    @endif
                    @if(!empty($jezyki_obce[0]['jezyk']))
        <h3 style="color: {{$color}};">Języki obce</h3>
        
        @foreach($jezyki_obce as $jezyki_obces)
                    <p>{{$jezyki_obces['jezyk']}}, {{$jezyki_obces['poziom']}}</p>
                    @endforeach
                    @endif
                    @if(!empty($umiejetnosci[0]['opis']))
        <h3 style="color: {{$color}};">Umiejętności</h3>
        
            @foreach($umiejetnosci as $umiejetnoscis)
            <p>{{$umiejetnoscis['opis']}}</p>
            @endforeach
            @endif
            @if(!empty($zainteresowania[0]['opis']))
        <h3 style="color: {{$color}};">Zainteresowania</h3>
        
            @foreach($zainteresowania as $zainteresowanias)
            <p>{{$zainteresowanias['opis']}}</p> 
            @endforeach
            @endif
        </td>
    </tr>
    
</table>
</div>
        <p>"Wyrażam zgodę na przetwarzanie moich danych osobowych dla potrzeb niezbędnych do realizacji procesu rekrutacji (zgodnie z Ustawą z dnia 29.08.1997 roku o Ochronie Danych Osobowych; tekst jednolity: Dz. U. z 2002r. Nr 101, poz. 926 ze zm.)".</p>
   
    </body>
</html>