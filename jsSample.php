<html>
<head>
<!--css and js here -->
<script>
function pageLoaded(){


var div = document.createElement("div");

var insert = document.createTextNode("new element added");

div.appendChild(insert);

var curDiv = document.getElementById("div1");
document.body.insertBefore(div, curDiv);


}



</script>
</head>

<body onload="pageLoaded();console.log('loaded');">

<!-- html content -->

<p>It loaded, yay!</p>

</body>
</html>
