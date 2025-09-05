function myFunction(x) {
  x.style.background = "yellow";
  var returns=document.getElementById("returns_after_maturity_01").value;
  var premium=document.getElementById("premium").value;
  var ppt=document.getElementById("ppt").value;
  document.getElementById("xirr").innerHTML=returns;
  console.log(vedangi);
  console.log(ppt);
  console.log(premium);
}

function function1()
{
    var premium=document.getElementById("premium").value;
    var ppt=document.getElementById("ppt").value;
   
    var roi=document.getElementById("xirr").value;
   
    var returns_after_maturity=document.getElementById("returns_after_maturity_01").value;
    

    console.log(premium);
    console.log(ppt);
    
    console.log(roi);
    
    console.log(returns_after_maturity);

    var table='<table style="width:60%;margin-left:20%;border:2px solid black" class="table table-striped"> <thead class="table-primary">';
       
    table=table+'<tr>'
    table=table+'<td>Policy Year</td>'
    table=table+'<td>Premium</td>'
    table=table+'<td>Returns</td>'
    table=table+'<td>Cash Flow</td>'
    table=table+'<td>Total Premium Paid</td>'
 
    table=table+'</tr></thead>';

   for(var i=1;i<=ppt;i++)
   {
      
    table=table+'<tr id='+i+'>'
    table=table+'<td>'+i+'</td>'
    table=table+'<td>'+premium+'</td>'
    table=table+'<td></td>'
    table=table+'<td>'+ (-premium)+'</td>'
    table=table+'<td>'+ premium*i +'</td>'
    
    table=table+'</tr>';
   }
   table=table+'<tr class="table-primary">'
   table=table+'<td>Total</td>'
   table=table+'<td>'+ppt*premium+'</td>'
   table=table+'<td>'+returns_after_maturity+'</td>'
   table=table+'<td></td>'
   
   table=table+'<td></td>'
   table=table+'</tr>';
    table=table+'</table>';
    
    document.getElementById("container").innerHTML=table;

    document.getElementById("premium_b").value=premium;
    document.getElementById("ppt_b").value=ppt;
    document.getElementById("returns_after_maturity_b").value = returns_after_maturity;
    
    
}
 
function function3()
{
    var premium=document.getElementById("premium_b").value;
    var ppt=document.getElementById("ppt_b").value;
    var surrender_year=document.getElementById("surrender_year_b").value;
    
    var returns_if_surrendered=document.getElementById("returns_if_surrendered_b").value;
    var returns_after_maturity=document.getElementById("returns_after_maturity_b").value;
    

    console.log(premium);
    console.log(ppt);
    console.log(surrender_year);
    
    console.log(returns_if_surrendered);
    console.log(returns_after_maturity);

    var table='<table style="width:60%;border:2px solid black" class="table table-striped"> <thead <thead class="table-primary">';
       
    table=table+'<tr>'
    table=table+'<td>Policy Year</td>'
    table=table+'<td>Premium</td>'
    table=table+'<td>Returns</td>'
    table=table+'<td>Cash Flow</td>'
    table=table+'<td>Total Premium Paid</td>'
    table=table+'<td>Surrender Value</td>'
    table=table+'</tr></thead>';

   for(var i=1;i<=ppt;i++)
   {
       if(i==surrender_year)
       {
        table=table+'<tr id='+i+'>'
        table=table+'<td>'+i+'</td>'
        table=table+'<td>'+premium+'</td>'
        table=table+'<td>C</td>'
        table=table+'<td>'+ (-premium)+'</td>'
        table=table+'<td>'+ premium*i +'</td>'
        table=table+'<td>'+ returns_if_surrendered +'</td>'
        table=table+'</tr>';
           continue;
       }
    table=table+'<tr id='+i+'>'
    table=table+'<td>'+i+'</td>'
    table=table+'<td>'+premium+'</td>'
    table=table+'<td></td>'
    table=table+'<td>'+ (-premium)+'</td>'
    table=table+'<td>'+ premium*i +'</td>'
    table=table+'<td></td>'
    table=table+'</tr>';
   }
   table=table+'<tr class="table-primary">'
   table=table+'<td>Total</td>'
   table=table+'<td>'+ppt*premium+'</td>'
   table=table+'<td>'+returns_after_maturity+'</td>'
   table=table+'<td></td>'
   table=table+'<td></td>'
   table=table+'<td></td>'
   table=table+'</tr>';
    table=table+'</table>';
    
    document.getElementById("container3").innerHTML=table;

    var x = document.getElementById("next");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}
 
function function2()
{
    var returns_if_surrendered=document.getElementById("returns_if_surrendered01").value;
    var rate_of_interest=document.getElementById("rate_of_interest").value;
    var ip=document.getElementById("ip").value;
    var sum;          
          // return prem+ppt;
          sum=1+rate_of_interest/100;
          power=sum**ip;
          total=power*returns_if_surrendered;      
          // return total;
          document.getElementById("output1").innerHTML = "Amount you will get:"+total;
          document.getElementById("output1").style.color="white";
          document.getElementById("output1").style.backgroundColor="blue";
          document.getElementById("output1").style.height="100px";
          document.getElementById("output1").style.marginLeft="25%";
          document.getElementById("output1").style.marginTop="3%";
          document.getElementById("output1").style.padding="2%";
          document.getElementById("output1").style.fontSize="30px";
}

function futureValue2(){
    sip=document.getElementById("sip_a").value;
    invp=document.getElementById("invp_a").value;

    invest_in_year=sip*12; // investment in a Year
    investment_total=invest_in_year*invp; // Investment total 

    console.log(investment_total);

    answer1=investment_total;
    answer2=Math.pow(13, invp);
    answer=answer1*answer2;
    console.log(answer1);
    console.log(answer2);
    console.log(answer);
  //   ipm=invp*12; // investment period in months

  //   roi=12; // rate of interest 

    // answer=0.12*investment_total;
    // final=answer+investment_total;

    // document.getElementById("output2").innerHTML="Amount you will get :"+final;
    // document.getElementById("output2").style.color="black";
  

}


