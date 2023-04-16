<x-app-layout>

<html>
    <script type='text/javascript'>
    var BingMapsKey = 'Ao_ESbWpabVG64QS8J4pi7vN8DnUljBna8ybzNBaq_37M55BnIEfrvbOXMdKyGYp'
    </script>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=BingMapsKey&setMkt=en-US&setLang=en'></script>    
<!--<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Ao_ESbWpabVG64QS8J4pi7vN8DnUljBna8ybzNBaq_37M55BnIEfrvbOXMdKyGYp' async defer></script>-->
<body>
    <div>
        <div id="myMap"></div>
    </div>
    
    <script>
    
    const maArr = [{"COUNTRY_CODE":"AL","NAME_EN":"ALBANIA","CAPITAL_EN":"TIRANA","LAT":"41.3274082","LON":"19.8193172"},{"COUNTRY_CODE":"AG","NAME_EN":"ANTIGUA AND BARBUDA","CAPITAL_EN":"ST. JOHN'S","LAT":"17.1181446","LON":"-61.8339573"},{"COUNTRY_CODE":"BJ","NAME_EN":"BENIN","CAPITAL_EN":"PORTO-NOVO","LAT":"6.4726571","LON":"2.6420373"},{"COUNTRY_CODE":"BF","NAME_EN":"BURKINA FASO","CAPITAL_EN":"OUAGADOUGOU","LAT":"12.3680826","LON":"-1.527066"},{"COUNTRY_CODE":"BH","NAME_EN":"BAHRAIN","CAPITAL_EN":"MANAMA","LAT":"26.2334989","LON":"50.5720162"},{"COUNTRY_CODE":"BA","NAME_EN":"BOSNIA AND HERZEGOVINA","CAPITAL_EN":"SARAJEVO","LAT":"43.8589239","LON":"18.4334395"}]
        
    var map = null, infobox, dataLayer;
     function GetMap() 
     {
         map = new Microsoft.Maps.Map(document.getElementById("myMap"),
           {
               credentials: "Bing Mpas Key",
               center: new Microsoft.Maps.Location(35, 140)});
       dataLayer = new Microsoft.Maps.EntityCollection();
       map.entities.push(dataLayer);
       map.setView({ zoom: 1 });
     var infoboxLayer = new Microsoft.Maps.EntityCollection();
       map.entities.push(infoboxLayer);
       infobox = new Microsoft.Maps.Infobox();
       infoboxLayer.push(infobox);
       infobox.setMap(map);
       
       AddData();
     };
    
       pin = new Array(maArr.length)
       function AddData() {
       for (let i = 0; i < maArr.length; i++) {          
         pin[i] = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(maArr[i].LAT, maArr[i].LON));
         pin[i].Title = maArr[i].NAME_EN;
         pin[i].Description = JSON.stringify(maArr[i]);
        //  console.log(pin[i]);
         Microsoft.Maps.Events.addHandler(pin[i], 'click', displayInfobox);
         dataLayer.push(pin[i]);
       };
       };
    
      //  console.log(maArr[0]);
    
     function displayInfobox(e) {
         if (e.targetType == 'pushpin') {
             infobox.setLocation(e.target.getLocation());
                     
             infobox.setOptions({
                 visible: true,
                 title: e.target.Title,
                 description: e.target.Description
             });
         }
     }
     </script>

</x-app-layout>
