function loadSanPham(queryString, page) {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
    xmlhttp.open("GET", "loadLaiSanPham.php?" + queryString + "&" + page);
    xmlhttp.send();
}