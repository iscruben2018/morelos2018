<!--Inicio script calendario saluda-->
<!--  Begin

function saludo() {
var today = new Date();
var hrs = today.getHours();
document.writeln("<CENTER>");
if ((hrs >=6) && (hrs <=18))
{}
else
document.write("");
document.write("<H3 style='text-transform:lowercase'>");   
if (hrs < 6)
document.write("Buenos dias");
else if (hrs < 12)
document.write("Buenos Dias");
else if (hrs <= 18)
document.write("Buenas Tardes");
else
document.write("Buenas Noches");
document.writeln("!</H3>");
//document.write("<hr>");
dayStr = today.toLocaleString();
//document.write("<b><label>"+dayStr+"</label></b>");
document.writeln("</CENTER>");
}
function montharr(m0, m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11)
{
this[0] = m0;
this[1] = m1;
this[2] = m2;
this[3] = m3;
this[4] = m4;
this[5] = m5;
this[6] = m6;
this[7] = m7;
this[8] = m8;
this[9] = m9;
this[10] = m10;
this[11] = m11;
}
function calendar()
{
 var meses=new Array
        ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var monthNames = "EneFebMarAbrMayJunJulAgoSepOctNovDic";
var today = new Date();
var thisDay;
var monthDays = new montharr(31, 28, 31, 30, 31, 30, 31, 31, 30,31, 30, 31);
year = today.getYear();
if (year < 2000)    
year = year + 1900;
thisDay = today.getDate();
if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0))
monthDays[1] = 29;
nDays = monthDays[today.getMonth()];
firstDay = today;
firstDay.setDate(1); 
testMe = firstDay.getDate();
if (testMe == 2)
firstDay.setDate(0);    
startDay = firstDay.getDay();
document.writeln("<CENTER>");
document.write("<TABLE class='dw-article' style='width:100%' cellpadding='1' cellspacing='1'>");
document.write("<tbody><TR><TH COLSPAN=7>");
document.write(monthNames.substring(today.getMonth() * 3,
(today.getMonth() + 1) * 3));
document.write(". ");
document.write(year);
document.write("<TR><TH><strong>Do</strong><TH>Lu<TH>Ma<TH>Mi<TH>Ju<TH>Vi<TH>Sa");
document.write("<TR>");
column = 0;
for (i=0; i<startDay; i++) {
document.write("<TD width=30>");
column++;
}
for (i=1; i<=nDays; i++) {
document.write("<TD width=30><a data-toggle='modal' onclick=\"javascript:verAgenda("+i+","+parseInt(today.getMonth()+1)+");\" data-target='#myModal' style='textdecorarion:none;color:#000034;' href=\"#\">");
if (i == thisDay)
document.write("<FONT class='Estilo6' COLOR=\"black\"><h1>")
document.write(i);
if (i == thisDay)
document.write("</h1></FONT></a>")
column++;
if (column == 7) {
document.write("<TR>"); 
column = 0;
}
}
document.write("</TABLE>");
document.writeln("</CENTER>");
}
calendar();
document.write("");
saludo();
document.write("</br>");

// End -->

<!--fin script calendario saluda-->