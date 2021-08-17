import{I as e,c as t,Y as a,f as s,U as o,e as n,b6 as r,a6 as l,a$ as c,b0 as i,h as d}from"./index.85303d5a.js";import{A as u,bk as g,aQ as f,u as p,Z as C,F as y,G as m,x as S,a7 as k,K as b,L as h}from"./vendor.ecc5e6ce.js";import"ant-design-vue";var x=u({name:"SettingFooter",components:{CopyOutlined:g,RedoOutlined:f},setup(){const u=e(),{prefixCls:g}=t("setting-footer"),{t:f}=n(),{createSuccessModal:C,createMessage:y}=d(),m=a(),S=s(),k=o();return{prefixCls:g,t:f,handleCopy:function(){const{isSuccessRef:e}=r(JSON.stringify(p(k.getProjectConfig),null,2));p(e)&&C({title:f("layout.setting.operatingTitle"),content:f("layout.setting.operatingContent")})},handleResetSetting:function(){try{k.setProjectConfig(l);const{colorWeak:e,grayMode:t}=l;c(e),i(t),y.success(f("layout.setting.resetSuccess"))}catch(e){y.error(e)}},handleClearAndRedo:function(){localStorage.clear(),k.resetAllState(),u.resetState(),m.resetState(),S.resetState(),location.reload()}}}});const R=h(),v=R(((e,t,a,s,o,n)=>{const r=C("CopyOutlined"),l=C("a-button"),c=C("RedoOutlined");return y(),m("div",{class:e.prefixCls},[S(l,{type:"primary",block:"",onClick:e.handleCopy},{default:R((()=>[S(r,{class:"mr-2"}),k(" "+b(e.t("layout.setting.copyBtn")),1)])),_:1},8,["onClick"]),S(l,{color:"warning",block:"",onClick:e.handleResetSetting,class:"my-3"},{default:R((()=>[S(c,{class:"mr-2"}),k(" "+b(e.t("common.resetText")),1)])),_:1},8,["onClick"]),S(l,{color:"error",block:"",onClick:e.handleClearAndRedo},{default:R((()=>[S(c,{class:"mr-2"}),k(" "+b(e.t("layout.setting.clearBtn")),1)])),_:1},8,["onClick"])],2)}));x.render=v,x.__scopeId="data-v-ecdbf216";export{x as default};