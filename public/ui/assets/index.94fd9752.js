var e=Object.defineProperty,t=Object.defineProperties,o=Object.getOwnPropertyDescriptors,n=Object.getOwnPropertySymbols,r=Object.prototype.hasOwnProperty,s=Object.prototype.propertyIsEnumerable,l=(t,o,n)=>o in t?e(t,o,{enumerable:!0,configurable:!0,writable:!0,value:n}):t[o]=n,a=(e,t)=>{for(var o in t||(t={}))r.call(t,o)&&l(e,o,t[o]);if(n)for(var o of n(t))s.call(t,o)&&l(e,o,t[o]);return e};import{c as i,q as c,ab as u,p as f,w as d}from"./index.85303d5a.js";import{A as g,F as p,G as h,x as m,a3 as v,L as C,r as y,Y as b,u as H,Q as F,j as $,o as w,Z as x,a0 as j,aq as P,ah as O,a1 as S,a5 as R,a7 as _,K as k,a6 as E}from"./vendor.ecc5e6ce.js";import{PageHeader as L}from"ant-design-vue";import{o as W}from"./onMountedOrActivated.6e7c6753.js";import{u as A}from"./useWindowSizeFn.1b287cdc.js";import{a as B}from"./useContentViewHeight.a7e7747f.js";var I=g({name:"PageFooter",inheritAttrs:!1,setup(){const{prefixCls:e}=i("page-footer"),{getCalcContentWidth:t}=c();return{prefixCls:e,getCalcContentWidth:t}}});const q=C()(((e,t,o,n,r,s)=>(p(),h("div",{class:e.prefixCls,style:{width:e.getCalcContentWidth}},[m("div",{class:`${e.prefixCls}__left`},[v(e.$slots,"left",{},void 0,!0)],2),v(e.$slots,"default",{},void 0,!0),m("div",{class:`${e.prefixCls}__right`},[v(e.$slots,"right",{},void 0,!0)],2)],6))));function D(e,t,o,n,r=y(0)){const s=y(null),{footerHeightRef:l}=B();let a={useLayoutFooter:!0};function i(e){return null==e?null:e instanceof HTMLDivElement?e:e.$el}function c(){return c=this,f=null,d=function*(){if(!e.value)return;yield b();const c=i(H(t));if(!c)return;const{bottomIncludeBody:f}=u(c);let d=0;o.forEach((e=>{var t,o;d+=null!=(o=null==(t=i(H(e)))?void 0:t.offsetHeight)?o:0}));let g=0;n.forEach((e=>{g+=function(e){var t,o;let n=0;const r="0px";let s=r,l=r;if(e){const n=getComputedStyle(e);s=null!=(t=null==n?void 0:n.marginBottom)?t:r,l=null!=(o=null==n?void 0:n.marginTop)?o:r}return s&&(n+=Number(s.replace(/[^\d]/g,""))),l&&(n+=Number(l.replace(/[^\d]/g,""))),n}(i(H(e)))}));let p=f-H(l)-H(r)-d-g;const h=()=>{var e;null==(e=a.elements)||e.forEach((e=>{var t,o;p+=null!=(o=null==(t=i(H(e)))?void 0:t.offsetHeight)?o:0}))};a.useLayoutFooter&&H(l),h(),s.value=p},new Promise(((e,t)=>{var o=e=>{try{r(d.next(e))}catch(o){t(o)}},n=e=>{try{r(d.throw(e))}catch(o){t(o)}},r=t=>t.done?e(t.value):Promise.resolve(t.value).then(o,n);r((d=d.apply(c,f)).next())}));var c,f,d}return W((()=>{b((()=>{c()}))})),A((()=>{c()}),50,{immediate:!0}),F((()=>[l.value]),(()=>{c()}),{flush:"post",immediate:!0}),{redoHeight:function(){b((()=>{c()}))},setCompensation:e=>{a=e},contentHeight:s}}I.render=q,I.__scopeId="data-v-4a29b7a0";var M=g({name:"PageWrapper",components:{PageFooter:I,PageHeader:L},inheritAttrs:!1,props:{title:f.string,dense:f.bool,ghost:f.bool,content:f.string,contentStyle:{type:Object},contentBackground:f.bool,contentFullHeight:f.bool,contentClass:f.string,fixedHeight:f.bool},setup(e,{slots:n}){const r=y(null),s=y(null),l=y(null),c=y(null),{prefixCls:u}=i("page-wrapper"),f=$((()=>e.contentFullHeight)),{redoHeight:d,setCompensation:g,contentHeight:p}=D(f,r,[s,c],[l]);g({useLayoutFooter:!0,elements:[c]});const h=$((()=>[u,{[`${u}--dense`]:e.dense}])),m=$((()=>(null==n?void 0:n.leftFooter)||(null==n?void 0:n.rightFooter))),v=$((()=>Object.keys(w(n,"default","leftFooter","rightFooter","headerContent")))),C=$((()=>{const{contentFullHeight:n,contentStyle:r,fixedHeight:s}=e;if(!n)return a({},r);const l=`${H(p)}px`;return a((i=a({},r),t(i,o({minHeight:l}))),s?{height:l}:{});var i})),b=$((()=>{const{contentBackground:t,contentClass:o}=e;return[`${u}-content`,o,{[`${u}-content-bg`]:t}]}));return F((()=>[m.value]),(()=>{d()}),{flush:"post",immediate:!0}),{getContentStyle:C,wrapperRef:r,headerRef:s,contentRef:l,footerRef:c,getClass:h,getHeaderSlots:v,prefixCls:u,getShowFooter:m,omit:w,getContentClass:b}}});M.render=function(e,t,o,n,r,s){const l=x("PageHeader"),a=x("PageFooter");return p(),h("div",{class:e.getClass,ref:"wrapperRef"},[e.content||e.$slots.headerContent||e.title||e.getHeaderSlots.length?(p(),h(l,j({key:0,ghost:e.ghost,title:e.title},e.$attrs,{ref:"headerRef"}),P({default:S((()=>[e.content?(p(),h(R,{key:0},[_(k(e.content),1)],64)):v(e.$slots,"headerContent",{key:1})])),_:2},[O(e.getHeaderSlots,(t=>({name:t,fn:S((o=>[v(e.$slots,t,o)]))})))]),1040,["ghost","title"])):E("",!0),m("div",{class:["overflow-hidden",e.getContentClass],style:e.getContentStyle,ref:"contentRef"},[v(e.$slots,"default")],6),e.getShowFooter?(p(),h(a,{key:1,ref:"footerRef"},{left:S((()=>[v(e.$slots,"leftFooter")])),right:S((()=>[v(e.$slots,"rightFooter")])),_:3},512)):E("",!0)],2)},d(I);const N=d(M);export{N as P};