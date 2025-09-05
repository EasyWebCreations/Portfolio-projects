let inputage = document.querySelector("#inputage");

function show() {
  var num = document.getElementById("inputage").value;
  if (num >= 26 && num <= 30) {
    r = 12626;
  } else if (num >= 31 && num <= 35) {
    r = 13393;
  } else if (num >= 36 && num <= 40) {
    r = 15104;
  } else if (num >= 41 && num <= 45) {
    r = 17995;
  } else if (num >= 46 && num <= 50) {
    r = 23718;
  } else if (num >= 51 && num <= 55) {
    r = 30680;
  } else if (num >= 56 && num <= 60) {
    r = 40533;
  } else if (num >= 61 && num <= 65) {
    r = 56109;
  } else if (num >= 66 && num <= 70) {
    r = 76641;
  } else if (num >= 71 && num <= 75) {
    r = 97586;
  } else if (num >= 76) {
    r = 109681;
  }

  let premamt = document.querySelector("#premamt");
  premamt.value = r;
}

/*function subfunc(){
          document.getElementById("subform").submit();
          window.document.location='compare.html';
}*/

//let num = document.getElementById("numyears").value;

let sumprem = 0;
let sumprem2 = 0;
let totalfinal = 0;
let totalfinal2 = 0;
function GenerateTable() {
  let premium = document.getElementById("payment").value;
  let premium2 = document.getElementById("premiumtopup").value;

  let num = document.getElementById("numyears").value;
  let age = document.getElementById("inputage").value;
  let name1 = document.getElementById("inputname").value;
  //let num = document.querySelector('#numrows');
  var total = 0;
  var total2 = 0;
  // var num = document.getElementById("numyears").value;
  var tbl = document.getElementById("instable");

  //alert(tbl);

  for (let i = 1; i <= num; i++) {
    total = parseInt(premium) + parseInt(total);
    total2 = parseInt(premium2) + parseInt(total2);
    var row = tbl.insertRow();
    var cel1 = row.insertCell();
    var cel2 = row.insertCell();
    var cel3 = row.insertCell();
    var cel4 = row.insertCell();
    // var cel5 = row.insertCell();
    // var cel6 = row.insertCell();

    cel1.innerHTML = i;
    cel2.innerHTML = parseFloat(age) + parseFloat(i - 1);
    cel3.innerHTML = Math.round(premium);
    cel4.innerHTML = total;
    // cel5.innerHTML = Math.round(premium2);
    // cel6.innerHTML = Math.round(total2);

    cel1.style.border = "1px solid black";
    cel2.style.border = "1px solid black";
    cel3.style.border = "1px solid black";
    cel4.style.border = "1px solid black";
    // cel5.style.border = "1px solid black";
    // cel6.style.border = "1px solid black";

    sumprem = parseFloat(sumprem) + parseFloat(premium);
    sumprem2 = parseFloat(sumprem2) + parseFloat(premium2);
    totalfinal = parseFloat(totalfinal) + parseFloat(total);
    totalfinal2 = parseFloat(totalfinal2) + parseFloat(total2);
    if (i % 5 == 0) {
      premium = parseFloat(premium) + parseFloat(premium * 0.05);
    }
    if (i % 5 == 0) {
      premium2 = parseFloat(premium2) + parseFloat(premium2 * 0.05);
    }
  }
  //dvTable.innerHTML = num.value;
}

//topup

function GenerateTableTopup() {
  let premium = document.getElementById("payment").value;
  let premium2 = document.getElementById("premiumtopup").value;

  let num = document.getElementById("numyears").value;
  let age = document.getElementById("inputage").value;
  let name1 = document.getElementById("inputname").value;
  //let num = document.querySelector('#numrows');
  var total = 0;
  var total2 = 0;
  // var num = document.getElementById("numyears").value;
  var tbl2 = document.getElementById("instable_topup");
  var select1 = document.getElementById("sumassured").value;
  var sumassured1 = document.getElementById("sumassured_two").value;
  //alert(tbl);
  var rate = document.getElementById("rate").value;

  document.getElementById("print_name").innerHTML = name1;
  document.getElementById("print_age").innerHTML = age;
  document.getElementById("print_hebc").innerHTML = select1;
  document.getElementById("yield").innerHTML = rate;
  console.log(sumassured1);
  console.log(select1);
  document.getElementById("print_hebc_two").innerHTML = sumassured1;
  for (let i = 1; i <= num; i++) {
    total = parseInt(premium) + parseInt(total);
    total2 = parseInt(premium2) + parseInt(total2);
    var row = tbl2.insertRow();

    var cel1 = row.insertCell();
    var cel2 = row.insertCell();

    cel1.innerHTML = Math.round(premium2);
    cel2.innerHTML = Math.round(total2);

    cel1.style.border = "1px solid black";
    cel2.style.border = "1px solid black";

    sumprem = parseFloat(sumprem) + parseFloat(premium);
    sumprem2 = parseFloat(sumprem2) + parseFloat(premium2);
    totalfinal = parseFloat(totalfinal) + parseFloat(total);
    totalfinal2 = parseFloat(totalfinal2) + parseFloat(total2);

    if (i % 5 == 0) {
      premium = parseFloat(premium) + parseFloat(premium * 0.05);
    }
    if (i % 5 == 0) {
      premium2 = parseFloat(premium2) + parseFloat(premium2 * 0.05);
    }
  }
  //dvTable.innerHTML = num.value;
}

let q = 0;
let current = 0;
let suminmut = 0;
let totalclosing = 0;
function GenerateTableformutual() {
  var rateans = document.getElementById("rate").value;
  var rate = parseFloat(rateans / 100);

  let premium = document.getElementById("payment").value;
  let num = document.getElementById("numyears").value;
  let openingvalue = 0;
  var tbl = document.getElementById("muttable");

  let total = 0;
  q = premium;
  var roundq = 0;

  for (let i = 1; i <= num; i++) {
    if (i == 1) {
      yieldrate = premium * rate;
      closingvalue = parseFloat(premium) + parseFloat(yieldrate);
      openingvalue = 0;
    } else {
      yieldrate = openingvalue * rate;
      closingvalue = parseFloat(openingvalue) + parseFloat(yieldrate);
    }

    totalclosing = parseInt(totalclosing) + parseInt(closingvalue);

    total = parseInt(premium) + parseInt(total);

    var row = tbl.insertRow();
    var cel1 = row.insertCell();
    var cel2 = row.insertCell();
    var cel3 = row.insertCell();
    var cel4 = row.insertCell();
    cel1.innerHTML = Math.round(premium);

    cel2.innerHTML = Math.round(openingvalue);
    cel3.innerHTML = Math.round(yieldrate);
    cel4.innerHTML = Math.round(closingvalue);
    suminmut = parseFloat(suminmut) + parseFloat(premium);
    //  cel3.innerHTML = premium*(i+1);
    // q=parseFloat(q)+parseInt(premium);

    cel1.style.border = "1px solid black";
    cel2.style.border = "1px solid black";
    cel3.style.border = "1px solid black";
    cel4.style.border = "1px solid black";
    if (i % 5 == 0) {
      premium = parseFloat(premium) + parseFloat(premium * 0.05);
    }

    openingvalue = parseFloat(closingvalue) + parseFloat(premium);
  }
}
// function pdf() {
//    var prtContent = document.getElementById("pdf");
//    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
//    WinPrint.document.write(prtContent.innerHTML);

//    WinPrint.document.close();
//    WinPrint.focus();
//    WinPrint.print();
//    mywindow.document.write('<style>' +
//       ".pdf{padding: 15%;border:1px solid black;}" +
//       "table,td,tr {border: 1px solid black;padding: 1%;}" +
//       "table {border-collapse: collapse;width: 100%;}" +
//       ".p1{border: 1px solid black;}" +
//       ".p2 {border: 1px solid black;}" +
//       "#pro {width: 20%;}" +
//       ".header{background-color: orange;text-align: center;}" +
//       ".option{background-color:  #f2f2f2;}" +
//       '</style>');
//    setTimeout(function () {
//       mywindow.print();
//       mywindow.close();
//    }, 1000);
//    // mywindow.print();
//    // mywindow.close();
//    // mywindow.close();
//    return false;
// }
function pdf() {
  var divContents = document.getElementById("pdf").innerHTML;
  const printWindow = window.open(
    "print-page.html",
    "_blank",
    `width=${window.innerWidth},height=${window.innerHeight}`
  );
  printWindow.onload = function () {
    printWindow.document.body.innerHTML = divContents;
    printWindow.print();
  };
  setTimeout(function () {
    mywindow.print();
    mywindow.close();
  }, 15000);
  //    // mywindo
}

function downloadPdf() {
  var divContents = document.getElementById("pdf").innerHTML;
  const printWindow = window.open(
    "print-page.html",
    "_blank",
    `width=${window.innerWidth},height=${window.innerHeight}`
  );
  printWindow.onload = function () {
    printWindow.document.body.innerHTML = divContents;

    printWindow.print();
  };
  setTimeout(function () {
    mywindow.print();
    mywindow.close();
  }, 15000);
}

const reloadtButton = document.querySelector("#reload");
// Reload everything:
function reload() {
  reload = location.reload();
}
// Event listeners for reload
reloadButton.addEventListener("click", reload, false);
