import{M as e}from"./index.75ebab2d.js";import{P as n}from"./index.94fd9752.js";import{A as t,r as a,u as o,Z as r,F as s,G as i,a1 as u,x as d,a7 as l}from"./vendor.ecc5e6ce.js";import"./index.85303d5a.js";import"ant-design-vue";import"./index.0f139360.js";import"./useAttrs.b84cef3f.js";import"./useWindowSizeFn.1b287cdc.js";import"./onMountedOrActivated.6e7c6753.js";import"./useContentViewHeight.a7e7747f.js";var m=t({components:{MarkDown:e,PageWrapper:n},setup(){const e=a(null),n=a("\n# title\n\n# content\n");return{value:n,toggleTheme:function(){const n=o(e);if(!n)return;n.getVditor().setTheme("dark")},markDownRef:e,handleChange:function(e){n.value=e}}}});const c=l(" 黑暗主题 ");m.render=function(e,n,t,a,o,l){const m=r("a-button"),p=r("MarkDown"),f=r("PageWrapper");return s(),i(f,{title:"MarkDown组件示例"},{default:u((()=>[d(m,{onClick:e.toggleTheme,class:"mb-2",type:"primary"},{default:u((()=>[c])),_:1},8,["onClick"]),d(p,{value:e.value,onChange:e.handleChange,ref:"markDownRef"},null,8,["value","onChange"])])),_:1})};export{m as default};