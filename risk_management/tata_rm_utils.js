function deathSumAssured() {
  var death_sum_assured = parseInt(
    document.getElementById("death_sum_assured").value
  );
  console.log(death_sum_assured);
  document.getElementById("base-PTD").value = death_sum_assured;
  document.getElementById("base-PPD").value = death_sum_assured;
  //   min(0.5%dsa,5000)
  document.getElementById("acc_hospital_exp").value = min(
    0.005 * death_sum_assured,
    5000
  );
  document.getElementById("coma_benifit").value = min(
    10 * death_sum_assured,
    500000
  );
  //   document.getElementById("children_tuition_benifit_value").innerText = min(
  //     0.1 * death_sum_assured,
  //     100000
  //   );
  document.getElementById("fracture").value = 1000000;
  document.getElementById("pdf_child_edu").value = document.getElementById(
    "children_tuition_benifit"
  ).value;
}

function min(qt1, qt2) {
  if (parseInt(qt1, 10) > parseInt(qt2, 10)) {
    return qt2;
  } else {
    return qt1;
  }
}

function valueUpdatePrint() {
  document.getElementById("name-dis").innerHTML =
    document.getElementById("full-name").value;
  //   document.getElementById("pdf_monthlyAvgIncome").innerHTML = document.getElementById("avg_value").value;
  document.getElementById("pdf_death").innerHTML =
    document.getElementById("death_sum_assured").value;
  let death_sum_assured = parseInt(
    document.getElementById("death_sum_assured").value
  );
  document.getElementById("pdf_ptd").innerHTML =
    document.getElementById("base-PTD").value;
  document.getElementById("pdf_ppd").innerHTML =
    document.getElementById("base-PPD").value;
  document.getElementById("pdf_hospital_daily_cash").innerHTML =
    document.getElementById("acc_hospital_exp").value;
  document.getElementById("pdf_air_ambulance").innerHTML = min(
    25000,
    parseInt(document.getElementById("air_ambulance").value)
  );
  let loan = 0;
  let loanChoice = parseInt(document.getElementById("loan").value);
  if (loanChoice == 1) {
    loan = 0.25 * death_sum_assured;
    document.getElementById("loan").innerHTML = loan;
  }
  if (loanChoice == 0) {
    loan = 0;
    document.getElementById("loan").innerHTML = loan;
  }
  document.getElementById("pdf_loan_shield").innerHTML = min(
    loan,
    0.25 * death_sum_assured
  );
  let premium = 0;
  if (death_sum_assured == "5000000") {
    premium = 11778;
  }
  if (death_sum_assured == "10000000") {
    premium = 16116.09;
  }
  if (death_sum_assured == "15000000") {
    premium = 20454;
  }
  if (death_sum_assured == "20000000") {
    premium = 24792;
  }
  if (death_sum_assured == "25000000") {
    premium = 29130;
  }
  if (death_sum_assured == "30000000") {
    premium = 33488;
  }
  if (death_sum_assured == "35000000") {
    premium = 37806;
  }
  if (death_sum_assured == "40000000") {
    premium = 42144;
  }
  if (death_sum_assured == "45000000") {
    premium = 41898; //41897.64;
    // confirm once
  }
  if (death_sum_assured == "50000000") {
    premium = 50819;
  }
  let gst = Math.round(premium * 0.18);
  document.getElementById("pdf_premium_value").innerHTML = premium;
  document.getElementById("pdf_gst").innerHTML = gst;
  document.getElementById("pdf_total_amount").innerHTML = premium + gst;
  //   document.getElementById("name-dis").innerHTML = document.getElementById("full-name").value;
  //   document.getElementById("name-dis").innerHTML = document.getElementById("full-name").value;
  //   document.getElementById("name-dis").innerHTML = document.getElementById("full-name").value;
}
