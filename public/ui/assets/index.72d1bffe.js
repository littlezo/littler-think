import{_ as e}from"./TableImg.e17cc06a.js";import{_ as o}from"./useForm.9f758c80.js";import{u as t}from"./useTable.a77db7eb.js";import{b as i}from"./index.7b0adf1e.js";import{u as n}from"./index.6f230b74.js";import{_ as a,c as s,s as r}from"./DeptModal.0297a1e2.js";import{aS as d}from"./index.886fff71.js";import{D as l,a0 as c,H as m,J as p,z as u,a4 as f,ab as b}from"./vendor.2a694682.js";/* empty css              *//* empty css              *//* empty css              *//* empty css              *//* empty css              */import"./useWindowSizeFn.ba9c561c.js";import"./onMountedOrActivated.1cc20755.js";/* empty css              */import"./useSortable.a0d70131.js";/* empty css              *//* empty css              *//* empty css              */import"./index.159369ef.js";import"./useAttrs.c83a264c.js";import"./index.08924b52.js";import"./download.24e74597.js";import"./index.52577703.js";var j=l({name:"DeptManagement",components:{BasicTable:e,DeptModal:a,TableAction:o},setup(){const[e,{openModal:o}]=n(),[a,{reload:l}]=t({title:"部门列表",api:i,columns:s,formConfig:{labelWidth:120,schemas:r},pagination:!1,striped:!1,useSearchForm:!0,showTableSetting:!0,bordered:!0,showIndexColumn:!1,canResize:!1,searchInfo:{order:"asc"},actionColumn:{width:80,title:"操作",dataIndex:"action",slots:{customRender:"action"},fixed:"right"}});function c(){l()}return{registerTable:a,registerModal:e,handleCreate:function(){o(!0,{isUpdate:!1})},handleEdit:function(e){o(!0,{record:e,isUpdate:!0})},handleDelete:function(e){d("/user/dept",e.id).then((()=>{c()}))},handleSuccess:c}}});const x=b(" 新增部门 ");j.render=function(e,o,t,i,n,a){const s=c("a-button"),r=c("TableAction"),d=c("BasicTable"),l=c("DeptModal");return m(),p("div",null,[u(d,{onRegister:e.registerTable},{toolbar:f((()=>[u(s,{type:"primary",onClick:e.handleCreate},{default:f((()=>[x])),_:1},8,["onClick"])])),action:f((({record:o})=>[u(r,{actions:[{icon:"clarity:note-edit-line",onClick:e.handleEdit.bind(null,o)},{icon:"ant-design:delete-outlined",color:"error",popConfirm:{title:"是否确认删除",confirm:e.handleDelete.bind(null,o)}}]},null,8,["actions"])])),_:1},8,["onRegister"]),u(l,{onRegister:e.registerModal,onSuccess:e.handleSuccess},null,8,["onRegister","onSuccess"])])};export{j as default};