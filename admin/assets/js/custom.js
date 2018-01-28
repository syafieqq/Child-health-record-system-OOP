function updatesum() {
    var d1= new Date(document.getElementById("d1").value); // was value;); removed inner ;
    var d2 = new Date(document.getElementById("d2").value); // was value;); removed inner ;

    var total = (d2.getDate() - d1.getDate()) / 30 +
        d2.getMonth() - d1.getMonth() +
        (12 * (d2.getFullYear() - d1.getFullYear()));
		
    // alert(total);
    document.getElementById("txtTotal").value = total.toFixed(1);
    return false;
  }