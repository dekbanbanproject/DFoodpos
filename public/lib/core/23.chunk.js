/** Notice * This file contains works from many authors under various (but compatible) licenses. Please see core.txt for more information. **/
(function(){(window.wpCoreControlsBundle=window.wpCoreControlsBundle||[]).push([[23],{448:function(Aa,ua,r){r.r(ua);var pa=r(1),ka=r(13),ma=r(2);Aa=r(52);var ha=r(32),da=r(10);r=function(){function aa(){this.init()}aa.prototype.init=function(){this.j5=!1;this.jf=this.Zk=this.connection=null;this.Cr={};this.ja=this.NE=null};aa.prototype.Oka=function(x){for(var y=this,f=0;f<x.length;++f){var b=x[f];switch(b.at){case "create":this.Cr[b.author]||(this.Cr[b.author]=b.aName);this.Oba(b);break;case "modify":this.ja.xl(b.xfdf).then(function(a){y.ja.kb(a[0])});
break;case "delete":this.ja.xl("<delete><id>"+b.aId+"</id></delete>")}}};aa.prototype.Oba=function(x){var y=this;this.ja.xl(x.xfdf).then(function(f){f=f[0];f.authorId=x.author;y.ja.kb(f);y.ja.trigger(ka.a.UPDATE_ANNOTATION_PERMISSION,[f])})};aa.prototype.oba=function(x,y,f){this.Zk&&this.Zk(x,y,f)};aa.prototype.preloadAnnotations=function(x){this.addEventListener("webViewerServerAnnotationsEnabled",this.oba.bind(this,x,"add",{imported:!1}),{once:!0})};aa.prototype.initiateCollaboration=function(x,
y,f){var b=this;if(x){b.jf=y;b.ja=f.pa();f.addEventListener(ka.c.DOCUMENT_UNLOADED,function(){b.disableCollaboration()});b.nla(x);var a=new XMLHttpRequest;a.addEventListener("load",function(){if(200===a.status&&0<a.responseText.length)try{var e=JSON.parse(a.responseText);b.connection=exports.Ta.Sla(Object(ha.j)(b.jf,"blackbox/"),"annot");b.NE=e.id;b.Cr[e.id]=e.user_name;b.ja.DL(e.id);b.connection.Yoa(function(h){h.t&&h.t.startsWith("a_")&&h.data&&b.Oka(h.data)},function(){b.connection.send({t:"a_retrieve",
dId:x});b.trigger(aa.Events.WEBVIEWER_SERVER_ANNOTATIONS_ENABLED,[b.Cr[e.id],b.NE])},function(){b.disableCollaboration()})}catch(h){Object(ma.g)(h.message)}});a.open("GET",Object(ha.j)(this.jf,"demo/SessionInfo.jsp"));a.withCredentials=!0;a.send();b.j5=!0;b.ja.FX(function(e){return b.Cr[e.Author]||e.Author})}else Object(ma.g)("Document ID required for collaboration")};aa.prototype.disableCollaboration=function(){this.Zk&&(this.ja.removeEventListener(da.a.Events.ANNOTATION_CHANGED,this.Zk),this.Zk=
null);this.connection&&this.connection.qp();this.ja&&this.ja.DL("Guest");this.init();this.trigger(aa.Events.WEBVIEWER_SERVER_ANNOTATIONS_DISABLED)};aa.prototype.nla=function(x){var y=this;this.Zk&&this.ja.removeEventListener(da.a.Events.ANNOTATION_CHANGED,this.Zk);this.Zk=function(f,b,a){return Object(pa.b)(this,void 0,void 0,function(){var e,h,n,z,w,ea,ja,ca,ba;return Object(pa.d)(this,function(fa){switch(fa.label){case 0:if(a.imported)return[2];e={t:"a_"+b,dId:x,annots:[]};return[4,y.ja.RH()];case 1:h=
fa.ea();"delete"!==b&&(n=(new DOMParser).parseFromString(h,"text/xml"),z=new XMLSerializer);for(w=0;w<f.length;w++)ea=f[w],ca=ja=void 0,"add"===b?(ja=n.querySelector('[name="'+ea.Id+'"]'),ca=z.serializeToString(ja),ba=null,ea.InReplyTo&&(ba=y.ja.Uf(ea.InReplyTo).authorId||"default"),e.annots.push({at:"create",aId:ea.Id,author:y.NE,aName:y.Cr[y.NE],parent:ba,xfdf:"<add>"+ca+"</add>"})):"modify"===b?(ja=n.querySelector('[name="'+ea.Id+'"]'),ca=z.serializeToString(ja),e.annots.push({at:"modify",aId:ea.Id,
xfdf:"<modify>"+ca+"</modify>"})):"delete"===b&&e.annots.push({at:"delete",aId:ea.Id});0<e.annots.length&&y.connection.send(e);return[2]}})})}.bind(y);this.ja.addEventListener(da.a.Events.ANNOTATION_CHANGED,this.Zk)};aa.Events={WEBVIEWER_SERVER_ANNOTATIONS_ENABLED:"webViewerServerAnnotationsEnabled",WEBVIEWER_SERVER_ANNOTATIONS_DISABLED:"webViewerServerAnnotationsDisabled"};return aa}();Object(Aa.a)(r);ua["default"]=r}}]);}).call(this || window)
