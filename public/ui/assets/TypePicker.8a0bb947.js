import{D as e,a7 as t,F as s,G as a,a0 as i,H as l,J as n,a9 as r,aq as p,z as o,O as d}from"./vendor.2a694682.js";import{c}from"./index.886fff71.js";var f=e({name:"MenuTypePicker",components:{Tooltip:t},props:{menuTypeList:{type:Array,defualt:()=>[]},handler:{type:Function,default:()=>({})},def:{type:String,default:""}},setup(){const{prefixCls:e}=c("setting-menu-type-picker");return{prefixCls:e}}});const m=d();s("data-v-3bd5c878");const u=o("div",{class:"mix-sidebar"},null,-1);a();const y=m(((e,t,s,a,d,c)=>{const f=i("Tooltip");return l(),n("div",{class:e.prefixCls},[(l(!0),n(r,null,p(e.menuTypeList||[],(t=>(l(),n(f,{key:t.title,title:t.title,placement:"bottom"},{default:m((()=>[o("div",{onClick:s=>e.handler(t),class:[`${e.prefixCls}__item`,`${e.prefixCls}__item--${t.type}`,{[`${e.prefixCls}__item--active`]:e.def===t.type}]},[u],10,["onClick"])])),_:2},1032,["title"])))),128))],2)}));f.render=y,f.__scopeId="data-v-3bd5c878";export{f as default};
