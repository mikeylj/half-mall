var curUserId = null;
var path = null;
var goodId = null;
var srcFrom = null;
var conn = null;
var wHeight = null;
var roomId = null;
var curChatRoomId = null;
var msgCardDivId = "chat01";
var talkToDivId = "talkTo";
var talkInputId = "talkInputId";
var bothRoster = [];
var toRoster = [];
var maxWidth = 200;
var groupFlagMark = "groupchat";
var chatRoomMark = "chatroom";
var groupQuering = false;
var textSending = false;
var time = 0;
var flashFilename = '';
var audioDom = [];
var picshim;
var audioshim;
var fileshim;
var PAGELIMIT = 8;
var pageLimitKey = new Date().getTime();
var encode = function ( str ) {
	if ( !str || str.length === 0 ) return "";
	var s = '';
	s = str.replace(/&amp;/g, "&");
	s = s.replace(/<(?=[^o][^)])/g, "&lt;");
	s = s.replace(/>/g, "&gt;");
	//s = s.replace(/\'/g, "&#39;");
	s = s.replace(/\"/g, "&quot;");
	s = s.replace(/\n/g, "<br>");
	return s;
};

//定义消息编辑文本域的快捷键，enter和ctrl+enter为发送，alt+enter为换行
//控制提交频率
//easemobwebim-sdk注册回调函数列表
function initHX() {
	conn = new Easemob.im.Connection({
		multiResources: Easemob.im.config.multiResources,
		https : Easemob.im.config.https,
		url: Easemob.im.config.xmppURL
	});
	//初始化连接
	conn.listen({
		//当连接成功时的回调方法
		onOpened : function() {
			handleOpen(conn);
		},
		//当连接关闭时的回调方法
		onClosed : function() {
			handleClosed();
		},
		//收到文本消息时的回调方法
		onTextMessage : function(message) {
			handleTextMessage(message);
		},
		//收到表情消息时的回调方法
		onEmotionMessage : function(message) {
			handleEmotion(message);
		},
		//收到图片消息时的回调方法
		onPictureMessage : function(message) {
			handlePictureMessage(message);
		},
		//收到音频消息的回调方法
		onAudioMessage : function(message) {
			handleAudioMessage(message);
		},
		//收到位置消息的回调方法
		onLocationMessage : function(message) {
			handleLocationMessage(message);
		},
		//收到文件消息的回调方法
		onFileMessage : function(message) {
			handleFileMessage(message);
		},
		//收到视频消息的回调方法
		onVideoMessage: function(message) {
			handleVideoMessage(message);
		},
		//收到联系人订阅请求的回调方法
		onPresence: function(message) {
			handlePresence(message);
		},
		//收到联系人信息的回调方法
		onRoster: function(message) {
			handleRoster(message);
		},
		//收到群组邀请时的回调方法
		onInviteMessage: function(message) {
			handleInviteMessage(message);
		},
		//异常时的回调方法
		onError: function(message) {
			handleError(message);
		}
	});
}

//处理连接时函数,主要是登录成功后对页面元素做处理
var handleOpen = function(conn) {
	conn.setPresence();
	//启动心跳
	if (conn.isOpened()) {
		conn.heartBeat(conn);
	}
	roomId = $("#roomId").val();
	conn.joinChatRoom({
		roomId : roomId
	});
};
//连接中断时的处理，主要是对页面进行处理
var handleClosed = function() {
	curUserId = null;
	curChatUserId = null;
	curRoomId = null;
	curChatRoomId = null;
	bothRoster = [];
	toRoster = [];
	hiddenChatUI();
	for(var i=0,l=audioDom.length;i<l;i++) {
		if(audioDom[i].jPlayer) audioDom[i].jPlayer('destroy');
	}
	clearContactUI("contactlistUL", "contracgrouplistUL",
			"momogrouplistUL", msgCardDivId);
	showLoginUI();
	groupQuering = false;
	textSending = false;
};

//easemobwebim-sdk中收到联系人订阅请求的处理方法，具体的type值所对应的值请参考xmpp协议规范
var handlePresence = function(e) {
	if (e.type == 'unavailable') {
		var el = null;

		if (e.chatroom && e.destroy) {
			el = document.getElementById(chatRoomMark + e.from)
		} else {
			el = document.getElementById(groupFlagMark + e.from)
		}
		el && $(el).remove();
		return;
	}
	//（发送者希望订阅接收者的出席信息），即别人申请加你为好友
	if (e.type == 'subscribe') {
		if (e.status) {
			if (e.status.indexOf('resp:true') > -1) {
				agreeAddFriend(e.from);
				return;
			}
		}
		var subscribeMessage = e.from + "请求加你为好友。\n验证消息：" + e.status;
		showNewNotice(subscribeMessage);
		$('#confirm-block-footer-confirmButton').click(function() {
			//同意好友请求
			agreeAddFriend(e.from);//e.from用户名
			//反向添加对方好友
			conn.subscribe({
				to : e.from,
				message : "[resp:true]"
			});
			$('#confirm-block-div-modal').modal('hide');
		});
		$('#confirm-block-footer-cancelButton').click(function() {
			rejectAddFriend(e.from);//拒绝加为好友
			$('#confirm-block-div-modal').modal('hide');
		});
		return;
	}
	//(发送者允许接收者接收他们的出席信息)，即别人同意你加他为好友
	if (e.type == 'subscribed') {
		toRoster.push({
			name : e.from,
			jid : e.fromJid,
			subscription : "to"
		});
		return;
	}
	//（发送者取消订阅另一个实体的出席信息）,即删除现有好友
	if (e.type == 'unsubscribe') {
		//单向删除自己的好友信息，具体使用时请结合具体业务进行处理
		delFriend(e.from);
		return;
	}
	//（订阅者的请求被拒绝或以前的订阅被取消），即对方单向的删除了好友
	if (e.type == 'unsubscribed') {
		delFriend(e.from);
		return;
	}
};
//easemobwebim-sdk中处理出席状态操作
var handleRoster = function(rosterMsg) {
	for (var i = 0; i < rosterMsg.length; i++) {
		var contact = rosterMsg[i];
		if (contact.ask && contact.ask == 'subscribe') {
			continue;
		}
		if (contact.subscription == 'to') {
			toRoster.push({
				name : contact.name,
				jid : contact.jid,
				subscription : "to"
			});
		}
		//app端删除好友后web端要同时判断状态from做删除对方的操作
		if (contact.subscription == 'from') {
			toRoster.push({
				name : contact.name,
				jid : contact.jid,
				subscription : "from"
			});
		}
		if (contact.subscription == 'both') {
			var isexist = contains(bothRoster, contact);
			if (!isexist) {
				var lielem = $('<li>').attr({
					"id" : contact.name,
					"class" : "offline",
					"className" : "offline"
				}).click(function() {
					chooseContactDivClick(this);
				});
				$('<img>').attr({
					"src" : "static/img/head/contact_normal.png"
				}).appendTo(lielem);
				$('<span>').html(contact.name).appendTo(lielem);
				$('#contactlistUL').append(lielem);
				bothRoster.push(contact);
			}
		}
		if (contact.subscription == 'remove') {
			var isexist = contains(bothRoster, contact);
			if (isexist) {
				removeFriendDomElement(contact.name);
			}
		}
	}
};
//异常情况下的处理方法
var handleError = function(e) {
	curChatRoomId = null;

	e && e.upload && $('#fileModal').modal('hide');
	if (curUserId == null) {
		alert(e.msg + ",请重新登录");
	} else {
		var msg = e.msg;
		if (e.type == EASEMOB_IM_CONNCTION_SERVER_CLOSE_ERROR) {
			if (msg == "" || msg == 'unknown' ) {
				alert("服务器断开连接,可能是因为在别处登录");
			} else {
				alert("服务器断开连接");
			}
		} else if (e.type === EASEMOB_IM_CONNCTION_SERVER_ERROR) {
			if (msg.toLowerCase().indexOf("user removed") != -1) {
				alert("用户已经在管理后台删除");
			}
		} else {
			//alert(msg);
		}
	}
};
//登录系统时的操作方法
var login = function(nick) {
	//根据用户名密码登录系统
	conn.open({
		apiUrl : Easemob.im.config.apiURL,
		user : nick,
		pwd : "123456",
		//连接时提供appkey
		appKey : Easemob.im.config.appkey
	});        
};
//注册新用户操作方法
var regist = function(nick,path) {
	var options = {
		username : nick,
		password : "123456",
		nickname : nick,
		appKey : Easemob.im.config.appkey,
		success : function(result) {
			updateUser(nick,path);
		},
		error : function(e) {
			//alert(e);
		},
		apiUrl : Easemob.im.config.apiURL
	};
	Easemob.im.Helper.registerUser(options);
};
var logout = function() {
	conn.stopHeartBeat(conn);
	conn.close();
};

var sendText = function() {
	var to = "chatroom" + roomId;
	 var msg = '<li class="aNew-boxList">'
        +'<div class="aN-bLImg">'
        +'<img src="' + $("#headImgUrl").val() + '" alt="">'
        +'</div>'
        +'<div class="aN-bLCon">'
            +'<div class="aN-bLT">'
               +'<a class="aN-bLName" >' + $("#nickName").val() + '</a>'
                +'<p class="aN-bLTime">'+ getLoacalTimeString() +'</p>'
            +'</div>'
            +'<div class="aN-bLtxt">'
                +'<p>'+$('.an-ft-ipt').val();+'</p>'
            +'</div>'
        +'</div>'
    +'</li>';
	var options = {
		to : roomId,
		msg : msg,
		type : groupFlagMark,
		roomType : chatRoomMark
	};
	//easemobwebim-sdk发送文本消息的方法 to为发送给谁，meg为文本消息对象
	conn.sendTextMessage(options);
	options.to = curUserId;
	conn.sendTextMessage(options);
	var msgtext = Easemob.im.Utils.parseLink(Easemob.im.Utils.parseEmotions(encode(msg)));
	//当前登录人发送的信息在聊天窗口中原样显示
	//appendMsg(curUserId, to, msgtext);
    // sendHeight+=70;
    boxHeight = $('.aNew-boxItem').height();
    var Timer = null;
    Timer = setTimeout(function(){
        // $('.aNew-box').scrollTop(boxHeight);
        $('.aNew-box').animate({'scrollTop':''+boxHeight+'px'},500);
//        $('body,html').animate({'scrollTop':''+wHeight+'px'},500);
        // $(window).scrollTop(wHeight); 
    },30);
	$('.an-ft-ipt').val("");
    $('.an-ft-sBtn').show();
    $('.an-ft-sendBtn').hide();
    $('.an-ft-ipt').focus();
};

//easemobwebim-sdk收到文本消息的回调方法的实现
var handleTextMessage = function(message) {
	var from = message.from;//消息的发送者
	var mestype = message.type;//消息发送的类型是群组消息还是个人消息
	var messageContent = message.data;//文本消息体
	var room = message.to;
	appendMsg(message.from, mestype + message.to, messageContent);
};
//easemobwebim-sdk收到表情消息的回调方法的实现，message为表情符号和文本的消息对象，文本和表情符号sdk中做了
//统一的处理，不需要用户自己区别字符是文本还是表情符号。
var handleEmotion = function(message) {
};
//easemobwebim-sdk收到图片消息的回调方法的实现
var handlePictureMessage = function(message) {
};
//easemobwebim-sdk收到音频消息回调方法的实现
var handleAudioMessage = function(message) {
};
//处理收到文件消息
var handleFileMessage = function(message) {
};
//收到视频消息
var handleVideoMessage = function(message) {
};
var handleLocationMessage = function(message) {
	var from = message.from;
	var to = message.to;
	var mestype = message.type;
	var content = message.addr;
	appendMsg(from, mestype + to, content);
};
var handleInviteMessage = function(message) {
};

var handleChatRoomMessage = function (contact) {
	if ( contact.indexOf(chatRoomMark) > -1 ) {
		return contact.slice(chatRoomMark.length) === curChatRoomId;
	}
	return true;
};
//显示聊天记录的统一处理方法
var appendMsg = function(who, contact, message) {
	$('.aNew-boxItem').append(message);
};

getLoacalTimeString = function getLoacalTimeString() {
	var date = new Date();
	var time = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate()+" " + date.getHours() + ":" + date.getMinutes()
	return time;
}
var updateUser = function(nick,path){
	$.post(path+'/srdb_index/register', 
			{"register":"1"},
	    function(resp) {
			if(!resp){
				regist(nick);
			}
	    }
	  );
}