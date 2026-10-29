document.addEventListener("DOMContentLoaded", function() {
  nummer = ""
  document
    .getElementById("nr1")
    .addEventListener("click", function() {
      nummer +=1;
      nummer = nummer.substr(-2);
      document.getElementById("titelVoor").innerHTML = nummer;
    })
  document
    .getElementById("nr2")
    .addEventListener("click", function() {
      nummer += 2;
      nummer = nummer.substr(-2);
      document.getElementById("titelVoor").innerHTML = nummer;
    })
  document
    .getElementById("nr3")
    .addEventListener("click", function() {
      nummer += 3;
      nummer = nummer.substr(-2);
      document.getElementById("titelVoor").innerHTML = nummer;
    })
  document
    .getElementById("nr4")
    .addEventListener("click", function() {
      nummer += 4;
      nummer = nummer.substr(-2);
      document.getElementById("titelVoor").innerHTML = nummer;
    })
  document
    .getElementById("nr5")
    .addEventListener("click", function() {
      nummer += 5;
      nummer = nummer.substr(-2);
      document.getElementById("titelVoor").innerHTML = nummer;
    })
  document
    .getElementById("nr6")
    .addEventListener("click", function() {
      nummer += 6;
      nummer = nummer.substr(-2);
      document.getElementById("titelVoor").innerHTML = nummer;
    })
  document
    .getElementById("nr7")
    .addEventListener("click", function() {
      nummer += 7;
      nummer = nummer.substr(-2);
      document.getElementById("titelVoor").innerHTML = nummer;
    })
  document
    .getElementById("nr8")
    .addEventListener("click", function() {
      nummer += 8;
      nummer = nummer.substr(-2);
      document.getElementById("titelVoor").innerHTML = nummer;
    })
  document
    .getElementById("nr9")
    .addEventListener("click", function() {
      nummer += 9;
      nummer = nummer.substr(-2);
      document.getElementById("titelVoor").innerHTML = nummer;
    })
  document
    .getElementById("nr0")
    .addEventListener("click", function() {
      nummer += 0;
      nummer = nummer.substr(-2);
      document.getElementById("titelVoor").innerHTML = nummer;
    })
  document
    .getElementById("stop")
    .addEventListener("click", function() {
      nummer = ""
      document.getElementById("titelVoor").innerHTML = "Welkom bij <br> Volksterrenwacht Mira";
    })
  document
    .getElementById("goTo")
    .addEventListener("click", function() {
        location.href = 'pagina.php?nummer=' + nummer;
    })
  document
    .getElementById("aarde")
    .addEventListener("click", function() {
        location.href = 'trajecten/de_aarde.html';
    })
  document
    .getElementById("maan")
    .addEventListener("click", function() {
        location.href = 'trajecten/de_maan.html';
    }) 
    document
    .getElementById("kaart")
    .addEventListener("click", function() {
        location.href = 'kaart/grond/Gelijkvloers.html';
    }) 
})