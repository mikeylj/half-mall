function publishDetail(path,matchUser,goodId,resultNo){
		$.post(path+'/account/find/detail', {
			matchUser:matchUser,goodId:goodId,srcFrom:$('#srcFrom').val()
		}, function(response) {
			var str =  response[1].drawNo.split(",");
			var html = '<section class="m-detailBox">'
				+'<header class="m-detail-header">'+response[0].goodName+'</header>'
				+'<div class="m-detail-timeT">'
				+'<p class="m-d-tt-left fl">'+getTime(response[0].createTime)+'</p>'
				+'<p class="m-d-tt-right fr">'+response[0].ip+'</p>'
				+'</div>'
				+'<div class="m-detail-id">'
				+'<div class="m-d-id-first fl">'
				+'<div class="m-d-idf-img">'
				+'<img src="'+response[0].headImgUrl+'" alt="">'
				+'</div>'
				if(response[0].nickName.length>5){
					html +='<p class="m-d-idf-name">'+response[0].nickName.substr(0,5)+"..."+'</p>';
				}else{
					html +='<p class="m-d-idf-name">'+response[0].nickName+'</p>';
				}
				if(response[0].sectionNo == 0){
					html += '<p class="m-d-idf-num">'+response[0].smallState+'</p>';
				}else{
					html += '<p class="m-d-idf-num">'+response[0].bigState+'</p>';
				}
				html+='</div>'
				+'<div class="m-d-id-another fr">'
				+'<div class="m-d-idr-img" style="border-color:#fff;">'
				+'<img src="'+response[1].headImgUrl+'" alt="">'
				+'</div>'
				if(response[1].nickName.length>5){
					html+='<p class="m-d-idr-name">'+response[1].nickName.substr(0,5)+"..."+'</p>';
				}else{
					html+='<p class="m-d-idr-name">'+response[1].nickName+'</p>';
				}
				if(response[1].sectionNo == 0){
					html += '<p class="m-d-idr-num">'+response[0].smallState+'</p>';
				}else{
					html += '<p class="m-d-idr-num">'+response[0].bigState+'</p>';
				}
				html +='</div>'
				+'</div>'
				+'<div class="m-detail-timeB">'
				+'<p class="m-d-tb-left fl">'+response[1].ip+'</p>'
				+'<p class="m-d-tb-right fr">'+getTime(response[1].createTime) +'</p>'
				+'</div>'
				+'<div class="m-detail-resule">'
				+'<p><img style="margin-top: .04rem;" src="/images/ssc74.png" alt="" />结果：<span class="colored">'+response[1].drawNo+'</span></p>'
				+'<p><img style="margin-top: .04rem;" src="/images/ssc74.png" alt="" />时间：<span class="colored">'+getTime(response[1].drawDateTime)+'</span></p>'
				+'</div>'
				if(response[0].type == 0||response[0].type == 1){
					html +='<div class="m-detail-rule">'
					+'<p>根据老半价商城规则： </p>'
					+'<p>'+response[1].drawNo+'除以'+response[1].price+'所得余数+1.获胜号码为'+resultNo+'</p>'
				}else{
					html +='<div class="m-detail-rule">'
						+'<p>根据新半价商城规则： </p>'
						if(response[0].type==2){
							html +='<p><span class="quan_huang1">'+str[0]+'</span> <span>'+str[1]+'</span> <span>'+str[2]+'</span> <span>'+str[3]+'</span> <span>'+str[4]+'</span>第<span>一</span>位号码为 <span class="co_ye">'
							if(str[0]%2 == 0){
								html+='双'
							}else{
								html+='单'
							}
							html+='</span></p>'
						}else if(response[0].type==3){
							html +='<p><span>'+str[0]+'</span> <span class="quan_huang1">'+str[1]+'</span> <span>'+str[2]+'</span> <span>'+str[3]+'</span> <span>'+str[4]+'</span>第<span>二</span>位号码为 <span class="co_ye">'
							if(str[1]%2 == 0){
								html+='双'
							}else{
								html+='单'
							}
							html+='</span></p>'
						}else if(response[0].type==4){
							html +='<p><span>'+str[0]+'</span> <span>'+str[1]+'</span> <span class="quan_huang1">'+str[2]+'</span> <span>'+str[3]+'</span> <span>'+str[4]+'</span>第<span>三</span>位号码为 <span class="co_ye">'
							if(str[2]%2 == 0){
								html+='双'
							}else{
								html+='单'
							}
							html+='</span></p>'
						}else if(response[0].type==5){
							html +='<p><span>'+str[0]+'</span> <span>'+str[1]+'</span> <span>'+str[2]+'</span> <span class="quan_huang1">'+str[3]+'</span> <span>'+str[4]+'</span>第<span>四</span>位号码为 <span class="co_ye">'
							if(str[3]%2 == 0){
								html+='双'
							}else{
								html+='单'
							}
							html+='</span></p>'
						}else if(response[0].type==6){
							html +='<p><span>'+str[0]+'</span> <span>'+str[1]+'</span> <span>'+str[2]+'</span> <span>'+str[3]+'</span> <span class="quan_huang1">'+str[4]+'</span>第<span>五</span>位号码为 <span class="co_ye">'
							if(str[4]%2 == 0){
								html+='双'
							}else{
								html+='单'
							}
							html+='</span></p>'
						}
				}
				if(response[0].lotteryStatus == 1){
					if(response[0].sectionNo ==1){
						html+='<p>获胜号段：'+response[1].smallState+'</p></div>';
					}else{
						html+='<p>获胜号段：'+response[1].bigState+'</p></div>';
					}
					html+='<div class="m-detail-win">'
					+'<div class="m-detail-win-photo">'
					+'<img src="'+response[1].headImgUrl+'" alt="">'
					+'</div>'
					+'<div class="m-detail-win-name">'
					if(response[1].nickName.length>5){
						html+='<p>冠军：'+response[1].nickName.substr(0,5)+"..."+'</p>'
					}else{
						html+='<p>冠军：'+response[1].nickName+'</p>'
					}
					+'</div>'
					html+='</div>'
					+'<a class="m-detail-closeBtn" onclick="hideWin()">关闭</a>'
					+'</section>';
				}else{
					if(response[0].sectionNo ==1){
						html+='<p>获胜号段：'+response[1].bigState+'</p></div>';
					}else{
						html+='<p>获胜号段：'+response[1].smallState+'</p></div>';
					}
					html+='<div class="m-detail-win">'
					+'<div class="m-detail-win-photo">'
					+'<img src="'+response[0].headImgUrl+'" alt="">'
					+'</div>'
					+'<div class="m-detail-win-name">'
					if(response[0].nickName.length>5){
						html+='<p>冠军：'+response[0].nickName.substr(0,5)+"..."+'</p>'
					}else{
						html+='<p>冠军：'+response[0].nickName+'</p>'
					}
					+'</div>'
					html+='</div>'
					+'<a class="m-detail-closeBtn" onclick="hideWin()">关闭</a>'
					+'</section>';
				}
				
			
			$(".mod-detail").append(html);
			$(".mod-detail").show();
		});
	}
function getTime(date){
	var d = new Date(date);
	var second ;
	var hour ;
	var minute ;
	if(d.getSeconds() < 10){
		second = "0" + d.getSeconds();
	}else{
		second = "" + d.getSeconds();
	}
	
	if(d.getHours() < 10){
		hour = "0" + d.getHours();
	}else{
		hour = "" + d.getHours();
	}
	
	if(d.getMinutes() < 10){
		minute = "0" + d.getMinutes();
	}else{
		minute = "" + d.getMinutes();
	}
	return d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+hour+":"+minute+":"+second;
}

function getTimes(date){
	var d = new Date(date);
	var second ;
	var hour ;
	var minute ;
	if(d.getSeconds() < 10){
		second = "0" + d.getSeconds();
	}else{
		second = "" + d.getSeconds();
	}
	
	if(d.getHours() < 10){
		hour = "0" + d.getHours();
	}else{
		hour = "" + d.getHours();
	}
	
	if(d.getMinutes() < 10){
		minute = "0" + d.getMinutes();
	}else{
		minute = "" + d.getMinutes();
	}
	return hour+":"+minute+":"+second;
}
