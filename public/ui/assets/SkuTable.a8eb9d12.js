var e=(e,t,n)=>new Promise(((a,i)=>{var o=e=>{try{s(n.next(e))}catch(t){i(t)}},l=e=>{try{s(n.throw(e))}catch(t){i(t)}},s=e=>e.done?a(e.value):Promise.resolve(e.value).then(o,l);s((n=n.apply(e,t)).next())}));import{_ as t}from"./TableImg.e17cc06a.js";import{_ as n}from"./useForm.9f758c80.js";import{u as a}from"./useTable.a77db7eb.js";import{j as i,r as o}from"./index.886fff71.js";import{D as l,r as s,T as r,u as d,_ as c,a0 as u,H as m,J as p,z as f,a4 as b,ab as j}from"./vendor.2a694682.js";/* empty css              *//* empty css              *//* empty css              *//* empty css              *//* empty css              */import"./useWindowSizeFn.ba9c561c.js";import"./index.6f230b74.js";import"./useAttrs.c83a264c.js";import"./onMountedOrActivated.1cc20755.js";/* empty css              */import"./useSortable.a0d70131.js";/* empty css              *//* empty css              *//* empty css              */import"./index.159369ef.js";import"./index.08924b52.js";import"./download.24e74597.js";import"./index.52577703.js";var h=l({components:{BasicTable:t,TableAction:n},props:{columns:{type:[Array],default:()=>[]},dataSource:{type:Array,default:null},api:{type:Function,default:null},apiColumns:{type:Function,default:null}},setup(t){const n=s({editable:!0,isNew:!0}),l=s(),u=s();r((()=>t),(e=>{const{columns:n,apiColumns:a,api:i,dataSource:o}=t;!a&&n&&(u.value=n),!i&&o&&(l.value=o),y()}),{immediate:!0,deep:!0}),r((()=>t.api),(e=>{const{columns:n,apiColumns:a,api:i,dataSource:o}=t;!a&&n&&(u.value=n),!i&&o&&(l.value=o),y()}),{immediate:!0,deep:!0}),r((()=>t.apiColumns),(()=>e(this,null,(function*(){var e;const{apiColumns:a}=t;try{if(a&&i(a)){let t={};const i=yield a(t);(null!=(e=null==i?void 0:i.columns)?e:[]).map((function(e){Object.assign(d(n),{[e.dataIndex]:""})})),b(i)}}catch(o){}}))),{immediate:!0,deep:!0});const[m,{getDataSource:p,setTableData:f,setProps:b,setColumns:j,getColumns:h}]=a({showIndexColumn:!1,actionColumn:{width:160,title:"操作",dataIndex:"action",slots:{customRender:"action"}},autoCreateKey:!0,pagination:!1});function x(e){var t;null==(t=e.onEdit)||t.call(e,!0)}function C(e){var t;if(null==(t=e.onEdit)||t.call(e,!1),e.isNew){const t=p(),n=t.findIndex((t=>t.key===e.key));t.splice(n,1)}}function v(e){var t;null==(t=e.onEdit)||t.call(e,!1,!0)}function y(){return e(this,null,(function*(){const{api:e}=t;try{if(e&&i(e)){let t={};yield e(t)}}catch(n){}}))}return c((()=>{o((()=>{y()}),16)})),{registerTable:m,dataRef:l,columnRef:u,handleEdit:x,createActions:function(e,t){return e.editable?[{label:"保存",onClick:v.bind(null,e,t)},{label:"取消",popConfirm:{title:"是否取消编辑",confirm:C.bind(null,e,t)}}]:[{label:"编辑",onClick:x.bind(null,e)},{label:"删除"}]},handleAdd:function(){p().push(d(n))},getDataSource:p,setTableData:f,setProps:b,setColumns:j,handleEditChange:function(e){}}}});const x=j(" 新增规格 ");h.render=function(e,t,n,a,i,o){const l=u("a-button"),s=u("TableAction"),r=u("BasicTable");return m(),p("div",null,[f(l,{block:"",class:"mt-5",type:"dashed",onClick:e.handleAdd},{default:b((()=>[x])),_:1},8,["onClick"]),f(r,{onRegister:e.registerTable,onEditChange:e.handleEditChange},{action:b((({record:t,column:n})=>[f(s,{actions:e.createActions(t,n)},null,8,["actions"])])),_:1},8,["onRegister","onEditChange"])])};export{h as default};
