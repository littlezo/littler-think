import{Layout as e}from"ant-design-vue";import{O as t,c as o,u as a,o as s,e as r}from"./index.85303d5a.js";import{D as n,G as l,S as i}from"./siteSetting.ff999d0a.js";import{A as u,a as d,r as f,j as c,u as p,B as m,D as v,Z as g,F,G as _,x as w,K as C,a6 as L,L as h}from"./vendor.ecc5e6ce.js";import{a as R}from"./useContentViewHeight.a7e7747f.js";import"./useWindowSizeFn.1b287cdc.js";var S=u({name:"LayoutFooter",components:{Footer:e.Footer},setup(){const{t:e}=r(),{getShowFooter:u}=t(),{currentRoute:m}=d(),{prefixCls:v}=o("layout-footer"),g=a(),F=f(null),{setFooterHeight:_}=R();return{getShowLayoutFooter:c((()=>{var e,t;if(p(u)){const t=null==(e=p(F))?void 0:e.$el;_((null==t?void 0:t.offsetHeight)||0)}else _(0);return p(u)&&!(null==(t=p(m).meta)?void 0:t.hiddenFooter)})),prefixCls:v,t:e,DOC_URL:n,GITHUB_URL:l,SITE_URL:i,openWindow:s,footerRef:F,currentYear:()=>{const e=(new Date).getFullYear();if(e>2021)return"-"+e},title:c((()=>{var e;return null!=(e=null==g?void 0:g.title)?e:""}))}}});const x=h();m("data-v-748898d3");const y=w("span",null," 技术支持 || ",-1),U=w("span",null," By ",-1);v();const j=x(((e,t,o,a,s,r)=>{const n=g("Footer");return e.getShowLayoutFooter?(F(),_(n,{key:0,class:e.prefixCls,ref:"footerRef"},{default:x((()=>[w("div",{class:`${e.prefixCls}__links`},[y,w("a",{onClick:t[1]||(t[1]=t=>e.openWindow(e.SITE_URL)),target:"_blank"},"翌宸志信"),U,w("a",{onClick:t[2]||(t[2]=t=>e.openWindow(e.GITHUB_URL)),target:"_blank"},"@小小只^v^")],2),w("div",null,"Copyright © 2021"+C(e.currentYear())+" "+C(e.title)+" 版权所有 ",1)])),_:1},8,["class"])):L("",!0)}));S.render=j,S.__scopeId="data-v-748898d3";export{S as default};