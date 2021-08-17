import{F as e,p as o,c as t,f as a,e as s,o as r}from"./index.886fff71.js";import{D as n,az as i,aA as l,j as c,a0 as d,H as p,J as m,z as u,a4 as f,aa as g,N as k,a9 as x}from"./vendor.2a694682.js";import{D as _}from"./siteSetting.1f2027b3.js";import{c as h,u as j}from"./index.07c08648.js";import{u as D}from"./index.6f230b74.js";import{h as b}from"./header.d801b988.js";import"./index.75d328df.js";import"./useWindowSizeFn.ba9c561c.js";import"./useContentViewHeight.12ec88be.js";/* empty css              *//* empty css              */import"./useSortable.a0d70131.js";import"./lock.60619af9.js";import"./useAttrs.c83a264c.js";var w=n({name:"UserDropdown",components:{Dropdown:i,Menu:l,MenuItem:h((()=>e((()=>import("./DropMenuItem.a7d3cbda.js")),["/ui/assets/DropMenuItem.a7d3cbda.js","/ui/assets/vendor.2a694682.js","/ui/assets/vendor.b209a6e1.css","/ui/assets/index.886fff71.js","/ui/assets/index.c117b7f0.css"]))),MenuDivider:l.Divider,LockAction:h((()=>e((()=>import("./LockModal.b7b0c5d9.js")),["/ui/assets/LockModal.b7b0c5d9.js","/ui/assets/LockModal.baf8edb0.css","/ui/assets/index.55beae45.css","/ui/assets/index.1800f0a6.css","/ui/assets/index.64a2f3d8.css","/ui/assets/index.e0bc003a.css","/ui/assets/index.85577cc2.css","/ui/assets/index.0840187f.css","/ui/assets/index.5224a97a.css","/ui/assets/index.4c61959e.css","/ui/assets/index.886fff71.js","/ui/assets/index.c117b7f0.css","/ui/assets/vendor.2a694682.js","/ui/assets/vendor.b209a6e1.css","/ui/assets/index.6f230b74.js","/ui/assets/index.a400d262.css","/ui/assets/useAttrs.c83a264c.js","/ui/assets/useWindowSizeFn.ba9c561c.js","/ui/assets/useForm.9f758c80.js","/ui/assets/useForm.77f07f54.css","/ui/assets/index.159369ef.js","/ui/assets/index.37b2c5cd.css","/ui/assets/index.08924b52.js","/ui/assets/download.24e74597.js","/ui/assets/index.52577703.js","/ui/assets/index.f6030fea.css","/ui/assets/lock.60619af9.js","/ui/assets/header.d801b988.js"])))},props:{theme:o.oneOf(["dark","light"])},setup(){const{prefixCls:e}=t("header-user-dropdown"),{t:o}=s(),{getShowDoc:n,getUseLockPage:i}=j(),l=a(),d=c((()=>{const{real_name:e="",avatar:o,desc:t}=l.getUserInfo||{};return{real_name:e,avatar:o||b,desc:t}})),[p,{openModal:m}]=D();return{prefixCls:e,t:o,getUserInfo:d,handleMenuClick:function(e){switch(e.key){case"logout":l.confirmLoginOut();break;case"doc":r(_);break;case"lock":m(!0)}},getShowDoc:n,register:p,getUseLockPage:i}}});w.render=function(e,o,t,a,s,r){const n=d("MenuItem"),i=d("MenuDivider"),l=d("Menu"),c=d("Dropdown"),_=d("LockAction");return p(),m(x,null,[u(c,{placement:"bottomLeft",overlayClassName:`${e.prefixCls}-dropdown-overlay`},{overlay:f((()=>[u(l,{onClick:e.handleMenuClick},{default:f((()=>[e.getShowDoc?(p(),m(n,{key:"doc",text:e.t("layout.header.dropdownItemDoc"),icon:"ion:document-text-outline"},null,8,["text"])):g("",!0),e.getShowDoc?(p(),m(i,{key:1})):g("",!0),e.getUseLockPage?(p(),m(n,{key:"lock",text:e.t("layout.header.tooltipLock"),icon:"ion:lock-closed-outline"},null,8,["text"])):g("",!0),u(n,{key:"logout",text:e.t("layout.header.dropdownItemLoginOut"),icon:"ion:power-outline"},null,8,["text"])])),_:1},8,["onClick"])])),default:f((()=>[u("span",{class:[[e.prefixCls,`${e.prefixCls}--${e.theme}`],"flex"]},[u("img",{class:`${e.prefixCls}__header`,src:e.getUserInfo.avatar},null,10,["src"]),u("span",{class:`${e.prefixCls}__info hidden md:block`},[u("span",{class:[`${e.prefixCls}__name  `,"truncate"]},k(e.getUserInfo.real_name),3)],2)],2)])),_:1},8,["overlayClassName"]),u(_,{onRegister:e.register},null,8,["onRegister"])],64)};export{w as default};