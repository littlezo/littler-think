var e=(e,r,a)=>new Promise(((o,t)=>{var s=e=>{try{n(a.next(e))}catch(r){t(r)}},i=e=>{try{n(a.throw(e))}catch(r){t(r)}},n=e=>e.done?o(e.value):Promise.resolve(e.value).then(s,i);n((a=a.apply(e,r)).next())}));import{g as r,h as a}from"./useForm.9f758c80.js";import{B as o,a as t}from"./index.8bc7383a.js";import{ae as s}from"./index.886fff71.js";import i from"./PersonTable.23297e59.js";import{D as n,bV as l,r as d,j as u,u as m,a0 as c,H as p,J as f,a4 as v,z as j,aa as b,a3 as x}from"./vendor.2a694682.js";/* empty css              *//* empty css              *//* empty css              *//* empty css              *//* empty css              *//* empty css              *//* empty css              *//* empty css              *//* empty css              */import"./index.159369ef.js";import"./useAttrs.c83a264c.js";import"./index.6f230b74.js";import"./useWindowSizeFn.ba9c561c.js";/* empty css              */import"./index.08924b52.js";import"./download.24e74597.js";import"./index.52577703.js";/* empty css              */import"./TableImg.e17cc06a.js";import"./onMountedOrActivated.1cc20755.js";import"./useSortable.a0d70131.js";/* empty css              */import"./useTable.a77db7eb.js";var g=n({name:"FormDrawer",components:{BasicDrawer:o,BasicForm:r,PersonTable:i,[l.name]:l},emits:["success","register"],setup(r,{emit:o}){const i=d("操作"),n=d(0),l=d({method:"",api:""}),c=d(!1),p=d(!0),f=d([]),v=d([]),j=d(""),b=d(null),[x,{resetFields:g,setProps:h,validate:w}]=a({labelWidth:100,baseColProps:{xxl:6,xl:8,lg:12,md:24},showActionButtonGroup:!1}),[R,{setDrawerProps:D,closeDrawer:F}]=t((r=>e(this,null,(function*(){var e,a,o,t,s;const d=null!=(e=null==r?void 0:r.props)?e:{};g(),h(d);const u=null!=(o=null==(a=null==r?void 0:r.props)?void 0:a.record)?o:{};d.schemas||(p.value=!1),d.columns&&(f.value=d.columns,v.value=(null==u?void 0:u[d.field])||[],c.value=!0,j.value=d.field,D({width:800})),D({confirmLoading:!1}),n.value=null==r?void 0:r.pk,l.value=null==(t=null==r?void 0:r.props)?void 0:t.api,i.value=null==(s=null==r?void 0:r.props)?void 0:s.title}))));return{registerDrawer:R,registerForm:x,getTitle:u((()=>m(i))),tableRef:b,columnsRef:f,dataSourceRef:v,tableOpenRef:c,formOpenRef:p,handleSubmit:function(){return e(this,null,(function*(){try{let e=[];b.value&&(e=b.value.getDataSource().map((function(e){return m(e.editValueRefs)})));const r=yield w(),a=Object.assign(r||{},{[m(j)]:e});D({confirmLoading:!0}),s(l.value.method,l.value.api+"/"+n.value,a).then((e=>{F(),o("success")}))}finally{D({confirmLoading:!1})}}))}}}});g.render=function(e,r,a,o,t,s){const i=c("BasicForm"),n=c("a-card"),l=c("PersonTable"),d=c("BasicDrawer");return p(),f(d,x(e.$attrs,{onRegister:e.registerDrawer,showFooter:"",title:e.getTitle,width:"500px",onOk:e.handleSubmit}),{default:v((()=>[e.formOpenRef?(p(),f(n,{key:0,bordered:!1,class:"!mt-5"},{default:v((()=>[j(i,{onRegister:e.registerForm},null,8,["onRegister"])])),_:1})):b("",!0),e.tableOpenRef?(p(),f(n,{key:1,bordered:!1},{default:v((()=>[j(l,{columns:e.columnsRef,dataSource:e.dataSourceRef,ref:"tableRef"},null,8,["columns","dataSource"])])),_:1})):b("",!0)])),_:1},16,["onRegister","title","onOk"])};export{g as default};
