import{D as t,r as e,b2 as s,j as a,u as l,z as i,aZ as n,b3 as r}from"./vendor.2a694682.js";import{E as u,k as o,l as T,e as b,c,P as p}from"./index.886fff71.js";var f=t({name:"ErrorPage",props:{status:{type:Number,default:u.PAGE_NOT_FOUND},title:{type:String,default:""},subTitle:{type:String,default:""},full:{type:Boolean,default:!1}},setup(t){const f=e(new Map),{query:x}=s(),d=o(),E=T(),{t:_}=b(),{prefixCls:y}=c("app-exception-page"),O=a((()=>{const{status:e}=x,{status:s}=t;return Number(e)||s})),m=a((()=>l(f).get(l(O)))),N=_("sys.exception.backLogin"),A=_("sys.exception.backHome");return l(f).set(u.PAGE_NOT_ACCESS,{title:"403",status:`${u.PAGE_NOT_ACCESS}`,subTitle:_("sys.exception.subTitle403"),btnText:t.full?N:A,handler:()=>t.full?d(p.BASE_LOGIN):d()}),l(f).set(u.PAGE_NOT_FOUND,{title:"404",status:`${u.PAGE_NOT_FOUND}`,subTitle:_("sys.exception.subTitle404"),btnText:t.full?N:A,handler:()=>t.full?d(p.BASE_LOGIN):d()}),l(f).set(u.ERROR,{title:"500",status:`${u.ERROR}`,subTitle:_("sys.exception.subTitle500"),btnText:A,handler:()=>d()}),l(f).set(u.PAGE_NOT_DATA,{title:_("sys.exception.noDataTitle"),subTitle:"",btnText:_("common.redo"),handler:()=>E(),icon:"/ui/assets/no-data.f7e550cc.svg"}),l(f).set(u.NET_WORK_ERROR,{title:_("sys.exception.networkErrorTitle"),subTitle:_("sys.exception.networkErrorSubTitle"),btnText:_("common.redo"),handler:()=>E(),icon:"/ui/assets/net-error.61b7e6df.svg"}),()=>{const{title:e,subTitle:s,btnText:a,icon:u,handler:o,status:T}=l(m)||{};return i(r,{class:y,status:T,title:t.title||e,"sub-title":t.subTitle||s},{extra:()=>a&&i(n,{type:"primary",onClick:o},{default:()=>a}),icon:()=>u?i("img",{src:u},null):null})}}});export{f as default};
