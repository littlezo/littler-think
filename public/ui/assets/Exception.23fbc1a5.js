import{Button as t,Result as e}from"ant-design-vue";import{E as s,k as l,l as a,e as i,c as n,P as r}from"./index.85303d5a.js";import{A as u,r as o,aG as c,j as T,u as p,x as b}from"./vendor.ecc5e6ce.js";var d=u({name:"ErrorPage",props:{status:{type:Number,default:s.PAGE_NOT_FOUND},title:{type:String,default:""},subTitle:{type:String,default:""},full:{type:Boolean,default:!1}},setup(u){const d=o(new Map),{query:x}=c(),E=l(),f=a(),{t:m}=i(),{prefixCls:_}=n("app-exception-page"),y=T((()=>{const{status:t}=x,{status:e}=u;return Number(t)||e})),O=T((()=>p(d).get(p(y)))),N=m("sys.exception.backLogin"),A=m("sys.exception.backHome");return p(d).set(s.PAGE_NOT_ACCESS,{title:"403",status:`${s.PAGE_NOT_ACCESS}`,subTitle:m("sys.exception.subTitle403"),btnText:u.full?N:A,handler:()=>u.full?E(r.BASE_LOGIN):E()}),p(d).set(s.PAGE_NOT_FOUND,{title:"404",status:`${s.PAGE_NOT_FOUND}`,subTitle:m("sys.exception.subTitle404"),btnText:u.full?N:A,handler:()=>u.full?E(r.BASE_LOGIN):E()}),p(d).set(s.ERROR,{title:"500",status:`${s.ERROR}`,subTitle:m("sys.exception.subTitle500"),btnText:A,handler:()=>E()}),p(d).set(s.PAGE_NOT_DATA,{title:m("sys.exception.noDataTitle"),subTitle:"",btnText:m("common.redo"),handler:()=>f(),icon:"/ui/assets/no-data.f7e550cc.svg"}),p(d).set(s.NET_WORK_ERROR,{title:m("sys.exception.networkErrorTitle"),subTitle:m("sys.exception.networkErrorSubTitle"),btnText:m("common.redo"),handler:()=>f(),icon:"/ui/assets/net-error.61b7e6df.svg"}),()=>{const{title:s,subTitle:l,btnText:a,icon:i,handler:n,status:r}=p(O)||{};return b(e,{class:_,status:r,title:u.title||s,"sub-title":u.subTitle||l},{extra:()=>a&&b(t,{type:"primary",onClick:n},{default:()=>a}),icon:()=>i?b("img",{src:i},null):null})}}});export{d as default};
