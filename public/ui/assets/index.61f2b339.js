import{D as a,bH as s,bg as e,aX as l,aW as t,j as o,F as n,G as i,a0 as r,H as c,J as p,z as d,a9 as f,aq as m,ab as u,N as _,aj as x,O as b}from"./vendor.2a694682.js";/* empty css              *//* empty css              *//* empty css              */import{aB as j,_ as v,f as C}from"./index.886fff71.js";import $ from"./Article.ae59b079.js";import g from"./Application.b7b88c11.js";import T from"./Project.ff5e819e.js";import{h}from"./header.d801b988.js";import{tags as k,teams as y,details as P,achieveList as A}from"./data.d74a1788.js";/* empty css              *//* empty css              */var I=a({components:{CollapseContainer:j,Icon:v,Tag:s,Tabs:e,TabPane:e.TabPane,Article:$,Application:g,Project:T,[l.name]:l,[t.name]:t},setup(){const a=C();return{prefixCls:"account-center",avatar:o((()=>a.getUserInfo.avatar||h)),tags:k,teams:y,details:P,achieveList:A}}});const w=b();n("data-v-261e4e89");const E=d("span",null,"Vben",-1),H=d("div",null,"海纳百川，有容乃大",-1);i();const L=w(((a,s,e,l,t,o)=>{const n=r("a-col"),i=r("Icon"),b=r("a-row"),j=r("Tag"),v=r("CollapseContainer"),C=r("TabPane"),$=r("Tabs");return c(),p("div",{class:a.prefixCls},[d(b,{class:`${a.prefixCls}-top`},{default:w((()=>[d(n,{span:9,class:`${a.prefixCls}-col`},{default:w((()=>[d(b,null,{default:w((()=>[d(n,{span:8},{default:w((()=>[d("div",{class:`${a.prefixCls}-top__avatar`},[d("img",{width:"70",src:a.avatar},null,8,["src"]),E,H],2)])),_:1}),d(n,{span:16},{default:w((()=>[d("div",{class:`${a.prefixCls}-top__detail`},[(c(!0),p(f,null,m(a.details,(a=>(c(),p("p",{key:a.title},[d(i,{icon:a.icon},null,8,["icon"]),u(" "+_(a.title),1)])))),128))],2)])),_:1})])),_:1})])),_:1},8,["class"]),d(n,{span:7,class:`${a.prefixCls}-col`},{default:w((()=>[d(v,{title:"标签",canExpan:!1},{default:w((()=>[(c(!0),p(f,null,m(a.tags,(a=>(c(),p(j,{key:a,class:"mb-2"},{default:w((()=>[u(_(a),1)])),_:2},1024)))),128))])),_:1})])),_:1},8,["class"]),d(n,{span:8,class:`${a.prefixCls}-col`},{default:w((()=>[d(v,{class:`${a.prefixCls}-top__team`,title:"团队",canExpan:!1},{default:w((()=>[(c(!0),p(f,null,m(a.teams,((s,e)=>(c(),p("div",{key:e,class:`${a.prefixCls}-top__team-item`},[d(i,{icon:s.icon,color:s.color},null,8,["icon","color"]),d("span",null,_(s.title),1)],2)))),128))])),_:1},8,["class"])])),_:1},8,["class"])])),_:1},8,["class"]),d("div",{class:`${a.prefixCls}-bottom`},[d($,null,{default:w((()=>[(c(!0),p(f,null,m(a.achieveList,(a=>(c(),p(C,{key:a.key,tab:a.name},{default:w((()=>[(c(),p(x(a.component)))])),_:2},1032,["tab"])))),128))])),_:1})],2)],2)}));I.render=L,I.__scopeId="data-v-261e4e89";export{I as default};