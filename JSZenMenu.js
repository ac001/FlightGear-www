/*
	JSZenMenu 1.0.6
	http://jszenmenu.sourceforge.net
*/

//global variables
var delay=345;
var zindex=1000;
var p='p__';
_split=['___'];
var sstr='';
iar=new Array();

//functions
function m/*item*/(v/*value,title*/,l/*link*/,d/*description*/,t/*target*/,img/*image*/,a/*submenu [items array]*/) {
	if(a!=null){
		this.a=new Array();
		for(var i=0;i<a.length;i++)
			this.a[i]=a[i];
		if(img==null)this.img='folder.gif';else this.img=img;
		this.i2='arrowv.gif';//image 2
	}
	else {
		this.a=null;
		if(img==null)this.img='link.gif';else this.img=img;
		this.i2='blank.gif';		
	}
	this.v=v;
	if(l==null || l=='')this.l='#';else this.l=l;
	if(d==null)this.d=v;else this.d=d;
	if(t==null)this.t='_self';else this.t=t;
	this.o=null;
	this.Id="_"+v.replace(/;/g,'').replace(/&/g,'').replace(/#/g,'');
}

function getId(s){
	return s.replace(/;/g,'').replace(/&/g,'').replace(/#/g,'');
}

function gen(m/*menu*/,th/*theme*/,n/*menu_name*/,or/*orientation*/,root){
	var s1="",f1="",s2="",f2="",vd="V",sp=" colspan=\"3\"",sv="";
	if(or==0){
		vd="H";sp="";sv="|";
		s1="<tr>";f1="</tr>";
		s2="<td class=\""+th+"TD\"><table class=\""+th+"TABLE\" cellspacing=\"0\">";
		f2="</table></td>";
	}
	if(m.a!=null){
		if(m.v='')m.v=n;
		sstr+="<div id=\""+p+m.a[0].Id+n+"\" class=\""+th+"DIV\" onMouseOver=\"clearTimeOut('"+n+"');\" onMouseOut=\"setTimeOut('"+n+"','"+th+"');\" style=\"z-index:"+(zindex++)+";\"><table id=\"table"+m.a[0].Id+n+"\" class=\""+th+"TABLE"+vd+"\" cellspacing=\"0\"><tr><td class=\""+th+"TD"+vd+"\"><table class=\""+th+"TABLE\" cellspacing=\"0\">"+s1;
		for(var i=0;i<m.a.length;i++){
			tmpArr=new Array("<img src=\""+root+th+"/"+m.a[i].img+"\">",m.a[i].v,"<img src=\""+root+th+"/"+m.a[i].i2+"\">");
			if(or==0) m.a[i].o=0;
			var clic = "";
			if(m.a[i].l!="#")clic=" --- ";
			sstr+=s2+"<tr id=\""+m.a[i].Id+n+"\" class=\""+th+"\" ::: "+clic+" >";
			if(m.a[i].a!=null){
				if(or==0)
					tmpArr[2]="<img src=\""+root+th+"/"+'arrowh.gif'+"\">";
				for(var t=0;t<3;t++)
					sstr+="<td id=\""+m.a[i].Id+n+(t+1)+"\" class=\""+th+"TD"+(t+1)+"\" title=\""+m.a[i].d+"\">"+tmpArr[t]+"</td>";
			}else{
				if(m.a[i].v==_split[0]){
					m.a[i].v+=m.a[i-1].Id;
					m.a[i].Id=m.a[i].v;
					sstr+="<td id=\""+m.a[i].Id+n+"\" class=\""+th+"\" "+sp+"><div class=\""+th+"SPLIT"+vd+"\"><img src=\""+root+th+"/"+'blank.gif'+"\">"+sv+"</div></td>";
				} else 
					for(var t=0;t<3;t++)
						sstr+="<td id=\""+m.a[i].Id+n+(t+1)+"\" class=\""+th+"TD"+(t+1)+"\" title=\""+m.a[i].d+"\">"+tmpArr[t]+"</td>";
			}
			sstr+="</tr>"+f2;
		}
		sstr+=f1+"</table></td></tr></table></div>";
	}
	if(m.a!=null)
		for(var i=0;i<m.a.length;i++) 
			gen(m.a[i],th,n,null,root);
}

function getX(o)
{
	var x=0;
	do{
		x+=o.offsetLeft;
		o=o.offsetParent;
	} while(o);
	return x;
}

function getY(o)
{
	var y=0;
	do{
		y+=o.offsetTop;
		o=o.offsetParent;
	} while(o);
	return y;
}

function getObj(id)
{
	if (document.all)
		return document.all[id];
	return document.getElementById(id);
}

function setTimeOut(name,th/*theme*/){
	g=0;q=new Array();
	q[0]=name;q[1]=setTimeout("hidems("+name+",'"+th+"','','"+name+"')",delay);
	for(var k=0;k<iar.length;k++)
		if(iar[k][0]==name) {
			iar[k][1]=q[1];
			g=1;
		}
	if(g==0)iar.push(q);
}

function clearTimeOut(n) {
	for(var k=0;k<iar.length;k++) {
		if(iar[k][0]==n) {
			clearTimeout(iar[k][1]);
		}
	}
}

function posAr(ar){
	if(ar==null)
		return null;
	for(var i=0;i<ar.length;i++)
		if(ar[i] instanceof Array)
			return i;
	return null;
}

function getArr(ar1,ar2) {
	var j=0;
	for(var i=posAr(ar1);i<ar1.length;i++)
		ar2[j++]=menu(ar1[i]);
	return ar2;
}

function menu(ar) {
	if(posAr(ar)==null)
		return new m(ar[0],ar[1],ar[2],ar[3],ar[4]);
	else {
		arr=new Array();
		if(posAr(ar)==0) return new m('',null,null,null,null, getArr(ar,arr));
		if(posAr(ar)==1) return new m(ar[0],null,null,null,null,getArr(ar,arr));
		if(posAr(ar)==2) return new m(ar[0],ar[1],null,null,null,getArr(ar,arr));
		if(posAr(ar)==3) return new m(ar[0],ar[1],ar[2],null,null,getArr(ar,arr));
		if(posAr(ar)==4) return new m(ar[0],ar[1],ar[2],ar[3],null,getArr(ar,arr));
		if(posAr(ar)==5) return new m(ar[0],ar[1],ar[2],ar[3],ar[4],getArr(ar,arr));
	}
}

function showm(m,n){
	if (m.a!=null)
		getObj(p+m.a[0].Id+n).style.visibility='visible';
}

function setCls(m,th,cl,n){
	for(var j=1;j<4;j++)
		getObj(m.Id+(n+j)).className=th+cl+j;
}

function hidem(m,th,id,n) {
	if(m.Id+n==id) window.open(m.l,m.t);
	if (m.a!=null)
		for(var i=0;i<m.a.length;i++) {
			getObj(p+m.a[0].Id+n).style.visibility='hidden';
			if(m.a[i].v.substring(0,_split[0].length)!=_split[0]) 
				setCls(m.a[i],th,'TD',n);
			hidem(m.a[i],th,id,n);
		}
}

function hidems(m,th,id,n){
	if (m.a!=null)
		for(var i=0;i<m.a.length;i++) {
			if(m.a[i].v.substring(0,_split[0].length)!=_split[0]) 
				setCls(m.a[i],th,'TD',n);
			hidem(m.a[i],th,id,n);
		}
}

function showhidems(m,id,th,n){
	if(m.a!=null)
		for(var i=0;i<m.a.length;i++)
			if(m.a[i].Id+n==id){
				showm(m.a[i],n);
				if(m.a[i].v.substring(0,_split[0].length)!=_split[0]) {
					setCls(m.a[i],th,'TDV',n);
					if(m.a[i].o==0)
						setCls(m.a[i],th,'TDH',n);
				}
			} else {
				hidem(m.a[i],th,'',n);
				if(m.a[i].v.substring(0,_split[0].length)!=_split[0])
					setCls(m.a[i],th,'TD',n);
			}
}

function createMenu(m,id,name,th,orient,pos,root){
	if(th==null)
		th=defTh;
	try{
		if(getTh(name,th)!='')
			th=getTh(name,th);
	}catch(e){}
	gen(m,th,name,orient,root);
	if (m.a!=null){
		var obj=getObj(id);
		obj.innerHTML=sstr.replace(/---/g," onClick=\"hidems("+name+",'"+th+"',this.id,'"+name+"');\" ").replace(/:::/g," onMouseOver=\"playMenu("+name+",this.id,'"+th+"','"+name+"');\"  ");
		getObj(p+m.a[0].Id+name).style.visibility='visible';
		if(pos==null)pos='static';
			getObj(p+m.a[0].Id+name).style.position=pos;
	}
	sstr='';
}

function playMenu(m/*menu*/,id,th/*theme*/,n/*menu name*/){
	if(m.Id+n==id){
		var X, Y;
		if(m.o==0) {
			X=getX(getObj(id));
			Y=getY(getObj(id))+getObj(id).offsetHeight-1;
		}
		else {
			X=getX(getObj(id))+getObj(id).offsetWidth;
			Y=getY(getObj(id));
		}
		if(m.a!=null){
			if(X+getObj(p+m.a[0].Id+n).offsetWidth>wClient())
				X=getX(getObj(id))-getObj(p+m.a[0].Id+n).offsetWidth;
			getObj(p+m.a[0].Id+n).style.left=X+'px';
			getObj(p+m.a[0].Id+n).style.top=Y+'px';
		}
	}
	if(m.a!=null)
		for (var i=0;i<m.a.length;i++){
			playMenu(m.a[i],id,th,n);
			if(m.a[i].Id+n==id) {
				showhidems(m,id,th,n);
				return;
			}
		}
}

function wClient(){
	if(window.innerWidth instanceof Number)
		return window.innerWidth;
	else if(document.documentElement.clientWidth>0)
		return document.documentElement.clientWidth;
	else if(document.body.clientWidth>0)
		return document.body.clientWidth;
	return 0;
}
