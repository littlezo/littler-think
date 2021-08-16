import{_ as e}from"./TableImg.dcd306f8.js";import{_ as a}from"./useForm.137eb3b0.js";import{u as o}from"./useTable.a2da2945.js";import{g as t}from"./index.4fb81140.js";import{u as s}from"./index.45c45527.js";import{_ as n,c as r,s as i}from"./AccessDrawer.13cb6807.js";import{Dropdown as c,Menu as d,MenuItem as l}from"ant-design-vue";import{ae as u}from"./index.85303d5a.js";import{A as m,B as p,D as f,Z as b,F as g,G as h,x as j,a5 as w,ah as _,an as x,a7 as C,K as v,L as D}from"./vendor.ecc5e6ce.js";import"./useWindowSizeFn.1b287cdc.js";import"./index.0f139360.js";import"./useAttrs.b84cef3f.js";import"./onMountedOrActivated.6e7c6753.js";import"./useSortable.6200a744.js";import"./index.c389a080.js";import"./index.5c4cad53.js";import"./download.8120b7a2.js";import"./index.241dae1f.js";var k=m({name:"AccessManagement",components:{BasicTable:e,AccessDrawer:n,TableAction:a,Dropdown:c,Menu:d,MenuItem:l},setup(){const[e,{openDrawer:a}]=s(),[n,{reload:c}]=o({title:"菜单列表",api:t,columns:r,formConfig:{labelWidth:120,schemas:i},pagination:!1,searchInfo:{order:"ascend"},striped:!1,useSearchForm:!0,showTableSetting:!0,bordered:!0,showIndexColumn:!1,canResize:!1,actionColumn:{width:80,title:"操作",dataIndex:"action",slots:{customRender:"action"},fixed:void 0}});function d(){c()}return{registerTable:n,registerDrawer:e,handleCreate:function(){a(!0,{isUpdate:!1})},handleEdit:function(e){a(!0,{record:e,isUpdate:!0})},handleDelete:function(e){u("delete","/user/access/"+e.id).then((e=>{d()}))},handleSuccess:d}}});const y=D();p("data-v-4c09d311");const A=C(" 新增菜单 "),T=C(" 修改 "),S=C(" 删除 ");f();const I=y(((e,a,o,t,s,n)=>{const r=b("a-button"),i=b("MenuItem"),c=b("Menu"),d=b("Dropdown"),l=b("TableAction"),u=b("BasicTable"),m=b("AccessDrawer");return g(),h("div",null,[j(u,{onRegister:e.registerTable},{toolbar:y((()=>[j(r,{type:"primary",onClick:e.handleCreate},{default:y((()=>[A])),_:1},8,["onClick"])])),button:y((({record:o})=>[(g(!0),h(w,null,_(o.action,(o=>(g(),h("div",{class:"dropdown-wrap",key:o.id},[j(d,{trigger:["click"]},{overlay:y((()=>[j(c,null,{default:y((()=>[j(i,{key:"update"},{default:y((()=>[j(r,{type:"primary",size:"small",onClick:a=>e.handleEdit(o)},{default:y((()=>[T])),_:2},1032,["onClick"])])),_:2},1024),j(i,{key:"delete"},{default:y((()=>[j(r,{size:"small",color:"error"},{default:y((()=>[S])),_:1})])),_:1})])),_:2},1024)])),default:y((()=>[j(r,{color:"success",size:"small",onClick:a[1]||(a[1]=x((()=>{}),["prevent"]))},{default:y((()=>[C(v(o.title),1)])),_:2},1024)])),_:2},1024)])))),128))])),action:y((({record:a})=>[j(l,{actions:[{icon:"clarity:note-edit-line",onClick:e.handleEdit.bind(null,a)},{icon:"ant-design:delete-outlined",color:"error",popConfirm:{title:"是否确认删除",confirm:e.handleDelete.bind(null,a)}}]},null,8,["actions"])])),_:1},8,["onRegister"]),j(m,{onRegister:e.registerDrawer,onSuccess:e.handleSuccess},null,8,["onRegister","onSuccess"])])}));k.render=I,k.__scopeId="data-v-4c09d311";export{k as default};
