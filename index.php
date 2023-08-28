<!DOCTYPE html>
<html>
<body>

<h1>open-gym</h1>

<button type="button" onclick="on()">Open The Turnstile</button>
<button type="button" onclick="off()">Close The Turnstile</button>
<button type="button" onclick="">Retrieve COM3 Data</button>

<p id="demo"></p>
 
<script>
const xhttp = new XMLHttpRequest();
function on() {
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "ino.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("data=on");
}

function off() {
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "ino.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("data=off");
}

// function getComData() {
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       document.getElementById("demo").innerHTML = this.responseText;
//     }
//   };
//   xhttp.open("POST", "ino.php", true);
//   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//   xhttp.send("dataViewKey=blablabla");
// }
</script>

</body>
</html>
