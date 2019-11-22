<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Candegabe's Algorithm 2009 - The H.U.M.A. Method</title>


<link href="algoritmoVet.css" rel="stylesheet" type="text/css" />
<!--[if lte IE 6]>
<link href="algoritmoIE.css" rel="stylesheet" type="text/css" />
<![endif]-->
<style type="text/css">
<!--

#especieHelp { }
.style1 {
	color: #800000;
	font-weight: bold;
}
-->
</style>
<script language="javascript"> 
javascript:window.history.forward(1); 
</script>
<script type="text/javascript">
<!--
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->
</script>
<link href="algoritmoVetIE.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function abrir(ancho,alto) {
  window.resizeTo(ancho,alto);
  window.moveTo((screen.width-ancho)/2 , (screen.height-alto)/2);
  window.opener.location.href='http://www.universidadcandegabe.org/index.php?option=com_content&task=view&id=233&Itemid=163';
} 
</script>
</head>
<?php
if ($_POST['hiddenField']=="c4nd3g4b34lg0r1tm0"){
#echo 'está habilitado para acceder';
}
else
{
echo "<script languaje=\"javascript\">setTimeout(\"location.href='http://www.universidadcandegabe.org/index.php?option=com_content&task=view&id=167&Itemid=115'\", 0)</script>";
}
?>
<body onload="abrir(595,672)">
<div id="calculadora">
  <!-- TEST -->
  
 
  <!-- TEST -->


  <!-- HEADER -->
  <div id="header">

    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><h1>Candegabe's Algorithm</h1>
          <h2>The H.U.M.A. Method</h2></td>
        <td><img src="formula.gif" alt="Fórmula" width="220" height="80" align="right" /></td>
      </tr>
    </table>
   
  </div>
  <!-- HEADER -->
  <!-- FORMULARIO -->
  <div id="formulario">
    <form id="algo_inicio" action="http://www.universidadcandegabe.org/algoritmo09/resultado/index_pdfveteng.php" method="post" name="algo_inicio" onSubmit="return verify()">
      <script language="JavaScript">
	  function algo_inicio_onsubmit(){

if (algo_inicio.especie.value=="") {
alert("Please fill in the 'Specie'")
algo_inicio.especie.focus();
return false 
}

if (algo_inicio.owner.value=="") {
alert("Please fill in the 'Owner's Name'")
algo_inicio.owner.focus();
return false 
}

if (algo_inicio.petName.value=="") {
alert("Please fill in the 'Animal's Name'")
algo_inicio.petName.focus();
return false 
}

if (algo_inicio.iniciales.value=="") {
alert("Please fill in the 'Initials'")
algo_inicio.iniciales.focus();
return false 
}
} 
function verify(){
       //we get the values in the form out of the 0 index in the forms[] array since it's the only form in the document
       msg = "Please Check the Information: \n\n Specie: " + document.forms[0].especie.value + "\n Owner's Name: " + document.forms[0].owner.value + "\n Animal's Name: " + document.forms[0].petName.value + "\n Initials: " + document.forms[0].iniciales.value + "\n Date of Birth: " + document.forms[0].day.value + "/"+ document.forms[0].month.value +"/"+ document.forms[0].year.value +"\n\n If This Information is Correct, Please Confirm This Message"
       return confirm(msg);
}
      </script>
      <!-- DATOS PERSONALES -->
      <h3> Personal Data </h3>
      <div id="iconoAnimal"></div>
      <!-- NOMBRE -->
      <table id="especieTable" cellpadding="0" cellspacing="0">
        <tr>
          <td class="backL"></td>
          <td class="especieLabel">Specie</td>
          <td class="especieInput"><input id="especie" name="especie" type="text" /></td>
          <td class="help"><a href="#" onclick="MM_showHideLayers('especieHelp','','show')">?</a></td>
          <td class="backR"></td>
        </tr>
      </table>
      <!-- NOMBRE -->
      <!-- APELLIDO -->
      <table id="ownerTable" cellpadding="0" cellspacing="0">
        <tr>
          <td class="backL"></td>
          <td class="ownerLabel">Owner's Name (by whom it is recognized)</td>
          <td class="ownerInput"><input id="owner" name="owner" type="text" /></td>
          <td class="help"><a href="#" onclick="MM_showHideLayers('ownerHelp','','show')">?</a></td>
          <td class="backR"></td>
        </tr>
      </table>
      <!-- APELLIDO -->
      <!-- Nombre del Animal -->
      <table id="petNameTable" cellpadding="0" cellspacing="0">
        <tr>
          <td class="backL"></td>
          <td class="petNameLabel">Animal's Name</td>
          <td class="petNameInput"><input id="petName" name="petName" type="text" /></td>
          <td class="help"><a href="#" onclick="MM_showHideLayers('petNameHelp','','show')">?</a></td>
          <td class="backR"></td>
        </tr>
      </table>
      <!-- Nombre del Animal -->
      <!-- INICIALES -->
      <table id="inicialesTable" cellpadding="0" cellspacing="0">
        <tr>
          <td class="backL"></td>
          <td class="inicialesLabel">Initials</td>
          <td class="inicialesInput"><input name="iniciales" type="text" id="inicales" /></td>
          <td class="help"><a href="#" onclick="MM_showHideLayers('inicialesHelp','','show')">?</a></td>
          <td class="backR"></td>
        </tr>
      </table>
      <!-- INICIALES -->
      <!-- FECHA DE NACIMIENTO -->
      <table id="fechaTable" cellpadding="0" cellspacing="0">
        <tr>
          <td class="backL"></td>
          <td class="petNameLabel">Date of Birth</td>
          <td><table id="fecha" border="0" cellspacing="0">
              <tr>
                <td>month</td>
                <td>day</td>
                <td>year</td>
              </tr>
              <tr>
                <td><select id="month" name="month">
                    <option value="?" selected="selected">?</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select></td>
                <td><select id="day" name="day">
                    <option value="?" selected="selected">?</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                  </select></td>
                <td><select id="year" name="year">
                    <option value="1890" selected="selected">1890</option>
                    <option value="1891">1891</option>
                    <option value="1892">1892</option>
                    <option value="1893">1893</option>
                    <option value="1894">1894</option>
                    <option value="1895">1895</option>
                    <option value="1896">1896</option>
                    <option value="1897">1897</option>
                    <option value="1898">1898</option>
                    <option value="1899">1899</option>
                    <option value="1900">1900</option>
                    <option value="1901">1901</option>
                    <option value="1902">1902</option>
                    <option value="1903">1903</option>
                    <option value="1904">1904</option>
                    <option value="1905">1905</option>
                    <option value="1906">1906</option>
                    <option value="1907">1907</option>
                    <option value="1908">1908</option>
                    <option value="1909">1909</option>
                    <option value="1910">1910</option>
                    <option value="1911">1911</option>
                    <option value="1912">1912</option>
                    <option value="1913">1913</option>
                    <option value="1914">1914</option>
                    <option value="1915">1915</option>
                    <option value="1916">1916</option>
                    <option value="1917">1917</option>
                    <option value="1918">1918</option>
                    <option value="1919">1919</option>
                    <option value="1920">1920</option>
                    <option value="1921">1921</option>
                    <option value="1922">1922</option>
                    <option value="1923">1923</option>
                    <option value="1924">1924</option>
                    <option value="1925">1925</option>
                    <option value="1926">1926</option>
                    <option value="1927">1927</option>
                    <option value="1928">1928</option>
                    <option value="1929">1929</option>
                    <option value="1930">1930</option>
                    <option value="1931">1931</option>
                    <option value="1932">1932</option>
                    <option value="1933">1933</option>
                    <option value="1934">1934</option>
                    <option value="1935">1935</option>
                    <option value="1936">1936</option>
                    <option value="1937">1937</option>
                    <option value="1938">1938</option>
                    <option value="1939">1939</option>
                    <option value="1940">1940</option>
                    <option value="1941">1941</option>
                    <option value="1942">1942</option>
                    <option value="1943">1943</option>
                    <option value="1944">1944</option>
                    <option value="1945">1945</option>
                    <option value="1946">1946</option>
                    <option value="1947">1947</option>
                    <option value="1948">1948</option>
                    <option value="1949">1949</option>
                    <option value="1950">1950</option>
                    <option value="1951">1951</option>
                    <option value="1952">1952</option>
                    <option value="1953">1953</option>
                    <option value="1954">1954</option>
                    <option value="1955">1955</option>
                    <option value="1956">1956</option>
                    <option value="1957">1957</option>
                    <option value="1958">1958</option>
                    <option value="1959">1959</option>
                    <option value="1960">1960</option>
                    <option value="1961">1961</option>
                    <option value="1962">1962</option>
                    <option value="1963">1963</option>
                    <option value="1964">1964</option>
                    <option value="1965">1965</option>
                    <option value="1966">1966</option>
                    <option value="1967">1967</option>
                    <option value="1968">1968</option>
                    <option value="1969">1969</option>
                    <option value="1970">1970</option>
                    <option value="1971">1971</option>
                    <option value="1972">1972</option>
                    <option value="1973">1973</option>
                    <option value="1974">1974</option>
                    <option value="1975">1975</option>
                    <option value="1976">1976</option>
                    <option value="1977">1977</option>
                    <option value="1978">1978</option>
                    <option value="1979">1979</option>
                    <option value="1980">1980</option>
                    <option value="1981">1981</option>
                    <option value="1982">1982</option>
                    <option value="1983">1983</option>
                    <option value="1984">1984</option>
                    <option value="1985">1985</option>
                    <option value="1986">1986</option>
                    <option value="1987">1987</option>
                    <option value="1988">1988</option>
                    <option value="1989">1989</option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                  </select></td>
              </tr>
            </table></td>
          <td class="help"><a href="#" onclick="MM_showHideLayers('nacimientoHelp','','show')">?</a></td>
          <td class="backR"></td>
        </tr>
      </table>
      
            <!-- SUBMIT -->

            <div id="iso"></div>
<div id="submitBoton">
        <table id="submitTable"width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><input  type="submit" name="Enviar" id="Enviar" value="Get Study" onclick="return algo_inicio_onsubmit()";/></td>
          </tr>
        </table>
      </div>
      <!-- SUBMIT -->
    </form>
    <div id="clear"></div>
  </div>
  <!-- FORMULARIO -->
</div>
<!-- VENTANAS DE HELP -->
<!-- ESPECIE HELP -->
<div id="especieHelp"> <span class="cerrar"><a href="#" onclick="MM_showHideLayers('especieHelp','','hide')">Close</a></span>
  <h5>Specie</h5>
  <p>It is very important to enter the patient’s specific information. Data should be ENTERED PRECISELY as shown in the following example:</p>
  <p><strong>Specie: (e.g.: Dog)</strong></p>
</div>
<!-- ESPECIE HELP -->
<!-- DUEÑO HELP -->
<div id="ownerHelp"> <span class="cerrar"><a href="#" onclick="MM_showHideLayers('ownerHelp','','hide')">Close</a></span>
  <h5>Owner's Name</h5>
  <p>It is very important to enter the patient’s specific information. Data should be ENTERED PRECISELY as shown in the following example:</p>
  <p><strong>Owner's Name (by whom it is recognized): (e.g.: Susan) </strong></p>
</div>
<!-- DUEÑO HELP -->
<!-- Nombre del Animal HELP -->
<div id="petNameHelp"> <span class="cerrar"><a href="#" onclick="MM_showHideLayers('petNameHelp','','hide')">Close</a></span>
  <h5>Animal's Name</h5>
  <p>It is very important to enter the patient’s specific information. Data should be ENTERED PRECISELY as shown in the following example:</p>
  <p><strong>Animal's Name: (e.g.: Black) </strong></p>
</div>
<!-- Nombre del Animal HELP -->
<!-- INICIALES HELP -->
<div id="inicialesHelp"> <span class="cerrar"><a href="#" onclick="MM_showHideLayers('inicialesHelp','','hide')">Close</a></span>
  <h5>Initials</h5>
  <p>It is very important to enter the patient’s specific information. Data should be ENTERED PRECISELY as shown in the following example:</p>
  <p><strong>Initials: owner name's first letter and animal name's first letter: (e.g.: SB)</strong></p>
</div>
<!-- INICIALES HELP -->
<!-- FECHA DE NACIMIENTO HELP -->
<div id="nacimientoHelp"> <span class="cerrar"><a href="#" onclick="MM_showHideLayers('nacimientoHelp','','hide')">Close</a></span>
  <h5>Date of birth</h5>
  <p>It is very important to enter the patient’s specific information. Data should be ENTERED PRECISELY as shown in the following example:</p>
  <p><strong>Date of birth: (e.g.: MM/DD/YYYY) </strong></p>
</div>
<!-- FECHA DE NACIMIENTO HELP -->
<!-- VENTANAS DE HELP -->
</body>
</html>