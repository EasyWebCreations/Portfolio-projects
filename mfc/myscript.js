function myFunction(x) {
    x.style.background = "yellow";
    var returns = document.getElementById("returns_after_maturity_01").value;
    var premium = document.getElementById("premium").value;
    var ppt = document.getElementById("ppt").value;
    document.getElementById("xirr").innerHTML = returns;
    console.log(vedangi);
    console.log(ppt);
    console.log(premium);
}

function function1() {
    var premium = document.getElementById("premium").value;
    var ppt = document.getElementById("ppt").value;

    var roi = document.getElementById("xirr").value;

    var returns_after_maturity = document.getElementById(
        "returns_after_maturity_01"
    ).value;

    console.log(premium);
    console.log(ppt);

    console.log(roi);

    console.log(returns_after_maturity);

    var table =
        '<table id="table_01" style="border:2px solid black;background-color:azure" class="table table-striped"> <thead class="table-primary">';

    table = table + "<tr>";
    table = table + "<td>Policy Year</td>";
    table = table + "<td>Premium</td>";
    table = table + "<td>Returns</td>";
    table = table + "<td>Cash Flow</td>";
    table = table + "<td>Total Premium Paid</td>";

    table = table + "</tr></thead>";

    for (var i = 1; i <= ppt; i++) {
        table = table + "<tr id=" + i + ">";
        table = table + "<td>" + i + "</td>";
        table = table + "<td>" + premium + "</td>";
        table = table + "<td></td>";
        table = table + "<td>" + -premium + "</td>";
        table = table + "<td>" + premium * i + "</td>";

        table = table + "</tr>";
    }
    table = table + '<tr class="table-primary">';
    table = table + "<td>Total</td>";
    table = table + "<td>" + ppt * premium + "</td>";
    table = table + "<td>" + returns_after_maturity + "</td>";
    table = table + "<td></td>";

    table = table + "<td></td>";
    table = table + "</tr>";
    table = table + "</table>";

    document.getElementById("container").innerHTML = table;

    document.getElementById("premium_b").value = premium;
    document.getElementById("ppt_b").value = ppt;
    document.getElementById("returns_after_maturity_b").value =
        returns_after_maturity;
}

function function3() {
    var premium = document.getElementById("premium_b").value;
    var ppt = document.getElementById("ppt_b").value;
    var surrender_year = document.getElementById("surrender_year_b").value;

    var returns_if_surrendered = document.getElementById(
        "returns_if_surrendered_b"
    ).value;
    var returns_after_maturity = document.getElementById(
        "returns_after_maturity_b"
    ).value;

    console.log(premium);
    console.log(ppt);
    console.log(surrender_year);

    console.log(returns_if_surrendered);
    console.log(returns_after_maturity);

    var table =
        '<table style="width:60%;margin-left:20%;border:2px solid black;background-color:azure" class="table table-striped"> <thead <thead class="table-primary">';

    table = table + "<tr>";
    table = table + "<td>Policy Year</td>";
    table = table + "<td>Premium</td>";
    table = table + "<td>Returns</td>";
    table = table + "<td>Cash Flow</td>";
    table = table + "<td>Total Premium Paid</td>";
    table = table + "<td>Surrender Value</td>";
    table = table + "</tr></thead>";

    for (var i = 1; i <= ppt; i++) {
        if (i == surrender_year) {
            table = table + "<tr id=" + i + ">";
            table = table + "<td>" + i + "</td>";
            table = table + "<td>" + premium + "</td>";
            table = table + "<td>C</td>";
            table = table + "<td>" + -premium + "</td>";
            table = table + "<td>" + premium * i + "</td>";
            table = table + "<td>" + returns_if_surrendered + "</td>";
            table = table + "</tr>";
            continue;
        }
        table = table + "<tr id=" + i + ">";
        table = table + "<td>" + i + "</td>";
        table = table + "<td>" + premium + "</td>";
        table = table + "<td></td>";
        table = table + "<td>" + -premium + "</td>";
        table = table + "<td>" + premium * i + "</td>";
        table = table + "<td></td>";
        table = table + "</tr>";
    }
    table = table + '<tr class="table-primary">';
    table = table + "<td>Total</td>";
    table = table + "<td>" + ppt * premium + "</td>";
    table = table + "<td>" + returns_after_maturity + "</td>";
    table = table + "<td></td>";
    table = table + "<td></td>";
    table = table + "<td></td>";
    table = table + "</tr>";
    table = table + "</table>";

    document.getElementById("container3").innerHTML = table;
    document.getElementById("returns_if_surrendered01").value =
        returns_if_surrendered;
    document.getElementById("ip").value = ppt - surrender_year;
    document.getElementById("sip_a").value = premium / 12;
    document.getElementById("invp_a").value = ppt - surrender_year;
    var x = document.getElementById("next");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function function2() {
    var returns_if_surrendered = document.getElementById(
        "returns_if_surrendered01"
    ).value;
    var rate_of_interest = document.getElementById("rate_of_interest").value;
    var ip = document.getElementById("ip").value;
    var sum;

    // return prem+ppt;
    sum = 1 + rate_of_interest / 100;
    power = sum ** ip;
    total = power * returns_if_surrendered;
    // return total;

    // document.getElementById("output1").innerHTML = "Amount you will get:"+total + " Rs";

    // document.getElementById("output1").style.color="black";
    // document.getElementById("output1").style.backgroundColor="#66ccff";
    // document.getElementById("output1").style.height="100px";
    // document.getElementById("output1").style.marginLeft="40%";
    // document.getElementById("output1").style.marginTop="-100px";
    // document.getElementById("output1").style.padding="2%";
    // document.getElementById("output1").style.fontSize="30px";
    // document.getElementById("output1").style.border = "solid gray 5px"
    var returns = document.getElementById("returns_after_maturity_01").value;
    document.getElementById("Previous_returns").innerHTML = returns;
    document.getElementById("Previous_returns").style.color = "red";
    document.getElementById("Current_returns").innerHTML =
        parseFloat(total).toFixed(2);
    document.getElementById("Current_returns").style.color = "green";
}

function futureValue2() {
    sip = parseInt(document.getElementById("sip_a").value);
    invp = parseInt(document.getElementById("invp_a").value);
    var rate_of_interest = parseInt(
        document.getElementById("rate_of_interest").value
    );
    //FV = P [ (1+i)^n-1 ] * (1+i)/i
    var i = rate_of_interest / 100 / 12;

    var FV = (sip * (Math.pow(1 + i, invp * 12) - 1) * (1 + i)) / i;

    console.log("FV:", FV);
    console.log("sip:", sip);
    console.log("i:", i);
    console.log("Period:", invp);

    //   ipm=invp*12; // investment period in months

    //   roi=12; // rate of interest

    // answer=0.12*investment_total;
    // final=answer+investment_total;

    document.getElementById("output2").innerHTML =
        "Amount you will get :" + parseFloat(FV).toFixed(2);
    document.getElementById("output2").style.color = "black";
    document.getElementById("output2").style.backgroundColor = "azure";
}