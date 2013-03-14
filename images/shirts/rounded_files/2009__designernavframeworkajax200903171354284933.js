
var activemenu;function loadInitialZoomWindow(responseText){if(responseText){var pos1=responseText.indexOf('@@@');var pos2=responseText.lastIndexOf('@@@');if(pos1>=0&&pos2>0&&pos1<pos2&&pos1<responseText.length){var str2=responseText.substring(pos1+3,pos2);var lines=str2.split('\n');str2=lines[0];str2=str2.split('\t');if(str2.length==3)
updateZoom([3,str2[0],str2[1],str2[2]]);else
updateZoom([3,str2[0],str2[1],'']);if(lines.length>1){lines.each(function(lineElement,l){if(l==0)return;updateDesigner(lineElement.split('\t'));},this);}}}}
function go(flow,step,substep,donttrack){if(!step){var step=designerState.structure.flows[flow].last;}
if(!substep){if(!designerState.structure.flows[flow].steps[step]&&designerState.structure.flows[flow].steps[step-1]){step--;}
else if(!designerState.structure.flows[flow].steps[step]&&designerState.structure.flows[flow].steps[step+1]){step++;}
var substep=designerState.structure.flows[flow].steps[step].last>0?designerState.structure.flows[flow].steps[step].last:0;}
var useSubstep=(designerState.structure.flows[flow].steps[step].substeps!=undefined);var parentSubstep=substep;if(useSubstep&&substep==0){substep=designerState.structure.flows[flow].steps[step].last;}
if(designerState.active.flow!=flow){if(designerState.active.flow!='99'){$('f_'+designerState.active.flow).className='';$('lb_'+designerState.active.flow).style.display='none';}
$('f_'+flow).className='active';$('lb_'+flow).style.display='block';}
if(designerState.active.step!='99'){var className=designerState.active.substep>0?'isContent':'noContent';$(getId('b',designerState.active.flow,designerState.active.step,designerState.active.substep,designerState.active.substep>0)).className=className;$(getId('p',designerState.active.flow,designerState.active.step,designerState.active.substep,designerState.active.substep>0)).className='page';}else{for(var i=1,tmpElem=$(getId('bb',flow,i,0,false));(tmpElem!=undefined);tmpElem=$(getId('bb',flow,i,0,false))){if(i==step){++i;continue;}
++i;}}
if(designerState.active.flow!=flow||designerState.active.step!=step){goHelper_compressOldNavigationSubstep(designerState.active.flow,designerState.active.step,designerState.active.substep);}
goHelper_markNavigationStepAsActive(useSubstep,flow,step,substep);if((!useSubstep&&designerState.structure.flows[flow].steps[step].loaded==0)||(useSubstep&&designerState.structure.flows[flow].steps[step].substeps[substep].loaded==0)){$(getId('p',flow,step,substep,useSubstep)).innerHTML='<div style="width:100%;height:640px;overflow:hidden;left:0px;"><img src="/media/gfx/ui/loading.gif" alt="" class="ts_loading" /></div>';loadInnerHTMLCallback($(getId('p',flow,step,substep,useSubstep)),designerState.callBackUrl+'/fill/'+getUrlPart(flow,step,substep,useSubstep),function(responseText){loadInitialZoomWindow(responseText);loadNext(flow,step)},true);if(useSubstep){designerState.structure.flows[flow].steps[step].substeps[substep].loaded=1;}else{designerState.structure.flows[flow].steps[step].loaded=1;}}else{getCallback(designerState.callBackUrl+'/update/'+getUrlPart(flow,step,substep,useSubstep),designerState.formName,updateProduct);}
$(getId('p',flow,step,substep,useSubstep)).className='page show';designerState.active.flow=flow;designerState.active.step=step;designerState.active.substep=substep;designerState.structure.flows[flow].last=step;if(useSubstep){designerState.structure.flows[flow].steps[step].last=substep;}}
function goHelper_compressOldNavigationSubstep(flow,step,substep){if(substep>0){var className='hasContent';$('b_'+flow+'_'+step+'_'+0).className=className;var tmpElem=$($('bb_'+flow+'_'+step).parentNode);var myEffect=new Fx.Morph(tmpElem,{duration:200,transition:Fx.Transitions.Sine.easeOut});myEffect.start({'height':0,'opacity':0,'zoom':1});var myEffect=new Fx.Morph($('b_'+flow+'_'+step+'_'+0),{duration:200,transition:Fx.Transitions.Sine.easeOut});myEffect.start({'margin-bottom':0});}}
function goHelper_markNavigationStepAsActive(useSubstep,flow,step,substep){var className='selected';var classNameIsContent=className;var classNameHasContent=className;var classNameNoContent=className;if(ie6){classNameIsContent='isContent_'+className;classNameHasContent='hasContent_'+className;classNameNoContent='noContent_'+className;}
if(useSubstep){var height=0;var tmpElem=$($('bb_'+flow+'_'+step).parentNode);if(!tmpElem.hasClass('contentContainer')){tmpElem=$(tmpElem.parentNode);}
tmpElem.setStyle('display','block');$$('#bb_'+flow+'_'+step+'>DIV.isContent>DIV').each(function(tmpElem){height+=tmpElem.getCoordinates().height},this);$('b_'+flow+'_'+step+'_'+0).addClass(classNameHasContent);var myEffect=new Fx.Morph($($('bb_'+flow+'_'+step).parentNode),{duration:200,transition:Fx.Transitions.Sine.easeOut});myEffect.start({'height':height,'zoom':1,'opacity':1});var myEffect=new Fx.Morph($('b_'+flow+'_'+step+'_'+0),{duration:200,transition:Fx.Transitions.Sine.easeOut});myEffect.start({'margin-bottom':20});for(var i=1,tmpElem=$(getId('b',flow,step,i,true));(tmpElem!=undefined);tmpElem=$(getId('b',flow,step,i,true))){tmpElem.className='isContent';++i;}
$(getId('b',flow,step,substep,true)).addClass(classNameIsContent);}else{$('b_'+flow+'_'+step).className=classNameNoContent;}}
function getId(letter,flow,step,substep,useSubstep){return letter+'_'+flow+'_'+step+(useSubstep?'_'+substep:'');}
function getUrlPart(flow,step,substep,useSubstep){return flow+'-'+step+(useSubstep?'-'+substep:'');}
function reloadCurrentContent(){loadInnerHTMLCallback($(getId('p',designerState.active.flow,designerState.active.step,designerState.active.substep,designerState.active.substep>0)),designerState.callBackUrl+'/fill/'+getUrlPart(designerState.active.flow,designerState.active.step,designerState.active.substep,designerState.active.substep>0),function(responseText){loadInitialZoomWindow(responseText);loadNext(designerState.active.flow,designerState.active.step)},true);}
function updateChanges(){var oldChanges=designerState.pendingChanges;designerState.pendingChanges=new Array();var update=false;while(oldChanges.length>0){var parts=oldChanges.shift();if(updateDesigner(parts)){update=true;}}
if(update){getCallback(designerState.callBackUrl+'/update/'+getUrlPart(designerState.active.flow,designerState.active.step,designerState.active.substep,designerState.active.substep>0),designerState.formName,updateProduct);}}
function loadNext(flow,step,substep){if(!substep)var substep=0;if(substep>0){designerState.structure.flows[flow].steps[step].substeps[substep].loaded=1;}else{designerState.structure.flows[flow].steps[step].loaded=1;}
updateChanges();return;}
function checkIfAllPagesAreLoaded(){designerState.loaded.each(function(flowElem,flow){flowElem.each(function(stepElem,step){if(stepElem==0)
return false;},this);},this);return true;}
function setAttributeOf(node,attribute,value){node.setAttribute(attribute,value);return;}
function addCheckBoxToForm(node,form,value){for(var count=0;count<node.parentNode.childNodes.length;++count){if(node.parentNode.childNodes[count].tagName=='INPUT')node=node.parentNode.childNodes[count];}
try{if(!$(form)[node.name]||node.checked||($(form)[node.name]&&$(form)[node.name].value==value)){tmpElement=document.createElement('input');tmpElement.setAttribute('id',form+'_added_'+node.name);tmpElement.setAttribute('name',node.name);tmpElement.setAttribute('type','hidden');$(designerState.formName).appendChild(tmpElement);tmpElement.setAttribute('value',node.checked?node.value:0);}}catch(e){;}
try{update();}catch(e){;}
try{$(designerState.formName).removeChild(tmpElement);}catch(e){;}}
function check(node,optionalForm,concerns){if(optionalForm&&concerns){for(var count=0;count<node.childNodes.length;++count){if(node.childNodes[count].tagName=='INPUT')node=node.childNodes[count];}
var tmpElement=$(optionalForm+'_added_'+node.name);if(!tmpElement){try{if(!$(optionalForm)[node.name]||node.value==concerns||node.value!=0||($(optionalForm)[node.name]&&$(optionalForm)[node.name].value==concerns)){tmpElement=document.createElement('input');tmpElement.setAttribute('id',optionalForm+'_added_'+node.name);tmpElement.setAttribute('name',node.name);tmpElement.setAttribute('type','hidden');$(designerState.formName).appendChild(tmpElement);tmpElement.setAttribute('value',node.value);}}catch(e){;}}else{if(tmpElement.value==0||tmpElement.value==concerns){tmpElement.setAttribute('value',node.value);}else{}}
node.checked=true;radio(node);$(designerState.formName).removeChild(tmpElement);}else{var tmpNode=[];for(var count=0;count<node.childNodes.length;++count){if(node.childNodes[count].tagName=='INPUT')tmpNode[tmpNode.length]=node.childNodes[count];}
var sendStr='';tmpNode.each(function(tmpElement,n){tmpElement.checked=true;sendStr+=sendStr!=''>0?'&':'';sendStr+=tmpElement.name+'='+tmpElement.value;},this);radio(tmpNode[0],sendStr);}
return false;}
function radio(node,sendStr){$$('*[name='+node.name+']').each(function(tmpNode,i){$(tmpNode.parentNode).removeClass('checked');if(tmpNode.checked){$(tmpNode.parentNode).addClass('checked');}},this);if(typeof sendStr=='undefined'){var element=$('daForm').elements[node.name];var value=-1;for(var i=0;i<element.length;++i){if(element[i].checked){value=element[i].value;break;}}
var sendStr=node.name+'='+value;}
getCallback(designerState.callBackUrl+'/update/'+getUrlPart(designerState.active.flow,designerState.active.step,designerState.active.substep,designerState.active.substep>0),designerState.formName,updateProduct,sendStr);}
function update(){getCallback(designerState.callBackUrl+'/update/'+getUrlPart(designerState.active.flow,designerState.active.step,designerState.active.substep,designerState.active.substep>0),designerState.formName,updateProduct);}
function updateProductInfo(product_url,productId){updateModalPopup(product_url,600,400);}
function showDialog(dialogName,width,height,params){var width=width!=null&&width>0?width:400;var height=height!=null&&height>0?height:400;var params=params!=null?params:'';popup('dialogWidget','',width,height);getCallback(designerState.callBackUrl+'/showDialog/'+dialogName,designerState.formName,function(responseText){$('dialogWidgetContent').innerHTML=responseText;},params);}
function spockDialog(dialogName,width,height,params){var params=params!==null?params:'';spockPopup({'url':designerState.callBackUrl+'/showDialog/'+dialogName+'?'+params});}
function addToCart_safe(){if(typeof _gaq!='undefined'){_gaq.push(['_trackPageview','add-to-cart']);}
$('addToCart').value=1;update();$('addToCart').value=0;}
function addToCart(productId,createBox,showGoToCartLink){if(productId){var cmd=cartURL+'/addnew/'+productId+'?isAjax=1';var xhr=new Request({'url':cmd,'method':'get','async':false,'encoding':'iso-8859-15'});if(($('product_info_module_div')!=undefined))$('product_info_module_div').innerHTML='';var req=xhr.send();showCartSummary();var cartContents=$('cart_contents');if(cartContents!=undefined){cartContents.innerHTML=req.response.text;}
killPopup();}else{getCallback(designerState.callBackUrl+'/addToCart',designerState.formName,addToCartCallback);}}
function addToCartCallback(responseText){if(responseText.substring(0,4)=='http'){window.location.href=responseText;return;}
if($('modalWidget')!=undefined){killPopup('modalWidget');}
showCartSummary();if(typeof b2b_thankyou!='undefined'&&b2b_thankyou){window.location.href=b2b_thankyou;}else{popup('ooook',responseText,400,250,Function.from(false));}}
var lastZoomPics=new Array();var doUpdateMainView=true;function updateProduct(ajaxResponse){var update=false;var lines=ajaxResponse.split('\n');lines.each(function(lineElem,line){if(!ignoreUpdates){if(line=='length')return;var parts=lineElem.split('\t');switch(parts[0]-0){case 1:if(!(lastZoomPics[parts[1]]!=null&&lastZoomPics[parts[1]]==lineElem)){lastZoomPics[parts[1]]=lineElem;updateZoom(parts);}
break;case 2:if(doUpdateMainView){if(!(lastZoomPics[parts[0]]!=null&&lastZoomPics[parts[0]]==lineElem)){lastZoomPics[parts[0]]=lineElem;updateMainView(parts);}}
break;case 3:if(!(lastZoomPics[parts[1]]!=null&&lastZoomPics[parts[1]]==lineElem)){lastZoomPics[parts[1]]=lineElem;updateZoom(parts);}
break;case 4:if(updateDesigner(parts))
update=true;break;case 5:break;case 6:;break;case 7:break;case 8:break;case 9:updateDesignPrice(parts[1],parts[2],parts[3],parts[4],parts[5]);break;case 10:updateContrastFabricSummary(parts[1]);break;case 11:updateTitle(parts[1]);break;case 12:window.location.href=parts[1];break;}}},this);if(ignoreUpdates){sjaxCall(designerState.callBackUrl+'/restore');ignoreUpdates=false;reloadCurrentContent();}else if(update){getCallback(designerState.callBackUrl+'/update/'+getUrlPart(designerState.active.flow,designerState.active.step,designerState.active.substep,designerState.active.substep>0),designerState.formName,updateProduct);}}
function updateTitle(title){if($('productName')){$('productName').set('html',title);}}
function updateDesignPrice(design_price,original_price,including_delivery_costs,from_delivery_cost_free,inp_color){if(original_price!='#'){if($('totalPrice').getParent('.new_chinos')){$('discountedPrice').innerHTML=original_price;$('discountedPrice').setStyles({color:'white',textDecoration:'line-through'});$('totalPrice').innerHTML=design_price;$('totalPrice').setStyles({color:'#cc0000',textDecoration:'none'});}
else{$('totalPrice').getParent().setStyle('font-size','0');$('totalPrice').innerHTML=original_price;$('discountedPrice').innerHTML=design_price;$('totalPrice').setStyles({color:'black',textDecoration:'line-through',fontSize:'18px'});}}else if(typeof $('totalPrice')!='undefined'&&$('totalPrice')!=null&&$('totalPrice')){$('totalPrice').getParent().setStyle('font-size','18px');$('totalPrice').innerHTML=design_price;$('discountedPrice').innerHTML='';$('totalPrice').setStyles({color:(inp_color&&inp_color!='#'?inp_color:'#cc0000'),textDecoration:'none'});}
var inkfrakt=$('inkfrakt');if(inkfrakt!=undefined){inkfrakt.innerHTML=including_delivery_costs;$('frfraktfritt').innerHTML=from_delivery_cost_free;}}
function isElementLoaded(elementId){if($(elementId)){if(typeof designerState.pageElements!='undefined'&&designerState.pageElements[elementId]){var pages=designerState.pageElements[elementId];pages.each(function(pageElem,page){if((pageElem.substep>0&&designerState.structure.flows[pageElem.flow].steps[pageElem.step].substeps[pageElem.substep].loaded==0)||designerState.structure.flows[pageElem.flow].steps[pageElem.step].loaded==0){return false;}},this);}
return true;}
return false;}
var ignoreUpdates=false;function updateDesigner(parts){var command=parts[1];var element=parts[2];if(parts[3])var value=parts[3];var update=false;switch(command){case'hide':if(value){var standard=parts[4];if(isElementLoaded(element)){if($(element).type=='select-one'){if($(element).value==value){combobox_select($(element+'_'+standard+'b'));}
if($(element+'_'+value+'b'))
$(element+'_'+value+'b').setStyle('display','none');}else{var tmpElem=$(element+'_'+value);if(tmpElem!=undefined){if(tmpElem.checked){tmpElem.checked=false;$(tmpElem.parentNode).removeClass('checked');$(element+'_'+standard).checked=true;$($(element+'_'+standard).parentNode).addClass('checked');update=true;}
tmpElem.disabled=true;$(tmpElem.parentNode).setStyle('display','none');}}}else{designerState.pendingChanges.push(parts);}}else{if(isElementLoaded(element)){if($(element).type=='select-one'){$($(element).parentNode).setStyle('display','none');}else{$(element).setStyle('display','none');}}else{designerState.pendingChanges.push(parts);}}
break;case'show':if(value){if(isElementLoaded(element+'_'+value)){if($(element).type=='select-one'){$(element+'_'+value+'b').setStyle('display','block');}else{$(element+'_'+value).enabled=true;$($(element+'_'+value).parentNode).setStyle('display','block');$($(element+'_'+value).parentNode).removeClass('disabled');}}else{designerState.pendingChanges.push(parts);}}else{if(isElementLoaded(element)){if($(element).type=='select-one'){$($(element).parentNode).setStyle('display','block');}else{$(element).setStyle('display','block');}}else{designerState.pendingChanges.push(parts);}}
break;case'rename':var newName=parts[4];if(isElementLoaded(element+'_'+value)){if($(element).type=='select-one'){}else{$('_nameOf_'+element+'_'+value).innerHTML=newName;}}else{designerState.pendingChanges.push(parts);}
break;case'disable':if(isElementLoaded(element)){if($(element)!=undefined){if($(element).type=='checkbox')
$(element).disabled=true;else if($(element).hasClass('dropDownSelect')){$(element).disabled=true;combobox_disable(element);}}}else{designerState.pendingChanges.push(parts);}
break;case'enable':if(isElementLoaded(element)){if($(element)!=undefined){if($(element).type=='checkbox')
$(element).disabled=false;else if($(element).hasClass('dropDownSelect')){if($(element))$(element).disabled=false;combobox_enable(element);}}}else{designerState.pendingChanges.push(parts);}
break;case'deselect':if(isElementLoaded(element)){if(($(element+'_'+value)!=undefined)&&$(element+'_'+value).type=='radio'){var node=$(element+'_'+value);node.checked=false;if($(node.parentNode).hasClass('checked')){$(node.parentNode).removeClass('checked');}}else if(($(element+'_'+value)!=undefined)&&$(element).className=='dropDownSelect'){}}else{designerState.pendingChanges.push(parts);}
break;case'select':if(isElementLoaded(element)){var showParts=parts;showParts[1]='show';updateDesigner(showParts);var select=parts[4];if($(element)&&$(element).type=='select-one'){var index=0;var elem=$(element);try{elem.getChildren().each(function(tmpElem,e,elems){if(!tmpElem.value)return;if(tmpElem.value==value){throw'break';}
++index;},this);}catch(err){}
elem.selectedIndex=index;var shownSelected=$(element+'_selected');var dropdown=$(element+'DropDown');var siblings=dropdown.getChildren();var selectedIndex=elem.selectedIndex-0;var selectedElem=document.createElement('SPAN');siblings.each(function(tmpSibling,sibling,siblingsArray){if(!tmpSibling.id)return;tmpSibling.set('class',tmpSibling.hasClass('even')?'even':'');if(sibling==selectedIndex){selectedElem=tmpSibling;tmpSibling.addClass('selected');}},this);shownSelected.innerHTML=selectedElem.innerHTML;}else if($(element)&&$(element).type=='checkbox'){if($(element).checked!=(value>0)){update=true;}
$(element).checked=value>0;}else if(($(element+'_'+value)!=undefined)&&$(element+'_'+value).type=='radio'){var node=$(element+'_'+value);if(node.checked==false)update=true;node.checked=true;node.getSiblings().removeClass('checked');$(node.parentNode).addClass('checked');}else if($(element+'_'+value)!=undefined){designerState.pendingChanges.push(parts);}else{node=$(element+'_'+value);if(select==1){if(node.checked==false)update=true;node.checked=true;node.getSiblings().removeClass('checked');$(node.parentNode).addClass('checked');}else{node.checked=false;$(node.parentNode).removeClass('checked');}}}else{designerState.pendingChanges.push(parts);}
break;case'setCommentsForPage':if(!parts[3])
parts[3]='';var commentBox='comment_'+parts[2];if($(commentBox)&&$(commentBox)!=parts[3]){$(commentBox).innerHTML=parts[3];}else{designerState.pendingChanges.push(parts);}
break;case'setInnerHTML':if(!parts[3])
parts[3]='';if($(parts[2])&&$(parts[2])!=parts[3]){$(parts[2]).innerHTML=parts[3];}else{designerState.pendingChanges.push(parts);}
break;case'msg':alert(parts[2].replace(/2%0A/g,'\n'));break;case'confirm':if(confirm(parts[2].replace(/2%0A/g,'\n'))){document.location.href=parts[3];return;}
break;case'clear':if(designerState.pageElements[element]){var pages=designerState.pageElements[element];pages.each(function(pageElem,page){document.getElementById(getId('p',pageElem.flow,pageElem.step,pageElem.substep,pageElem.substep>0)).innerHTML='';},this);}
break;case'navigateToElement':if(designerState.pageElements[element]){var pages=designerState.pageElements[element];pages.each(function(pageElem,page){if(!(pageElem.flow==designerState.active.flow&&pageElem.step==designerState.active.step&&(pageElem.substep==designerState.active.substep||pageElem.substep==0))){if(pageElem.substep>0){go(pageElem.flow,pageElem.step,pageElem.substep);}else{go(pageElem.flow,pageElem.step);}}},this);}
break;case'reload':var elementId=parts[2];if(designerState.pageElements[element]){var pages=designerState.pageElements[element];designerState.pageElements[element].each(function(element,index){if(element.flow==designerState.active.flow&&element.step==designerState.active.step&&(element.substep==designerState.active.substep||designerState.active.substep==0)){reloadCurrentContent();}else{if(element.substep>0){designerState.structure.flows[element.flow].steps[element.step].substeps[element.substep].loaded=0;}else{designerState.structure.flows[element.flow].steps[element.step].loaded=0;}}},this);}else if(typeof gallerySpecial!='undefined'&&gallerySpecial){reloadCurrentContent();}
break;case'setImageSrcOfChoice':if(isElementLoaded(element)){var src='/media/gfx/'+parts[4];var elementId='_imgOf_'+element+'_'+value;if(($(elementId)!=undefined)&&$(elementId).src!=src){$(elementId).src=src;}}else{designerState.pendingChanges.push(parts);}
break;case'addToCart':addToCart();break;case'showDialog':var params=parts[4]!=null?parts[4]:'';showDialog(element,parts[3],params);break;case'spockDialog':var params=parts[4]!=null?parts[4]:'';spockDialog(element,parts[3],params);break;case'continueOrCancel':if(!confirm(parts[2].replace(/2%0A/g,'\n'))){ignoreUpdates=true;}
break;case'eval':eval(parts[2]);break;}
return update;}
function updateZoom(parts){if(ie6){ie6_updateZoom(parts);return;}
var id=parts[1];var id2=id+'_2';if(!$(id)){return;}
if($(id).getStyle('z-index').toInt()<4){var div=$(id);var old=$(id2);}else{var div=$(id2);var old=$(id);}
if(parts[3]!=null&&parts[3].length>2){if($('zoom_text_for_'+parts[1]).innerHTML!=parts[3]){$('zoom_text_for_'+parts[1]).innerHTML=parts[3];$('zoom_text_for_'+parts[1]).setStyle('display','block');}}else{$('zoom_text_for_'+parts[1]).setStyle('display','none');}
div.firstChild.innerHTML='';div.setStyle('z-index',4);var loading=$(div.parentNode.firstChild.nextSibling);loading.setStyle('background','transparent');changeOpac(loading,0);loading.setStyle('z-index',3);var fade=function(){loading.fade('in');}.delay(300);old.setStyle('z-index',1);loadImages(parts[2].split(','),div.firstChild,parts[1].toUpperCase());}
function updateMainView(parts){if(ie6){return ie6_updateMainView(parts);}
var id='mainView_1';var id2='mainView_2';var loading=$('mainView_loading');if($(id).getStyle('z-index').toInt()<5){var div=$(id);var old=$(id2);}else{var div=$(id2);var old=$(id);}
changeOpac(loading,0);loading.setStyle('z-index',3);changeOpac(div,0);div.innerHTML='';div.setStyle('z-index',2);loading.setStyle('background','transparent');var fade=function(){loading.fade('in');}.delay(300);old.setStyle('z-index',1);unconnect('PICS_ARE_DONE_MAINVIEW');connect('PICS_ARE_DONE_MAINVIEW',function(){bugCrusher(div);fadeIn(div,0.2,45,'MAINVIEW');});loadImages(parts[1].split(','),div,'MAINVIEW');}
function bugCrusher(elem){if(ie7||ie8)elem.focus();}
if(!Array.prototype.forEach)
{Array.prototype.forEach=function(fun)
{var len=this.length;if(typeof fun!="function"){throw new TypeError();}
var thisp=arguments[1];for(var i=0;i<len;i++)
{if(i in this)
fun.call(thisp,this[i],i,this);}};}
function page(name,page,div,subproduct){var filter=getFilter(div);var sorting=getSorting(div);div=$(div);loadInnerHTML(div,designerState.callBackUrl+'/fetchContent/'+name+'-'+page+sorting+'-'+subproduct+'-'+filter);if(typeof subproduct!='undefined'){designerState.contrastElements.each(function(element,index){if(designerState.active.flow!=element.flow||designerState.active.step!=element.step||designerState.active.substep!=element.substep){designerState.structure.flows[element.flow].steps[element.step].substeps[element.substep].loaded=0;}
lastZoomPics[element.zoom]=null;},this);}}
function getSorting(name){if($(name+'_frmSearchSort')!=null){var sorting=$(name+'_frmSearchSort').options[$(name+'_frmSearchSort').selectedIndex].value;return sorting>''&&sorting!=0?'.'+sorting:'';}
return'';}
function getFilter(name){var colour=getFilterAttrib(name+'_frmSearchColor');var pattern=getFilterAttrib(name+'_frmSearchPattern');var collection=getCollectionValue(name+'_frmSearchCollection');var output=(colour>''&&colour!=0?'colour='+colour:'');output+=';';output+=(pattern>0?'pattern='+pattern:'');output+=';';output+=(collection>0?'collection='+collection:'');return output;}
function getFilterAttrib(formid){var element=$(formid);var item;if(element!=null){item=element.options[element.selectedIndex];}
return item!=null?item.value:'';}
function getCollectionValue(formid){if(ie6){return getFilterAttrib(formid);}
if(document.forms['daForm'][formid]==null){return 0;}
for(var index=0;index<document.forms['daForm'][formid].length;index++){var isChecked=document.forms['daForm'][formid][index].checked;if(isChecked){return document.forms['daForm'][formid][index].value;}}
return 0;}
function loadImage(src,name,pos){if(!pos)var pos={x:0,y:0,w:0,h:0};var pic=new Image();if(src.charAt(0)!='/')src=designerState.mediaServerName+'/media/gfx/'+src;if(src.substr(src.length-3,3)=='png'){if(pic.id==''){pic.id='ts_random_id_'+Number.random(1,4104004)+'_'+Number.random(1,4104004);}
pic.src=src;}else{pic.src=src;}
pic.style.position='absolute';pic.style.top=pos.y+'px';pic.style.left=pos.x+'px';if(pos.w!=0){pic.style.width=pos.w+'px';}
if(pos.h!=0){pic.style.height=pos.h+'px';}
if(checkIfImageIsLoaded(pic)){--imageLoading[name]['picsToLoad'];}else{pic.onload=function(){--imageLoading[name]['picsToLoad'];if(imageLoading[name]['picsToLoad']==0&&!imageLoading[name]['loadingImages']){doneWithLoadingImages(name);}};}
return pic;}
function imagesBeltAndSuspencer(name){if(imageLoading[name]['allImagesAreLoaded']||imageLoading[name]['loadingImages']){return;}
if(checkReadyImages(name)){doneWithLoadingImages(name);}else{imageLoading[name]['beltAndSuspencer']=setTimeout('imagesBeltAndSuspencer(\''+name+'\')',1500);}}
function doneWithLoadingImages(name){clearTimeout(imageLoading[name]['beltAndSuspencer']);imageLoading[name]['allImagesAreLoaded']=true;imageLoading[name]['loadingImages']=false;imageLoading[name]['picsToLoad']=0;imageLoading[name]['picsTotal']=0;imageLoading[name]['target']='';imageLoading[name]['picsToLoadList'].each(function(imgElement,img,array){imgElement.onload='';imgElement.onerror='';},this);imageLoading[name]['picsToLoadList']=new Array();emit('PICS_ARE_DONE_'+name.toUpperCase());}
function checkIfImageIsLoaded(image){return true;if(image.complete){return true;}else if(typeof image.naturalWidth!='undefined'){if(image.naturalWidth===0){return false;}else if(image.naturalWidth>0){return true;}}
return false;}
function checkReadyImages(name){var pics=imageLoading[name]['picsToLoadList'];var tmpPicsToLoad=pics.length;for(var pic=0;pic<pics.length;++pic){if(checkIfImageIsLoaded(pics[pic])){--tmpPicsToLoad;}else{return false;}}
if(tmpPicsToLoad==0){return true;}else if(tmpPicsToLoad>0){return false;}
return true;}
allowDebug=false;function loadImages(images,target,name){if(typeof imageLoading!='object'){imageLoading=new Array();}
if(typeof imageLoading[name]!='object'){imageLoading[name]=new Array();}
imageLoading[name]=new Array();imageLoading[name]['picsToLoad']=images.length;imageLoading[name]['picsTotal']=images.length;imageLoading[name]['picsToLoadList']=new Array();imageLoading[name]['target']=target;imageLoading[name]['loadingImages']=true;imageLoading[name]['allImagesAreLoaded']=false;images.each(function(imageElement,img,imageArray){var pos={x:0,y:0,w:0,h:0};var src=imageElement;if(imageElement.indexOf('{')>0){src=imageElement.substr(0,imageElement.indexOf('{'));var end=imageElement.substring(imageElement.indexOf('{')+1,imageElement.lastIndexOf('}'));end=end.split(';');if(end.length>0)pos.x=end[0];if(end.length>1)pos.y=end[1];if(end.length>2)pos.w=end[2];if(end.length>3)pos.h=end[3];}
var node=loadImage(src,name,pos);imageLoading[name]['picsToLoadList'].push(node);imageLoading[name]['target'].appendChild(node);},this);imageLoading[name]['loadingImages']=false;if(imageLoading[name]['picsToLoad']==0){doneWithLoadingImages(name);}else{imageLoading[name]['beltAndSuspencer']=setTimeout('imagesBeltAndSuspencer(\''+name+'\')',3000);}}
function startSweep(div,name){fadeIn(div,0.5,45,name);}
function combobox_enable(elem){if(elem==null)return;if(typeof elem=='string'||typeof elem=='number'){elem=$(elem+'_combobox');var id=elem;}else{var id=elem.id.substr(0,elem.id.lastIndexOf('_'));}
var select=elem.firstChild;var cover=select.nextSibling.firstChild;cover.className='combobox_cover';}
function combobox_disable(elem){if(typeOf(elem)=='string'||typeOf(elem)=='number'){elem=$(elem+'_combobox');var id=elem;}else{var id=elem.id.substr(0,elem.id.lastIndexOf('_'));}
var select=elem.firstChild;var cover=select.nextSibling.firstChild;cover.className='combobox_cover_disabled';}
function combobox_dropdown(elem){var id=elem.parentNode.parentNode.id.substr(0,elem.parentNode.parentNode.id.lastIndexOf('_'));elem.onclick=function(e){if($(id+'DropDown').getStyle('display')!='none'||$(elem).hasClass('combobox_cover_disabled'))
combobox_close(elem);else{combobox_open(id,elem);}};if(!$(elem).hasClass('combobox_cover_disabled'))
combobox_open(id,elem);}
function combobox_outsideclick(e){if(e.target==this||$(e.target).hasClass('dropdown'))return;combobox_close(this);}
function combobox_open(id,elem){$(id+'_combobox').setStyle('z-index',99999999);$(id+'DropDown').setStyle('display','block');if(ie6||ie7)$($(id+'_combobox').parentNode.parentNode).setStyle('z-index',99999);if(!elem.retrieve('osClickBind')){var osClickBind=combobox_outsideclick.bind(elem);$(document).addEvent('mousedown',osClickBind);elem.store('osClickBind',osClickBind);}}
function combobox_close(elem){$(document).removeEvent('mousedown',elem.retrieve('osClickBind'));elem.store('osClickBind',false);var id=elem.parentNode.parentNode.id.substr(0,elem.parentNode.parentNode.id.lastIndexOf('_'));$(id+'_combobox').setStyle('z-index','');$(id+'DropDown').setStyle('display','none');if(ie6||ie7)$($(id+'_combobox').parentNode.parentNode).setStyle('z-index','');return true;}
function combobox_movein(elem){if(elem.className.indexOf('selected')>=0)return;if(elem.className.indexOf('disabled')>=0)return;elem.className+=' hover';}
function combobox_moveout(elem){if(elem.className.indexOf('selected')>=0)return;if(elem.className.indexOf('disabled')>=0)return;if(elem.className.indexOf('even')===0){elem.className='even';}else{elem.className='';}}
function combobox_select(elem){if(!elem||elem.className.indexOf('selected')>=0)return;var id=elem.id.substr(0,elem.id.length-1);combobox_set($(id).parentNode.id,$(id).value);setTimeout(function(){elem.parentNode.parentNode.firstChild.blur();},50);var id=elem.parentNode.parentNode.id.substr(0,elem.parentNode.parentNode.id.lastIndexOf('_'));elem.blur();elem.parentNode.blur();elem.parentNode.parentNode.blur();elem.parentNode.parentNode.firstChild.blur();return false;}
function combobox_set(id,value){var elem=$(id);var index=0;try{elem.getChildren().each(function(tmpElem,e,elems){if(!tmpElem.value)return;if(tmpElem.value==value){throw'break';}
++index;},this);}catch(err){}
elem.selectedIndex=index;elem.onchange();}
function combobox_update_selected(elem,onchange){var shownSelected=$(elem.id+'_selected');var dropdown=$(elem.id+'DropDown');var siblings=dropdown.getChildren();var selectedIndex=elem.selectedIndex-0;var selectedElem=document.createElement('SPAN');siblings.each(function(tmpSibling,sibling,siblingsArray){if(!tmpSibling.id)return;tmpSibling.set('class',tmpSibling.hasClass('even')?'even':'');if(sibling==selectedIndex){selectedElem=tmpSibling;tmpSibling.addClass('selected');}},this);shownSelected.innerHTML=selectedElem.innerHTML;onchange.call();}
function updateEmbroidery(textField){var text=textField.value;checkEmbroideryCharacters(textField);update();}
var embroideryDelayer=null;function killEmbroideryDelay(){if(embroideryDelayer!=null)
clearTimeout(embroideryDelayer);}
function delayUpdateEmbroidery(elem){killEmbroideryDelay();embroideryDelayer=setTimeout(function(){updateEmbroidery(elem)},300);}
$(document).addEvent('domready',setupSocialStuff);function setupSocialStuff(){var icons=$$('.socialIcons img');icons.addEvent('mouseenter',socialIconZoom);icons.addEvent('mouseleave',socialIconZoomOut);}
function socialIconZoom(e){e.target.getParent().tween('padding-top',-8);}
function socialIconZoomOut(e){e.target.getParent().tween('padding-top',14);}
function ajaxPopup(url,props){var req=new Request({'url':url,method:'get',async:true,evalResponse:false,encoding:'iso-8859-1',noCache:true,onSuccess:function(responseText,responseXML){doStaticPopup('info',responseText,props);}});req.send();}
function simple_var_dump(arr,level){var dumped_text="";if(!level)level=0;var level_padding="";for(var j=0;j<level+1;j++)level_padding+="    ";if(typeof(arr)=='object'){arr.forEach(function(value,item,arr){if(typeof(value)=='object'){dumped_text+=level_padding+"'"+item+"' ...\n";dumped_text+=dump(value,level+1);}else{dumped_text+=level_padding+"'"+item+"' => \""+value+"\"\n";}});}else{dumped_text="===>"+arr+"<===("+typeof(arr)+")";}
return dumped_text;}
function showModalPopup(url,width,height,left,top,callback){var width=width!=null&&width>0?width:800;var height=height!=null&&height>0?height:600;var left=left!=null&&left>0?left:0;var top=top!=null&&top>0?top:0;popup('modalWidget','',width,height,false,left,top);var contentObject=document.getElementById('modalWidgetContent');if(callback)
loadInnerHTMLCallback(contentObject,url,callback);else
loadInnerHTML(contentObject,url);}
function updateModalPopup(url,width,height,left,top){if(activePopupId=='modalWidget'){if(ie6){killPopup();showModalPopup(url,width,height,left,top);return;}
var popupContent=document.getElementById('modalWidgetContent');loadInnerHTMLCallback(popupContent,url,function(){var popup=document.getElementById('popup_'+activePopupId);popupContent.style.width=width+'px';popupContent.style.height=height+'px';var size=getBrowserSize();var browserWidth=size[0];var browserHeight=size[1];var st=Math.max(document.body.scrollTop,document.documentElement.scrollTop);var sl=Math.max(document.body.scrollLeft,document.documentElement.scrollLeft);var left=left!=null&&left>0?left:browserWidth/2-width/2+sl;var top=top!=null&&top>0?top:browserHeight/2-height/2+st;popup.style.left=left+'px';popup.style.top=top+'px';});}}
var activePopupId=0;function getBrowserSize(){var bodyWidth=document.documentElement.clientWidth;var bodyHeight=document.documentElement.clientHeight;var bodyWidth,bodyHeight;if(self.innerHeight){bodyWidth=self.innerWidth;bodyHeight=self.innerHeight;}else if(document.documentElement&&document.documentElement.clientHeight){bodyWidth=document.documentElement.clientWidth;bodyHeight=document.documentElement.clientHeight;}else if(document.body){bodyWidth=document.body.clientWidth;bodyHeight=document.body.clientHeight;}
return[bodyWidth,bodyHeight];}
function spockPopup(input){$('bodywrapper').addClass('blur');$('topnav').addClass('blur');var spockPopup=new Element('div',{'class':'spockPopup'});spockPopup.addEvent('click',function(tmp){if($(tmp.target).hasClass('spockPopup'))killPopup();});var spockContent=new Element('div',{'class':'spockContent'});spockPopup.grab(spockContent);$(document.body).grab(spockPopup);if(typeof input.url!='undefined'){spockContent.load(input.url);}else if(typeof input.content!='undefined'){spockContent.innerHTML=input.content;}}
function popup(id,html,width,height,closeAction,left,top){activePopupId=id;var closeAction=closeAction!=null&&closeAction?closeAction:function(){killPopup(id);};if(ie6){return ie6_popup(id,html,width,height,closeAction,left,top);}
var popupMaster=document.createElement('div');var h=Math.max(Math.max(Math.max(typeof document.body.clientHeight=='number'?document.body.clientHeight:0,typeof document.documentElement.clientHeight=='number'?document.documentElement.clientHeight:0),Math.max(typeof document.documentElement.scrollHeight=='number'?document.documentElement.scrollHeight:0,typeof document.body.scrollHeight=='number'?document.body.scrollHeight:0)),Math.max(Math.max(typeof document.documentElement.offsetHeight=='number'?document.documentElement.offsetHeight:0,typeof document.body.offsetHeight=='number'?document.body.offsetHeight:0),Math.max(typeof document.documentElement.height=='number'?document.documentElement.height:0,typeof document.body.height=='number'?document.body.height:0)));var w=Math.max(Math.max(Math.max(typeof document.body.clientWidth=='number'?document.body.clientWidth:0,typeof document.documentElement.clientWidth=='number'?document.documentElement.clientWidth:0),Math.max(typeof document.documentElement.scrollWidth=='number'?document.documentElement.scrollWidth:0,typeof document.body.scrollWidth=='number'?document.body.scrollWidth:0)),Math.max(Math.max(typeof document.documentElement.offsetWidth=='number'?document.documentElement.offsetWidth:0,typeof document.body.offsetWidth=='number'?document.body.offsetWidth:0),Math.max(typeof document.documentElement.width=='number'?document.documentElement.width:0,typeof document.body.width=='number'?document.body.width:0)));var size=getBrowserSize();var browserWidth=size[0];var browserHeight=size[1];var st=Math.max(document.body.scrollTop,document.documentElement.scrollTop);var sl=Math.max(document.body.scrollLeft,document.documentElement.scrollLeft);var left=left!=null&&left>0?left:browserWidth/2-width/2+sl;var top=top!=null&&top>0?top:browserHeight/2-height/2+st;popupMaster.style.height=h+'px';popupMaster.style.width=w+"px";popupMaster.className='popupMaster';if(id)popupMaster.id=id;var popupMasterBg=document.createElement('div');popupMasterBg.onclick=closeAction;popupMasterBg.style.width=w+'px';popupMasterBg.style.height=h+'px';popupMasterBg.className='popupMasterBG';popupMasterBg.style.filter='alpha(opacity=50)';var popup=document.createElement('div');var popupContent=document.createElement('div');popup.appendChild(popupContent);if(id)popup.id='popup_'+id;if(html)popupContent.innerHTML=html;if(id)popupContent.id=id+'Content';if(width)popupContent.style.width=width+'px';if(height)popupContent.style.height=height+'px';popup.className='popup';popup.style.left=left+"px";popup.style.top=top+"px";popup.style.marginLeft="0px";popup.style.marginTop="0px";popupMaster.innerHTML=' &nbsp; ';popupMaster.appendChild(popupMasterBg);if(document.documentElement&&document.documentElement.appendchild){document.documentElement.appendChild(popupMaster);document.documentElement.appendChild(popup);}else{document.body.appendChild(popupMaster);document.body.appendChild(popup);}}
function killPopup(id){var id=id!=null?id:activePopupId;$('bodywrapper').removeClass('blur');$('topnav').removeClass('blur');$$('.spockPopup').destroy();try{document.documentElement.removeChild(document.getElementById(id));document.documentElement.removeChild(document.getElementById('popup_'+id));}catch(error){try{document.body.removeChild(document.getElementById(id));document.body.removeChild(document.getElementById('popup_'+id));}catch(error2){}}}
function getPageWidthWithoutScrollBars(){return document.documentElement.clientWidth;}
function getPageHeightWithoutScrollBars(){return document.documentElement.clientHeight;}
function connect(signal,receiver,args){if(typeof signals!='object')signals=[];if(typeof signals[signal]!='object'||!(signals[signal]instanceof Array)){signals[""+signal]=new Array();}
if(!args){var args={};}
signals[""+signal].push([receiver,args]);}
function emit(signal,wait,args){if(typeof signals!='object')signals=[];if(!wait){var wait=0;}
if(!args){var args={};}
if(typeof signals[signal]=='undefined'||signals[signal]==null){return;}
for(var arg in args){alert(arg+': '+args[arg]);}
signals[signal].forEach(function(receiverElement,receiver,receiverArray){var tmpArgs=receiverElement[1];for(var arg in args){if(arg=='length')continue;if(typeof arg!='number'&&typeof arg!='string')continue;tmpArgs[arg]=args[arg];}
for(var arg in args){alert(arg+': '+args[arg]);}
if(receiverArray.length==1){receiverElement[0](tmpArgs);}else{setTimeout(function(){receiverElement[0](tmpArgs);},wait);}});}
function unconnect(signal,receiver){if(typeof signals!='object'){signals=[];}
if(typeof(signals[signal])!='object'&&!(signals[signal]instanceof Array)){return;}
if(!receiver){delete signals[signal];}else{for(var i=0;i<signals[signal].length;++i){if(signals[signal][i]==receiver){signals[signal].splice(signals[signal][i]);}}}}
var TsEvent={addListener:function(elem,event,func){if(event.substr(0,2)=='on')
event=event.substr(2);if(elem.attachEvent){elem['e'+event+func]=func;elem[event+func]=function(){elem['e'+event+func](window.event);}
elem.attachEvent('on'+event,elem[event+func]);}else
elem.addEventListener(event,func,false);},removeListener:function(elem,event,func){if(event.substr(0,2)=='on')
event=event.substr(2);if(elem.detachEvent){elem.detachEvent('on'+event,elem[event+func]);elem[event+func]=null;}else
elem.removeEventListener(event,func,false);}};function findPos(obj){var xy={x:0,y:0};if(obj.offsetParent){do{xy.x+=obj.offsetLeft;xy.y+=obj.offsetTop;}while(obj=obj.offsetParent);}return xy;}
function getWidthHeight(obj){if(obj.naturalHeight&&obj.naturalWidth>0)return{width:obj.naturalWidth,height:obj.naturalHeight};if(obj.width&&obj.width>0)return{width:obj.width,height:obj.height};if(obj.getAttribute&&obj.getAttribute('width')>0)return{width:obj.getAttribute('width'),height:obj.getAttribute('height')};if(obj["width"]&&obj["width"]>0)return{width:obj["width"],height:obj["height"]};return{width:0,height:0};}
function getMouseXY(e){if(!e)var e=window.event;var xy={x:0,y:0};xy.x=e.pageX||e.pageY?e.pageX:e.clientX+(document.documentElement.scrollLeft||document.body.scrollLeft)-(document.documentElement.clientLeft||0);xy.y=e.pageX||e.pageY?e.pageY:e.clientY+(document.documentElement.scrollTop||document.body.scrollTop)-(document.documentElement.clientTop||0);return xy;}
function BackgroundThread(name){this.name=name;this.backgroundStep1=0;this.backgroundStep2=0;this.backgroundInstructions=[];this.tmp=0;this.pause=10;this.length=50;this.enqueue=function(){this.backgroundInstructions[this.backgroundInstructions.length]=arguments;};this.process=function(callback){var time=new Date();time=time.getMilliseconds()+time.getSeconds()*1000+time.getMinutes()*60*1000+time.getHours()*60*60*1000;var btime=new Date();btime=btime.getMilliseconds()+btime.getSeconds()*1000+btime.getMinutes()*60*1000+btime.getHours()*60*60*1000;while(btime-time<this.length&&this.tmp<this.backgroundInstructions.length){var args=[];for(var i=2;i<this.backgroundInstructions[this.tmp].length;++i)args[args.length]=this.backgroundInstructions[this.tmp][i];this.backgroundInstructions[this.tmp][1].apply(this.backgroundInstructions[this.tmp][0],args);this.tmp++;btime=new Date();btime=btime.getMilliseconds()+btime.getSeconds()*1000+btime.getMinutes()*60*1000+btime.getHours()*60*60*1000;}
if(this.tmp>=this.backgroundInstructions.length){emit('BACKGROUND_PROCESSING_IS_DONE_'+name.toUpperCase());return;}else{emit('BACKGROUND_PROCESSING_TICK_'+name.toUpperCase());var tmpObject=this;setTimeout(function(){tmpObject.process();},this.pause);}};this.status=function(){return Math.round(100*this.tmp/this.backgroundInstructions.length);};}
ts_animations={freqs:{}};function initEasing(frequenzy,duration){if(!ts_animations)ts_animations={freqs:{}};if(!ts_animations.freqs)ts_animations.freqs={};if(ts_animations.freqs['a'+frequenzy+'-'+duration])return;var frames=Math.round(duration*frequenzy);var midpoint=(frames/2)+1;var ticks=[];ts_animations.freqs['a'+frequenzy+'-'+duration]=[];ts_animations.freqs['b'+frequenzy+'-'+duration]=[];var totSum=0;for(var i=1;i<=frames;++i){ticks.push(Math.sin(Math.PI*i/midpoint));ts_animations.freqs['a'+frequenzy+'-'+duration].push((i==1?0:ts_animations.freqs['a'+frequenzy+'-'+duration][i-2])+ticks[i-1]);totSum+=ts_animations.freqs['a'+frequenzy+'-'+duration][i-1];}var tmp=0;for(var i=0;i<frames;++i){ts_animations.freqs['a'+frequenzy+'-'+duration][i]=ts_animations.freqs['a'+frequenzy+'-'+duration][i]/totSum;tmp+=ts_animations.freqs['a'+frequenzy+'-'+duration][i];ts_animations.freqs['b'+frequenzy+'-'+duration].push(tmp);}}
function fadeRGBA(node,from,to,duration,freq,name,changeFunc,behaviour){if(!behaviour)
var behaviour=TS_BEHAVIOUR_PULSE;if(!changeFunc)
var changeFunc=setRGBA;if(!freq)
var freq=60;if(!duration)
var duration=0.25;switch(behaviour){case TS_BEHAVIOUR_STRAIGHT:break;case TS_BEHAVIOUR_MIX:break;case TS_BEHAVIOUR_PULSE:default:initEasing(freq,duration);break;}
var framelength=1/freq;var time=duration;var millitime=time*1000.0;var frames=Math.round(time*freq);var milliframelength=millitime/frames;if(from.length){from={'r':from.length>0?from[0]:-1,'g':from.length>1?from[1]:-1,'b':from.length>2?from[2]:-1,'a':from.length>3?from[3]:-1}}else{if(!from.r)
from.r=-1;if(!from.g)
from.g=-1;if(!from.b)
from.b=-1;if(!from.a)
from.a=-1;}
if(to.length){to={'r':to.length>0?to[0]:-1,'g':to.length>1?to[1]:-1,'b':to.length>2?to[2]:-1,'a':to.length>3?to[3]:-1}}else{if(!to.r)
to.r=-1;if(!to.g)
to.g=-1;if(!to.b)
to.b=-1;if(!to.a)
to.a=-1;}
var distance={r:to.r-from.r,g:to.g-from.g,b:to.b-from.b,a:to.a-from.a};var r=0,g=0,b=0,a=0;var oldR=-2;var oldG=-2;var oldB=-2;var oldA=-2;for(var i=0;i<frames;++i){switch(behaviour){case TS_BEHAVIOUR_STRAIGHT:r=Math.round(distance.r*i/frames+from.r);g=Math.round(distance.g*i/frames+from.g);b=Math.round(distance.b*i/frames+from.b);a=Math.round(distance.a*i/frames+from.a);break;case TS_BEHAVIOUR_MIX:break;case TS_BEHAVIOUR_PULSE:default:r=Math.round(distance.r*ts_animations.freqs['b'+freq+'-'+duration][i]+from.r);g=Math.round(distance.g*ts_animations.freqs['b'+freq+'-'+duration][i]+from.g);b=Math.round(distance.b*ts_animations.freqs['b'+freq+'-'+duration][i]+from.b);a=Math.round(distance.a*ts_animations.freqs['b'+freq+'-'+duration][i]+from.a);break;}
if(oldR==r&&oldG==g&&oldB==b&&oldA==a)continue;oldR=r;oldG=g;oldB=b;oldA=a;var f=function temporaryFunction(){var func=createFunction(changeFunc,node,r,g,b,a);var isAtEndFunc=createFunction(isAtEnd,i,frames,name);setTimeout(function(){func();isAtEndFunc();},Math.round(milliframelength*i));};f();}}
var superI=0;function createFunction(){var func=arguments[0];var args=[];for(var i=1;i<arguments.length;++i)args[args.length]=arguments[i];return function createdFunction(){func.apply(window,args);}}
function isAtEnd(i,frames,name){if(i==frames-2)emit('FADE_IS_DONE_'+name.toUpperCase());}
var stupidGeckoFader={};function setRGBA(node,r,g,b,a){if(typeof node!='array'&&!node.length)
node=[node];for(var i=0;i<node.length;++i){if(a>-1){node[i].style.opacity=a/255;node[i].style.MozOpacity=a/255;node[i].style.KhtmlOpacity=a/255;node[i].style.filter="alpha(opacity="+100*a/255+")";}
if(r>-1&&g>-1&&b>-1)
node[i].style.backgroundColor='rgb('+r+','+g+','+b+')';}}
function setBorderRGB(node,r,g,b){if(arguments.length==2&&typeof arguments[1]=='array'){var r=arguments[1].length>=1?arguments[1][0]:255;var g=arguments[1].length>=2?arguments[1][1]:255;var b=arguments[1].length>=3?arguments[1][2]:255;}else if(arguments.length==2&&typeof arguments[1]=='object'){var r=typeof arguments[1].r!='undefined'?arguments[1].r:255;var g=typeof arguments[1].g!='undefined'?arguments[1].g:255;var b=typeof arguments[1].b!='undefined'?arguments[1].b:255;}
if(typeof node!='array'&&!node.length)
node=[node];for(var i=0;i<node.length;++i){node[i].style.border='2px solid rgb('+r+','+g+','+b+')';}}
function setTextRGB(node,r,g,b){if(typeof node!='array'&&!node.length)
node=[node];for(var i=0;i<node.length;++i){node[i].style.color='rgb('+r+','+g+','+b+')';}}
var TS_BEHAVIOUR_PULSE=1;var TS_BEHAVIOUR_STRAIGHT=2;var TS_BEHAVIOUR_MIX=3;function fadeLoop(node,stops,duration,freq,name,func,behaviour){if(!behaviour)
var behaviour=TS_BEHAVIOUR_PULSE;if(!freq)
var freq=45;if(!duration)
var duration=0.3;if(!name)
var name='FADELOOP';if(!func)
var func=setRGBA;var steps=stops.length-1;for(var i=0;i<steps;++i){if(i==0){fadeRGBA(node,stops[i],stops[i+1],duration/steps,freq,name,func,behaviour);}else{var f=function temporaryFunction(){var fadeFunc=createFunction(fadeRGBA,node,stops[i],stops[i+1],duration/steps,freq,name,func,behaviour);setTimeout(function(){fadeFunc();},Math.round(duration/steps*i*1000));};f();}}}
var firstTimeMainview=true;var disableFades=false;function fadeIn(node,duration,freq,name){if(!freq)
var freq=45;if(!duration)
var duration=0.3;if(!name)
var name='FADEIN';if(name=='MAINVIEW'&&firstTimeMainview){firstTimeMainview=false;gaugingFade=new Date().getTime();}
if(disableFades){changeOpac(node,100);emit('FADE_IS_DONE_'+name.toUpperCase());}else{fadeRGBA(node,{a:0},{a:255},duration,freq,name);}}
function changeOpac(obj,opacity){var opVal=opacity/100;obj.style.opacity=opVal;obj.style.MozOpacity=opVal;obj.style.KhtmlOpacity=opVal;obj.style.filter="alpha(opacity="+opacity+")";}
function logError(loggingPage,error,functionName){var parameters="function_name="+functionName;for(var i in error){parameters+="&"+i+"="+escape(error[i]);}
if(parameters.indexOf("message")==-1)parameters+="&message="+escape(error.message);parameters+="&stacktrace="+escape(getStackTrace(error).join('\r\n'));new Request({url:loggingPage,data:parameters,method:'post'}).send();}
function getStackTrace(e){var callstack=[];var isCallstackPopulated=false;if(e.stack){var lines=e.stack.split("\n");for(var i=0,len=lines.length;i<len;i++){callstack.push(lines[i]);}
isCallstackPopulated=true;}
else if(window.opera&&e.message){var lines=e.message.split("\n");for(var i=0,len=lines.length;i<len;i++){var entry=lines[i];if(lines[i+1]){entry+=" at "+lines[i+1];i++;}
callstack.push(entry);}
isCallstackPopulated=true;}
if(!isCallstackPopulated){var currentFunction=arguments.callee.caller;while(currentFunction){var fn=currentFunction.toString();var fname=fn.substring(fn.indexOf("function")+8,fn.indexOf("("))||"anonymous";callstack.push(fname);currentFunction=currentFunction.caller;}}
return callstack;}
function showHideExtendedDescription(cartIndex){var extendImage=document.getElementById('extended_description_img_'+cartIndex);var extendedInfoDiv=document.getElementById('extended_description_'+cartIndex);if(extendedInfoDiv.style.display=='none'){extendedInfoDiv.style.display='block';extendImage.src='/media/gfx/ball_smallquestion_pressed.gif';}else{extendedInfoDiv.style.display='none';extendImage.src='/media/gfx/ball_smallquestion.gif';}}
function doPostSubmit(submitPage,formId){var postString="";var form=document.getElementById(formId);for(var i=0;i<form.elements.length;i++){if(i<form.elements.length&&i>0)postString+='&';var element=form.elements[i];if(element.value==''&&element.required=='required'){alert('Value for \''+element.name+'\' must be set!');return false;}
if(element.type=='checkbox'&&element.checked!=1){}else if(element.type=='radio'&&element.checked!=1){}else{postString+=element.name+'='+escape(element.value);}}
simplePostAjaxCall(submitPage,postString);}
function doSynchronousPostSubmit(submitPage,formId){var postString="";var form=document.getElementById(formId);for(var i=0;i<form.elements.length;i++){if(i<form.elements.length&&i>0)postString+='&';var element=form.elements[i];if(element.value==''&&element.required=='required'){alert('Value for \''+element.name+'\' must be set!');return false;}
if(element.type=='checkbox'&&element.checked!=1){}else if(element.type=='radio'&&element.checked!=1){}else{postString+=element.name+'='+escape(element.value);}}
return simplePostSjaxCall(submitPage,postString);}
function simplePostSjaxCall(page,postString){var xmlhttp=false;try{xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');}catch(E){xmlhttp=false;}}
if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){xmlhttp=new XMLHttpRequest();}
xmlhttp.open('POST',page,false);xmlhttp.setRequestHeader('X_REQUESTED_WITH','XMLHttpRequest');xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");xmlhttp.send(postString);return xmlhttp.responseText;}
function simplePostAjaxCall(page,postString){var xmlhttp=false;try{xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');}catch(E){xmlhttp=false;}}
if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){xmlhttp=new XMLHttpRequest();}
xmlhttp.open('POST',page,true);xmlhttp.setRequestHeader('X_REQUESTED_WITH','XMLHttpRequest');xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==1){}else if(xmlhttp.readyState==4){var content=xmlhttp.responseText;}}
xmlhttp.send(postString)
return;}
function ajaxCall(page){var xmlhttp=false;try{xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');}catch(E){xmlhttp=false;}}
if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){xmlhttp=new XMLHttpRequest();}
xmlhttp.open('GET',page,true);xmlhttp.setRequestHeader('X_REQUESTED_WITH','XMLHttpRequest');xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==1){}else if(xmlhttp.readyState==4){var content=xmlhttp.responseText;eval(content);}}
xmlhttp.send(null)
return;}
function ajaxPost(page,params){var xmlhttp=false;try{xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');}catch(E){xmlhttp=false;}}
if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){xmlhttp=new XMLHttpRequest();}
xmlhttp.open('POST',page);xmlhttp.setRequestHeader('X_REQUESTED_WITH','XMLHttpRequest');xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==1){}else if(xmlhttp.readyState==4){var content=xmlhttp.responseText;eval(content);}}
xmlhttp.send(params);return;}
function loadInnerHTMLWithFormSubmitResult(obj,submitPage,formId){var postString="";var form=document.getElementById(formId);for(var i=0;i<form.elements.length;i++){if(i<form.elements.length&&i>0)postString+='&';var element=form.elements[i];if(element.value==''&&element.required=='required'){alert('Value for \''+element.name+'\' must be set!');return false;}
if(element.type=='checkbox'&&element.checked!=1){}else if(element.type=='radio'&&element.checked!=1){}else{postString+=element.name+'='+escape(element.value);}}
var xmlhttp=false;try{xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');}catch(err){xmlhttp=false;}}
if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){xmlhttp=new XMLHttpRequest();}
xmlhttp.open('POST',submitPage);xmlhttp.setRequestHeader('X_REQUESTED_WITH','XMLHttpRequest');xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==1){}else if(xmlhttp.readyState==4){if(isArray(obj)){for(el in obj){element=obj[el];element.innerHTML=xmlhttp.responseText;}}else obj.innerHTML=xmlhttp.responseText;}}
xmlhttp.send(postString)}
function postCallback(submitPage,formId,callback){var postString="";var form=document.getElementById(formId);for(var i=0;i<form.elements.length;i++){if(i<form.elements.length&&i>0)postString+='&';var element=form.elements[i];if(element.value==''&&element.required=='required'){alert('Value for \''+element.name+'\' must be set!');return false;}
if(element.type=='checkbox'&&element.checked!=1){}else if(element.type=='radio'&&element.checked!=1){}else{postString+=element.name+'='+escape(element.value);}}
var xmlhttp=false;try{xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');}catch(err){xmlhttp=false;}}
if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){xmlhttp=new XMLHttpRequest();}
xmlhttp.open('POST',submitPage);xmlhttp.setRequestHeader('X_REQUESTED_WITH','XMLHttpRequest');xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');xmlhttp.onreadystatechange=function(){xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==1){}else if(xmlhttp.readyState==4){callback(xmlhttp.responseText);}}}
xmlhttp.send(postString)}
function getCallback(submitPage,formId,callback,postString){if(typeof postString=='undefined'){var postString='';var form=document.getElementById(formId);for(var i=0;i<form.elements.length;i++){var element=form.elements[i];if(element.value==''&&element.required=='required'){alert('Value for \''+element.name+'\' must be set!');return false;}
if(element.type=='checkbox'){if(postString.length>0)
postString+='&';if(element.checked)
postString+=element.name+'=1';else
postString+=element.name+'=0';}else if(element.type=='radio'&&element.checked!=1){}else{if(postString.length>0)
postString+='&';postString+=element.name+'='+escape(element.value);}}}
var xmlhttp=false;try{xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');}catch(err){xmlhttp=false;}}
if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){xmlhttp=new XMLHttpRequest();}
xmlhttp.open('GET',submitPage+'?'+postString,true);xmlhttp.setRequestHeader('X_REQUESTED_WITH','XMLHttpRequest');xmlhttp.onreadystatechange=function(){xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==1){}else if(xmlhttp.readyState==4){callback(xmlhttp.responseText);}}}
xmlhttp.send(null)}
function loadInnerHTML(obj,cmd){var xmlhttp=false;try{xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');}catch(err){xmlhttp=false;}}
if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){xmlhttp=new XMLHttpRequest();}
xmlhttp.open('GET',cmd,true);xmlhttp.setRequestHeader('X_REQUESTED_WITH','XMLHttpRequest');xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==1){}else if(xmlhttp.readyState==4){obj.innerHTML=xmlhttp.responseText;}}
xmlhttp.send(null)}
function simpleCallback(cmd,callback){var xmlhttp=false;try{xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');}catch(err){xmlhttp=false;}}
if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){xmlhttp=new XMLHttpRequest();}
xmlhttp.open('GET',cmd,true);xmlhttp.setRequestHeader('X_REQUESTED_WITH','XMLHttpRequest');xmlhttp.onreadystatechange=function(){xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==1){}else if(xmlhttp.readyState==4){callback(xmlhttp.responseText);}}}
xmlhttp.send(null)}
function loadInnerHTMLCallback(obj,cmd,callback,js){var xmlhttp=false;try{xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');}catch(E){xmlhttp=false;}}
if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){xmlhttp=new XMLHttpRequest();}
xmlhttp.open('GET',cmd,true);xmlhttp.setRequestHeader('X_REQUESTED_WITH','XMLHttpRequest');xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==1){}else if(xmlhttp.readyState==4){if(js&&xmlhttp.responseText.lastIndexOf('@@@')>=0){obj.innerHTML=xmlhttp.responseText.substring(xmlhttp.responseText.lastIndexOf('@@@')+3);callback(xmlhttp.responseText);}else{obj.innerHTML=xmlhttp.responseText;callback();}}}
xmlhttp.send(null)}
function sjaxCall(url,request){try{xmlhttp=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');}catch(E){xmlhttp=false;}}
if(!xmlhttp&&typeof XMLHttpRequest!='undefined'){xmlhttp=new XMLHttpRequest();}
var mode=request?"POST":"GET";xmlhttp.open(mode,url,false);if(mode=="POST"){xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');}
xmlhttp.setRequestHeader('X_REQUESTED_WITH','XMLHttpRequest');xmlhttp.send(request);return xmlhttp.responseText;}
function isArray(obj){if(obj instanceof Array)return true;else return false;}