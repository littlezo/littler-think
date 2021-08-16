var e=Object.defineProperty,t=Object.getOwnPropertySymbols,a=Object.prototype.hasOwnProperty,o=Object.prototype.propertyIsEnumerable,r=(t,a,o)=>a in t?e(t,a,{enumerable:!0,configurable:!0,writable:!0,value:o}):t[a]=o,n=(e,t,a)=>new Promise(((o,r)=>{var n=e=>{try{s(a.next(e))}catch(t){r(t)}},l=e=>{try{s(a.throw(e))}catch(t){r(t)}},s=e=>e.done?o(e.value):Promise.resolve(e.value).then(n,l);s((a=a.apply(e,t)).next())}));import{B as l,b as s}from"./index.6f230b74.js";import{g as i,h as d}from"./useForm.9f758c80.js";import{ah as u,bH as c,D as p,r as m,u as f,j as b,a0 as v,H as g,J as h,a4 as y,z as x,a3 as P}from"./vendor.2a694682.js";/* empty css              */import{aN as j,aO as I}from"./index.886fff71.js";import{b as w}from"./index.7b0adf1e.js";const O=[{title:"ID",dataIndex:"id",width:80,sorter:!0,align:"left"},{title:"部门名称",dataIndex:"name",width:160,align:"left"},{title:"排序",dataIndex:"sort",sorter:!0,width:60},{title:"状态",dataIndex:"status",width:80,customRender:({record:e})=>{const t=1==~~e.status,a=t?"启用":"停用";return u(c,{color:t?"green":"red"},(()=>a))}},{title:"创建时间",dataIndex:"create_time",width:180},{title:"备注",dataIndex:"remark"}],F=[{field:"like_name",label:"部门名称",component:"Input",colProps:{span:8}},{field:"status",label:"状态",component:"Select",componentProps:{options:[{label:"启用",value:1},{label:"停用",value:0}]},colProps:{span:8}}],M=[{field:"name",label:"部门名称",component:"Input",required:!0},{field:"parent",label:"上级部门",component:"TreeSelect",componentProps:{replaceFields:{title:"name",key:"id",value:"id"},getPopupContainer:()=>document.body},required:!1},{field:"sort",label:"排序",component:"InputNumber",required:!0},{field:"status",label:"状态",component:"RadioButtonGroup",defaultValue:1,componentProps:{options:[{label:"启用",value:1},{label:"停用",value:0}]},required:!0},{label:"备注",field:"remark",component:"InputTextArea"}];var S=p({name:"DeptModal",components:{BasicModal:l,BasicForm:i},emits:["success","register"],setup(e,{emit:l}){const i=m(!0),u=m(0),[c,{resetFields:p,setFieldsValue:v,updateSchema:g,validate:h}]=d({labelWidth:100,schemas:M,showActionButtonGroup:!1}),[y,{setModalProps:x,closeModal:P}]=s((e=>n(this,null,(function*(){var n;p(),x({confirmLoading:!1}),i.value=!!(null==e?void 0:e.isUpdate),u.value=null==(n=null==e?void 0:e.record)?void 0:n.id,f(i)&&v(((e,n)=>{for(var l in n||(n={}))a.call(n,l)&&r(e,l,n[l]);if(t)for(var l of t(n))o.call(n,l)&&r(e,l,n[l]);return e})({},e.record));const l=yield w();g({field:"parent",componentProps:{treeData:l}})}))));return{registerModal:y,registerForm:c,getTitle:b((()=>f(i)?"编辑部门":"新增部门")),handleSubmit:function(){return n(this,null,(function*(){try{const e=yield h();x({confirmLoading:!0}),f(i)?j("/user/dept",u.value,e).then((e=>{P(),l("success")})):I("/user/dept",e).then((e=>{P(),l("success")}))}finally{x({confirmLoading:!1})}}))}}}});S.render=function(e,t,a,o,r,n){const l=v("BasicForm"),s=v("BasicModal");return g(),h(s,P(e.$attrs,{onRegister:e.registerModal,title:e.getTitle,onOk:e.handleSubmit}),{default:y((()=>[x(l,{onRegister:e.registerForm},null,8,["onRegister"])])),_:1},16,["onRegister","title","onOk"])};var _=Object.freeze({__proto__:null,[Symbol.toStringTag]:"Module",default:S});export{_ as D,S as _,O as c,F as s};
