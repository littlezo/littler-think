import{Select as e}from"ant-design-vue";import{c as t}from"./index.85303d5a.js";import{b as s}from"./index.cc5da3a9.js";import{A as a,j as i,Z as n,F as o,G as r,x as l,K as d,a0 as p,L as c}from"./vendor.ecc5e6ce.js";import"./index.45c45527.js";import"./useAttrs.b84cef3f.js";import"./index.1d4c72ce.js";import"./index.7dbec4bd.js";import"./useWindowSizeFn.1b287cdc.js";import"./useContentViewHeight.a7e7747f.js";import"./useSortable.6200a744.js";import"./lock.5b15327c.js";var m=a({name:"SelectItem",components:{Select:e},props:{event:{type:Number},disabled:{type:Boolean},title:{type:String},def:{type:[String,Number]},initValue:{type:[String,Number]},options:{type:Array,default:()=>[]}},setup(e){const{prefixCls:a}=t("setting-select-item");return{prefixCls:a,handleChange:function(t){e.event&&s(e.event,t)},getBindValue:i((()=>e.def?{value:e.def,defaultValue:e.initValue||e.def}:{}))}}});const u=c()(((e,t,s,a,i,c)=>{const m=n("Select");return o(),r("div",{class:e.prefixCls},[l("span",null,d(e.title),1),l(m,p(e.getBindValue,{class:`${e.prefixCls}-select`,onChange:e.handleChange,disabled:e.disabled,size:"small",options:e.options}),null,16,["class","onChange","disabled","options"])],2)}));m.render=u,m.__scopeId="data-v-6707e46b";export{m as default};