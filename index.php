<?php
$ip = $_SERVER['REMOTE_ADDR'];
//$status=filesize("cvt.txt");

if($_POST['ip_cvt']){
	$my=$_POST['ip_cvt'];
	//echo "<script>alert('".$my."');</script>";
	if($my=="&&"){$my="";};
	
	$file5 = fopen("ip.txt", "w");
		fwrite($file5, $my);
	fclose($file5);
	
	$file7 = fopen("daten.txt", "w");
		fwrite($file7, "");
	fclose($file7);
	
	$file7 = fopen("okrug.txt", "w");
		fwrite($file7, "");
	fclose($file7);
	
	echo "<script>location.href='index.php';</script>";
	
}

if($_POST['cvt1']){
	//echo "rty";
	$cvt2=$_POST['cvt1'];
	
	$file1 = fopen("ip.txt", "a");
		fwrite($file1, $ip."&".$cvt2."&");
	fclose($file1);
	
	echo "<script>location.href='index.php';</script>";
}
//$cvt2="trewq";

$fh = fopen('ip.txt', "r");
	$file = fread($fh,100000);
fclose($fh);

$mas = explode("&", $file);

//echo "<script>alert('".sizeof($mas)."');</script>";

$stat="Разыскиваются два участника из двух возможных. Если Вы хотите стать одним из них, нажмите на ссылку войти в игру.";

$play="gold";

for($i=0;$i<sizeof($mas);$i++){
    if($mas[$i]==$ip){
		$play=$mas[$i+1];
	}
}

switch(sizeof($mas)){

	case 3:  {
	
		if($play=="gold"){
			$stat="Разыскивается один участник из двоих возможных. Если Вы хотите им стать, нажмите на ссылку войти в игру.";break;
		}else{
			$stat="Разыскивается один участник из двоих возможных. Т. е., Вы вошли в игру и разыскивается напарник для Вас.";break;
		}
		
	}
		
	case 5: {
	
		if($play=="gold"){
			$play="orange";
			$stat="В этот момент два участника из двух возможных уже играют между собой. Вы можете наблюдать за их игрой.";
		}else{
			$stat="Сейчас Вы играете со своим напарником. Для выхода из игры нажмите ссылку выйти из игры.";
		}
		
	}
	
}

if(sizeof($mas)==5){
	$qwert="trewq";
	for($i=0;$i<(sizeof($mas)-1)/2;$i++){
		if($mas[$i*2]!=$ip){
			$ip1=$mas[$i*2];
			$play1=$mas[$i*2+1];
		}
	}
}

$fh = fopen('daten.txt', "r");
	$file = fread($fh,100000);
fclose($fh);

//$mas = explode("&", $file);

?>
<html><head>
	<title>точки</title>
	<meta charset="windows-1251">
</head>
<style id=mystyle></style>
<body style="-webkit-user-select: none;"><font face="arial">
<div id=fon style="position:absolute;background:rgba(255,255,255,0.8);left:10;top:10;width:800;height:600;border-style:dotted;border-width:2px;border-color:blue;border-radius:10px"></div>
<div id=ost style="background:url(b.gif);position:absolute;left:920;top:10;width:200;height:600;border-style:dotted;border-width:2px;border-color:red;border-radius:10px">
<center><br><font style="color:blue;font-size:20"><b>Игра в точки</b></font><br><br>
<font color=green>Популярна со времён начала 80-х<br>на всех школьных уроках</font><br><br>
<span id=na>Нажмите, чтобы войти: </span><input id=mycvt value="#01ffff" type=color title="Нажмите, чтобы войти в игру и выбрать цвет точек" style="background:rgba(255,1,255,0.3);width:73;height:35;cursor:pointer;border-width:5px;border-color:rgba(1,155,255,0.3);border-radius:15px" onchange="cvt5=this.value;forma.cvt1.value=cvt5;myform.submit()">
<a id=mya href=# title="Нажмите, чтобы выйти из игры">Надпись зависит от статуса посетителя</a>
<br><br>Статус игры:<br>
<div id=t style="height:50">Точка</div>
<br><br>
<div id=reg style="height:50">регион</div><br><br>

<!--button onclick="au.play()">rty</button-->


</div>

<div id=kr style="position:absolute;left:700;top:250;width:150;height:50"></div>
<!--div id=reg style="position:absolute;left:700;top:300;width:450;height:50">регион</div-->
<div id=colt style="position:absolute;left:700;top:350;width:450;height:50"></div>
<!--div id=t style="position:absolute;left:700;top:400;width:450;height:50">Точка</div-->
<div id=okrug></div>

<form id=myform name=forma method=post>

<input type=hidden name=cvt1 value="ytr">

</form>

<!--div style="position:absolute;background:rgba(255,255,255,0.7);left:815;width:100;height:73">rty</div-->

<form id=phorm style="position:absolute;left:800" method=post>
<input type=hidden name=ip_cvt value="<?php echo $ip1."&".$play1."&"; ?>">
<!--input type=submit-->

</form>

<audio id=au src="t.ogg"></audio>

<!--div id="console" style="border: 1px solid gray; width:250px; height: 110px; padding: 10px; background:lightgray;">
 Консоль выполнения запроса:
 </div>
 <br/>
 <div id="printResult">
 После нажатия на ссылку, тут будет сообщение с сервера!
 </div-->

<script>
//alert(3);

tx=50;
ty=35;
sag=15;
tr=6;

tgokr=0;

tvc="";

otg=false;

ost.style.left=30+(tx-1)*sag;

ost.style.width=screen.width-(tx-1)*sag-20-20;

fon.style.width=10+(tx-1)*sag+"px";

fon.style.height=10+(ty-1)*sag+"px";

ost.style.height=10+(ty-1)*sag+"px";

//    player = new Audio('http://translate.google.com/translate_tts?q=file&tl=en');
//    player.autoplay = true;


qwert1="<?php echo $play1; ?>";
//alert(qwert1);

tvc=qwert1;

qwert2="<?php echo $stat; ?>";
//alert(qwert2);
//colt.innerHTML=qwert2;

function startAjax(url){

	//document.getElementById("console").innerHTML = "";

   var request; 
   if(window.XMLHttpRequest){ 
       request = new XMLHttpRequest(); 
   } else if(window.ActiveXObject){
       request = new ActiveXObject("Microsoft.XMLHTTP");
   } else { 
       return;
   } 
   
   request.onreadystatechange = function(){
         switch (request.readyState) {
         //  case 1: print_console("<br/><em>1: Подготовка к отправке...</em>"); break
         //  case 2: print_console("<br/><em>2: Отправлен...</em>"); break
         //  case 3: print_console("<br/><em>3: Идет обмен..</em>"); break
           case 4:{
            if(request.status==200){     
         //                print_console("<br/><em>4: Обмен завершен.</em>"); 
         //                document.getElementById("printResult").innerHTML = "<b>"+request.responseText+"</b>"; 



						 
	//		for(jj1=0;jj1<100;jj1++){
	//			document.getElementById(jj1).style.background="rgba(255,255,255,0)";
	//		}
	
	//		allokrug.innerHTML="";
						 
//au.play();						 
						 
						 
						 
						 
						 
						 //t.innerHTML="rty";

//sod="<?php echo $file; ?>";
//alert(sod);

st1=1;

maspo=request.responseText.split("%");
masp=maspo[0].split("&");
cvt10=masp[masp.length-2];

if(cvt10==cvt){
	document.bgColor=qwert1;
	reg.innerHTML="Сейчас очередь Вашего напарника<br>поставить точку.";
}else{
	tgo=0;
	document.bgColor=cvt;
	
	reg.innerHTML="Сейчас Ваша очередь поставить точку";
	
//	reg.innerHTML="Вы окружили и сейчас опять Ваша очередь поставить точку";
	
	if(cvt10!=tvc){
		
		tvc=cvt10;
		//au.play();
		
	}
	
}

//alert(cvt10);


//t.innerHTML="rty";


//alert(masp.length/2);

for(is=0;is<(masp.length-1)/2;is++){
	//alert(is);
	document.getElementById(masp[is*2]).style.background=masp[is*2+1];
	if(masp[is*2+1]==cvt){mas[masp[is*2]]=1}else{mas[masp[is*2]]=2};
	//mas[masp[is*2]]=1;
}

t.innerHTML=maspo[2];

for(is=0;is<(maspo[1].length-1)/2;is++){
	//alert(is);
	mas5=maspo[1].split("&")[is*2].split("$");
	cvt5=maspo[1].split("&")[is*2+1];
	//alert(cvt5);
	
	/*
	
	for(vbm=0;vbm<mas5.length;vbm++){
		vbm1=vbm++;
		if(vbm==mas5.length-1){vbm1=0};
		lin(vbm,vbm1,"722");
	}
	
	*/
	
	webki();

	st1++;

}





//t.innerHTML=maspo[2];
//t.innerHTML="rty";




/*

mas5=maspo[1].split("&")[0].split("$");
cvt5=maspo[1].split("&")[1];
//alert(cvt5);
webki();

st1++;

mas5=maspo[1].split("&")[2].split("$");
cvt5=maspo[1].split("&")[3];
//alert(cvt5);
webki();

st1++;

*/

						 }//else if(request.status==404){
                         //alert("Ошибка: запрашиваемый скрипт не найден!");
                      //}
                     //  else alert("Ошибка: сервер вернул статус: "+ request.status);
            
             break
             }
         }       
     } 
     request.open ('GET', url, true); 
     request.send (''); 
   } 
   function print_console(text){
     document.getElementById("console").innerHTML += text;
   }

//stat="<?php echo $status; ?>";
//alert(stat);
//if(stat!=0){mycvt.style.display="none"};
cvt3="<?php echo $play; ?>";
//alert(cvt3);

if(cvt3!="gold"){
	mycvt.style.display="none";document.bgColor=cvt3;
	if(cvt3!="orange"){
	
	//	for(jj1=0;jj1<100;jj1++){
	//		document.getElementById(jj1).style.background="green";
	//	}
	
	//	allokrug.innerHTML="";
	
		mya.style.display="block";
		mya.innerHTML="<font color=red><b>Выйти из игры</b></font>";
		na.innerHTML="";
		
		mya.onclick=function(){
		
			for(jj1=0;jj1<tx*ty;jj1++){
				document.getElementById(jj1).style.background="rgba(255,255,255,0)";
			}
	
			allokrug.innerHTML="";
		
			phorm.submit();
			
		}
		
	}else{
		mya.style.display="none";
		na.innerHTML="Нажмите, чтобы войти: ";
		//mycvt.click();
	}
}else{
		mya.style.display="none";
		//mycvt.click();
		//document.getElementById("mycvt").click();
}

cvt=cvt3;

function coord_to_id(x,y){
	return(tx*y+x);
}

function id_to_coord(id){
	y=Math.floor(id/tx);
	x=id-tx*y;
}

function lin(id1,id2,cv){

	id_to_coord(id1);
	xa=x;ya=y;
	id_to_coord(id2);
	xb=x;yb=y;
	
	for(i232=0;i232<sag;i232++){
	
		c=document.createElement("div");
		c.style.position="absolute";
		c.style.left=sag+sag*xa+i232*(xb-xa);
		c.style.top=sag+sag*ya+i232*(yb-ya);
		c.style.width=2;
		c.style.height=2;
		c.style.background=cv;
		//document.body.appendChild(c);
		okrug.appendChild(c);
		//document.getElementById("fds"+st1).appendChild(c);
	}
	
}

//lin(33,24,"blue");

function rty(x1,y1){
//	alert("x1 = "+x1+" y1 = "+y1);
//	alert(mas[coord_to_id(x+x1,y+y1)]);
//	alert(mas1[coord_to_id(x+x1,y+y1)]);
//	alert(mas3[coord_to_id(x+x1,y+y1)]);
	if(mas1[coord_to_id(x+x1,y+y1)]==0){
		if(mas3[coord_to_id(x+x1,y+y1)]==0){
			if(mas[coord_to_id(x+x1,y+y1)]==1){
				if(mas2.length==0){
					mas3[i1]=1;
					mas2[mas2.length]=[];
					mas2[mas2.length-1][0]=y;
					mas2[mas2.length-1][1]=x;
					sdf=1;
				}
				i2=coord_to_id(x+x1,y+y1);
				mas3[i2]=1;
				mas2[mas2.length]=[];
				mas2[mas2.length-1][0]=y+y1;
				mas2[mas2.length-1][1]=x+x1;
				sdf=1;
			}
			else{sdf=0};
		}
	}
}

function ytr(ct){
	sdf="0123456789abcdef";
	mas20=[];mas21=[];
	for(gl=1;gl<7;gl++){
		for(lg=0;lg<16;lg++){
			if(sdf[lg]==ct[gl]){
				mas20.push(lg);
			}
		}
	}
	for(gl=0;gl<3;gl++){
		mas21[gl]=mas20[gl*2]*16+mas20[gl*2+1];
	}
	//alert(mas21);
}

function webki(){
	
//	allokrug.innerHTML="";
	
//	for(z2=1;z2<=100;z2++){
	
//		allokrug.innerHTML+="<div id=ytr class=floated"+z2+"></div>";
		
//	}

	buf1="";
	
	for(z=0;z<mas5.length-1;z++){
		id_to_coord(mas5[z]);
		//buf1+=(50+50*mas2[z][1])+"px "+(50+50*mas2[z][0])+"px";
		buf1+=(sag+sag*x)+"px "+(sag+sag*y)+"px";
		if(z!=mas5.length-2){buf1+=","};
	}
	
	ytr(cvt5);
	cvt7="rgba("+mas21[0]+","+mas21[1]+","+mas21[2]+",0.3)";
	
	buf2+=".floated"+st1+"{position:absolute;left:0;top:0;width:910px;height:600px;background-color:"+cvt7+";-webkit-clip-path: polygon("+buf1+");}\r\n";
	mystyle.innerHTML=buf2;
}

for(i=0;i<ty;i++){
	c=document.createElement("div");
	c.style.position="absolute";
	c.style.left=sag;
	c.style.top=sag+i*sag;
	//c.style.width=450;
	c.style.width=(tx-1)*sag;
	c.style.height=1;
	c.style.background="#aaa";
	document.body.appendChild(c);
}	
	
for(i=0;i<tx;i++){
	c=document.createElement("div");
	c.style.position="absolute";
	c.style.left=sag+i*sag;
	c.style.top=sag;
	c.style.width=1;
	c.style.height=(ty-1)*sag;
	c.style.background="#aaa";
	document.body.appendChild(c);
}

document.write("<div id=allokrug>");

for(z2=1;z2<=1000;z2++){
	document.write("<div id=ytr class=floated"+z2+"></div>");
	//document.write("<div id=fds"+z2+"></div>");
	//c=document.createElement("div");
	//c.id="fds"+z2;
	//okrug.appendChild(c);
}

document.write("</div>");

document.onmousedown=function(){tgm=1};
		
document.onmouseup=function(){tgm=0;if(tgokr==0){okrug.innerHTML=""}else{tgokr=0}};
		
//document.onmousemove=function(){reg.innerHTML=tgm};

tgo=0;

for(p=0;p<ty;p++){
	for(j=0;j<tx;j++){
		c=document.createElement("div");
		c.id=p*tx+j;
		c.style.position="absolute";
		c.style.left=sag+j*sag-tr/2+1;
		c.style.top=sag+p*sag-tr/2+1;
		c.style.width=tr;
		c.style.height=tr;
		c.style.background="rgba(0,255,0,0)";
		c.style.cursor="pointer";
		
		
		
		
		if(tgo==0){
		if(cvt3!="gold"){
		if(cvt3!="orange"){
		
		
		
		
		c.onmousedown=function(){
			mas5=[];
			if(mas[this.id]==1){
				//alert(this.id);
				mas5.push(this.id);
				//colt.innerHTML=mas5;
				idlin=this.id;
			}
		}
		
		c.onmouseover=function(){
			if(mas[this.id]==0){this.style.background="rgba(255,255,1,0.7)"}
			else{this.style.cursor="default"};
			
			if(mas[this.id]==1){
		//	if(this.style.background==cvt){
				if(tgm==1){
					//alert(this.id);
					
					if(this.id!=idlin){
					
						mas5.push(this.id);
		//				colt.innerHTML=mas5;
						lin(idlin,this.id,"#722");
						idlin=this.id;
					
						if(mas5[mas5.length-1]==mas5[0]){
							if(mas5.length>=4){
							
								tgokr=1;
							
						//		for(z1=0;z1<mas5.length;z1++){
						//				if(z1==mas5.length-1){z2=0}else{z2=z1+1};
						//				lin(mas5[z1],mas5[z2],"blue");
						//		}
						//		okrug.innerHTML="";
								cvt5=cvt;
								webki();
								st1++;
								
								startAjax("okrug.php?mas="+mas5.join("$")+"&cwt="+cvt.substring(1));
								
								//startAjax("script.php");
								
								//tgokr=0;
								
							}
						}
					}
				}
			}
		}
				
		c.onmouseout=function(){
			if(mas[this.id]==0){this.style.background="rgba(255,255,1,0)"};
		}
		
		c.onclick=function(){
			
		//	alert(cvt10);
			
		//	alert(cvt);
			
			if(cvt10==cvt){
				
				au.src="http://raduga.zz.vc/tom.ogg";
				au.currentTime=0;
				au.play();
				
		//		alert("Сейчас очередь Вашего напарника поставить точку");
		
				setTimeout(function(){
					
					alert("Сейчас очередь Вашего напарника поставить точку");
					
				},100);
				
			}
			
			else{
				
			if(otg==false){
				
			au.src="http://raduga.zz.vc/ru1.ogg";
			au.play();			
			
			tgo=1;
			tvc="";
		//	document.bgColor=qwert1;
			st++;
			this.style.background=cvt;
			
			//alert(cvt);
			
			startAjax("click.php?id="+this.id+"&cwt="+cvt.substring(1));
			
			mas[this.id]=1;
			mas2=[];
			for(m=0;m<100;m++){
				mas1[m]=0;
				mas3[m]=0;
			}
			
			}
			
			else{
				
					au.src="http://raduga.zz.vc/tom.ogg";
					au.play();
					
		//		alert("Сейчас очередь Вашего напарника поставить точку");
		
				setTimeout(function(){
					
					alert("Сейчас очередь Вашего напарника поставить точку");
					
				},100);
				
				}
			}
			
			otg=true;			
			
		}
		
		
		
		
		}
		}
		}
		
		
		
		
		document.body.appendChild(c);
	}
}

//document.getElementById(23).style.background="green";

/*

sod="<?php echo $file; ?>";
//alert(sod);
masp=sod.split("&");
//alert(masp);

//alert(masp.length/2);

for(is=0;is<(masp.length-1)/2;is++){
	//alert(is);
	document.getElementById(masp[is*2]).style.background=masp[is*2+1];
	//mas[masp[is*2]]=1;
}

*/

startAjax("script.php");

setInterval(function(){
//	alert(3);
	if(tgm==0){startAjax("script.php")};
},10000);

st=0;
st1=1;
st2=0;
sdf=0;
tg1=0;
mas=[];
mas1=[];
mas2=[];
mas3=[];

tgm=0;
buf2="";

mas5=[];

for(i=0;i<tx*ty;i++){
	mas[i]=0;
	mas1[i]=0;
	mas3[i]=0;
	//mas5[i]=0;
}
</script>
</body>