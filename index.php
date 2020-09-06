<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Example for Data Class</title>
</head>
<body>
<div class="container">
    <header>
    <h1>Aplya MAMCHA MALA</h1>
    <h2>kay ghyal.......... </h2>
   <div class="menu-1">
     <label>Place Order :</label>&nbsp;
    <select id="menu" onchange="getByid()"> 
      <option>select menu item </option>
    </select>
   </div>
</header>
   <div class="detailcontainer">
   <div class="order-details">
     
     <div class="details">
      <b> DISH ID: </b>                 <span id="ID"></span><br><br>
      <b> DISH Name :</b>               <span id="name"></span><br><br>
      <b> About the DISH: </b>          <span id="About"></span><br><br>
      <b> Price for small in $ :</b>    <span id="scost"></span><br><br> 
      <b> Price for large in $ :</b>    <span id="lcost"></span><br><br>
     </div>
</div>
    <script src="jquery-3.5.1.min.js"></script>
    <script>
    let base_url = "http://localhost/assPHP/restaurant.php";
    var range;
    var flist ;
    var vari;
    var a = document.getElementById('menu');
    var Order = new XMLHttpRequest();
    Order.open('GET','https://davids-restaurant.herokuapp.com/menu_items.json');
    console.log("yes");
    Order.onload = function(){
        flist = JSON.parse(Order.responseText);
        vari = flist.menu_items;
        for(range = 0; range < flist['menu_items'].length; range++){
            a.innerHTML=a.innerHTML + "<option>"+flist['menu_items'][range].name +"</option>";
        }
        
    };
    Order.send();
        $("document").ready(function(){
            getNameList();
            getByid();
            $.get(base_url,function(data,success){
            });
        });

        function getNameList() {
            let url = base_url + "?req=name";
        }

        function getByid() {
            var idx = a.selectedIndex;
            var menuid = vari[idx].id - 1 ;
            let url = base_url + "?req=restaurant&id="+ menuid;
            $.get(url,function(data,success){
               console.log(data);
               console.log(data.name);
                document.getElementById('ID').innerHTML= data.short_name ;
                document.getElementById('name').innerHTML= data.name ;
                document.getElementById('About').innerHTML= data.description;
                document.getElementById('scost').innerHTML= data.price_small ;
                document.getElementById('lcost').innerHTML= data.price_large ;

            });
        }

    
    </script>
</body>
</html>