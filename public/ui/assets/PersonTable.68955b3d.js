var e=(e,t,a)=>new Promise(((n,o)=>{var i=e=>{try{s(a.next(e))}catch(t){o(t)}},l=e=>{try{s(a.throw(e))}catch(t){o(t)}},s=e=>e.done?n(e.value):Promise.resolve(e.value).then(i,l);s((a=a.apply(e,t)).next())}));import{_ as t}from"./TableImg.dcd306f8.js";import{_ as a}from"./useForm.137eb3b0.js";import{u as n}from"./useTable.a2da2945.js";import{r as o,j as i}from"./index.85303d5a.js";import{A as l,r as s,u as c,Q as r,X as u,Z as d,F as m,G as p,x as f,a1 as b,a7 as h}from"./vendor.ecc5e6ce.js";import"ant-design-vue";import"./useWindowSizeFn.1b287cdc.js";import"./index.0f139360.js";import"./useAttrs.b84cef3f.js";import"./onMountedOrActivated.6e7c6753.js";import"./useSortable.6200a744.js";import"./index.c389a080.js";import"./index.5c4cad53.js";import"./download.8120b7a2.js";import"./index.241dae1f.js";var C=l({components:{BasicTable:t,TableAction:a},props:{columns:{type:[Array],default:()=>[]},dataSource:{type:Array,default:null},api:{type:Function,default:null},apiColumns:{type:Function,default:null}},setup(t){const a=s({editable:!0,isNew:!0}),l=s(),d=s();t.columns.map((function(e){Object.assign(c(a),{[e.dataIndex]:""})})),r((()=>t),(e=>{const{columns:a,apiColumns:n,api:o,dataSource:i}=t;!n&&a&&(d.value=a),!o&&i&&(l.value=i),y()}),{immediate:!0,deep:!0}),r((()=>t.api),(e=>{const{columns:a,apiColumns:n,api:o,dataSource:i}=t;!n&&a&&(d.value=a),!o&&i&&(l.value=i),y()}),{immediate:!0,deep:!0}),r((()=>t.apiColumns),(()=>e(this,null,(function*(){const{apiColumns:e}=t;try{if(e&&i(e)){let t={};const a=yield e(t);b(a)}}catch(a){}}))),{immediate:!0,deep:!0});const[m,{getDataSource:p,setTableData:f,setProps:b,setColumns:h}]=n({showIndexColumn:!1,actionColumn:{width:160,title:"操作",dataIndex:"action",slots:{customRender:"action"}},pagination:!1});function C(e){var t;null==(t=e.onEdit)||t.call(e,!0)}function v(e){var t;if(null==(t=e.onEdit)||t.call(e,!1),e.isNew){const t=p(),a=t.findIndex((t=>t.key===e.key));t.splice(a,1)}}function j(e){var t;null==(t=e.onEdit)||t.call(e,!1,!0)}function y(){return e(this,null,(function*(){const{api:e}=t;try{if(e&&i(e)){let t={};yield e(t)}}catch(a){}}))}return u((()=>{o((()=>{y()}),16)})),{registerTable:m,dataRef:l,columnRef:d,handleEdit:C,createActions:function(e,t){return e.editable?[{label:"保存",onClick:j.bind(null,e,t)},{label:"取消",popConfirm:{title:"是否取消编辑",confirm:v.bind(null,e,t)}}]:[{label:"编辑",onClick:C.bind(null,e)},{label:"删除"}]},handleAdd:function(){p().push(c(a))},getDataSource:p,setTableData:f,setProps:b,setColumns:h,handleEditChange:function(e){}}}});const v=h(" 新增规格 ");C.render=function(e,t,a,n,o,i){const l=d("a-button"),s=d("TableAction"),c=d("BasicTable");return m(),p("div",null,[f(l,{block:"",class:"mt-5",type:"dashed",onClick:e.handleAdd},{default:b((()=>[v])),_:1},8,["onClick"]),f(c,{onRegister:e.registerTable,onEditChange:e.handleEditChange},{action:b((({record:t,column:a})=>[f(s,{actions:e.createActions(t,a)},null,8,["actions"])])),_:1},8,["onRegister","onEditChange"])])};export{C as default};
