<?php include("top.php"); $nationald = 1; ?>
<?php  
$rome = 0;
$mset  = intval($_GET['mset']);
$msg  = intval($_GET['msg']);
$provs =  safe($_GET['prov']);
$what = $inc_name = "INCOME TO NATIONAL";
$department_id = fetch_payment_department_id_from_name($inc_name);

/*	
//testing github
if($idcard == 24 and $provs != ''){
		//make sure no spying
	$chkregion =  universal_query_and('id',prov_and_reg,region,$theregionid,province,$provs,$cids=false,$ord=true,'id',$desc=false);
	if(numr($chkregion) == 0){ redirect_to('menu.php');  }
	}*/
stop_regional_spying($provs);
//if($idcard == 64) { 
if($idcard == 64 or ($idcard == 24  and $mset == 1) or ($idcard == 24  and $provs != '')){
$province =  $provs;  $idcard = 23; $rome = 1; $man = 1;}

$checkIfValidProvince = checkIfValidProvince($province,$redirect = true);

 include('includes/bits/picp_def_month.php');
  ?>
<?php include("remittance_report_top.php"); 
include("includes/bits/get_cmonth_income.php"); 

//	$drhq = check_if_rhq($province_name);
//	if($drhq == 1){  $idcard = 24;  }
//	echo 'idc: '.$idcard;
//user_level_allowed('24,23,25,64');

user_access_for_payment_sheets();
$province_natn = get_national_province();  
	

//include("javascripts/javascripts.js"); 
 ?>
 	<?php
/*	function get_others12($val){
	$ggps = universal_query_and3('item',acc_other_items_record,province,$province,province,$province,item,$val,item,$val);	
	$ff = fetch($ggps);
	return $itmm = $ff['item'];
	}*/
	?>
 <script src="javascripts/javascripts.js" language="javascript"  /></script>
 <!--<script type="text/javascript" />
 
  function IsEmpty(){
	  	<?php
/*	function get_others12($val){
	$ggps = universal_query_and3('item',acc_other_items_record,province,$province,province,$province,item,$val,item,$val);	
	$ff = fetch($ggps);
	return $itmm = $ff['item'];
	}*/
	?>
	  <?php //  $vv = 'oths1'; 
	// $goth1 = get_others12('OTHERS 1');
	// $goth2 = get_others12('OTHERS 2');
	   ?>
	
	a = document.forms['form1'].oths1.value;
	b = document.forms['form1'].oths2.value;
	
 if(a === "")
  {
    alert("YOU INPUTTED FIGURES INTO OTHERS 1 UNDER THE ADDITIONAL ITEMS BELOW, PLEASE STATE WHAT IT IS FOR");
    return false;
  }
    if(b === "")
  {
    alert("YOU INPUTTED FIGURES INTO OTHERS 2 UNDER THE ADDITIONAL ITEMS BELOW, PLEASE STATE WHAT IT IS FOR");
    return false;
  }
    return true;
}
</script>-->
<?php	br(2);  ?>
<center><input type="button" onclick="printDiv('print_main')" value="PRINT MAIN SPREAD SHEET" class="noprint" /><br /><br />
    <div id="print_main">
	<?php
	$dprovince2 = strtoupper($province);	
	$title_name = get_church_area_or_province_name();
	
	$sumothers = 0;
	echo '<div align="center">';
	
	$page_title = 'INCOME TO NATIONAL';
	include 'includes/bits/payment_sub/top_sheet_header.php';	
	
	if($msg == 3 and $idcard > 22){  echo '<font color="#FF0000" size="+1">Your report is yet to be finished because you have not added additional items (e.g Car loan, Housing allowance, PAYE, etc). Scroll to the bottom of this page to input the additional items and click Save. </font>';    }
	
	$cpv2 = universal_query('zone_alias,area_alias',$table_prov,'province',$province,$cid=false,$ord=false,'namey');
	$getp = fetch($cpv2);
	$szone  = intval($getp['zone_alias']);
	$sarea = intval($getp['area_alias']);
	$en = intval($_GET['en']);
	
	$locked = lock_status($dmonth,$dyear,1,$province);
	
	$c = 1;   $v = 6;
	$result9 = get_areahqs($province,$table);
	$cntarea = numr($result9);
	
	if($idcard > 22){
	echo '<div align="left" class="noprint">';	br();
	echo '<a href="acc_setting.php?subj=25" class="noprint">Edit PICP & Accountants name on printed sheet</a></div>';
	br(2);
	}
	
	echo '<table border="1" cellpadding="5" cellspacing="5" >';	
		//$mtt = 	get_remit_percent($province,'MINISTERS TITHE',1);
		//$gtt = 	get_remit_percent($province,'GENERAL TITHE',1);
		$mtt = get_remit_percent_breakdown($province,'MINISTERS TITHE',1,'national');
		$gtt = get_remit_percent_breakdown($province,'GENERAL TITHE',1,'national');
 
	  $dis1 =  "MINISTERS TITHE <br />(100%)";
	  $dis2 = "MINISTERS TITHE <br />(".$mtt."%)";
	  $dis3 = "GENERAL TITHE <br />(100%)";
	  $dis4 = 'GENERAL TITHE <br />('.$gtt.'%)';
	  
	  include('includes/bits/national_income_header.php');
	
	foreach($men as $indit){
	unset($_SESSION[$indit]);	
	}
	
	if($cntarea > 0){
	$result_msgxz = get_items_for_remittance($province,'per_national',$dmonth,$dyear);	
	$nrid = array(); $ntype = array(); $ngiving_name = array(); $ndpercent = array(); $nperc_of = array(); $nperc_of_perc_of = array();
	 while($yy22 = mysql_fetch_array($result_msgxz)){	
		 $rid = $yy22['id'];
		 $type = $yy22['type'];
		$giving_name = $yy22['giving_name']; 
		
		//$dpercent = $yy22['dpercent']; very very critical change below
		$dpercent = $yy22['per_national'];
		///
		
		$perc_of = $yy22['perc_of']; 
		$perc_of_perc_of = $yy22['perc_of_perc_of'];
		
	if($dpercent == NULL and $type == 1){ $dpercent = 100;  }
	 
	$nrid[] = $rid;
	$ntype[] = $type;
	$ngiving_name[] = $giving_name;	
	$ndpercent[] = $dpercent;
	$nperc_of[] = $perc_of;
	$nperc_of_perc_of[] = $perc_of_perc_of;
	}
	}
	
	$loop = 1;
	
	
	if($cntarea == 0){ echo "<h3><font color='#FF0000'>Data for $xxmonth $xxyear is not available on the portal. </font></h3>"; br(2);  }
	else {
	while($res29 = mysql_fetch_array($result9)){
	 $aid = $res29['id'];	
	
	if( $sarea ==1) { 	 $chn = $res29['area_alias'];
	if($chn=='') { $chn = $res29['church_name'].' AREA';  } }			
	if( $sarea == 0) {   	$chn = $res29['church_name'].' AREA';  }
	
	$set = 5; $acclv = 'nat';
	include('includes/bits/tithe_exempt.php');

if($loop == 11) {  include('includes/bits/national_income_header2.php'); $loop = 1;  }
$loop++;

if($rome == 0) { $link = "<a href='add_report_acc.php?cmonth=$rmonth&cyear=$year&areaid=$aid&subj=25&forarea=1&mset=$mset' target='_blank'>View</a>";  }
if($rome == 1) { $link = "<a href='add_report_acc.php?month=$rmonth&year=$year&areaid=$aid&subj=25&forarea=1&mset=$mset' target='_blank'>View</a>";  }

	echo '<tr  class="myhover"  title="'.$chn.'">';
	echo "<td class='noprint'>$link</td>";
	echo "<td>$c</td>";
		echo "<td><b>$chn";
	$ifex = check_if_exemption($aid,$rmonth,$year);
	if($ifex > 0){  echo '<div class="noprint"><font color=blue size=1px><sub>(EXEMPTION)</sub></font></div>'; }
	echo "</b></td>";
	echo "<td>$fm</td>";
	echo "<td>$fmp</td>";
	echo "<td>$fg</td>";
	echo "<td>$fgp</td>";
	
	$_SESSION['total'] = $per_tithe_min;
	$_SESSION['total'] += $per_tithe_gen;	
	$_SESSION['mintit'] += $full_tithe_min;
	$_SESSION['gentit'] += $full_tithe_gen;
	$_SESSION['pmintit'] += $per_tithe_min;
	$_SESSION['pgentit'] += $per_tithe_gen;
	
	$vtotal += $per_tithe_gen;	
	$vmintit += $full_tithe_min;
	$vgentit += $full_tithe_gen;
	$vpmintit += $per_tithe_min;
	$vpgentit += $per_tithe_gen;
	
		foreach($ngiving_name as $index => $giving_name){
	  $rid = $nrid[$index];
	  $type = $ntype[$index];
	  $giving_name = $ngiving_name[$index];
	  $dpercent = $ndpercent[$index];
	  $perc_of = $nperc_of[$index];
	  $perc_of_perc_of = $nperc_of_perc_of[$index];
		
	if($dpercent == NULL and $type == 1){ $dpercent = 100;  }
		 
		
		$dpercentdiv =  $dpercent/100;
	
	$myval = get_area_remit_value('value',remittable,$aid,$rmonth,$year,$rid,$showother=false);	
	if($type==1){	
	 $rval = ($dpercent/100) * $myval;
	  }
	  
	  if($type==3){	
	 	if ($perc_of == '999999'){
	$rvm = get_area_remit_value('tithe_minister',tithe_direct,$aid,$rmonth,$year,$rid,$showother=false);
	$rvc = get_area_remit_value('tithe_others',tithe_direct,$aid,$rmonth,$year,$rid,$showother=false);
	$mtt2 = 	get_remit_percent($province,'MINISTERS TITHE',1);
	$gtt2 = 	get_remit_percent($province,'GENERAL TITHE',1); 
	$rv = (0.225 * $rvm) + (0.25 * $rvc);	
	//$rv = 900;	
	}
	else {
	$gg = universal_query_and3(giving_name,create_remittance,province,$province,province,$province,id,$perc_of,id,$perc_of);
	$ss2 = fetch($gg);
	$ss3 = $ss2['giving_name'];
	if($ss3 == 'MINISTERS TITHE' or $ss3 == 'GENERAL TITHE'  ){ 
	if($ss3 == 'MINISTERS TITHE') { 
	$rv = get_area_remit_value('tithe_minister',tithe_direct,$aid,$rmonth,$year,$rid,$showother=false);
	 }
	if($ss3 == 'GENERAL TITHE') {  
	$rv = get_area_remit_value('tithe_others',tithe_direct,$aid,$rmonth,$year,$rid,$showother=false);
	}
	 }
	else {
	$rv = get_area_remit_value('value',remittable,$aid,$rmonth,$year,$perc_of,$showother=false);
	}	
		}
	 $rval = ($perc_of_perc_of/100) * $rv;
	  }
	if($type == 2){	 $rval = $myval; }	
	
	//$rvalex = get_area_remit_value('value',remittable_ex,$aid,$rmonth,$year,$rid);
	$rvalex = grand_remit_value_sharing($aid,$rmonth,$year,$rid,$dpercentdiv,$acclv,$ftit=false);
	$rval = $rval + $rvalex;
	//$rval = $rvalex;
	$_SESSION['total'] += $rval;
		
		
	foreach($men as $indit){
	//echo $indit; br();		
		if($giving_name == $indit){
			$givnamex = $giving_name.'x';
			$_SESSION[$giving_name] += $rval;
			$_SESSION[$givnamex] = $_SESSION[$giving_name]; 
		}
	}
		
	$rval2 = dash_with_num_format2($rval);
	echo '<td><center>';
	echo $rval2.'</center></td>'; 
		 }
		 
	$datotal = $_SESSION['total'];		
	$datotal2 = dash_with_num_format2($datotal);
	
	$_SESSION['gtotal'] += $datotal ;	
	
	$chq_amt = get_cheque_amt_by_area($aid,$rmonth,$year);
	$chq_amt2 = dash_with_num_format2($chq_amt);
	
	//$_SESSION['gchq_amt'] += $chq_amt ;	
		
	//$thediff = $chq_amt - $datotal;
	//$thediff2 = dash_with_num_format2($thediff);
	//printtext
	
	if($thediff < 0){  $thediff3 = '<font color="#FF0000">'.$thediff2.'</font>';   }
	if($thediff == 0){  $thediff3 = '<font color="#000000">'.$thediff2.'</font>';   }
	if($thediff > 0){  $thediff3 = '<font color="#0000CC">+'.$thediff2.'</font>';   }
	
	$thediff2y = $thediff * -1;
	$thediff2yv = dash_with_num_format2($thediff2y);
	
	if($thediff < 0){  $thediff4 = '('.$thediff2yv.')';   }
	else{  $thediff4  = $thediff2;   }
	
	echo "<td><b>$datotal2</b></td>";
	//echo "<td><b>$chq_amt2</b></td>";
	//echo "<td class='noprint'><b>$thediff3</b></td>";
	//echo "<td class='printtext'><b>$thediff4</b></td>";
	echo "<td>$c</td>";
	echo "<td>$chn</td>";
	echo '</tr>';
	
	unset($_SESSION['total']);
	$c++;
	}
	//$damt = $_SESSION['mintit'];
	$damt = $vmintit;
	$damt2 = dash_with_num_format2($damt);	
	//$dagt = $_SESSION['gentit'];
	$dagt = $vgentit;
	$dagt2 = dash_with_num_format2($dagt);
	
	//$pdamt = $_SESSION['pmintit'];
	$pdamt = $vpmintit;
	$pdamt2 = dash_with_num_format2($pdamt);	
	$pdagt = $vpgentit;
	$pdagt2 = dash_with_num_format2($pdagt);
	
	
	if($idcard > 22){
	include('includes/bits/national_income_header2.php');
		
	echo '<tr class="bolder" class="printtext" align="center">';	
	echo '<tr class="bolder" bgcolor="#FFFF66" class="noprint" align="center">';
	echo "<td colspan=3 class='noprint'>".strtoupper($title_name)." $rmonth $year TOTAL</td>";
	echo "<td colspan=2 class='printtexttd'>".strtoupper($title_name)." $rmonth $year TOTAL</td>";
	echo "<td>$damt2";
	echo show_youth_church_amount($rmonth,$year,$province,$for = 'mtonly');
	echo "</td>";
	echo "<td>$pdamt2</td>";
	echo "<td>$dagt2";
	echo show_youth_church_amount($rmonth,$year,$province,$for = 'gtonly');
	echo "</td>";
	echo "<td>$pdagt2</td>";
	
	foreach($men as $indit){
	//$ivv = $indit.'q';
	$ivv =	$_SESSION[$indit]; 
	$ivv2 = dash_with_num_format2($ivv);
	echo "<td>$ivv2</td>";
	unset($_SESSION[$indit]);	
	unset($_SESSION[$ivv]);	
	unset($_SESSION[$ivv2]);	
	}
	
	$gtotal3 = $_SESSION['gtotal'];	
	$gchq_amt3 = $_SESSION['gchq_amt'];	
	$gtotal4 = dash_with_num_format2($gtotal3);
	$gchq_amt4 = dash_with_num_format2($gchq_amt3);
	
	$thediff3 = $gchq_amt3 - $gtotal3;
	$thediff4m = dash_with_num_format2($thediff3);
	if($thediff3 < 0){  $thediff3x = '<font color="#FF0000">'.$thediff4m.'</font>';   }
	if($thediff3 == 0){  $thediff3x = '<font color="#000000">'.$thediff4m.'</font>';   }
	if($thediff3 > 0){  $thediff3x = '<font color="#0000CC">+'.$thediff4m.'</font>';   }
	
	$thediff2ym = $thediff3 * -1;
	$thediy = dash_with_num_format2($thediff2ym);
	if($thediff3 < 0){  $thediff5x = '('.$thediy.')';   }
	else{  $thediff5x  = $thediff4;   }
	
	echo "<td>$gtotal4</td>";
	//echo "<td>$gchq_amt4</td>";	
	//echo "<td class='noprint'><b>$thediff3x</b></td>";
	//echo "<td class='printtext'><b>$thediff5x</b></td>";
	
	echo '</tr>';	
	}
	echo '</table>';	
	
	//br(2);
	?>  
    </div></div>
    
<!--   <div align="left" class="tipslite"> Yc means Youth Church. Income from youth churches is included in the 100% tithe but not included in the breakdown of remittance above. It is however summed together and placed under the summary of remittance below</div>
    </div><br />-->
    
    <br />
    
     <?php 
	 $showBelow = false;
	   if($idcard > 22){ ?>
    <?php   if($picpmenu == false and $showBelow == true){ ?>
   <div class="noprint"><font color="#FF0000" size="2px">
  NOTICE PLEASE READ: If you do not want a field to appear in national income (e.g Family weekend) . Go to main menu - remittance items add and adjust - locate the item (e.g family weekend) - click edit - under SHARING Tick HIDE. It would no longer show in this national sheet. 
  <br />Remember, You can also redistribute the percentages (e.g 10% to national , 50% to province, 5% to region, etc) and do not forget to tick hide if you do not want it to appear.
  <br /><br />
   </div></font>
   <?php  }  ?>
   <?php  }  ?>
   
   
    <!--    <style>
 table {
        border-collapse: collapse;      
    }
    
    .noborders td {
        border:0;
    }
	</style>-->
    <?php   if($idcard > 22){ ?>
    <center>
    <input type="button" onclick="printDiv('printableArea')" value="PRINT SUMMARY OF REMITTANCE" class="noprint" /><br /><br />
    <div id="printableArea">
    <?php   
	echo  "<center><div class='printtext'><h3><font color='#000000'>";
	$x = "THE REDEEMED CHRISTIAN CHURCH OF GOD<br />"; 
	$x .=  $title_name; 
	$x .= "<h2>$dmonth $dyear REMITTANCE INCOME TO NATIONAL</h2></h3>";
	echo strtoupper($x);
	echo '</div>';
	  ?>
    <table border="1" width="30%" cellpadding="5" cellspacing="5" align="center">
    <tr class="bolder" align="center"><td colspan="6" bgcolor='#CCCCFF'><?php  echo strtoupper($province);  ?> SUMMARY OF REMITTANCE </td></tr>
    <tr class="bolder">
    <td width="60%"></td><td>NAIRA</td>
    <!--<td>DOLLAR</td><td>POUND</td><td>EURO</td><td>OTHER<br />CURRENCIES</td>-->
    </tr>
    <?php 
	$dolt2 = dash_with_num_format2(forex_direct($dmonth,$dyear,$province,'MINISTERS TITHE',1,'national'));
	$dolt3 = dash_with_num_format2(forex_direct($dmonth,$dyear,$province,'GENERAL TITHE',1,'national'));
	 
	echo "<tr class='border'><td><b>$dis2</td>";
	echo "<td>$pdamt2</td>";
	$qq = 1;
	while($qq < 5) { 
	//$asv = forex_direct($dmonth,$dyear,$province,'MINISTERS TITHE',$qq,'national');
	if($qq == 1){ $dollarq = $asv;   }
	if($qq == 2){ $poundq = $asv;   }
	if($qq == 3){ $euroq = $asv;   }
	if($qq == 4){ $othersq = $asv;   }
	$ask1 = dash_with_num_format2($asv);
	//echo "<td>$ask1</td>";
	 $qq++;
	 }
	echo "</tr>";
	echo "<tr  class='myhover' title='$chn' ><td><b>$dis4</td><td>$pdagt2</td>";
	$qqq = 1;
	while($qqq < 5) { 
	//$asvv = forex_direct($dmonth,$dyear,$province,'GENERAL TITHE',$qqq,'national');
	if($qqq == 1){ $dollarq += $asvv;   }
	if($qqq == 2){ $poundq += $asvv;   }
	if($qqq == 3){ $euroq += $asvv;   }
	if($qqq == 4){ $othersq += $asvv;   }
	$ask1 = dash_with_num_format2($asvv);
	//echo "<td>$ask1</td>"; 
	$qqq++;
	 }
	echo "</tr>";
	
	 $result_msgk = get_items_for_remittance($province,'per_national',$dmonth,$dyear);	
 	while($yy22k = fetch($result_msgk)){
	 $giving_name = $yy22k['giving_name'];	
	$q = 1;		
	echo "<tr  class='myhover' >";
	
	echo "<td><b>$giving_name</td>";

	$giving_namexx = $giving_name.'x';
	$ivvx =	$_SESSION[$giving_namexx]; 
	$sumiv += $ivvx;
	$ivv2x = dash_with_num_format2($ivvx);
	echo "<td>$ivv2x</td>";
	while($q < 5) { 
	//$mine = forex_direct($dmonth,$dyear,$province,$giving_name,$q,'national');
	if($q == 1){ $dollarq += $mine;   }
	if($q == 2){ $poundq += $mine;   }
	if($q == 3){ $euroq += $mine;   }
	if($q == 4){ $othersq += $mine;   }
	$ask = dash_with_num_format2($mine);
	//echo "<td>$ask</td>"; 
	$q++; 
	}
	
	unset($_SESSION[$giving_namexx]);		
	echo "</tr>"; 
 	}
	
	$gtn = grand_summary_province_youth_church($dmonth,$dyear);
	$gtn2 = dash_with_num_format2($gtn);	
	
	$resultkk2 = get_youth_churches($province,$dmonth,$dyear);
	$nnn = numr($resultkk2);
	
	if($nnn > 0){	
	echo '<tr  class="myhover">';
	echo "<td><b>$nnn YOUTH CHURCH";
	if($nnn > 1){echo "ES"; }
	echo "</b> (";	

	while($ss4 = fetch($resultkk2)){
	$churchn = $ss4['church_id'];
	echo $gcn = get_church_name_basic($churchn);
	echo ',';
	}
	
	echo ") </td>";
	echo "<td>$gtn2</td>";
	$k = 1;
	while($k < 5){
	//	echo "<td>-</td>";
		$k++;
	}
	echo '</tr>';
	}
	$subtotal_naira = $sumiv + $pdamt + $pdagt + $gtn;
	$subtotal_naira2 = dash_with_num_format2($subtotal_naira);
	$dollarq2 = dash_with_num_format2($dollarq);
	$poundq2 = dash_with_num_format2($poundq);
	$euroq2 = dash_with_num_format2($euroq);
	$othersq2 = dash_with_num_format2($othersq);
	//$pdamt2, $pdagt2
	echo "<tr bgcolor='#FFCCFF' class='bolder'><td>SUB TOTAL</td><td>$subtotal_naira2</td>";
	//echo "<td>$dollarq2</td><td>$poundq2</td><td>$euroq2</td><td>$othersq2</td>";
	echo "</tr>";
?>	
<?php  
include 'includes/bits/other_remit_items/other_items.php';
//if($pay2p == true){ include 'includes/bits/other_remit_items/other_items.php'; } ?>
    <?php  // include('includes/javascript_acc.php'); ?>
<!--	<tr><td colspan=3 align='center'>
	<input type='submit' name='sub_above' value='Save' onclick="return IsEmpty();" />    
	</td></tr>-->
	<?php
	if($en == 0) { 
	$grandtotal = $subtotal_naira + $sumothers;
	$grandtotal2 = dash_with_num_format2($grandtotal);
	echo '<tr class="bolder">
    <td width="40%"></td><td>NAIRA</td>';
	//echo '<td>DOLLAR</td><td>POUND</td><td>EURO</td><td>OTHERS</td>';
    echo '</tr>';
	echo "<tr bgcolor='#CCCCFF' class='bolder'><td>$dprovince2 GRAND TOTAL</td>
	<td>$grandtotal2</td>";
	//echo "<td>$dollarq2</td><td>$poundq2</td><td>$euroq2</td><td>$othersq2</td>";
	echo "</tr>";  }
	unset_sessions('mintit,gentit,pmintit,pgentit,gtotal,gchq_amt');
	//echo '<input type="submit" name="sub_above">';
	}
	
 ?>
 
    </table>
     <?php  }  ?>
     
      <?php  if($idcard > 22){ ?>
    <br /><br />
    <div class="noprint"><?php  echo lock_status($dmonth,$dyear,1,$province,$echo = true); ?></div>
    <br />
    <?php if($epayment == true and $pay2p == true){ include 'includes/cheque_details_prov_to_nat_main_remita.php'; } ?>
    <?php 
	note_below();
/*	if($epayment == true and $pay2p == false){
	echo '<font color="green" size="1px" class="noprint">
	The figures displayed here are for reference purpose only, because remittance is paid directly to national by areas</font>'; 
	}*/
	?>
    
    <?php  include("includes/bits/signed_by_below.php");  ?>
   
    </div><br />
    </td>
    </tr>
    </form>
    </table>

<?php  if($epayment == true){  include 'includes/bits/remita/load_amt_redirect.php'; } ?>

<?php br(2);
include("includes/bits/acc_portal_footer.php"); ?>
<?php  }  ?>

