import{Button as a,Upload as e,Row as s,Col as t}from"ant-design-vue";import{g as o,h as r}from"./useForm.137eb3b0.js";import{aB as n,_ as i,f as c,aM as d,h as l}from"./index.85303d5a.js";import{h as m}from"./header.d801b988.js";import{b as u}from"./data.fc2bcdb5.js";import{A as p,X as f,j as h,B as v,D as b,Z as j,F as g,G as x,x as _,L as w,a7 as B}from"./vendor.ecc5e6ce.js";import"./index.c389a080.js";import"./useAttrs.b84cef3f.js";import"./index.0f139360.js";import"./useWindowSizeFn.1b287cdc.js";import"./index.5c4cad53.js";import"./download.8120b7a2.js";import"./index.241dae1f.js";var y=p({components:{BasicForm:o,CollapseContainer:n,Button:a,Upload:e,Icon:i,[s.name]:s,[t.name]:t},setup(){const{createMessage:a}=l(),e=c(),[s,{setFieldsValue:t}]=r({labelWidth:120,schemas:u,showActionButtonGroup:!1});f((()=>{return a=this,e=null,s=function*(){const a=yield d();t(a)},new Promise(((t,o)=>{var r=a=>{try{i(s.next(a))}catch(e){o(e)}},n=a=>{try{i(s.throw(a))}catch(e){o(e)}},i=a=>a.done?t(a.value):Promise.resolve(a.value).then(r,n);i((s=s.apply(a,e)).next())}));var a,e,s}));return{avatar:h((()=>{const{avatar:a}=e.getUserInfo;return a||m})),register:s,handleSubmit:()=>{a.success("更新成功！")}}}});const C=w();v("data-v-3eae3553");const F={class:"change-avatar"},I=_("div",{class:"mb-2"}," 头像 ",-1),U=B("更换头像 "),A=B(" 更新基本信息 ");b();const S=C(((a,e,s,t,o,r)=>{const n=j("BasicForm"),i=j("a-col"),c=j("Icon"),d=j("Button"),l=j("Upload"),m=j("a-row"),u=j("CollapseContainer");return g(),x(u,{title:"基本设置",canExpan:!1},{default:C((()=>[_(m,{gutter:24},{default:C((()=>[_(i,{span:14},{default:C((()=>[_(n,{onRegister:a.register},null,8,["onRegister"])])),_:1}),_(i,{span:10},{default:C((()=>[_("div",F,[I,_("img",{width:"140",src:a.avatar},null,8,["src"]),_(l,{showUploadList:!1},{default:C((()=>[_(d,{class:"ml-5"},{default:C((()=>[_(c,{icon:"feather:upload"}),U])),_:1})])),_:1})])])),_:1})])),_:1}),_(d,{type:"primary",onClick:a.handleSubmit},{default:C((()=>[A])),_:1},8,["onClick"])])),_:1})}));y.render=S,y.__scopeId="data-v-3eae3553";export{y as default};
