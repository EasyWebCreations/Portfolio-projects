<?php
include '../connectDB.php';
// calculateSalary($conn, '2021-10-01', '123');

function calculateSalary($conn, $month, $empid)
{
    $query_L = "SELECT * FROM leaves WHERE MONTH='$month' AND EMP_ID='$empid'";
    $query_S = "SELECT * FROM salary WHERE MONTH='$month' AND EMP_ID='$empid'";
    $query_E = "SELECT * FROM emp_details WHERE EMP_ID='$empid'";
    $res_L = mysqli_query($conn, $query_L);
    $res_S = mysqli_query($conn, $query_S);
    $res_E = mysqli_query($conn, $query_E);
    if ($res_L->num_rows * $res_S->num_rows === 1) {
        $row_L = $res_L->fetch_assoc();
        $row_S = $res_S->fetch_assoc();
        $row_E = $res_E->fetch_assoc();
        $month_number = substr($month, 5, 2);
        $LWF = ($month_number === '06' || $month_number === '12') ? 12 : 0;
        $pay_days = $row_L["PAY_DAYS"];
        $weekly_off = $row_L["WEEKLY_OFF"];
        $PH = $row_L["PAID_HOLIDAYS"];
        $month_days = cal_days_in_month(CAL_GREGORIAN, substr($month, 5, 2), substr($month, 0, 4));
        $company_working_days = $month_days  - $PH;  //#
        $attenddance = $row_L["WORKING_DAYS"] + $weekly_off; //30
        //P stands for pre-decided values whereas 
        //A stands for actual calculated value for this particular month
        $p_basic = $row_E["BASIC_SAL"];
        // $a_basic = ($p_basic / $company_working_days) * $attenddance; //11930
        $a_basic = ($p_basic / $month_days) * $pay_days; //11930

        $p_hra = $row_E["HRA_SAL"]; //4772
        // $a_hra = ($p_hra / $company_working_days) * $attenddance; //4772
        $a_hra = ($p_hra / $month_days) * $pay_days; //4772
        //f_gross stands for fixed gross (TOTAL) salary whereas 
        //a_gross stands for attendance based gross salary after calculations
        $f_gross = $p_basic + $p_hra + $row_E["ALLOW"]; //24500
        //PDA is Paid Allowance
        // $PDA = ($f_gross / $company_working_days) * $attenddance - $a_basic - $a_hra; // 7798
        $PDA = ($f_gross / $month_days) * $pay_days - $a_basic - $a_hra; // 7798

        //SPL ALLOWANCE
        $spl_allow = $row_L["SPL_ALLOW"];  //0

        // $leave_pay = ($f_gross / $company_working_days) * ($row_L["C_OFF_AVAILED"] + $row_L["E_LEAVE_AVAILED"]);
        $leave_pay = ($f_gross / $month_days) * ($row_L["C_OFF_AVAILED"] + $row_L["E_LEAVE_AVAILED"]);
        $ph_pay = ($f_gross / 30) * $PH; //Salary calculated by site employees as per 30 days and hence it is considered 
        $a_gross = $a_basic + $a_hra + $PDA; //24500 (Total Salary)
        $pf_wages = $a_gross - $a_hra; //19728
        //Basic as per 15K
        $a_basic_15 = ($pf_wages > 15000) ? 15000 : $pf_wages; //15000
        //pf as per 15K
        $a_pf_15 = $a_basic_15 * 12 / 100;
        $esic = ($a_gross >= 21000) ? 0 : ($a_gross / 100 * 0.75);
        if ($row_E["STATUS"] === "N") {
            $esic = 0;
        }

        $PT = ($a_gross > 10000) ? 200 : (($a_gross > 7500) ? 175 : 0);

        //Deduction as per 15 K
        $d_15 = $a_pf_15 + $esic + $PT; //2000
        $net_without_OT = $a_gross - $d_15; //22500 (Net Amount)
        $advance = $row_L["ADV"];
        $other_deduction = $row_L["OTHER_DEDUCTION"];
        $net_payable_without_OT = $net_without_OT - $advance - $other_deduction; //(Net Payable)
        $over_time = $row_L["OVER_TIME"];
        $over_time_pay = (($f_gross / 30) / 8) * ($over_time);
        $net_sal = $net_payable_without_OT + $over_time_pay - $LWF + $ph_pay; //(Total Net Payable)

        $update_salary = "UPDATE salary SET GROSS_SAL=$a_gross, PAY_DAYS=$pay_days, NET_SAL=$net_sal, 
        BASIC_SAL=$a_basic,HRA_SAL=$a_hra,PDA=$PDA,PH_PAY=$ph_pay,SPL_ALLOW=$spl_allow,LEAVE_PAY=$leave_pay,
        PF=$a_pf_15,ESIC=$esic,PT=$PT,LWF=$LWF,ADV=$advance,OTHER_DEDUCTION=$other_deduction,OVER_TIME_PAY=$over_time_pay,
        PF_WAGES=$pf_wages,A_BASIC_15=$a_basic_15,A_PF_15=$a_pf_15,D_15=$d_15,NET_WITHOUT_OT=$net_without_OT,
        NET_PAYABLE_WITHOUT_OT=$net_payable_without_OT WHERE MONTH='$month' AND EMP_ID='$empid'";
        // echo "<script>alert('" . $update_salary . "');</script>";
        // return $update_salary;
        return (mysqli_query($conn, $update_salary));
    }
}