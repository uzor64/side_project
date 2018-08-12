<?php include("top.php");  ?>
<?php 
include('includes/bits/picp_def_month.php');
include("remittance_report_top.php");  ?>
<?php
 include("includes/bits/get_cmonth_income.php"); 

	br(2);
//just a github change
	
	user_access_for_payment_sheets();
	
	//echo '</div>';  ?>
	<center><label class="noPrint"> <a href="#/" onClick="printpage()">Print</a></label>
	<?php 
	$dprovince2 = strtoupper($province);	
	$title_name = get_church_area_or_province_name();
	 
	echo '<div align="center">';

	$page_title = 'INCOME SHEET';
	include 'includes/bits/payment_sub/top_sheet_header.php';
		
	$cpv2 = universal_query('zone_alias,area_alias',$table_prov,'province',$province,$cid=false,$ord=false,'namey');
	$getp = fetch($cpv2);
	$szone  = intval($getp['zone_alias']);
	$sarea = intval($getp['area_alias']);

	$result9 = get_areahqs($province,$table);
	$cntarea = numr($result9);
	
	echo '<div class="noprint">';
	echo '<font color="#333333"> SHOW ONLY ONE ITEM </font>';
	echo '<select name="viewonly">';
	//echo '<option value="0">SELECT THE ITEM</option>';
	echo '<option value="tithe">TITHE ONLY</option>';
	$result_msgxi =	remittable_all_not_ct_mt($province);
	while($a28xi = mysql_fetch_array($result_msgxi)){	
	$itemnamevfi = $a28xi['giving_name'];
	echo '<option ';
	if($_POST['viewonly'] == $itemnamevfi){ echo ' selected="selected" ';  }
	echo '>'.$itemnamevfi.'</option>';	
	}	
	echo '</select>';  space(3);
	echo '<input type="submit" name="display" value="Go" />'; space(3);
	echo '<input type="submit" name="reset" value="Reset" />';
	echo '</div>';
	
	$directGet = false;
	
	if(safe($_GET['viewonly']) != NULL and !$_POST['display']){ 
	$viewonly = $_POST['viewonly'] =  safe($_GET['viewonly']); 
	$_POST['display'] = true; 
	$directGet = true; 
	  }
	
	if($_POST['display'] and $directGet == false) { $viewonly = safe($_POST['viewonly']);  }
	
	if($_POST['display']) { 
	echo "<sub><font color='blue' class='noprint'>SHOWING ONLY: $viewonly. To view all income click 'RESET' </font></sub>"; }
	br(2);
	echo '<table border="1" cellpadding="5" cellspacing="5" align="center">';
	
		$mtt = 	get_remit_percent($province,'MINISTERS TITHE',1);
		$gtt = 	get_remit_percent($province,'GENERAL TITHE',1);
		
	//	echo 'yes2';
 
	  $dis1 =  "MINISTERS TITHE <br />(100%)";
	  $dis2 = "MINISTERS TITHE <br />(".$mtt."%)";
	  $dis3 = "GENERAL TITHE <br />(100%)";
	  $dis4 = 'GENERAL TITHE <br />('.$gtt.'%)';
	  $dist = "TOTAL TITHE <br />(100%)";
	  
	include('includes/bits/income_header_loop.php');
	$loop = 1;
	
	if($cntarea == 0){ echo "<h3><font color='#FF0000'>Data for $xxmonth $xxyear is not available on the portal. </font></h3>"; br(2);  }
	else {
	
	while($res29 = mysql_fetch_array($result9)){
	 $aid = $res29['id'];	
	//echo 'yes3';
	if( $sarea ==1) { $chn = $res29['area_alias'];
	if($chn=='') { $chn = $res29['church_name'].' AREA';  } }			
	if( $sarea == 0) {   	$chn = $res29['church_name'].' AREA';  }

$set = 1;	
//include('includes/bits/tithe_exempt.php');

if($loop == 11) { include('includes/bits/income_header_loop2.php'); $loop = 1;  }

$loop++;

	  $full_tithe_gen = sum_area_tithe('tithe_others',$aid,$rmonth,$year);
	  $full_tithe_min = sum_area_tithe('tithe_minister',$aid,$rmonth,$year);
	  
	  //echo 'yes4';
	  
	  $full_total_tithe = $full_tithe_gen + $full_tithe_min;
	  
	  $fg =  nformat_decimal($full_tithe_gen);
	  $fm =  nformat_decimal($full_tithe_min);
	  $ft =  nformat_decimal($full_total_tithe);
	  
	    //echo $rmonth; echo $year; echo $aid; echo $rid;
	  
	//  get_area_remit_value($val,$table,$aid,$rmonth,$year,$rid,$showother = true, $grandprov = false, $dprovince);
	 $full_tithe_minp = get_area_remit_value('tithe_minister','tithe_direct',$aid,$rmonth,$year,$rid,$showother=false, $grandprov = false, $dprovince);
$full_tithe_genp = get_area_remit_value('tithe_others','tithe_direct',$aid,$rmonth,$year,$rid,$showother=false, $grandprov = false, $dprovince);
	// echo 'yes5';
	  
	  $pgtt = $gtt/100;
	  $mmtt = $mtt/100;
	  
	  $per_tithe_mini = $mmtt*$full_tithe_minp;
	  $per_tithe_geni = $pgtt*$full_tithe_genp;
	  
	  $tminid = get_remit_itemid($province,'MINISTERS TITHE');
	  $tgenid = get_remit_itemid($province,'GENERAL TITHE');
	  
	  $tmin = get_area_remit_value('value','remittable_ex',$aid,$rmonth,$year,$tminid);
	  $tgen = get_area_remit_value('value','remittable_ex',$aid,$rmonth,$year,$tgenid);
	  
	  $per_tithe_gen = $per_tithe_geni + $tgen;
	  $per_tithe_min = $per_tithe_mini + $tmin;
	  
	  $fgp =  nformat_decimal($per_tithe_gen);
	  $fmp =  nformat_decimal($per_tithe_min);

$link = "<a href='add_report_acc.php?cmonth=$rmonth&cyear=$year&areaid=$aid&subj=25&forarea=1'>View</a>";

$idcard > 22 ? $ch_name = $chn : $ch_name = $church_name;

	echo '<tr class="myhover" title="'.$chn.'" ';
	echo '>';
	echo "<td class='noprint'>$link</td>";
	echo "<td>$c</td>";
	echo "<td><b>$ch_name";
	$ifex = check_if_exemption($aid,$rmonth,$year);
	if($ifex > 0){  echo '<div class="noprint"><font color=blue size=1px><sub>(EXEMPTION)</sub></font></div>'; }
	echo "</b></td>";
	
	if(!$_POST['display'] or $viewonly == 'tithe') { 
	echo "<td>$fm</td>";
	echo "<td>$fmp</td>";
	echo "<td>$fg</td>";
	echo "<td>$fgp</td>";
	echo "<td>$ft</td>";	
	
	$_SESSION['total'] = $per_tithe_min;
	$_SESSION['total'] += $per_tithe_gen;	
	$_SESSION['mintit'] += $full_tithe_min;
	$_SESSION['gentit'] += $full_tithe_gen;
	$_SESSION['pmintit'] += $per_tithe_min;
	$_SESSION['pgentit'] += $per_tithe_gen;
	
	}

$result_msg =	remittable_all_not_ct_mt($province);	
 while($yy22 = fetch($result_msg)){
		 		
		$rid = $yy22['id'];
		 $type = $yy22['type'];
		$dpercent = $yy22['dpercent'];
		 $perc_of = $yy22['perc_of'];
		$perc_of_perc_of = $yy22['perc_of_perc_of'];
		if($dpercent == NULL and $type == 1){ $dpercent = 100;  }
		$giving_name = $yy22['giving_name'];
	
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
	
	$rvalex = get_area_remit_value('value',remittable_ex,$aid,$rmonth,$year,$rid,$showother=false, $grandprov = false, $dprovince, $enable_nc = true);
	//get_area_remit_value($val,$tablex,$aid,$rmonth,$year,$rid,$showother = true, $grandprov = false, $dprovince, $enable_nc = false)
	$rval = $rval + $rvalex;
	$_SESSION['total'] += $rval;		
		
	foreach($men as $indit){
	//echo $indit; br();		
		if($giving_name == $indit){
			//$givnamex = $giving_name.'x';
			$_SESSION[$giving_name] += $rval;
			//$_SESSION[$givnamex] = $_SESSION[$giving_name]; 
		}
	}
		
	$rval2 = dash_with_num_format2($rval);
	//echo '<td><center>';
	//echo $rval2.'</center></td>'; 
	
	if(!$_POST['display']) { 
	echo '<td><center>';	echo $rval2.'</center></td>'; 
	}
	else {
	if($_POST['viewonly'] == $giving_name) { echo '<td><center>';	echo $rval2.'</center></td>';  }	
	}
		 }
		 
		 
		 
	$datotal = $_SESSION['total'];		
	$datotal2 = dash_with_num_format2($datotal);
	
	$_SESSION['gtotal'] += $datotal ;	
	
	$chq_amt = get_cheque_amt_by_area($aid,$rmonth,$year);
	$chq_amt2 = dash_with_num_format2($chq_amt);
	
	$_SESSION['gchq_amt'] += $chq_amt ;	
		
	$thediff = $chq_amt - $datotal;
	$thediff2 = dash_with_num_format2($thediff);
	//printtext
	
	if($thediff < 0){  $thediff3 = '<font color="#FF0000">'.$thediff2.'</font>';   }
	if($thediff == 0){  $thediff3 = '<font color="#000000">'.$thediff2.'</font>';   }
	if($thediff > 0){  $thediff3 = '<font color="#0000CC">+'.$thediff2.'</font>';   }
	
	$thediff2y = $thediff * -1;
	$thediff2yv = dash_with_num_format2($thediff2y);
	
	if($thediff < 0){  $thediff4 = '('.$thediff2yv.')';   }
	else{  $thediff4  = $thediff2;   }
	
	if(!$_POST['display']) { 
	echo "<td><b>$datotal2</b></td>";
	
	if($epayment == false){
	echo "<td><b>$chq_amt2</b></td>";
	echo "<td class='noprint'><b>$thediff3</b></td>";
	echo "<td class='printtext'><b>$thediff4</b></td>";
	}
	echo "<td>$c</td>";
	echo "<td>$chn</td>";
	}
	echo '</tr>';
	
	unset($_SESSION['total']);
	$c++;
	}
	$damt = $_SESSION['mintit'];
	$damt2 = dash_with_num_format2($damt);	
	$dagt = $_SESSION['gentit'];
	$dagt2 = dash_with_num_format2($dagt);
	
	$pdamt = $_SESSION['pmintit'];
	$pdamt2 = dash_with_num_format2($pdamt);	
	$pdagt = $_SESSION['pgentit'];
	$pdagt2 = dash_with_num_format2($pdagt);
	
	$dtott = $damt + $dagt;
	$dtott2 = dash_with_num_format2($dtott);
	
	
	if($idcard > 22){
	include('includes/bits/income_header_loop2.php');
		
	echo '<tr class="bolder" class="printtext">';	
	echo '<tr class="bolder" bgcolor="#FFFF66" class="noprint">';
	
	echo '<td colspan=3 class="noprint" >';
	if($idcard > 22){ echo strtoupper($province); }
	echo ' '.strtoupper($xxmonth)." $xxyear ".' TOTAL</td>';
	echo '<td colspan=2 class="printtexttd" >';
	if($idcard > 22){ echo strtoupper($province); }
	echo ' '.strtoupper($xxmonth)." $xxyear ".' TOTAL</td>';
	
	if(!$_POST['display'] or $viewonly == 'tithe') { 	
/*	echo "<td>$damt2</td>";
	echo "<td>$pdamt2</td>";
	echo "<td>$dagt2</td>";
	echo "<td>$pdagt2</td>";
	echo "<td>$dtott2</td>";*/	
	
	echo "<td>$damt2";
	echo show_youth_church_amount($rmonth,$year,$province,$for = 'mtonly');
	echo "</td>";
	echo "<td>$pdamt2";
	//echo '<br />'.grand_summary_province_youth_church_region($rmonth,$year,$province,$for = 'mtonly', $forthe = 1, $d100 = false);
	echo "</td>";
	echo "<td>$dagt2";
	echo show_youth_church_amount($rmonth,$year,$province,$for = 'gtonly');
	echo "</td>";
	echo "<td>$pdagt2</td>";
	echo "<td>$dtott2</td>";
	}
	
	
	foreach($men as $indit){
	$ivv = $indit.'q';
	$ivv =	$_SESSION[$indit]; 
	$ivv2 = dash_with_num_format2($ivv);
	
	if(!$_POST['display']) { 	echo "<td>$ivv2</td>";	}
	else {	if($_POST['viewonly'] == $indit) { echo "<td>$ivv2</td>"; } }	
	
	//echo "<td>$ivv2</td>";
	unset($_SESSION[$indit]);	
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
	
	
	if(!$_POST['display']) { echo "<td>$gtotal4</td>";
	if($epayment == false){
	echo "<td>$gchq_amt4</td>";	
	echo "<td class='noprint'><b>$thediff3x</b></td>";
	echo "<td class='printtext'><b>$thediff5x</b></td>";
	}
	}
	
	echo '</tr>';
		}
	}
	echo '</table>';
	unset_sessions('mintit,gentit,pmintit,pgentit,gtotal,gchq_amt')
	?>  
    
    </td>
    </tr>
    </form>
    </table>
<?php br(2); include("includes/bits/acc_portal_footer.php"); ?>

