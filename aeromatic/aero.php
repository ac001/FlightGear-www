<?php

$version = 0.1;

//****************************************************
//                                                   *
// This is the CGI back-end for the Aero-Matic gen-  *
// erator. The front-end is aeromatic.html.          *
//                                                   *
// June 2003, David P. Culp, davidculp2@attbi.com    *
//                                                   * 
//****************************************************


//***** GET DATA FROM USER ***************************

$ac_units           = $_POST['ac_units'];
$ac_name            = $_POST['ac_name'];
$ac_type            = $_POST['ac_type'];
$ac_weight          = $_POST['ac_weight'];
$ac_wingspan        = $_POST['ac_wingspan'];
$ac_length          = $_POST['ac_length'];
$ac_wingarea        = $_POST['ac_wingarea'];
$ac_geartype        = $_POST['ac_geartype'];
$ac_numengines      = $_POST['ac_numengines'];
$ac_enginetype      = $_POST['ac_enginetype'];
$ac_enginelayout    = $_POST['ac_enginelayout'];
$ac_enginename      = $_POST['ac_enginename'];
$ac_enginepower     = $_POST['ac_enginepower'];
$ac_engineunits     = $_POST['ac_engineunits'];
$ac_augmented       = $_POST['ac_augmented'];
$ac_yawdamper       = $_POST['ac_yawdamper'];
$ac_wingchord       = $_POST['ac_wingchord'];
$ac_htailarea       = $_POST['ac_htailarea'];
$ac_htailarm        = $_POST['ac_htailarm'];
$ac_vtailarea       = $_POST['ac_vtailares'];
$ac_vtailarm        = $_POST['ac_vtailarm'];
$ac_emptyweight     = $_POST['ac_emptyweight'];

//***** CONVERT TO ENGLISH UNITS *********************

if ($ac_units == 1) { 
  $ac_weight *= 2.205;
  $ac_wingspan *= 3.281;
  $ac_length *= 3.281;
  $ac_wingarea *= 10.765;
  $ac_wingchord *= 3.281;
  $ac_htailarea *= 10.765;
  $ac_htailarm *= 3.281;
  $ac_vtailarea *= 10.765;
  $ac_vtailarm *= 3.281;
  $ac_emptyweight *= 2.205;
  }

//***** METRICS ***************************************

// first, estimate wing loading in psf
switch($ac_type) { 
  case 0: $ac_wingloading = 7.0; break;
  case 1: $ac_wingloading = 14.0; break;
  case 2: $ac_wingloading = 29.0; break;
  case 3: $ac_wingloading = 45.0; break;
  case 4: $ac_wingloading = 80.0; break;
  case 5: $ac_wingloading = 100.0; break;
  case 6: $ac_wingloading = 110.0; break;
  case 7: $ac_wingloading = 110.0; break;
  case 8: $ac_wingloading = 110.0; break;
  }

// if no wing area given, use wing loading to estimate
if ($ac_wingarea == 0) {
    $ac_wingarea = $ac_weight / $ac_wingloading;
  }
  else {
    $ac_wingloading = $ac_weight / $ac_wingarea;
  }

// calculate wing chord
$ac_wingchord = $ac_wingarea / $ac_wingspan;


// estimate horizontal tail area
if ($ac_htailarea == 0) {
  switch($ac_type) {
    case 0: $ac_htailarea = $ac_wingarea * 0.12; break;
    case 1: $ac_htailarea = $ac_wingarea * 0.16; break;
    case 2: $ac_htailarea = $ac_wingarea * 0.16; break;
    case 3: $ac_htailarea = $ac_wingarea * 0.17; break;
    case 4: $ac_htailarea = $ac_wingarea * 0.20; break;
    case 5: $ac_htailarea = $ac_wingarea * 0.20; break;
    case 6: $ac_htailarea = $ac_wingarea * 0.25; break;
    case 7: $ac_htailarea = $ac_wingarea * 0.25; break;
    case 8: $ac_htailarea = $ac_wingarea * 0.25; break;
    }
  }

// estimate distance from CG to horizontal tail aero center
if ($ac_htailarm == 0) {
  switch($ac_type) {
    case 0: $ac_htailarm = $ac_length * 0.55; break;
    case 1: $ac_htailarm = $ac_length * 0.50; break;
    case 2: $ac_htailarm = $ac_length * 0.50; break;
    case 3: $ac_htailarm = $ac_length * 0.55; break;
    case 4: $ac_htailarm = $ac_length * 0.40; break;
    case 5: $ac_htailarm = $ac_length * 0.40; break;
    case 6: $ac_htailarm = $ac_length * 0.45; break;
    case 7: $ac_htailarm = $ac_length * 0.45; break;
    case 8: $ac_htailarm = $ac_length * 0.45; break;
    }
  }

// estimate vertical tail area
if ($ac_vtailarea == 0) {
  switch($ac_type) {
    case 0: $ac_vtailarea = $ac_wingarea * 0.10; break;
    case 1: $ac_vtailarea = $ac_wingarea * 0.10; break;
    case 2: $ac_vtailarea = $ac_wingarea * 0.18; break;
    case 3: $ac_vtailarea = $ac_wingarea * 0.10; break;
    case 4: $ac_vtailarea = $ac_wingarea * 0.12; break;
    case 5: $ac_vtailarea = $ac_wingarea * 0.18; break;
    case 6: $ac_vtailarea = $ac_wingarea * 0.20; break;
    case 7: $ac_vtailarea = $ac_wingarea * 0.20; break;
    case 8: $ac_vtailarea = $ac_wingarea * 0.20; break;
    }
  }

// estimate distance from CG to vertical tail aero center
if ($ac_vtailarm == 0) {
  switch($ac_type) {
    case 0: $ac_vtailarm = $ac_length * 0.60; break;
    case 1: $ac_vtailarm = $ac_length * 0.50; break;
    case 2: $ac_vtailarm = $ac_length * 0.50; break;
    case 3: $ac_vtailarm = $ac_length * 0.60; break;
    case 4: $ac_vtailarm = $ac_length * 0.40; break;
    case 5: $ac_vtailarm = $ac_length * 0.40; break;
    case 6: $ac_vtailarm = $ac_length * 0.45; break;
    case 7: $ac_vtailarm = $ac_length * 0.45; break;
    case 8: $ac_vtailarm = $ac_length * 0.45; break;
    }
  }

//***** MOMENTS OF INERTIA ******************************

// use Roskam's formulae to estimate moments of inertia
switch($ac_type) {  // moment-of-inertia factors 
  case 0: $Rx = 0.34;$Ry = 0.33;$Rz = 0.47; break;
  case 1: $Rx = 0.27;$Ry = 0.36;$Rz = 0.42; break;
  case 2: $Rx = 0.27;$Ry = 0.35;$Rz = 0.45; break;
  case 3: $Rx = 0.27;$Ry = 0.36;$Rz = 0.42; break;
  case 4: $Rx = 0.27;$Ry = 0.35;$Rz = 0.40; break;
  case 5: $Rx = 0.29;$Ry = 0.34;$Rz = 0.41; break;
  case 6: $Rx = 0.25;$Ry = 0.38;$Rz = 0.46; break;
  case 7: $Rx = 0.25;$Ry = 0.36;$Rz = 0.47; break;
  case 8: $Rx = 0.32;$Ry = 0.34;$Rz = 0.47; break;
  }

$ac_ixx = ($ac_weight / 32.2)* pow(($Rx * $ac_wingspan / 2), 2);
$ac_iyy = ($ac_weight / 32.2)* pow(($Ry * $ac_length / 2), 2);
$ac_izz = ($ac_weight / 32.2)* pow(($Rz * (($ac_wingspan + $ac_length)/2) / 2), 2);
$ac_ixz = 0; // a non-zero value here can destablize the airplane


// increase moments to make up for lack of control feel
$ac_ixx *= 1.5;
$ac_iyy *= 1.5;
$ac_izz *= 1.5;
$ac_ixz *= 1.5;


//***** EMPTY WEIGHT *********************************

// estimate empty weight
if ($ac_emptyweight == 0) {
  switch($ac_type) {
    case 0:  $ac_emptyweight = $ac_weight * .80;
    case 1:  $ac_emptyweight = $ac_weight * .62;
    case 2:  $ac_emptyweight = $ac_weight * .61;
    case 3:  $ac_emptyweight = $ac_weight * .61;
    case 4:  $ac_emptyweight = $ac_weight * .53;
    case 5:  $ac_emptyweight = $ac_weight * .50;
    case 6:  $ac_emptyweight = $ac_weight * .55;
    case 7:  $ac_emptyweight = $ac_weight * .52;
    case 8:  $ac_emptyweight = $ac_weight * .49;
    }
  }

//***** CG LOCATION ***********************************

$ac_cglocx = ($ac_length - $ac_htailarm) * 12;
$ac_cglocy = 0;
$ac_cglocz = -12.0;

//***** AERO REFERENCE POINT **************************

$ac_aerorpx = $ac_cglocx;
$ac_aerorpy = 0;
$ac_aerorpz = 0;

//***** PILOT EYEPOINT *********************************

// place pilot's eyepoint based on airplane type
switch($ac_type) {
  case 0: $ac_eyeptlocx = ($ac_length * 0.23) * 12; break;
  case 1: $ac_eyeptlocx = ($ac_length * 0.13) * 12; break;
  case 2: $ac_eyeptlocx = ($ac_length * 0.17) * 12; break;
  case 3: $ac_eyeptlocx = ($ac_length * 0.28) * 12; break;
  case 4: $ac_eyeptlocx = ($ac_length * 0.20) * 12; break;
  case 5: $ac_eyeptlocx = ($ac_length * 0.20) * 12; break;
  case 6: $ac_eyeptlocx = ($ac_length * 0.07) * 12; break;
  case 7: $ac_eyeptlocx = ($ac_length * 0.07) * 12; break;
  case 8: $ac_eyeptlocx = ($ac_length * 0.07) * 12; break;
  }

switch($ac_type) {
  case 0: $ac_eyeptlocy = 0; break;
  case 1: $ac_eyeptlocy = -18; break;
  case 2: $ac_eyeptlocy = -18; break;
  case 3: $ac_eyeptlocy = 0; break;
  case 4: $ac_eyeptlocy = 0; break;
  case 5: $ac_eyeptlocy = 0; break;
  case 6: $ac_eyeptlocy = -30; break;
  case 7: $ac_eyeptlocy = -30; break;
  case 8: $ac_eyeptlocy = -32; break;
  }

switch($ac_type) {
  case 0: $ac_eyeptlocz = 12; break;
  case 1: $ac_eyeptlocz = 45; break;
  case 2: $ac_eyeptlocz = 45; break;
  case 3: $ac_eyeptlocz = 40; break;
  case 4: $ac_eyeptlocz = 36; break;
  case 5: $ac_eyeptlocz = 38; break;
  case 6: $ac_eyeptlocz = 70; break;
  case 7: $ac_eyeptlocz = 75; break;
  case 8: $ac_eyeptlocz = 80; break;
  }

//***** LANDING GEAR *********************************

switch($ac_geartype) {
  case 0: $ac_gearlocx_main = $ac_cglocx * 1.09; break;
  case 1: $ac_gearlocx_main = $ac_cglocx * 0.91; break;
  }
$ac_gearlocy_main = $ac_wingspan * 0.09 * 12;
$ac_gearlocz_main = -($ac_length * 0.08 * 12);

$ac_gearlocx_nose = $ac_length * 0.13 * 12;
$ac_gearlocy_nose = 0;
$ac_gearlocz_nose = $ac_gearlocz_main;

$ac_gearlocx_tail = $ac_length * 0.91 * 12;
$ac_gearlocy_tail = 0;
$ac_gearlocz_tail = $ac_gearlocz_main * 0.35;

$ac_gearspring_main = $ac_weight * 0.5;
$ac_gearspring_nose = $ac_weight * 0.3;
$ac_gearspring_tail = $ac_weight * 0.3;

$ac_geardamp_main = $ac_weight * 0.1;
$ac_geardamp_nose = $ac_weight * 0.05;
$ac_geardamp_tail = $ac_weight * 0.1;

$ac_geardynamic = 0.8;
$ac_gearstatic  = 0.5;
$ac_gearrolling = 0.02;

$ac_gearsteerable_nose = 'STEERABLE';
$ac_gearsteerable_main = 'FIXED';
$ac_gearsteerable_tail = 'CASTERED';
$ac_gearmaxsteer = 80.0;
$ac_gearretract = 'RETRACT';

//***** PROPULSION ************************************

// spread engines out in reasonable locations

// forward fuselage engines
if ($ac_enginelayout == 0) {
  $leftmost = ($ac_numengines * -20) + 20;
  for( $i=0; $i<$ac_numengines; $i++) {   
      $ac_englocx[$i] = 36.0;
      $ac_englocy[$i] = $leftmost + ($i * 40);
      $ac_englocz[$i] = 0; 
     }
}

// mid fuselage engines
if ($ac_enginelayout == 1) {
  $leftmost = ($ac_numengines * -20) + 20;
  for( $i=0; $i<$ac_numengines; $i++) {   
      $ac_englocx[$i] = $ac_cglocx;
      $ac_englocy[$i] = $leftmost + ($i * 40);
      $ac_englocz[$i] = -20.0; 
     }
} 

// aft fuselage engines
if ($ac_enginelayout == 2) {
  $leftmost = ($ac_numengines * -20) + 20;
  for($i=0; $i<$ac_numengines; $i++) {   
      $ac_englocx[$i] = ($ac_length * 12) - 60.0;
      $ac_englocy[$i] = $leftmost + ($i * 40);
      $ac_englocz[$i] = 0; 
     }
} 

// wing engines (odd one goes in middle)
if ($ac_enginelayout == 3) {
  $halfcount = intval( $ac_numengines / 2 );
  $remainder = $ac_numengines - ($halfcount * 2);
  for($i=0; $i<$halfcount; $i++) {                 //left wing
      $ac_englocx[$i] = $ac_cglocx;
      $ac_englocy[$i] = $ac_wingspan * -2.0;
      $ac_englocz[$i] = -40; 
     }    
  for($j=$i; $j<$halfcount+$remainder; $j++) {      //center
      $ac_englocx[$j] = $ac_cglocx;
      $ac_englocy[$j] = 0;
      $ac_englocz[$j] = -20; 
     }    
  for($k=$j; $k<$ac_numengines; $k++) {             //right wing
      $ac_englocx[$i] = $ac_cglocx;
      $ac_englocy[$i] = $ac_wingspan * 2.0;
      $ac_englocz[$i] = -40; 
     }    
  }

// wing and tail engines
if ($ac_enginelayout == 4) {
  $halfcount = intval( $ac_numengines / 2 );
  $remainder = $ac_numengines - ($halfcount * 2);
  for($i=0; $i<$halfcount; $i++) {                 //left wing
      $ac_englocx[$i] = $ac_cglocx;
      $ac_englocy[$i] = $ac_wingspan * -2.0;
      $ac_englocz[$i] = -40; 
     }    
  for($j=$i; $j<$halfcount+$remainder; $j++) {      //center
      $ac_englocx[$j] = 36.0;
      $ac_englocy[$j] = 0;
      $ac_englocz[$j] = 0; 
     }    
  for($k=$j; $i<$ac_numengines; $i++) {             //right wing
      $ac_englocx[$i] = $ac_cglocx;
      $ac_englocy[$i] = $ac_wingspan * 2.0;
      $ac_englocz[$i] = -40; 
     }    
  }

// wing and nose engines      
if ($ac_enginelayout == 5) {
  $halfcount = intval( $ac_numengines / 2 );
  $remainder = $ac_numengines - ($halfcount * 2);
  for($i=0; $i<$halfcount; $i++) {                 //left wing
      $ac_englocx[$i] = $ac_cglocx;
      $ac_englocy[$i] = $ac_wingspan * -2.0;
      $ac_englocz[$i] = -40; 
     }    
  for($j=$i; $j<$halfcount+$remainder; $j++) {      //center
      $ac_englocx[$j] = $ac_length - 60;
      $ac_englocy[$j] = 0;
      $ac_englocz[$j] = 60; 
     }    
  for($k=$j; $i<$ac_numengines; $i++) {             //right wing
      $ac_englocx[$i] = $ac_cglocx;
      $ac_englocy[$i] = $ac_wingspan * 2.0;
      $ac_englocz[$i] = -40; 
     }    
  }

// thruster goes where engine is
for($i=0; $i<$ac_numengines; $i++) {
  $ac_engpitch[$i] = 0;
  $ac_engyaw[$i] = 0;
  $ac_engfeed[$i] = $i;
  $ac_thrusterlocx[$i] = $ac_englocx[$i];
  $ac_thrusterlocy[$i] = $ac_englocy[$i];
  $ac_thrusterlocz[$i] = $ac_englocz[$i];
  $ac_thrusterpitch[$i] = 0;
  $ac_thrusteryaw[$i] = 0;
  }

// thruster type (note: only piston engine gets a propeller)
switch($ac_enginetype) {
  case 0: $ac_thrustertype = 'prop'; break;
  case 1: $ac_thrustertype = 'direct'; break;
  case 2: $ac_thrustertype = 'direct'; break;
  case 3: $ac_thrustertype = 'direct'; break;
  }

//***** FUEL TANKS **********************************

// all tanks at CG and contain 500 pounds fuel
$ac_tanklocx = $ac_cglocx;
$ac_tanklocy = $ac_cglocy;
$ac_tanklocz = $ac_cglocz;
$ac_tankradius = 1;
$ac_tankcapacity = 500.0;
$ac_tankcontents = $ac_tankcapacity;

//***** LIFT ****************************************

// estimate slope of lift curve based on airplane type
// units: per radian
switch($ac_type) {
  case 0: $ac_CLalpha = 5.2; break;
  case 1: $ac_CLalpha = 5.0; break;
  case 2: $ac_CLalpha = 4.9; break;
  case 3: $ac_CLalpha = 4.5; break;
  case 4: $ac_CLalpha = 4.0; break;
  case 5: $ac_CLalpha = 4.0; break;
  case 6: $ac_CLalpha = 4.4; break;
  case 7: $ac_CLalpha = 4.4; break;
  case 8: $ac_CLalpha = 4.4; break;
  }

// estimate CL at zero alpha
switch($ac_type) {
  case 0: $ac_CL0 = 0.25; break;
  case 1: $ac_CL0 = 0.25; break;
  case 2: $ac_CL0 = 0.24; break;
  case 3: $ac_CL0 = 0.17; break;
  case 4: $ac_CL0 = 0.08; break;
  case 5: $ac_CL0 = 0.08; break;
  case 6: $ac_CL0 = 0.20; break;
  case 7: $ac_CL0 = 0.20; break;
  case 8: $ac_CL0 = 0.20; break;
  }

// estimate stall CL
$ac_CLmax = 1.4;

// estimate CL due to flaps, based on airplane type
switch($ac_type) {
  case 0: $ac_dCLflaps = 0.20; break;
  case 1: $ac_dCLflaps = 0.40; break;
  case 2: $ac_dCLflaps = 0.40; break;
  case 3: $ac_dCLflaps = 0.30; break;
  case 4: $ac_dCLflaps = 0.35; break;
  case 5: $ac_dCLflaps = 0.35; break;
  case 6: $ac_dCLflaps = 1.00; break;
  case 7: $ac_dCLflaps = 1.00; break;
  case 8: $ac_dCLflaps = 1.00; break;
  }

// some types have speedbrakes in wings, affecting lift
switch($ac_type) {
  case 0: $ac_dCLspeedbrake = -0.30; break;
  case 1: $ac_dCLspeedbrake = 0.00; break;
  case 2: $ac_dCLspeedbrake = 0.00; break;
  case 3: $ac_dCLspeedbrake = 0.00; break;
  case 4: $ac_dCLspeedbrake = 0.00; break;
  case 5: $ac_dCLspeedbrake = 0.00; break;
  case 6: $ac_dCLspeedbrake = -0.20; break;
  case 7: $ac_dCLspeedbrake = -0.20; break;
  case 8: $ac_dCLspeedbrake = -0.20; break;
  }

// estimate lift due to elevator deflection
$ac_CLde = 0.2;

//***** DRAG *****************************************

// estimate drag at zero lift, based on airplane type
switch($ac_type) {
  case 0: $ac_CD0 = 0.01; break;
  case 1: $ac_CD0 = 0.03; break;
  case 2: $ac_CD0 = 0.04; break;
  case 3: $ac_CD0 = 0.02; break;
  case 4: $ac_CD0 = 0.02; break;
  case 5: $ac_CD0 = 0.022; break;
  case 6: $ac_CD0 = 0.015; break;
  case 7: $ac_CD0 = 0.015; break;
  case 8: $ac_CD0 = 0.015; break;
  }

// estimate drag from other parts
$ac_CDflaps = 0.03;          // flaps down full
$ac_CDgear = 0.04;           // gear down
$ac_CDalpha = 0.9;           // per radian alpha
$ac_CDde = 0.04;             // elevator deflection
$ac_CDbeta = 0.2;            // sideslip
$ac_CDspeedbrake = $ac_CD0;  // speedbrake

// estimate critical mach, based on airplane type
switch($ac_type) {
  case 0: $ac_Mcrit = 0.70; break;
  case 1: $ac_Mcrit = 0.70; break;
  case 2: $ac_Mcrit = 0.72; break;
  case 3: $ac_Mcrit = 0.73; break;
  case 4: $ac_Mcrit = 0.81; break;
  case 5: $ac_Mcrit = 0.81; break;
  case 6: $ac_Mcrit = 0.79; break;
  case 7: $ac_Mcrit = 0.79; break;
  case 8: $ac_Mcrit = 0.79; break;
  }

//***** SIDE *************************************

// estimate side force due to sideslip (beta)
$ac_CSbeta = -1.5;

//***** ROLL *************************************

// estimate roll coefficients
$ac_Clbeta = -0.03;    // sideslip
$ac_Clp = -0.5;        // roll rate
$ac_Clr = 0.0;         // yaw rate
$ac_Clda = 0.2;        // aileron deflection
$ac_Cldr = 0.005;      // rudder deflection

//***** PITCH ************************************

// estimate pitch coefficients
$ac_Cmalpha = -4.0;    // per radian alpha
$ac_Cmde = -1.5;       // elevator deflection
$ac_Cmq = -12.0;       // pitch rate
$ac_Cmadot = -10.0;    // alpha-dot

//***** YAW **************************************

// estimate yaw coefficients
$ac_Cnbeta = 0.02;     // sideslip
$ac_Cnr = -0.04;       // yaw rate
$ac_Cndr = -0.5;       // rudder deflection

//************************************************
//*                                              *
//*  Print out xml document                      *
//*                                              *
//************************************************

print("<FDM_CONFIG NAME=\"$ac_name\" VERSION=\"1.60\">\n");
print("<!--\n  File:     $ac_name.xml\n");
print("  Author:   Aero-Matic v.$version\n");
print("-->\n"); 

//***** METRICS **********************************

print(" <METRICS>\n");
print("   AC_WINGAREA  $ac_wingarea \n");
print("   AC_WINGSPAN  $ac_wingspan \n");
print("   AC_CHORD     $ac_wingchord \n");
print("   AC_HTAILAREA $ac_htailarea \n");
print("   AC_HTAILARM  $ac_htailarm \n");
print("   AC_VTAILAREA $ac_vtailarea \n");
print("   AC_LV        $ac_vtailarm \n");
print("   AC_IXX       $ac_ixx \n");
print("   AC_IYY       $ac_iyy \n");
print("   AC_IZZ       $ac_izz \n");
print("   AC_IXZ       $ac_ixz \n");
print("   AC_EMPTYWT   $ac_emptyweight \n");
print("   AC_CGLOC     $ac_cglocx $ac_cglocy $ac_cglocz \n");
print("   AC_AERORP    $ac_aerorpx $ac_aerorpy $ac_aerorpz \n");
print("   AC_EYEPTLOC  $ac_eyeptlocx $ac_eyeptlocy $ac_eyeptlocz \n");
print(" </METRICS>\n");

//***** LANDING GEAR ******************************

print(" <UNDERCARRIAGE>\n");
if ($ac_geartype == 0) {
  print("  AC_GEAR NOSE_LG   $ac_gearlocx_nose $ac_gearlocy_nose $ac_gearlocz_nose ");
  print("$ac_gearspring_nose $ac_geardamp_nose $ac_geardynamic $ac_gearstatic ");
  print("$ac_gearrolling $ac_gearsteerable_nose NONE $ac_gearmaxsteer $ac_gearretract\n");
 }

print("  AC_GEAR LEFT_MLG  $ac_gearlocx_main -$ac_gearlocy_main $ac_gearlocz_main ");
print("$ac_gearspring_main $ac_geardamp_main $ac_geardynamic $ac_gearstatic ");
print("$ac_gearrolling $ac_gearsteerable_main LEFT 0 $ac_gearretract\n");

print("  AC_GEAR RIGHT_MLG $ac_gearlocx_main $ac_gearlocy_main $ac_gearlocz_main ");
print("$ac_gearspring_main $ac_geardamp_main $ac_geardynamic $ac_gearstatic ");
print("$ac_gearrolling $ac_gearsteerable_main RIGHT 0 $ac_gearretract\n");

if ($ac_geartype == 1) {
  print("  AC_GEAR TAIL_LG  $ac_gearlocx_tail $ac_gearlocy_tail $ac_gearlocz_tail ");
  print("$ac_gearspring_tail $ac_geardamp_tail $ac_geardynamic $ac_gearstatic ");
  print("$ac_gearrolling $ac_gearsteerable_tail NONE 0 $ac_gearretract\n");
 }

print(" </UNDERCARRIAGE>\n");

//***** PROPULSION ***************************************

print(" <PROPULSION>\n");
for($i=0; $i<$ac_numengines; $i++) {
  print("  <AC_ENGINE FILE=\"$ac_name");
  print("_engine\">\n");
  print("    XLOC $ac_englocx[$i]\n");
  print("    YLOC $ac_englocy[$i]\n");
  print("    ZLOC $ac_englocz[$i]\n");
  print("    PITCH $ac_engpitch[$i]\n");
  print("    YAW $ac_engyaw[$i]\n");
  print("    FEED $ac_engfeed[$i]\n");
  print("  </AC_ENGINE>\n");
  if($ac_enginetype == 0) {
    print("  <AC_THRUSTER FILE=\"$ac_name");
    print("_prop\">\n");
    }
    else {
    print("  <AC_THRUSTER FILE=\"direct\">\n");
    }
  print("    XLOC $ac_thrusterlocx[$i]\n");
  print("    YLOC $ac_thrusterlocy[$i]\n");
  print("    ZLOC $ac_thrusterlocz[$i]\n");
  print("    PITCH $ac_thrusterpitch[$i]\n");
  print("    YAW $ac_thrusteryaw[$i]\n");
  print("  </AC_THRUSTER>\n");
  }

//***** FUEL TANKS **************************************

for($i=0; $i<($ac_numengines + 1); $i++) {
 print("  <AC_TANK TYPE=\"FUEL\" NUMBER=\"$i\">\n");
 print("    XLOC $ac_tanklocx \n");
 print("    YLOC $ac_tanklocy \n");
 print("    ZLOC $ac_tanklocz \n");
 print("    RADIUS $ac_tankradius \n");
 print("    CAPACITY $ac_tankcapacity \n");
 print("    CONTENTS $ac_tankcontents \n");
 print("  </AC_TANK>\n");
}
print(" </PROPULSION>\n");

//***** FLIGHT CONTROL SYSTEM ***************************

print(" <FLIGHT_CONTROL NAME=\"$ac_name\">\n");
print("   <COMPONENT NAME=\"Pitch Trim Sum\" TYPE=\"SUMMER\">\n");
print("      INPUT   fcs/elevator-cmd-norm\n");
print("      INPUT   fcs/pitch-trim-cmd-norm\n");
print("      CLIPTO  -1 1\n");
print("   </COMPONENT>\n");
print("   <COMPONENT NAME=\"Elevator Control\" TYPE=\"AEROSURFACE_SCALE\">\n");
print("      INPUT   fcs/pitch-trim-sum\n");
print("      MIN     -25\n");
print("      MAX     35\n");
print("      GAIN    0.018\n");
print("      OUTPUT  fcs/elevator-pos-rad\n");
print("   </COMPONENT>\n");

print("   <COMPONENT NAME=\"Roll Trim Sum\" TYPE=\"SUMMER\">\n");
print("      INPUT   fcs/aileron-cmd-norm\n");
print("      INPUT   fcs/roll-trim-cmd-norm\n");
print("      CLIPTO  -1 1\n");
print("   </COMPONENT>\n");
print("   <COMPONENT NAME=\"Left Aileron Control\" TYPE=\"AEROSURFACE_SCALE\">\n");
print("      INPUT   fcs/roll-trim-sum\n");
print("      MIN     -20\n");
print("      MAX     15\n");
print("      GAIN    0.02\n");
print("      OUTPUT  fcs/left-aileron-pos-rad\n");
print("   </COMPONENT>\n");
print("   <COMPONENT NAME=\"Right Aileron Control\" TYPE=\"AEROSURFACE_SCALE\">\n");
print("      INPUT   fcs/roll-trim-sum\n");
print("      MIN     -20\n");
print("      MAX     15\n");
print("      INVERT\n");
print("      GAIN    0.02\n");
print("      OUTPUT  fcs/right-aileron-pos-rad\n");
print("   </COMPONENT>\n");

print("   <COMPONENT NAME=\"Yaw Trim Sum\" TYPE=\"SUMMER\">\n");
print("      INPUT   fcs/rudder-cmd-norm\n");
print("      INPUT   fcs/yaw-trim-cmd-norm\n");
print("      CLIPTO  -1 1\n");
print("   </COMPONENT>\n");

if($ac_yawdamper == 1) {
  print("   <COMPONENT NAME=\"Yaw Damper Rate\" TYPE=\"PURE_GAIN\">\n");
  print("      INPUT   velocities/r-aero-rad_sec\n");
  print("      GAIN    2.00\n");
  print("   </COMPONENT>\n");
  print("   <COMPONENT NAME=\"Yaw Damper Beta\" TYPE=\"PURE_GAIN\">\n");
  print("      INPUT   aero/beta-rad\n");
  print("      GAIN    -5.00\n");
  print("   </COMPONENT>\n");
  print("   <COMPONENT NAME=\"Rudder Sum\" TYPE=\"SUMMER\">\n");
  print("      INPUT   fcs/yaw-trim-sum\n");
  print("      INPUT   fcs/yaw-damper-rate\n");
  print("      INPUT   fcs/yaw-damper-beta\n");
  print("      CLIPTO  -1 1\n");
  print("   </COMPONENT>\n");
  print("   <COMPONENT NAME=\"Rudder Control\" TYPE=\"AEROSURFACE_SCALE\">\n");
  print("      INPUT   fcs/rudder-sum\n");
  print("      MIN     -25\n");
  print("      MAX     25\n");
  print("      GAIN    0.01745\n");
  print("      OUTPUT  fcs/rudder-pos-rad\n");
  print("   </COMPONENT>\n"); 
  }
  else {
   print("   <COMPONENT NAME=\"Rudder Control\" TYPE=\"AEROSURFACE_SCALE\">\n");
   print("      INPUT   fcs/yaw-trim-sum\n");
   print("      GAIN    0.01745\n");
   print("      OUTPUT  fcs/rudder-pos-rad\n");
   print("   </COMPONENT>\n"); 
  }

print("   <COMPONENT NAME=\"Flaps Control\" TYPE=\"KINEMAT\">\n");
print("     INPUT   fcs/flap-cmd-norm\n");
print("     DETENTS 3\n");
print("             0   0\n");
print("             15  2\n");
print("             30  2\n");
print("     OUTPUT  fcs/flap-pos-deg\n");
print("   </COMPONENT>\n");

print("   <COMPONENT NAME=\"Gear Control\" TYPE=\"KINEMAT\">\n");
print("     INPUT   gear/gear-cmd-norm\n");
print("     DETENTS 2\n");
print("             0   0\n");
print("             1   5\n");
print("     OUTPUT  gear/gear-pos-norm\n");
print("   </COMPONENT>\n");

print(" </FLIGHT_CONTROL>\n");

//***** AERODYNAMICS ******************************************

print(" <AERODYNAMICS>\n");

print("  <AXIS NAME=\"LIFT\">\n");
print("    <COEFFICIENT NAME=\"CLalpha\" TYPE=\"VECTOR\">\n");
print("      Lift_due_to_alpha\n");
print("      4\n");
print("      aero/alpha-rad\n");
print("      aero/qbar-psf|metrics/Sw-sqft\n");
$point = $ac_CL0 - ($ac_CLalpha * 0.1);
print("      -0.10 $point\n");
print("       0.00 $ac_CL0\n");
$alpha = ($ac_CLmax - $ac_CL0) / $ac_CLalpha;
print("       $alpha $ac_CLmax\n");
$point = $ac_CLmax - (0.6 * $alpha * $ac_CLalpha);
print("       0.60 $point\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"dCLflap\" TYPE=\"VALUE\">\n"); 
print("       Delta_Lift_due_to_flaps\n");
print("       aero/qbar-psf|metrics/Sw-sqft|fcs/flap-pos-norm\n");
print("       $ac_dCLflaps\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"dCLsb\" TYPE=\"VALUE\">\n"); 
print("       Delta_Lift_due_to_speedbrake\n");
print("       aero/qbar-psf|metrics/Sw-sqft|fcs/speedbrake-pos-norm\n");
print("       $ac_dCLspeedbrake\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"CLde\" TYPE=\"VALUE\">\n"); 
print("       Lift_due_to_Elevator_Deflection\n");
print("       aero/qbar-psf|metrics/Sw-sqft|fcs/elevator-pos-rad\n");
print("       $ac_CLde\n");
print("    </COEFFICIENT>\n");

print("  </AXIS>\n");

//***** DRAG ******************************************************

print("  <AXIS NAME=\"DRAG\">\n");

print("    <COEFFICIENT NAME=\"CD0\" TYPE=\"VALUE\">\n"); 
print("       Drag_at_zero_lift\n");
print("       aero/qbar-psf|metrics/Sw-sqft\n");
print("       $ac_CD0\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"CDalpha\" TYPE=\"VALUE\">\n"); 
print("       Drag_due_to_alpha\n");
print("       aero/qbar-psf|metrics/Sw-sqft|aero/alpha-rad\n");
print("       $ac_CDalpha\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"CDmach\" TYPE=\"VECTOR\">\n"); 
print("       Drag_due_to_mach\n");
print("       4\n");
print("       velocities/mach-norm\n");
print("       aero/qbar-psf|metrics/Sw-sqft\n");
print("       0.0       0.00\n");
print("       $ac_Mcrit 0.00\n");
print("       1.1       0.02\n");
print("       2.0       0.01\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"CDflap\" TYPE=\"VALUE\">\n"); 
print("       Drag_due_to_flaps\n");
print("       aero/qbar-psf|metrics/Sw-sqft|fcs/flap-pos-norm\n");
print("       $ac_CDflaps\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"CDgear\" TYPE=\"VALUE\">\n"); 
print("       Drag_due_to_gear\n");
print("       aero/qbar-psf|metrics/Sw-sqft|gear/gear-pos-norm\n");
print("       $ac_CDgear\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"CDsb\" TYPE=\"VALUE\">\n"); 
print("       Drag_due_to_speedbrakes\n");
print("       aero/qbar-psf|metrics/Sw-sqft|fcs/speedbrake-pos-norm\n");
print("       $ac_CDspeedbrake\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"CDbeta\" TYPE=\"VALUE\">\n"); 
print("       Drag_due_to_sideslip\n");
print("       aero/qbar-psf|metrics/Sw-sqft|aero/beta-rad\n");
print("       $ac_CDbeta\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"CDde\" TYPE=\"VALUE\">\n"); 
print("       Drag_due_to_Elevator_Deflection\n");
print("       aero/qbar-psf|metrics/Sw-sqft|fcs/elevator-pos-norm\n");
print("       $ac_CDflaps\n");
print("    </COEFFICIENT>\n");

print("  </AXIS>\n");

//***** SIDE *************************************************

print("  <AXIS NAME=\"SIDE\">\n");
print("    <COEFFICIENT NAME=\"CSb\" TYPE=\"VALUE\">\n");
print("       Side_force_due_to_beta\n");
print("       aero/qbar-psf|metrics/Sw-sqft|aero/beta-rad\n");
print("       $ac_CSbeta\n");
print("    </COEFFICIENT>\n");
print("  </AXIS>\n");

//***** ROLL ************************************************

print("  <AXIS NAME=\"ROLL\">\n");

print("    <COEFFICIENT NAME=\"Clb\" TYPE=\"VALUE\">\n");
print("       Roll_moment_due_to_beta\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/bw-ft|aero/beta-rad\n");
print("       $ac_Clbeta\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"Clp\" TYPE=\"VALUE\">\n");
print("       Roll_moment_due_to_roll_rate\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/bw-ft|aero/bi2vel|velocities/p-aero-rad_sec\n");
print("       $ac_Clp\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"Clr\" TYPE=\"VALUE\">\n");
print("       Roll_moment_due_to_yaw_rate\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/bw-ft|aero/bi2vel|velocities/r-aero-rad_sec\n");
print("       $ac_Clr\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"Clda\" TYPE=\"VALUE\">\n");
print("       Roll_moment_due_to_aileron\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/bw-ft|fcs/left-aileron-pos-rad\n");
print("       $ac_Clda\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"Cldr\" TYPE=\"VALUE\">\n");
print("       Roll_moment_due_to_rudder\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/bw-ft|fcs/rudder-pos-rad\n");
print("       $ac_Cldr\n");
print("    </COEFFICIENT>\n");

print("  </AXIS>\n");

//***** PITCH *****************************************

print("  <AXIS NAME=\"PITCH\">\n");

print("    <COEFFICIENT NAME=\"Cmalpha\" TYPE=\"VALUE\">\n");
print("       Pitch_moment_due_to_alpha\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/cbarw-ft|aero/alpha-rad\n");
print("       $ac_Cmalpha\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"Cmde\" TYPE=\"VALUE\">\n");
print("       Pitch_moment_due_to_elevator\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/cbarw-ft|fcs/elevator-pos-rad\n");
print("       $ac_Cmde\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"Cmq\" TYPE=\"VALUE\">\n");
print("       Pitch_moment_due_to_pitch_rate\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/cbarw-ft|aero/ci2vel|velocities/q-aero-rad_sec\n");
print("       $ac_Cmq\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"Cmadot\" TYPE=\"VALUE\">\n");
print("       Pitch_moment_due_to_alpha_rate\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/cbarw-ft|aero/ci2vel|aero/alphadot-rad_sec\n");
print("       $ac_Cmadot\n");
print("    </COEFFICIENT>\n");

print("  </AXIS>\n");

//***** YAW ***********************************************

print("  <AXIS NAME=\"YAW\">\n");

print("    <COEFFICIENT NAME=\"Cnb\" TYPE=\"VALUE\">\n");
print("       Yaw_moment_due_to_beta\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/bw-ft|aero/beta-rad\n");
print("       $ac_Cnbeta\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"Cnr\" TYPE=\"VALUE\">\n");
print("       Yaw_moment_due_to_yaw_rate\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/bw-ft|aero/bi2vel|velocities/r-aero-rad_sec\n");
print("       $ac_Cnr\n");
print("    </COEFFICIENT>\n");

print("    <COEFFICIENT NAME=\"Cndr\" TYPE=\"VALUE\">\n");
print("       Yaw_moment_due_to_rudder\n");
print("       aero/qbar-psf|metrics/Sw-sqft|metrics/bw-ft|fcs/rudder-pos-rad\n");
print("       $ac_Cndr\n");
print("    </COEFFICIENT>\n");

print("  </AXIS>\n");
print(" </AERODYNAMICS>\n");
print("</FDM_CONFIG>\n");

?>