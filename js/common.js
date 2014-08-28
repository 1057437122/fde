var SITE_URL=window.location.toString().split('/index.php')[0];SITE_URL=SITE_URL.replace(/(\/+)$/g,'');jQuery.extend({getCookie:function(sName){var aCookie=document.cookie.split("; ");for(var i=0;i<aCookie.length;i++){var aCrumb=aCookie[i].split("=");if(sName==aCrumb[0])return decodeURIComponent(aCrumb[1]);}
return'';},setCookie:function(sName,sValue,sExpires){var sCookie=sName+"="+encodeURIComponent(sValue);if(sExpires!=null)sCookie+="; expires="+sExpires;document.cookie=sCookie;},removeCookie:function(sName){document.cookie=sName+"=; expires=Fri, 31 Dec 1999 23:59:59 GMT;";}});function drop_confirm(msg,url){if(confirm(msg)){window.location=url;}}
function go(url){window.location=url;}
function price_format(price){if(typeof(PRICE_FORMAT)=='undefined'){PRICE_FORMAT='&yen;%s';}
price=number_format(price,2);return PRICE_FORMAT.replace('%s',price);}
function number_format(num,ext){if(ext<0){return num;}
num=Number(num);if(isNaN(num)){num=0;}
var _str=num.toString();var _arr=_str.split('.');var _int=_arr[0];var _flt=_arr[1];if(_str.indexOf('.')==-1){if(ext==0){return _str;}
var _tmp='';for(var i=0;i<ext;i++){_tmp+='0';}
_str=_str+'.'+_tmp;}else{if(_flt.length==ext){return _str;}
if(_flt.length>ext){_str=_str.substr(0,_str.length-(_flt.length-ext));if(ext==0){_str=_int;}}else{for(var i=0;i<ext-_flt.length;i++){_str+='0';}}}
return _str;}
function getFullPath(obj)
{if(obj)
{if(window.navigator.userAgent.indexOf("MSIE")>=1)
{obj.select();if(window.navigator.userAgent.indexOf("MSIE")==25){obj.blur();}
return document.selection.createRange().text;}
else if(window.navigator.userAgent.indexOf("Firefox")>=1)
{if(obj.files)
{return window.URL.createObjectURL(obj.files.item(0));}
return obj.value;}
return obj.value;}}
function sendmail(req_url)
{$(function(){var _script=document.createElement('script');_script.type='text/javascript';_script.src=req_url;document.getElementsByTagName('head')[0].appendChild(_script);});}
function transform_char(str)
{if(str.indexOf('&'))
{str=str.replace(/&/g,"%26");}
return str;}
function DrawImage(ImgD,FitWidth,FitHeight){var image=new Image();image.src=ImgD.src;if(image.width>0&&image.height>0)
{if(image.width/image.height>=FitWidth/FitHeight)
{if(image.width>FitWidth)
{ImgD.width=FitWidth;ImgD.height=(image.height*FitWidth)/image.width;}
else
{ImgD.width=image.width;ImgD.height=image.height;}}
else
{if(image.height>FitHeight)
{ImgD.height=FitHeight;ImgD.width=(image.width*FitHeight)/image.height;}
else
{ImgD.width=image.width;ImgD.height=image.height;}}}}
function showTips(tips,height,time){var windowWidth=document.documentElement.clientWidth;var tipsDiv='<div class="tipsClass">'+tips+'</div>';$('body').append(tipsDiv);$('div.tipsClass').css({'top':200+'px','left':(windowWidth/2)-(tips.length*13/2)+'px','position':'fixed','padding':'20px 50px','background':'#EAF2FB','font-size':14+'px','margin':'0 auto','text-align':'center','width':'auto','color':'#333','border':'solid 1px #A8CAED','opacity':'0.90','z-index':'9999'}).show();setTimeout(function(){$('div.tipsClass').fadeOut().remove();},(time*1000));}
function mb_cutstr(str,maxlen,dot){var len=0;var ret='';var dot=!dot?'...':dot;maxlen=maxlen-dot.length;for(var i=0;i<str.length;i++){len+=str.charCodeAt(i)<0||str.charCodeAt(i)>255?(_CHARSET=='utf-8'?3:2):1;if(len>maxlen){ret+=dot;break;}
ret+=str.substr(i,1);}
return ret;}
function trim(str){return(str+'').replace(/(\s+)$/g,'').replace(/^\s+/g,'');}
function ajax_form(id,title,url,width,model)
{if(!width)width=480;if(!model)model=1;var d=DialogManager.create(id);d.setTitle(title);d.setContents('ajax',url);d.setWidth(width);d.show('center',model);return d;}
function ajax_notice(id,title,url,width,model){if(!width)width=480;if(!model)model=0;var d=DialogManager.create(id);d.setTitle(title);d.setContents('ajax_notice',url);d.setWidth(width);d.show('center',model);return d;}
function loading_form(id,title,_text,width,model){if(!width)width=480;if(!model)model=0;var d=DialogManager.create(id);d.setTitle(title);d.setContents('loading',{text:_text});d.setWidth(width);d.show('center',model);return d;}
function message_notice(id,title,_text,width,model){if(!width)width=480;if(!model)model=0;var d=DialogManager.create(id);d.setTitle(title);d.setContents('message',{type:'notice',text:_text});d.setWidth(width);d.show('center',model);return d;}
function message_confirm(id,title,_text,width,model){if(!width)width=480;if(!model)model=0;var d=DialogManager.create(id);d.setTitle(title);d.setContents('message',{type:'confirm',text:_text});d.setWidth(width);d.show('center',model);return d;}
function html_form(id,title,_html,width,model){if(!width)width=480;if(!model)model=0;var d=DialogManager.create(id);d.setTitle(title);d.setContents(_html);d.setWidth(width);d.show('center',0);return d;}
function iframe_form(id,title,_url,width,height,fresh){if(!width)width=480;var rnd=Math.random();rnd=Math.floor(rnd*10000);var d=DialogManager.create(id);d.setTitle(title);var _html="<iframe id='iframe_"+rnd+"' src='"+_url+"' width='"+width+"' height='"+height+"' frameborder='0'></iframe>";d.setContents(_html);d.setWidth(width+20);d.setHeight(height+60);d.show('center');$("#iframe_"+rnd).attr("src",_url);return d;}
function collect_store(fav_id,jstype,jsobj){$.get('index.php?act=index&op=login',function(result){if(result=='0'){CUR_DIALOG=ajax_form('login','登录','index.php?act=login&inajax=1',500);}else{var url='index.php?act=member_favorites&op=favoritesstore';$.getJSON(url,{'fid':fav_id},function(data){if(data.done)
{showDialog(data.msg,'succ','','','','','','','','',2);if(jstype=='count'){$('[nctype="'+jsobj+'"]').each(function(){$(this).html(parseInt($(this).text())+1);});}
if(jstype=='succ'){$('[nctype="'+jsobj+'"]').each(function(){$(this).html("收藏成功");});}}
else
{showDialog(data.msg,'notice');}});}});}
function collect_goods(fav_id,jstype,jsobj){$.get('index.php?act=index&op=login',function(result){if(result=='0'){CUR_DIALOG=ajax_form('login','登录','index.php?act=login&inajax=1',500);}else{var url='index.php?act=member_favorites&op=favoritesgoods';$.getJSON(url,{'fid':fav_id},function(data){if(data.done)
{showDialog(data.msg,'succ','','','','','','','','',2);if(jstype=='count'){$('[nctype="'+jsobj+'"]').each(function(){$(this).html(parseInt($(this).text())+1);});}
if(jstype=='succ'){$('[nctype="'+jsobj+'"]').each(function(){$(this).html("收藏成功");});}}
else
{showDialog(data.msg,'notice');}});}});}