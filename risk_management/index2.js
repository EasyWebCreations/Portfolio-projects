const newFunction = R.compose(display,myFunction2,myFunction3,myFunction5,myFunction7,myFunction10,myFunction11,myFunction15);

function display(){
    var name1 = document.getElementById("full-name");
    var y = document.getElementById('risk-class');
    var first_income
    var second_income
    var third_income
    // var first_income = document.getElementById("first_income").value
    // var second_income = document.getElementById("second_income").value
    // var third_income = document.getElementById("third_income").value
    var base_death = parseInt(document.getElementById("base-death").value);
    var base_PTD = parseInt(document.getElementById("base-PTD").value);
    var base_PPD = parseInt(document.getElementById("base-PPD").value);
    var result = 0;
    first_income = parseInt(document.getElementById("first_income").value);
    second_income = parseInt(document.getElementById("second_income").value);
    third_income = parseInt(document.getElementById("third_income").value);
    var avg_mon = ((first_income + second_income + third_income)/3/12) - (((first_income + second_income + third_income)/3/12)%1000);
    
    // if(death = )
    // result = ((first_income + second_income + third_income)/3/12)
    document.getElementById("name-dis").innerHTML = name1.value;
    if(y.options[y.selectedIndex].value == 1){
      document.getElementById("base-cover").innerHTML = "BASE COVER (Category I)";
    }
    if(y.options[y.selectedIndex].value == 2){
      document.getElementById("base-cover").innerHTML = "BASE COVER (Category II)";
    }
    if(y.options[y.selectedIndex].value == 3){
      document.getElementById("base-cover").innerHTML = "BASE COVER (Category III)";
    }
    if((document.getElementById("first_income")).value ==''){
      first_income = 0;
      second_income = 0;
      third_income = 0;
      document.getElementById("inc-2").innerHTML = 0;
      document.getElementById("inc-3").innerHTML = 0;
      document.getElementById("inc-4").innerHTML = 0;
      document.getElementById("pre-1").innerHTML = 0;
      document.getElementById("pre-2").innerHTML = 0;
      document.getElementById("pre-3").innerHTML = 0;
      return 0;
    }
    else {
      if(base_death > (avg_mon*100) || base_PTD > (avg_mon*60) || base_PPD > (avg_mon*60)){
        first_income = parseInt(document.getElementById("first_income").value)
        second_income = parseInt(document.getElementById("second_income").value)
        third_income = parseInt(document.getElementById("third_income").value)
        result = ((first_income + second_income + third_income)/3/12) - (((first_income + second_income + third_income)/3/12)%1000);
        document.getElementById("inc-1").innerHTML = result;
        document.getElementById("inc-2").innerHTML = (result*100);
        document.getElementById("inc-3").innerHTML = (result*60);
        document.getElementById("inc-4").innerHTML = (result*60);
        if(y.options[y.selectedIndex].value == 1){
          document.getElementById("pre-1").innerHTML = Math.round((result*100)*0.43/1000);
          document.getElementById("pre-2").innerHTML = Math.round((result*60)*0.05/1000);
          document.getElementById("pre-3").innerHTML = Math.round((result*60)*0.07/1000);
          return Math.round((result*100)*0.43/1000)+ Math.round((result*60)*0.05/1000) + Math.round((result*60)*0.07/1000);
        }
        else if(y.options[y.selectedIndex].value == 2){
        document.getElementById("pre-1").innerHTML = Math.round((result*100)*0.69/1000);
        document.getElementById("pre-2").innerHTML = Math.round((result*60)*0.17/1000);
        document.getElementById("pre-3").innerHTML = Math.round((result*60)*0.19/1000);
        return Math.round((result*100)*0.69/1000)+ Math.round((result*60)*0.17/1000) + Math.round(  (result*60)*0.19/1000);
        }
      }
      else if(base_death < (avg_mon*100) && base_PTD < (avg_mon * 60) && base_PPD < (avg_mon*60)){
        first_income = parseInt(document.getElementById("first_income").value)
        second_income = parseInt(document.getElementById("second_income").value)
        third_income = parseInt(document.getElementById("third_income").value)
        result = ((first_income + second_income + third_income)/3/12) - (((first_income + second_income + third_income)/3/12)%1000);
        document.getElementById("inc-1").innerHTML = result;
        document.getElementById("inc-2").innerHTML = (base_death);
        document.getElementById("inc-3").innerHTML = (base_PTD);
        document.getElementById("inc-4").innerHTML = (base_PPD);
        if(y.options[y.selectedIndex].value == 1){
          document.getElementById("pre-1").innerHTML = Math.round((base_death)*0.43/1000);
          document.getElementById("pre-2").innerHTML = Math.round((base_PTD)*0.05/1000);
          document.getElementById("pre-3").innerHTML = Math.round((base_PPD)*0.07/1000);
          return Math.round((base_death)*0.43/1000)+ Math.round((base_PTD)*0.05/1000) + Math.round((base_PPD)*0.07/1000);
        }
        else if(y.options[y.selectedIndex].value == 2){
          document.getElementById("pre-1").innerHTML = Math.round((base_death)*0.69/1000);
          document.getElementById("pre-2").innerHTML = Math.round((result*60)*0.17/1000);
          document.getElementById("pre-3").innerHTML = Math.round((base_PPD)*0.19/1000);
          return Math.round((base_death)*0.69/1000)+ Math.round((base_PTD)*0.17/1000) + Math.round((base_PPD)*0.19/1000);
        }
      }
      else if(base_death == (avg_mon*100) && base_PTD == (avg_mon * 60) && base_PPD == (avg_mon*60)){
        first_income = parseInt(document.getElementById("first_income").value)
        second_income = parseInt(document.getElementById("second_income").value)
        third_income = parseInt(document.getElementById("third_income").value)
        result = ((first_income + second_income + third_income)/3/12) - (((first_income + second_income + third_income)/3/12)%1000);
        document.getElementById("inc-1").innerHTML = result;
        document.getElementById("inc-2").innerHTML = (base_death);
        document.getElementById("inc-3").innerHTML = (base_PTD);
        document.getElementById("inc-4").innerHTML = (base_PPD);
        if(y.options[y.selectedIndex].value == 1){
          document.getElementById("pre-1").innerHTML = Math.round((base_death)*0.43/1000);
          document.getElementById("pre-2").innerHTML = Math.round((base_PTD)*0.05/1000);
          document.getElementById("pre-3").innerHTML = Math.round((base_PPD)*0.07/1000);
          return Math.round((base_death)*0.43/1000)+ Math.round((base_PTD)*0.05/1000) + Math.round((base_PPD)*0.07/1000);
        }
        else if(y.options[y.selectedIndex].value == 2){
          document.getElementById("pre-1").innerHTML = Math.round((base_death)*0.69/1000);
          document.getElementById("pre-2").innerHTML = Math.round((result*60)*0.17/1000);
          document.getElementById("pre-3").innerHTML = Math.round((base_PPD)*0.19/1000);
          return Math.round((base_death)*0.69/1000)+ Math.round((base_PTD)*0.17/1000) + Math.round((base_PPD)*0.19/1000);
        }
      }
      
      else{
        first_income = parseInt(document.getElementById("first_income").value)
        second_income = parseInt(document.getElementById("second_income").value)
        third_income = parseInt(document.getElementById("third_income").value)
        result = ((first_income + second_income + third_income)/3/12) - (((first_income +second_income + third_income)/3/12)%1000);
        document.getElementById("inc-1").innerHTML = result;
        document.getElementById("inc-2").innerHTML = (result*100);
        document.getElementById("inc-3").innerHTML = (result*60);
        document.getElementById("inc-4").innerHTML = (result*60);
        if(y.options[y.selectedIndex].value == 1){
          document.getElementById("pre-1").innerHTML = Math.round((result*100)*0.43/1000);
          document.getElementById("pre-2").innerHTML = Math.round((result*60)*0.05/1000);
          document.getElementById("pre-3").innerHTML = Math.round((result*60)*0.07/1000);
          return Math.round((result*100)*0.43/1000)+ Math.round((result*60)*0.05/1000) + Math.round((result*60)*0.07/1000);
        }
        else if(y.options[y.selectedIndex].value == 2){
        document.getElementById("pre-1").innerHTML = Math.round((result*100)*0.69/1000);
        document.getElementById("pre-2").innerHTML = Math.round((result*60)*0.17/1000);
        document.getElementById("pre-3").innerHTML = Math.round((result*60)*0.19/1000);
        return Math.round((result*100)*0.69/1000)+ Math.round((result*60)*0.17/1000) + Math.round(  (result*60)*0.19/1000);
        }
      }
      // if(base_death == NaN || base_PPD ==NaN || base_PTD == NaN){
      //   first_income = parseInt(document.getElementById("first_income").value)
      //   second_income = parseInt(document.getElementById("second_income").value)
      //   third_income = parseInt(document.getElementById("third_income").value)
      //   result = ((first_income + second_income + third_income)/3/12) - (((first_income +second_income + third_income)/3/12)%1000);
      //   document.getElementById("inc-1").innerHTML = result;
      //   document.getElementById("inc-2").innerHTML = (result*100);
      //   document.getElementById("inc-3").innerHTML = (result*60);
      //   document.getElementById("inc-4").innerHTML = (result*60);
      //   if(y.options[y.selectedIndex].value == 1){
      //     document.getElementById("pre-1").innerHTML = Math.round((base_death)*0.43/1000);
      //     document.getElementById("pre-2").innerHTML = Math.round((base_PTD)*0.05/1000);
      //     document.getElementById("pre-3").innerHTML = Math.round((base_PPD)*0.07/1000);
      //     return Math.round((base_death)*0.43/1000)+ Math.round((base_PTD)*0.05/1000) + Math.round((base_PPD)*0.07/1000);
      //   }
      //   else if(y.options[y.selectedIndex].value == 2){
      //     document.getElementById("pre-1").innerHTML = Math.round((base_death)*0.69/1000);
      //     document.getElementById("pre-2").innerHTML = Math.round((result*60)*0.17/1000);
      //     document.getElementById("pre-3").innerHTML = Math.round((base_PPD)*0.19/1000);
      //     return Math.round((base_death)*0.69/1000)+ Math.round((base_PTD)*0.17/1000) + Math.round((base_PPD)*0.19/1000);
      //   }
      // }
      
      // return Math.round((result*100)*0.69/1000)+ Math.round((result*60)*0.17/1000) + Math.round((result*60)*0.19/1000);
    
    
      
    }
  }
  function myFunction(){
    var y = document.getElementById('mySelect');
    var value =0;
    var text;
    value = parseInt(y.options[y.selectedIndex].value);
    if(y.options[y.selectedIndex].text == "Select the Sum Insured"){
      text= 0;
      return 0;
    }
    else{
    text = parseInt(y.options[y.selectedIndex].text);
    
    // document.getElementById("demo2").innerHTML = "Premium value: " +value;
    document.getElementById("select1").innerHTML = text;
    document.getElementById("value1").innerHTML = value;
    return value;
  }
  }
  
  function myFunction2(){
    var a = document.getElementById("risk-class").value;
    var b = document.getElementById("category").value;
    if(a==1 && b==1)
    {
        // document.getElementById("demo1").innerHTML = "Rate per 1000 Sum Insured: 0.43";
    }
    if(a==1 && b==2)
    {
        // document.getElementById("demo1").innerHTML = "Rate per 1000 Sum Insured: 0.05";
    }
    if(a==1 && b==3)
    {
        // document.getElementById("demo1").innerHTML = "Rate per 1000 Sum Insured: 0.07";
    }
    if(a==2 && b==1)
    {
        // document.getElementById("demo1").innerHTML = "Rate per 1000 Sum Insured: 0.69";
    }
    if(a==2 && b==2)
    {
        // document.getElementById("demo1").innerHTML = "Rate per 1000 Sum Insured: 0.17";
    }
    if(a==2 && b==3)
    {
        // document.getElementById("demo1").innerHTML = "Rate per 1000 Sum Insured: 0.19";
    }
    if(a==3 && b==1)
    {
        // document.getElementById("demo1").innerHTML = "Rate per 1000 Sum Insured: 1.04";
    }
    if(a==3 && b==2)
    {
        // document.getElementById("demo1").innerHTML = "Rate per 1000 Sum Insured: 0.26";
    }
    if(a==3 && b==3)
    {
        // document.getElementById("demo1").innerHTML = "Rate per 1000 Sum Insured: 0.29";
    }
  }
  
  function myFunction3(){
    var c = document.getElementById("rate3").value;
    var d = document.getElementById("risk-class").value;
    var e = document.getElementById("cover3").value;
    if(c==1){
      if(d==1){
        if(e==1){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 0.43";
        }
        if(e==2){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 0.05";
        }
      }
      if(d==2){
        if(e==1){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 0.69";
        }
        if(e==2){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 0.17";
        }
      }
      if(d==3){
        if(e==1){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 1.04";
        }
        if(e==2){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 0.26";
        }
      }
    }
    if(c==2){
      if(d==1){
        if(e==1){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 0.86";
        }
        if(e==2){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 0.1";
        }
      }
      if(d==2){
        if(e==1){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 1.38";
        }
        if(e==2){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 0.34";
        }
      }
      if(d==3){
        if(e==1){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 2.08";
        }
        if(e==2){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 0.52";
        }
      }
    }
    if(c==3){
      if(d==1){
        if(e==1){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 1.72";
        }
        if(e==2){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 0.2";
        }
      }
      if(d==2){
        if(e==1){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 2.76";
        }
        if(e==2){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 0.68";
        }
      }
      if(d==3){
        if(e==1){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 4.16";
        }
        if(e==2){
          // document.getElementById("demo3").innerHTML = "Rate per 1000 Sum Insured: 1.04";
        }
      }
    }
  }
  
  
  
  function myFunction4(){
    var y = document.getElementById('mySelect2');
    var value =0;
    var text;
    value = parseInt(y.options[y.selectedIndex].value);
   
    if(y.options[y.selectedIndex].text == "Select the Sum Insured"){
      text=0;
      return 0;
    }
    else{
    text = y.options[y.selectedIndex].text;
    // document.getElementById("demo4").innerHTML = "Premium value: " +value;
    document.getElementById("select2").innerHTML = text;
    document.getElementById("value2").innerHTML = value;
    return value;
  }
  }
  
  function myFunction5(){
    var y = document.getElementById('risk-class');
    var x = document.getElementById('sum5');
    var s = y.value;
    var t = x.value;
    var text = x.options[x.selectedIndex].text;
    var premium = 0;
    if(s==1){
      if(t==1){
        premium = 48;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==2){
        premium = 96;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==3){
        premium = 144;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==4){
        premium = 192;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==5){
        premium = 240;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==6){
        premium = 288;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==7){
        premium = 336;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==8){
        premium = 384;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==9){
        premium = 432;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==10){
        premium = 480;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      
    }
    if(s==2){
      if(t==1){
        premium = 86;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==2){
        premium = 172;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==3){
        premium = 258;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==4){
        premium = 344;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==5){
        premium = 430;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==6){
        premium = 516;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==7){
        premium = 602;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==8){
        premium = 688;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==9){
        premium = 774;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==10){
        premium = 860;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      
    }
    if(s==3){
      if(t==1){
        premium = 130;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==2){
        premium = 260;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==3){
        premium = 390;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==4){
        premium = 520;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==5){
        premium = 650;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==6){
        premium = 780;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==7){
        premium = 910;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==8){
        premium = 1040;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==9){
        premium = 1170;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
      }
      if(t==10){
        premium = 1300;
        // document.getElementById("demo5").innerHTML = "Premium Value is " + premium;
  
      }
      
    }
    if(premium == 0){
      document.getElementById("select3").innerHTML = 0;
      document.getElementById("value3").innerHTML = 0;
      return 0;
  
    }
    document.getElementById("select3").innerHTML = text;
    document.getElementById("value3").innerHTML = premium;
    return premium;
  }
  
  function myFunction6(){
    var y = document.getElementById("Sum-6");
    var value = 0;
    var text;
    value = parseInt(y.options[y.selectedIndex].value);
    if(y.options[y.selectedIndex].text == "Select the Sum Insured"){
      text =0;
      return 0;
    }
    else{
    text = parseInt(y.options[y.selectedIndex].text);
    // document.getElementById("demo-6").innerHTML = "Premium value: " +value;
    document.getElementById("select4").innerHTML = text;
    document.getElementById("value4").innerHTML = value;
  
    return value;
  }
  }
  
  function myFunction7(){
    var s = document.getElementById("risk-class").value;
    var text;
    var t = document.getElementById("sum7").value;
    var premium = 0;
    if(s==1){
      if(t==1){
        // document.getElementById("demo7").innerHTML = "Premium Value is 3.5";
        premium = 3.5;
      }
      if(t==2){
        // document.getElementById("demo7").innerHTML = "Premium Value is 5.25";
        premium = 5.25;
      }
      if(t==3){
        // document.getElementById("demo7").innerHTML = "Premium Value is 7";
        premium = 7;
      }
      if(t==4){
        // document.getElementById("demo7").innerHTML = "Premium Value is 14";
        premium = 14;
      }
      if(t==5){
        // document.getElementById("demo7").innerHTML = "Premium Value is 21";
        premium = 21;
      }
      if(t==6){
        // document.getElementById("demo7").innerHTML = "Premium Value is 28";
        premium = 28;
      }
      if(t==7){
        // document.getElementById("demo7").innerHTML = "Premium Value is 35";
        premium = 35;
      }
    }
    if(s==2){
      if(t==1){
        // document.getElementById("demo7").innerHTML = "Premium Value is 9.5";
        premium = 9.5;
      }
      if(t==2){
        // document.getElementById("demo7").innerHTML = "Premium Value is 14.25";
        premium = 14.25;
      }
      if(t==3){
        // document.getElementById("demo7").innerHTML = "Premium Value is 19";
        premium = 19;
      }
      if(t==4){
        // document.getElementById("demo7").innerHTML = "Premium Value is 38";
        premium = 38;
      }
      if(t==5){
        // document.getElementById("demo7").innerHTML = "Premium Value is 57";
        premium = 57;
      }
      if(t==6){
        // document.getElementById("demo7").innerHTML = "Premium Value is 76";
        premium = 76;
      }
      if(t==7){
        // document.getElementById("demo7").innerHTML = "Premium Value is 95";
        premium = 95;
      }
    }
    if(s==3){
      if(t==1){
        // document.getElementById("demo7").innerHTML = "Premium Value is 14.5";
        premium = 14.5;
      }
      if(t==2){
        // document.getElementById("demo7").innerHTML = "Premium Value is 21.75";
        premium = 21.75;
      }
      if(t==3){
        // document.getElementById("demo7").innerHTML = "Premium Value is 29";
        premium = 29;
      }
      if(t==4){
        // document.getElementById("demo7").innerHTML = "Premium Value is 58";
        premium = 58;
      }
      if(t==5){
        // document.getElementById("demo7").innerHTML = "Premium Value is 87";
        premium = 87;
      }
      if(t==6){
        // document.getElementById("demo7").innerHTML = "Premium Value is 116";
        premium = 116;
      }
      if(t==7){
        // document.getElementById("demo7").innerHTML = "Premium Value is 145";
        premium = 145;
      }
    }
    if(premium == 0){
      document.getElementById("select5").innerHTML = 0;
      document.getElementById("value5").innerHTML = 0;
      return 0;
  
    }else{
      text = parseInt(document.getElementById("sum7").options[document.getElementById("sum7").selectedIndex].text);
    document.getElementById("select5").innerHTML = text;
    document.getElementById("value5").innerHTML = premium;
    return premium;
  }
  }
  
  function myFunction8(){
    var y = document.getElementById("Sum-8");
    var text;
    var value =0;
    value = parseInt(y.options[y.selectedIndex].value);
    if( y.options[y.selectedIndex].text == "Select the Sum Insured"){
      document.getElementById("select6").innerHTML = 0;
      document.getElementById("value6").innerHTML = 0;
      return 0;
    }
    else{
      text = y.options[y.selectedIndex].text;
    // document.getElementById("demo-8").innerHTML = "Premium value: " +value;
    document.getElementById("select6").innerHTML = text;
    document.getElementById("value6").innerHTML = value;
    return value;
    }
  }
  // function myFunction9(){
  //   var y = document.getElementById("Sum-9").value;
  //   document.getElementById("demo-9").innerHTML = "Premium value: " +y;
  // }
  function myFunction10(){
    var y = document.getElementById("risk-class");
    // var value =0;
    var text1 = document.getElementById("loan");
    // first_income = parseInt(document.getElementById("first_income").value)
    //  second_income = parseInt(document.getElementById("second_income").value)
    //  third_income = parseInt(document.getElementById("third_income").value)
    // result = ((first_income + second_income + third_income)/3/12) - (((first_income + second_income + third_income)/3/12)%1000);
    // value = y.options[y.selectedIndex].value;
    if(y.options[y.selectedIndex].text == "Risk Class"){
      document.getElementById("select8").innerHTML = 0;
      document.getElementById("value8").innerHTML = 0;
      return 0;
    }
    else{
      if(y.options[y.selectedIndex].value == 1){
        document.getElementById("select8").innerHTML = text1.value;
        document.getElementById("value8").innerHTML = ((text1.value)*0.48)/1000;
        return ((text1.value)*0.48)/1000;
      }
      if(y.options[y.selectedIndex].value == 2){
        document.getElementById("select8").innerHTML = text1.value;
        document.getElementById("value8").innerHTML = ((text1.value)*0.86)/1000;
        return ((text1.value)*0.86)/1000;
      }
      else{
        document.getElementById("select8").innerHTML = text1.value;
        document.getElementById("value8").innerHTML = ((text1.value)*1.3)/1000;
        return ((text1.value)*1.3)/1000;
      }
    // document.getElementById("demo-10").innerHTML = "Benefit: " +value;
    // document.getElementById("select8").innerHTML = text1.value;
    // document.getElementById("value8").innerHTML = (result*value)/100;
    // return (result*value)/100;
    }
  }
  
  function myFunction11(){
    var y = document.getElementById("risk-class").value;
    // document.getElementById("demo-11").innerHTML = "Benefit: " +y;
  }
  
  function myFunction12(){
    var y = document.getElementById("Sum-12");
    var value = 0;
    var text;
    value = parseInt(y.options[y.selectedIndex].value);
    if(y.options[y.selectedIndex].text == "Select Sum Insured"){
      document.getElementById("select11").innerHTML = 0;
      document.getElementById("value11").innerHTML = 0;
      return 0;
    }
    else{
    // document.getElementById("demo-12").innerHTML = "Premium: " +value;
    var text = y.options[y.selectedIndex].text;
    document.getElementById("select11").innerHTML = text;
    document.getElementById("value11").innerHTML = value;
    return value;
  }
  }
  function myFunction13(){
    var y = document.getElementById("Sum-13");
    var value = 0;
    var text;
    value = parseInt(y.options[y.selectedIndex].value);
    if(y.options[y.selectedIndex].text == "Select Sum Insured"){
      document.getElementById("select10").innerHTML = 0;
      document.getElementById("value10").innerHTML = 0;
      return 0;
    }
    else{
    // document.getElementById("demo-13").innerHTML = "Premium: " +value;
    var text = y.options[y.selectedIndex].text;
    document.getElementById("select10").innerHTML = text;
    document.getElementById("value10").innerHTML = value;
    return value;
  }
  }
  function myFunction14()
  {
    
    var first_income = parseInt(document.getElementById("first_income").value)
    var second_income = parseInt(document.getElementById("second_income").value)
    var third_income = parseInt(document.getElementById("third_income").value)
  
    // console.log(first_income)
    // console.log(second_income)
    // console.log(third_income)
    var avg = (((first_income + second_income + third_income)/3)/12)/30
    // console.log(avg)
    var ans = 0;
    // if(avg==1666.6666666666667)
    // {
    //   console.log("zala")
    // }
    var test = {}
    test[1000] = 204;
    test[2000] = 408;
    test[3000] = 612;
    test[4000] = 816;
    test[5000] = 1020;
    test[6000] = 1224;
    test[7000] = 1428;
    test[8000] = 1632;
    test[9000] = 1836;
    test[10000] = 2040;
    if(avg>10000)
    {
      ans = test["10000"]; 
      avg = 10000;
  
    } 
    else if(avg>9000)
    {
      ans = test["9000"];
  
   }
   else if(avg>8000)
    {
      ans = test["8000"];
   }   
    
   else if(avg>7000)
    {
      ans = test["7000"];
   }  
    
   else if(avg>6000)
    {
      ans =test["6000"];
   }  
    
   else if(avg>5000)
    {
      ans = test["5000"];
   }  
    
    else if(avg>4000)
    {
      ans = test["4000"];
   }  
    
   else if(avg>3000)
    {
      ans = test["3000"];
   }  
   else if(avg>2000)
    {
      ans = test["2000"];
   }  
   else if(avg>1000)
    {
      ans = test["1000"];
   }  
    if((document.getElementById("first_income")).value ==''){
      // document.getElementById("demo-9").innerHTML = "Premium Value : " + 0;
      document.getElementById("value7").innerHTML = 0;
     return 0;
    }
    else{
  //  document.getElementById("demo-9").innerHTML = "Premium Value : " + ans;
   document.getElementById("value7").innerHTML = ans;
   document.getElementById("select7").innerHTML = (avg - (avg%1000));
   return ans;
    }
  }
 
  
  function myFunction15()
  {
    
    var first_income = parseInt(document.getElementById("first_income").value)
    var second_income = parseInt(document.getElementById("second_income").value)
    var third_income = parseInt(document.getElementById("third_income").value)
    var risk_class = document.getElementById("risk-class").value
  
    // console.log(first_income)
    // console.log(second_income)
    // console.log(third_income)
    var avg = (((first_income + second_income + third_income)/3)/12)
    // console.log(avg)
    var loi = (avg*(25/100))
    avg = 10000;
    if(loi>50000){
      loi = 50000;
    }
    var r = 0
    // var r = {}
    // var rate = {}
    var rate = 0
    var ans =0;
    r = loi - (loi%1000);
    if(risk_class== "1"){
      rate = 99;
    }
    else if(risk_class== "2"){
      rate = 106;
    }
   ans =r * (rate/1000);
   if((document.getElementById("first_income")).value ==''){
  
    document.getElementById("value9").innerHTML =  0;
    document.getElementById("select9").innerHTML =  0;
     return 0;
   }
   else if(document.getElementById("risk-class").options[document.getElementById("risk-class").selectedIndex].text == "Risk Class"){
    document.getElementById("value9").innerHTML = 0;
   document.getElementById("select9").innerHTML = 0;
    return 0;
  }
   
   else{
  //  document.getElementById("demo-11").innerHTML = "Premium Value : " + ans;
   document.getElementById("value9").innerHTML =  ans;
   document.getElementById("select9").innerHTML =  r;
   return ans;
  }
  }
  // document.getElementById("premium-value").innerHTML =  display()+myFunction()+myFunction4()+myFunction5()+myFunction6()+myFunction7()+myFunction8()+myFunction10()+myFunction12()+myFunction13() + myFunction14() + myFunction15();
  

  
  function ShowHideDiv(){
    var company = document.getElementById("company");
    var bajajdata = document.getElementById("bajajdata");
    bajajdata.style.display = company.value == "bajaj" ? "block" : "none";
}

function ShowHideDiv2(){
var company = document.getElementById("company");
var otherdata = document.getElementById("otherdata");
otherdata.style.display = company.value == "other" ? "block" : "none";
}


var othercompanyclass = document.getElementById("classothercompany").value;
var othercompanysumassured = document.getElementById("sumassured").value;
var premiumothercompany = 0;


function premiumprint()
{
var othercompanyclass = document.getElementById("classothercompany").value;
var othercompanysumassured = document.getElementById("sumassured").value;
var premiumothercompany = 0;
if(othercompanyclass ==1 && othercompanysumassured == 1){
premiumothercompany=9301;
}

if(othercompanyclass ==1 && othercompanysumassured == 2){
premiumothercompany=19384;
}

if(othercompanyclass ==1 && othercompanysumassured == 5){
premiumothercompany=46376;
}
document.getElementById("printpremium").innerHTML = "Premium Value : " + parseInt(premiumothercompany);
}
function avg_monthly()
{
  var first_income = parseInt(document.getElementById("first_income").value)
  var second_income = parseInt(document.getElementById("second_income").value)
  var third_income = parseInt(document.getElementById("third_income").value)
  var avg = ((first_income + second_income + third_income)/3/12) - (((first_income + second_income + third_income)/3/12)%1000);
console.log("hello")
// document.getElementById("avg_value").innerHTML =  avg;



}
function myFunction20()
  {
    
    var first_income = parseInt(document.getElementById("first_income").value)
    var second_income = parseInt(document.getElementById("second_income").value)
    var third_income = parseInt(document.getElementById("third_income").value)
    
    // console.log(first_income)
    // console.log(second_income)
    // console.log(third_income)
    // var avg = ((first_income + second_income + third_income)/3)/12
    var avg = ((first_income + second_income + third_income)/3/12) - (((first_income + second_income + third_income)/3/12)%1000);
    document.getElementById("avg_value").innerHTML =  avg;
    console.log("hello")

    var death = avg*100
    var ptd = avg*60
    var ppd = avg*60
    document.getElementById("base-death").value = Math.round(death);
    document.getElementById("base-PTD").value = Math.round(ptd);
    document.getElementById("base-PPD").value = Math.round(ppd);
    console.log(death);
    console.log(ptd);
    console.log(ppd);
  }

