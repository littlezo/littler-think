import{c as e}from"./index.886fff71.js";import{b as i}from"./index.9b620194.js";import{D as s,bu as t,a0 as r,H as n,J as o,a9 as a,aq as p,z as c}from"./vendor.2a694682.js";import"./index.8bc7383a.js";/* empty css              */import"./useAttrs.c83a264c.js";/* empty css              */import"./index.07c08648.js";import"./index.75d328df.js";import"./useWindowSizeFn.ba9c561c.js";import"./useContentViewHeight.12ec88be.js";/* empty css              */import"./useSortable.a0d70131.js";import"./lock.60619af9.js";var d=s({name:"ThemeColorPicker",components:{CheckOutlined:t},props:{colorList:{type:Array,defualt:[]},event:{type:Number},def:{type:String}},setup(s){const{prefixCls:t}=e("setting-theme-picker");return{prefixCls:t,handleClick:function(e){s.event&&i(s.event,e)}}}});d.render=function(e,i,s,t,d,l){const m=r("CheckOutlined");return n(),o("div",{class:e.prefixCls},[(n(!0),o(a,null,p(e.colorList||[],(i=>(n(),o("span",{key:i,onClick:s=>e.handleClick(i),class:[`${e.prefixCls}__item`,{[`${e.prefixCls}__item--active`]:e.def===i}],style:{background:i}},[c(m)],14,["onClick"])))),128))],2)};export{d as default};
