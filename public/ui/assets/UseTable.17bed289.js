var __defProp=Object.defineProperty,__defProps=Object.defineProperties,__getOwnPropDescs=Object.getOwnPropertyDescriptors,__getOwnPropSymbols=Object.getOwnPropertySymbols,__hasOwnProp=Object.prototype.hasOwnProperty,__propIsEnum=Object.prototype.propertyIsEnumerable,__defNormalProp=(e,t,o)=>t in e?__defProp(e,t,{enumerable:!0,configurable:!0,writable:!0,value:o}):e[t]=o,__spreadValues=(e,t)=>{for(var o in t||(t={}))__hasOwnProp.call(t,o)&&__defNormalProp(e,o,t[o]);if(__getOwnPropSymbols)for(var o of __getOwnPropSymbols(t))__propIsEnum.call(t,o)&&__defNormalProp(e,o,t[o]);return e},__spreadProps=(e,t)=>__defProps(e,__getOwnPropDescs(t)),__async=(e,t,o)=>new Promise(((a,r)=>{var n=e=>{try{i(o.next(e))}catch(t){r(t)}},s=e=>{try{i(o.throw(e))}catch(t){r(t)}},i=e=>e.done?a(e.value):Promise.resolve(e.value).then(n,s);i((o=o.apply(e,t)).next())}));import{_ as _sfc_main$2}from"./TableImg.e17cc06a.js";import{_ as _sfc_main$6}from"./useForm.9f758c80.js";import{u as useTable}from"./useTable.a77db7eb.js";import{ac as usePermission,ad as getSlot,w as withInstall,ae as api,r as useTimeoutFn}from"./index.886fff71.js";import{D as defineComponent,Q as reactive,r as ref,a as useRouter,j as computed,u as unref,_ as onMounted,X as toRefs,a0 as resolveComponent,H as openBlock,J as createBlock,z as createVNode,a4 as withCtx,a9 as Fragment,aq as renderList,ab as createTextVNode,N as toDisplayString,aa as createCommentVNode}from"./vendor.2a694682.js";import{u as useModal}from"./index.6f230b74.js";import{_ as _sfc_main$3,o as objectToFunction}from"./FormModal.0652f901.js";import{u as useDrawer}from"./index.8bc7383a.js";import _sfc_main$4 from"./FormDrawer.ef1bb06e.js";import _sfc_main$5 from"./DetailDrawer.fd809b24.js";/* empty css              *//* empty css              *//* empty css              *//* empty css              *//* empty css              */import"./useWindowSizeFn.ba9c561c.js";import"./onMountedOrActivated.1cc20755.js";/* empty css              */import"./useSortable.a0d70131.js";/* empty css              *//* empty css              *//* empty css              */import"./index.159369ef.js";import"./useAttrs.c83a264c.js";import"./index.08924b52.js";import"./download.24e74597.js";import"./index.52577703.js";/* empty css              *//* empty css              */import"./PersonTable.23297e59.js";/* empty css              *//* empty css              */import"./index.34d90663.js";var _sfc_main$1=defineComponent({name:"Authority",props:{value:{type:[Number,Array,String],default:""}},setup(e,{slots:t}){const{hasPermission:o}=usePermission();return()=>function(){const{value:a}=e;return a?o(a)?getSlot(t):null:getSlot(t)}()}});const Authority=withInstall(_sfc_main$1);var _sfc_main=defineComponent({components:{BasicTable:_sfc_main$2,FormModal:_sfc_main$3,FormDrawer:_sfc_main$4,DetailDrawer:_sfc_main$5,TableAction:_sfc_main$6,Authority:Authority},setup(){var _a,_b,_c;const state=reactive({rowKey:"id"}),tableSchemaRef=ref({actions:"",dropActions:""}),{currentRoute:currentRoute}=useRouter(),getRourer=computed((()=>unref(currentRoute))),meta=getRourer.value.meta,apiRef=ref({});meta.action.map((function(e){Object.assign(unref(apiRef),{[e.auth.split(":").slice(-1)]:{method:e.method,api:e.api,auth:e.permission}})}));const listApi=(null==(_a=unref(apiRef))?void 0:_a.page)?null==(_b=unref(apiRef))?void 0:_b.page:null==(_c=unref(apiRef))?void 0:_c.list,[registerModal,{openModal:openModal}]=useModal(),[registerTable,{setProps:setProps,getSelectRowKeys:getSelectRowKeys,reload:reload}]=useTable({api:e=>{var t,o;return api(null!=(t=null==listApi?void 0:listApi.method)?t:meta.method,null!=(o=null==listApi?void 0:listApi.api)?o:meta.api,__spreadValues({},e))}}),[registerDrawer,{openDrawer:openDrawer}]=useDrawer(),[registerDetail,{openDrawer:openDetail}]=useDrawer();function handleCreate(){openModal(!0,{isUpdate:!1})}function handleDetail(e){openDetail(!0,{record:e})}function handleRowPart(e,t){openDrawer(!0,{pk:e[state.rowKey],props:t})}function handleView(e){openModal(!0,{record:e,isView:!0,isUpdate:!0,pk:state.rowKey})}function handleEdit(e){openModal(!0,{record:e,isUpdate:!0,pk:state.rowKey})}function handleDelete(e){api("delete",meta.api+"/"+e[state.rowKey]).then((()=>{handleSuccess()}))}function handleActions(record,column,type){var _a2,_b2;if(handleCreate.bind(null,record,column),"column"===type){const col_action=unref(tableSchemaRef).actions,actions=null!=(_a2=eval(col_action))?_a2:[];return actions}const drop_action=unref(tableSchemaRef).dropActions,actions=null!=(_b2=eval(drop_action))?_b2:[];return actions}function handleSuccess(){reload()}return onMounted((()=>__async(this,null,(function*(){var e;const t=yield api(meta.method,meta.api+"/layout",{type:"table"});t.actions=null==(e=null==t?void 0:t.actions)?void 0:e.replace(/[\r\n]/g,"").replace(/\ +/g,""),objectToFunction(t),state.rowKey=(null==t?void 0:t.rowKey)||"id",tableSchemaRef.value=t,useTimeoutFn((()=>{setProps(__spreadValues({api:e=>{var t,o,a,r,n,s;return api(null!=(a=null==(o=null==(t=unref(apiRef))?void 0:t.list)?void 0:o.method)?a:meta.method,null!=(s=null==(n=null==(r=unref(apiRef))?void 0:r.list)?void 0:n.api)?s:meta.api,__spreadValues({},e))},canResize:!0,canColDrag:!0,isTreeTable:!0,useSearchForm:!0,showTableSetting:!0,showIndexColumn:!1,rowKey:"id",bordered:!0,striped:!0,searchInfo:{order:"asc"},title:meta.title},t))}),50)})))),__spreadProps(__spreadValues({},toRefs(state)),{meta:meta,apiRef:apiRef,handleRowPart:handleRowPart,handleActions:handleActions,registerDrawer:registerDrawer,registerDetail:registerDetail,registerModal:registerModal,tableSchemaRef:tableSchemaRef,registerTable:registerTable,handleCreate:handleCreate,handleView:handleView,handleEdit:handleEdit,handleDelete:handleDelete,handleDetail:handleDetail,handleSuccess:handleSuccess})}});const _hoisted_1={class:"p-4"};function _sfc_render(e,t,o,a,r,n){const s=resolveComponent("a-button"),i=resolveComponent("Authority"),l=resolveComponent("TableAction"),c=resolveComponent("BasicTable"),d=resolveComponent("FormModal"),p=resolveComponent("FormDrawer"),u=resolveComponent("DetailDrawer");return openBlock(),createBlock("div",_hoisted_1,[createVNode(c,{onRegister:e.registerTable},{toolbar:withCtx((()=>[(openBlock(!0),createBlock(Fragment,null,renderList(e.meta.action,(t=>(openBlock(),createBlock("div",{key:t.id},[-1!==t.auth.split(":").lastIndexOf("save")?(openBlock(),createBlock(i,{key:0,value:t.auth},{default:withCtx((()=>[createVNode(s,{type:"primary",onClick:e.handleCreate},{default:withCtx((()=>[createTextVNode(toDisplayString(t.title),1)])),_:2},1032,["onClick"])])),_:2},1032,["value"])):createCommentVNode("",!0)])))),128))])),action:withCtx((({record:t,column:o})=>[createVNode(l,{actions:e.handleActions(t,o,"column")},null,8,["actions"]),createVNode(l,{dropDownActions:e.handleActions(t,o,"drop")},null,8,["dropDownActions"])])),_:1},8,["onRegister"]),createVNode(d,{onRegister:e.registerModal,onSuccess:e.handleSuccess},null,8,["onRegister","onSuccess"]),createVNode(p,{onRegister:e.registerDrawer,onSuccess:e.handleSuccess},null,8,["onRegister","onSuccess"]),createVNode(u,{onRegister:e.registerDetail},null,8,["onRegister"])])}_sfc_main.render=_sfc_render;export{_sfc_main as default};