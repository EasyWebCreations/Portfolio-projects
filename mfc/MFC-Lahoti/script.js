function function1(){
    premium=document.getElementById("premium").value;
    ppt=document.getElementById("ppt").value;
    sv=document.getElementById("sv").value;

    totalsum=ppt*premium; // Total amount invested
    totalbenefit=totalsum+0.0536*totalsum*ppt; // Total amount benefited from investment
    surrendervaluesum=premium*sv; // total sum from surrender investment
    surenderbenefitvalue=surrendervaluesum+0.0536*surrendervaluesum*sv;

    document.getElementById("totalsum").innerHTML="Total Investment Sum:"+totalsum;
    document.getElementById("totalbenifit").innerHTML="With Benifit:"+totalbenefit;
    document.getElementById("surrendersum").innerHTML="Total Investment at Surrender Year:"+surrendervaluesum;
    document.getElementById("surrenderbenefit").innerHTML="Surrender Year Benefit:"+surenderbenefitvalue;
    document.getElementById("totalsum").style.color="cyan";
    document.getElementById("totalbenifit").style.color="cyan";
    document.getElementById("surrendersum").style.color="cyan";
    document.getElementById("surrenderbenefit").style.color="cyan";


}
function1();


function futureValue1(){

    iv = document.getElementById("iv").value;
    ip = document.getElementById("ip").value;
    roi = document.getElementById("ep").value;
      
      // return prem+ppt;
      sum=1+roi/100;
      power=sum**ip;
      total=power*iv;
  
      // return total;
      document.getElementById("output1").innerHTML = "Amount you will get:"+total;
      document.getElementById("output1").style.color="cyan";
  
      
      
  }
  futureValue1();
  
function futureValue2(){
      sip=document.getElementById("sip1").value;
      invp=document.getElementById("invp").value;

      invest_in_year=sip*12; // investment in a Year
      investment_total=invest_in_year*invp; // Investment total 
    //   ipm=invp*12; // investment period in months

    //   roi=12; // rate of interest 

      answer=0.12*investment_total;
      final=answer+investment_total;

      document.getElementById("output2").innerHTML="Amount you will get :"+final;
      document.getElementById("output2").style.color="cyan";
    

 }
 futureValue2();




 document.getElementById('btn1').onclick=function(){
  var rows=document.getElementById('ppt').value
  
  var columns=4;
  if(rows=="" || rows==null)
  rows=10
  if(columns=="" || columns==null)
  columns=10
  var output='<table border="1" cellspacing="0" cellpadding="5" class="table">'

  function createTable(rows,columns){
    var premium=document.getElementById("premium").value;
    var sv=document.getElementById("sv").value;
    

    
      for(var i=1;i<=rows;i++){
          output=output+'<tr id="'+i+'">'
          
              output=output+'<td  id="col_'+i+'_1">'+premium+'</td>'
              output=output+'<td id="col_'+i+'_2">'+'-'+premium+'</td>'
              output=output+'<td id="col_'+i+'_3">'+'C'+'</td>'
              output=output+'<td id="col_'+i+'_4">'+'C'+'</td>'
              
              
          
          output=output+'</tr>'
      }
      output=output+'</table>'
      document.getElementById('container').innerHTML=output   
      
 }
 createTable(rows,columns)
}