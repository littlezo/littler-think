import{F as e,O as t,aU as o,c as s,X as r}from"./index.85303d5a.js";import{BackTop as i}from"ant-design-vue";import{c as a,u as n}from"./index.1d4c72ce.js";import m from"./SessionTimeoutLogin.c924912f.js";import{A as g,j as p,u as c,Z as d,F as u,G as j,x as f,a6 as l,a5 as T}from"./vendor.ecc5e6ce.js";import"./index.7dbec4bd.js";import"./useWindowSizeFn.1b287cdc.js";import"./useContentViewHeight.a7e7747f.js";import"./useSortable.6200a744.js";import"./lock.5b15327c.js";import"./Login.0d3ba8d1.js";import"./LoginForm.46b24191.js";import"./LoginFormTitle.0a17200a.js";import"./ForgetPasswordForm.bf041aba.js";import"./index.c389a080.js";import"./RegisterForm.05f72155.js";import"./index.241dae1f.js";import"./MobileForm.99e94adf.js";import"./QrCodeForm.5b497ac9.js";import"./download.8120b7a2.js";var S=g({name:"LayoutFeatures",components:{BackTop:i,LayoutLockPage:a((()=>e((()=>import("./index.8893ad8a.js")),["/ui/assets/index.8893ad8a.js","/ui/assets/LockPage.cd37f79d.js","/ui/assets/LockPage.c1bb266d.css","/ui/assets/index.85303d5a.js","/ui/assets/index.c117b7f0.css","/ui/assets/vendor.ecc5e6ce.js","/ui/assets/lock.5b15327c.js","/ui/assets/header.d801b988.js"]))),SettingDrawer:a((()=>e((()=>import("./index.cc5da3a9.js").then((function(e){return e.i}))),["/ui/assets/index.cc5da3a9.js","/ui/assets/index.45c45527.js","/ui/assets/index.426e9c0c.css","/ui/assets/index.85303d5a.js","/ui/assets/index.c117b7f0.css","/ui/assets/vendor.ecc5e6ce.js","/ui/assets/useAttrs.b84cef3f.js","/ui/assets/index.1d4c72ce.js","/ui/assets/index.4d47d275.css","/ui/assets/index.7dbec4bd.js","/ui/assets/index.dbf4f91f.css","/ui/assets/useWindowSizeFn.1b287cdc.js","/ui/assets/useContentViewHeight.a7e7747f.js","/ui/assets/useSortable.6200a744.js","/ui/assets/lock.5b15327c.js"]))),SessionTimeoutLogin:m},setup(){const{getUseOpenBackTop:e,getShowSettingButton:i,getSettingButtonPosition:a,getFullContent:m}=t(),g=o(),{prefixCls:d}=s("setting-drawer-fearure"),{getShowHeader:u}=n(),j=p((()=>g.getSessionTimeout));return{getTarget:()=>document.body,getUseOpenBackTop:e,getIsFixedSettingDrawer:p((()=>{if(!c(i))return!1;const e=c(a);return e===r.AUTO?!c(u)||c(m):e===r.FIXED})),prefixCls:d,getIsSessionTimeout:j}}});S.render=function(e,t,o,s,r,i){const a=d("LayoutLockPage"),n=d("BackTop"),m=d("SettingDrawer"),g=d("SessionTimeoutLogin");return u(),j(T,null,[f(a),e.getUseOpenBackTop?(u(),j(n,{key:0,target:e.getTarget},null,8,["target"])):l("",!0),e.getIsFixedSettingDrawer?(u(),j(m,{key:1,class:e.prefixCls},null,8,["class"])):l("",!0),e.getIsSessionTimeout?(u(),j(g,{key:2})):l("",!0)],64)};export{S as default};