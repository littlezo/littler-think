import{x as e}from"./index.85303d5a.js";import{u as t}from"./useWindowSizeFn.1b287cdc.js";import{r as n,j as i,u as o}from"./vendor.ecc5e6ce.js";const r=Symbol();const a=n(0),s=n(0);function c(){return{headerHeightRef:a,footerHeightRef:s,setHeaderHeight:function(e){a.value=e},setFooterHeight:function(e){s.value=e}}}function u(){const c=n(window.innerHeight),u=n(window.innerHeight),h=i((()=>o(c)-o(a)-o(s)||0));t((()=>{c.value=window.innerHeight}),100,{immediate:!0}),e({contentHeight:h,setPageHeight:function(e){return t=this,n=null,i=function*(){u.value=e},new Promise(((e,o)=>{var r=e=>{try{s(i.next(e))}catch(t){o(t)}},a=e=>{try{s(i.throw(e))}catch(t){o(t)}},s=t=>t.done?e(t.value):Promise.resolve(t.value).then(r,a);s((i=i.apply(t,n)).next())}));var t,n,i},pageHeight:u},r,{native:!0})}export{c as a,u};
