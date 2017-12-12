Date.prototype.Format = function (fmt) { //author: meizz 
		    var o = {
		        "M+": this.getMonth() + 1, //月份 
		        "d+": this.getDate(), //日 
		        "h+": this.getHours(), //小时 
		        "m+": this.getMinutes(), //分 
		        "s+": this.getSeconds(), //秒 
		        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
		        "S": this.getMilliseconds() //毫秒 
		    };
		    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
		    for (var k in o)
		    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
		    return fmt;
		}
		
 function winLoad(){
      if($.cookie("scrollTop")){
          $('body,html').animate({scrollTop:$.cookie("scrollTop")},500);
      }
 }
 function winUnload(){
     setCookie("scrollLeft", document.body.scrollLeft)  
     //保存水平滚动条位置
     setCookie("scrollTop", document.body.scrollTop)    
    //保存垂直滚动条位置
 }
 
 function setCookie(key,value){
    var expiresDate= new Date(); 
       expiresDate.setTime(expiresDate.getTime() + (10 * 60 * 1000)); 
    $.cookie(key,value, { path: '/', expires: expiresDate }); 
 }
 
//保留小数  (计算精确度不够  )
	function accMul(arg1,arg2){
		var m=0,s1=arg1.toString(),s2=arg2.toString();
		try{m+=s1.split(".")[1].length}catch(e){}
		try{m+=s2.split(".")[1].length}catch(e){}
		return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m)
	}
	
	//js相减
	function accSub(arg1,arg2){ 
	  var r1,r2,m; 
	  try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0} 
	  try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}
	  m=Math.pow(10,Math.max(r1,r2));
	  return (arg1*m-arg2*m)/m;
	}
	

	function NumberCheck(t){
        var num = t.value;
        var re=/^\d*$/;
        if(!re.test(num)){
            isNaN(parseInt(num))?t.value=0:t.value=parseInt(num);
        }
    }
	
	// 金额校验
	function moneyCheck(obj) {
		var exp = /^([1-9][\d]{0,7}|0)(\.[\d]{1,2})?$/;
		if (!exp.test(obj)) {
			return false
		}
		return true;
	}
	
	function GetDateStr(date,AddDayCount) {
        var dd =new Date(date);
        dd.setDate(dd.getDate()+AddDayCount);//获取AddDayCount天后的日期
        var y = dd.getFullYear();
        var m = dd.getMonth()+1;//获取当前月份的日期
        var d = dd.getDate();
        var h=dd.getHours(); //获取系统时，
        var mi=dd.getMinutes(); //分
        var s=dd.getSeconds();
        
        if(m<10){
          m="0"+m;
        }
        if(d<10){
          d="0"+d;
        }
         if(h<10){
          h="0"+h;
        }
         if(mi<10){
          mi="0"+mi;
        }
         if(s<10){
          s="0"+s;
        }
        
        if(AddDayCount==0){
           return y+m+d+h+mi+s;
        }
        return y+"-"+m+"-"+d;
      }