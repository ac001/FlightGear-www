<?php

$version = 0.1;

//***** GET DATA FROM USER ***************************

$ac_enginename      = $_POST['ac_enginename'];
$ac_enginetype      = $_POST['ac_enginetype'];
$ac_enginepower     = $_POST['ac_enginepower'];
$ac_engineunits     = $_POST['ac_engineunits'];
$ac_augmented       = $_POST['ac_augmented'];
$ac_injected        = $_POST['ac_injected'];

//***** CONVERT TO ENGLISH UNITS *********************

if($ac_engineunits == 1) {
  $ac_enginepower *= 1.341;
  }
if($ac_engineunits == 3) {
  $ac_enginepower *= 0.2248;
  }



//************************************************
//*                                              *
//*  Print out xml document                      *
//*                                              *
//************************************************

switch ($ac_enginetype) {
  case 0: MakePiston(); break;
  case 1: MakeTurbine(); break;
  case 2: MakeTurboprop(); break;
  case 3: MakeRocket(); break;
  }

//************************************************
//*  MakePiston()                                *
//************************************************
function MakePiston() {

  global $ac_enginename, $ac_enginepower, $version;
  $displacement = $ac_enginepower * 1.6;

  print("<?xml version=\"1.0\"?>\n");
  print("<!--\n  File:     $ac_enginename.xml\n");
  print("  Author:   Aero-Matic v.$version\n");
  print("-->\n\n"); 
  print("<FG_PISTON NAME=\"$ac_enginename\">\n");
  print("  MINMP          6.0\n");
  print("  MAXMP         30.0\n");
  print("  DISPLACEMENT $displacement\n");
  print("  MAXHP        $ac_enginepower\n");
  print("  CYCLES         2.0\n");
  print("  IDLERPM      700.0\n");
  print("  MAXTHROTTLE    1.0\n");
  print("  MINTHROTTLE    0.2\n");
  print("</FG_PISTON>\n");
  }


//************************************************
//*  MakeTurbine()                               *
//************************************************
function MakeTurbine() {

  global $ac_enginename, $ac_enginepower, $version,
         $ac_augmented, $ac_injected;

  print("<?xml version=\"1.0\"?>\n");
  print("<!--\n  File:     $ac_enginename.xml\n");
  print("  Author:   Aero-Matic v.$version\n");
  print("-->\n\n"); 
  print("<FG_SIMTURBINE NAME=\"$ac_enginename\">\n");  
  print("  MAXMILTHRUST $ac_enginepower\n");
  print("  BYPASSRATIO    1.0\n");
  print("  TSFC           0.8\n");
  print("  ATSFC          1.7\n");
  print("  IDLEN1        30.0\n");
  print("  IDLEN2        60.0\n");
  print("  MAXN1        100.0\n");
  print("  MAXN2        100.0\n");
  if($ac_augmented == 1) {
    print("  AUGMENTED      1\n");
    print("  AUGMETHOD      1\n");
  }else {
    print("  AUGMENTED      0\n");
    print("  AUGMETHOD      1\n");
  }
  if($ac_injected == 1) {
    print("  INJECTED       1\n");
  }else {
    print("  INJECTED       0\n");
  }

  print("<TABLE NAME=\"IdleThrust\" TYPE=\"TABLE\">\n");
  print("  Idle_power_thrust_factor\n");
  print("  6\n");
  print("  6\n");
  print("  velocities/mach-norm\n");
  print("  position/h-sl-ft\n");
  print("  none\n");
  print("              0   10000   20000   30000   40000   50000\n");
  print("  0.0    0.0836  0.0528  0.0694  0.0899  0.1183  0.1467\n");
  print("  0.2    0.0501  0.0335  0.0544  0.0797  0.1049  0.1342\n");
  print("  0.4    0.0047  0.0020  0.0272  0.0595  0.0891  0.1203\n");
  print("  0.6    0.0     0.0     0.0     0.0276  0.0718  0.1073\n");
  print("  0.8    0.0     0.0     0.0     0.0     0.0474  0.0868\n");
  print("  1.0    0.0     0.0     0.0     0.0     0.0     0.0552\n");
  print("</TABLE>\n");

  print("<TABLE NAME=\"MilThrust\" TYPE=\"TABLE\">\n");
  print("  Military_power_thrust_factor\n");
  print("  8\n");
  print("  6\n");
  print("  velocities/mach-norm\n");
  print("  position/h-sl-ft\n");
  print("  none\n");
  print("              0   10000   20000   30000   40000   50000\n");
  print("  0.0    1.0000  0.7400  0.5340  0.3720  0.2410  0.1490\n");
  print("  0.2    0.9340  0.6970  0.5060  0.3550  0.2310  0.1430\n");
  print("  0.4    0.9210  0.6920  0.5060  0.3570  0.2330  0.1450\n");
  print("  0.6    0.9510  0.7210  0.5320  0.3780  0.2480  0.1540\n");
  print("  0.8    1.0200  0.7820  0.5820  0.4170  0.2750  0.1700\n");
  print("  1.0    1.1200  0.8710  0.6510  0.4750  0.3150  0.1950\n");
  print("  1.2    1.2300  0.9750  0.7440  0.5450  0.3640  0.2250\n");
  print("  1.4    1.3400  1.0860  0.8450  0.6280  0.4240  0.2630\n");
  print("</TABLE>\n");

  print("<TABLE NAME=\"AugThrust\" TYPE=\"TABLE\">\n");
  print("  Augmented_thrust_factor\n");
  print("  8\n");
  print("  6\n");
  print("  velocities/mach-norm\n");
  print("  position/h-sl-ft\n");
  print("  none\n");
  print("              0   10000   20000   30000   40000   50000\n");
  print("  0.0    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  0.2    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  0.4    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  0.6    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  0.8    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  1.0    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  1.2    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  1.4    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("</TABLE>\n");

  print("<TABLE NAME=\"WaterFactor\" TYPE=\"TABLE\">\n");
  print("  Water_injection_factor\n");
  print("  8\n");
  print("  6\n");
  print("  velocities/mach-norm\n");
  print("  position/h-sl-ft\n");
  print("  none\n");
  print("              0   10000   20000   30000   40000   50000\n");
  print("  0.0    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  0.2    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  0.4    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  0.6    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  0.8    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  1.0    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  1.2    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  1.4    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("</TABLE>\n");

  print("</FG_SIMTURBINE>\n");
  }


//************************************************
//*  MakeTurboprop()                             *
//************************************************
function MakeTurboprop() {

  global $ac_enginename, $ac_enginepower, $version,
         $ac_augmented, $ac_injected;

// estimate thrust if given power
if(($ac_engineunits == 0) || ($ac_engineunits == 1)) {
  $ac_enginepower *= 1.67;
  }


  print("<?xml version=\"1.0\"?>\n");
  print("<!--\n  File:     $ac_enginename.xml\n");
  print("  Author:   Aero-Matic v.$version\n");
  print("-->\n\n"); 
  print("<FG_SIMTURBINE NAME=\"$ac_enginename\">\n");  
  print("  MAXMILTHRUST $ac_enginepower\n");
  print("  BYPASSRATIO    0.0\n");
  print("  TSFC           0.55\n");
  print("  ATSFC          0.0\n");
  print("  IDLEN1        30.0\n");
  print("  IDLEN2        60.0\n");
  print("  MAXN1        100.0\n");
  print("  MAXN2        100.0\n");
  if($ac_augmented == 1) {
    print("  AUGMENTED      0\n");
    print("  AUGMETHOD      1\n");
  }else {
    print("  AUGMENTED      0\n");
    print("  AUGMETHOD      1\n");
  }
  if($ac_injected == 1) {
    print("  INJECTED       1\n");
  }else {
    print("  INJECTED       0\n");
  }

  print("<TABLE NAME=\"IdleThrust\" TYPE=\"TABLE\">\n");
  print("  Idle_power_thrust_factor\n");
  print("  6\n");
  print("  6\n");
  print("  velocities/mach-norm\n");
  print("  position/h-sl-ft\n");
  print("  none\n");
  print("              0   10000   20000   30000   40000   50000\n");
  print("  0.0    0.0836  0.0528  0.0694  0.0899  0.1183  0.1467\n");
  print("  0.2    0.0501  0.0335  0.0544  0.0797  0.1049  0.1342\n");
  print("  0.4    0.0047  0.0020  0.0272  0.0595  0.0891  0.1203\n");
  print("  0.6    0.0     0.0     0.0     0.0276  0.0718  0.1073\n");
  print("  0.8    0.0     0.0     0.0     0.0     0.0474  0.0868\n");
  print("  1.0    0.0     0.0     0.0     0.0     0.0     0.0552\n");
  print("</TABLE>\n");

  print("<TABLE NAME=\"MilThrust\" TYPE=\"TABLE\">\n");
  print("  Military_power_thrust_factor\n");
  print("  6\n");
  print("  6\n");
  print("  velocities/mach-norm\n");
  print("  position/h-sl-ft\n");
  print("  none\n");
  print("              0   10000   20000   30000   40000   50000\n");
  print("  0.0    1.0000  0.7400  0.5340  0.3720  0.2410  0.1490\n");
  print("  0.2    0.7340  0.6970  0.5060  0.3550  0.2310  0.1430\n");
  print("  0.4    0.6210  0.5920  0.4060  0.3570  0.2330  0.1450\n");
  print("  0.6    0.3510  0.2710  0.2020  0.1780  0.1020  0.0640\n");
  print("  0.8    0.0200  0.0200  0.0200  0.0200  0.0200  0.0200\n");
  print("  1.0    0.0     0.0     0.0     0.0     0.0     0.0\n");
  print("</TABLE>\n");

  print("<TABLE NAME=\"AugThrust\" TYPE=\"TABLE\">\n");
  print("  Augmented_thrust_factor\n");
  print("  8\n");
  print("  6\n");
  print("  velocities/mach-norm\n");
  print("  position/h-sl-ft\n");
  print("  none\n");
  print("              0   10000   20000   30000   40000   50000\n");
  print("  0.0    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  0.2    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  0.4    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  0.6    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  0.8    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  1.0    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  1.2    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("  1.4    1.4146  1.4146  1.4146  1.4146  1.4146  1.4146\n");
  print("</TABLE>\n");

  print("<TABLE NAME=\"WaterFactor\" TYPE=\"TABLE\">\n");
  print("  Water_injection_factor\n");
  print("  8\n");
  print("  6\n");
  print("  velocities/mach-norm\n");
  print("  position/h-sl-ft\n");
  print("  none\n");
  print("              0   10000   20000   30000   40000   50000\n");
  print("  0.0    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  0.2    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  0.4    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  0.6    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  0.8    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  1.0    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  1.2    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("  1.4    1.2000  1.2000  1.2000  1.2000  1.2000  1.2000\n");
  print("</TABLE>\n");

  print("</FG_SIMTURBINE>\n");
  }


//************************************************
//*  MakeRocket()                                *
//************************************************
function MakeRocket() {

  global $ac_enginename, $ac_enginepower, $version;

  print("<?xml version=\"1.0\"?>\n");
  print("<!--\n  File:     $ac_enginename.xml\n");
  print("  Author:   Aero-Matic v.$version\n");
  print("-->\n\n"); 
  print("<FG_ROCKET NAME=\"$ac_enginename\">\n");
  print("  SHR              1.23\n");
  print("  MAX_PC       86556.0\n");
  print("  VARIANCE         0.10\n");
  print("  PROP_EFF         0.67\n");
  print("  MAXTHROTTLE      1.0\n");
  print("  MINTHROTTLE      0.4\n");
  print("  SLFUELFLOWMAX   91.5\n");
  print("  SLOXIFLOWMAX   105.2\n");
  print("</FG_ROCKET>\n");
  }

?>