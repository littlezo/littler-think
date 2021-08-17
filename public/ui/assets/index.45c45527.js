var e=Object.defineProperty,t=Object.defineProperties,o=Object.getOwnPropertyDescriptors,s=Object.getOwnPropertySymbols,a=Object.prototype.hasOwnProperty,l=Object.prototype.propertyIsEnumerable,r=(t,o,s)=>o in t?e(t,o,{enumerable:!0,configurable:!0,writable:!0,value:s}):t[o]=s,n=(e,t)=>{for(var o in t||(t={}))a.call(t,o)&&r(e,o,t[o]);if(s)for(var o of s(t))l.call(t,o)&&r(e,o,t[o]);return e},i=(e,s)=>t(e,o(s));import{e as c,c as u,am as p,p as d,S as f,ax as g,ai as w,j as h,ay as y,aw as v,w as m}from"./index.85303d5a.js";import{Drawer as b}from"ant-design-vue";import{A as C,j as k,Z as D,F as x,G as B,a5 as $,a3 as O,a0 as P,a1 as S,a7 as j,K as F,a6 as T,b8 as _,x as H,r as L,Q as V,u as A,t as N,Y as E,aa as I,ap as M,aq as q,H as G,ah as K,N as Q,aF as R,a9 as Y,af as Z}from"./vendor.ecc5e6ce.js";import{u as z}from"./useAttrs.b84cef3f.js";const{t:J}=c(),U={confirmLoading:{type:Boolean},showCancelBtn:{type:Boolean,default:!0},cancelButtonProps:Object,cancelText:{type:String,default:J("common.cancelText")},showOkBtn:{type:Boolean,default:!0},okButtonProps:Object,okText:{type:String,default:J("common.okText")},okType:{type:String,default:"primary"},showFooter:{type:Boolean},footerHeight:{type:[String,Number],default:60}},W=n({isDetail:{type:Boolean},title:{type:String,default:""},loadingText:{type:String},showDetailBack:{type:Boolean,default:!0},visible:{type:Boolean},loading:{type:Boolean},maskClosable:{type:Boolean,default:!0},getContainer:{type:[Object,String]},closeFunc:{type:[Function,Object],default:null},destroyOnClose:{type:Boolean}},U);var X=C({name:"BasicDrawerFooter",props:i(n({},U),{height:{type:String,default:"60px"}}),emits:["ok","close"],setup(e,{emit:t}){const{prefixCls:o}=u("basic-drawer-footer");return{handleOk:function(){t("ok")},prefixCls:o,handleClose:function(){t("close")},getStyle:k((()=>{const t=`${e.height}`;return{height:t,lineHeight:t}}))}}});X.render=function(e,t,o,s,a,l){const r=D("a-button");return e.showFooter||e.$slots.footer?(x(),B("div",{key:0,class:e.prefixCls,style:e.getStyle},[e.$slots.footer?O(e.$slots,"footer",{key:1}):(x(),B($,{key:0},[O(e.$slots,"insertFooter"),e.showCancelBtn?(x(),B(r,P({key:0},e.cancelButtonProps,{onClick:e.handleClose,class:"mr-2"}),{default:S((()=>[j(F(e.cancelText),1)])),_:1},16,["onClick"])):T("",!0),O(e.$slots,"centerFooter"),e.showOkBtn?(x(),B(r,P({key:1,type:e.okType,onClick:e.handleOk},e.okButtonProps,{class:"mr-2",loading:e.confirmLoading}),{default:S((()=>[j(F(e.okText),1)])),_:1},16,["type","onClick","loading"])):T("",!0),O(e.$slots,"appendFooter")],64))],6)):T("",!0)};var ee=C({name:"BasicDrawerHeader",components:{BasicTitle:p,ArrowLeftOutlined:_},props:{isDetail:d.bool,showDetailBack:d.bool,title:d.string},emits:["close"],setup(e,{emit:t}){const{prefixCls:o}=u("basic-drawer-header");return{prefixCls:o,handleClose:function(){t("close")}}}});const te={key:1};ee.render=function(e,t,o,s,a,l){const r=D("BasicTitle"),n=D("ArrowLeftOutlined");return e.isDetail?(x(),B("div",{key:1,class:[e.prefixCls,`${e.prefixCls}--detail`]},[H("span",{class:`${e.prefixCls}__twrap`},[e.showDetailBack?(x(),B("span",{key:0,onClick:t[1]||(t[1]=(...t)=>e.handleClose&&e.handleClose(...t))},[H(n,{class:`${e.prefixCls}__back`},null,8,["class"])])):T("",!0),e.title?(x(),B("span",te,F(e.title),1)):T("",!0)],2),H("span",{class:`${e.prefixCls}__toolbar`},[O(e.$slots,"titleToolbar")],2)],2)):(x(),B(r,{key:0,class:e.prefixCls},{default:S((()=>[O(e.$slots,"title"),j(" "+F(e.$slots.title?"":e.title),1)])),_:3},8,["class"]))};var oe=C({components:{Drawer:b,ScrollContainer:f,DrawerFooter:X,DrawerHeader:ee},inheritAttrs:!1,props:W,emits:["visible-change","ok","close","register"],setup(e,{emit:t}){const o=L(!1),s=z(),a=L(null),{t:l}=c(),{prefixVar:r,prefixCls:p}=u("basic-drawer"),d={setDrawerProps:function(e){a.value=g(A(a)||{},e),Reflect.has(e,"visible")&&(o.value=!!e.visible)},emitVisible:void 0},f=I();f&&t("register",d,f.uid);const y=k((()=>g(N(e),A(a)))),v=k((()=>{const e=i(n(n({placement:"right"},A(s)),A(y)),{visible:A(o)});e.title=void 0;const{isDetail:t,width:a,wrapClassName:l,getContainer:c}=e;if(t){a||(e.width="100%");const t=`${p}__detail`;e.wrapClassName=l?`${l} ${t}`:t,c||(e.getContainer=`.${r}-layout-content`)}return e})),m=k((()=>n(n({},s),A(v)))),b=k((()=>{const{footerHeight:e,showFooter:t}=A(v);return t&&e?w(e)?`${e}px`:`${e.replace("px","")}px`:"0px"})),C=k((()=>({position:"relative",height:`calc(100% - ${A(b)})`}))),D=k((()=>{var e;return!!(null==(e=A(v))?void 0:e.loading)}));return V((()=>e.visible),((e,t)=>{e!==t&&(o.value=e)}),{deep:!0}),V((()=>o.value),(e=>{E((()=>{var o;t("visible-change",e),f&&(null==(o=d.emitVisible)||o.call(d,e,f.uid))}))})),{onClose:function(e){return s=this,a=null,l=function*(){const{closeFunc:s}=A(v);if(t("close",e),s&&h(s)){const e=yield s();o.value=!e}else o.value=!1},new Promise(((t,o)=>{var r=t=>{try{i(l.next(t))}catch(e){o(e)}},n=t=>{try{i(l.throw(t))}catch(e){o(e)}},i=e=>e.done?t(e.value):Promise.resolve(e.value).then(r,n);i((l=l.apply(s,a)).next())}));var s,a,l},t:l,prefixCls:p,getMergeProps:y,getScrollContentStyle:C,getProps:v,getLoading:D,getBindValues:m,getFooterHeight:b,handleOk:function(){t("ok")}}}});oe.render=function(e,t,o,s,a,l){const r=D("DrawerHeader"),n=D("ScrollContainer"),i=D("DrawerFooter"),c=D("Drawer"),u=M("loading");return x(),B(c,P({class:e.prefixCls,onClose:e.onClose},e.getBindValues),q({default:S((()=>[G(H(n,{style:e.getScrollContentStyle,"loading-tip":e.loadingText||e.t("common.loadingText")},{default:S((()=>[O(e.$slots,"default")])),_:3},8,["style","loading-tip"]),[[u,e.getLoading]]),H(i,P(e.getProps,{onClose:e.onClose,onOk:e.handleOk,height:e.getFooterHeight}),q({_:2},[K(Object.keys(e.$slots),(t=>({name:t,fn:S((o=>[O(e.$slots,t,o)]))})))]),1040,["onClose","onOk","height"])])),_:2},[e.$slots.title?{name:"title",fn:S((()=>[O(e.$slots,"title")]))}:{name:"title",fn:S((()=>[H(r,{title:e.getMergeProps.title,isDetail:e.isDetail,showDetailBack:e.showDetailBack,onClose:e.onClose},{titleToolbar:S((()=>[O(e.$slots,"titleToolbar")])),_:3},8,["title","isDetail","showDetailBack","onClose"])]))}]),1040,["class","onClose"])};const se=Q({}),ae=Q({});function le(){if(!I())throw new Error("useDrawer() can only be used inside setup() or functional components!");const e=L(null),t=L(!1),o=L("");const s=()=>{const t=A(e);return t||v("useDrawer instance is undefined!"),t};return[function(s,a){Y((()=>{e.value=null,t.value=null,se[A(o)]=null})),A(t)&&y()&&s===A(e)||(o.value=a,e.value=s,t.value=!0,s.emitVisible=(e,t)=>{ae[t]=e})},{setDrawerProps:e=>{var t;null==(t=s())||t.setDrawerProps(e)},getVisible:k((()=>ae[~~A(o)])),openDrawer:(e=!0,t,a=!0)=>{var l;if(null==(l=s())||l.setDrawerProps({visible:e}),!t)return;if(a)return se[A(o)]=null,void(se[A(o)]=N(t));R(N(se[A(o)]),N(t))||(se[A(o)]=N(t))},closeDrawer:()=>{var e;null==(e=s())||e.setDrawerProps({visible:!1})}}]}const re=e=>{const t=L(null),o=I(),s=L("");if(!I())throw new Error("useDrawerInner() can only be used inside setup() or functional components!");const a=()=>{const e=A(t);if(e)return e;v("useDrawerInner instance is undefined!")};return Z((()=>{const t=se[A(s)];t&&e&&h(e)&&E((()=>{e(t)}))})),[(e,a)=>{Y((()=>{t.value=null})),s.value=a,t.value=e,null==o||o.emit("register",e,a)},{changeLoading:(e=!0)=>{var t;null==(t=a())||t.setDrawerProps({loading:e})},changeOkLoading:(e=!0)=>{var t;null==(t=a())||t.setDrawerProps({confirmLoading:e})},getVisible:k((()=>ae[~~A(s)])),closeDrawer:()=>{var e;null==(e=a())||e.setDrawerProps({visible:!1})},setDrawerProps:e=>{var t;null==(t=a())||t.setDrawerProps(e)}}]},ne=m(oe);export{ne as B,re as a,le as u};