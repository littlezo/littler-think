import{aD as t}from"./index.886fff71.js";import"./vendor.2a694682.js";const e=(e,d,a)=>t[e]({url:d,params:a});function d(){return[{title:"ID",dataIndex:"member_id",width:80,fixed:"left",defaultHidden:!1},{title:"推荐人",dataIndex:"source_member",width:100,defaultHidden:!1},{title:"分销商（分销有效）",dataIndex:"fenxiao_id",width:100,defaultHidden:!1},{title:"是否是分销商",dataIndex:"is_fenxiao",width:100,defaultHidden:!1},{title:"用户名",dataIndex:"username",width:180,defaultHidden:!1},{title:"用户昵称",dataIndex:"nickname",width:180,defaultHidden:!1},{title:"手机号",dataIndex:"mobile",width:180,defaultHidden:!1},{title:"邮箱",dataIndex:"email",width:180,defaultHidden:!1},{title:"用户密码（MD5）",dataIndex:"password",width:180,defaultHidden:!1},{title:"用户状态  用户状态默认为1",dataIndex:"status",width:100,defaultHidden:!1},{title:"用户头像",dataIndex:"headimg",width:150,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"用户等级",dataIndex:"member_level",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"会员等级名称",dataIndex:"member_level_name",width:180,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"用户标签",dataIndex:"member_label",width:180,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"会员标签名称",dataIndex:"member_label_name",width:180,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"qq号",dataIndex:"qq",width:180,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"qq互联id",dataIndex:"qq_openid",width:180,defaultHidden:!0,slots:{customRender:"avatar"}},{title:"微信用户openid",dataIndex:"wx_openid",width:180,defaultHidden:!0,slots:{customRender:"avatar"}},{title:"微信小程序openid",dataIndex:"weapp_openid",width:180,defaultHidden:!0,slots:{customRender:"avatar"}},{title:"微信unionid",dataIndex:"wx_unionid",width:180,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"支付宝账户id",dataIndex:"ali_openid",width:180,defaultHidden:!0,slots:{customRender:"avatar"}},{title:"百度账户id",dataIndex:"baidu_openid",width:180,defaultHidden:!0,slots:{customRender:"avatar"}},{title:"头条账号",dataIndex:"toutiao_openid",width:180,defaultHidden:!0,slots:{customRender:"avatar"}},{title:"抖音小程序openid",dataIndex:"douyin_openid",width:180,defaultHidden:!0,slots:{customRender:"avatar"}},{title:"当前登录ip",dataIndex:"login_ip",width:180,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"当前登录的操作终端类型",dataIndex:"login_type",width:180,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"当前登录时间",dataIndex:"login_time",width:120,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"上次登录ip",dataIndex:"last_login_ip",width:180,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"上次登录的操作终端类型",dataIndex:"last_login_type",width:160,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"上次登录时间",dataIndex:"last_login_time",width:120,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"登录次数",dataIndex:"login_num",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"真实姓名",dataIndex:"realname",width:180,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"性别 0保密 1男 2女",dataIndex:"sex",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"定位地址",dataIndex:"location",width:180,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"出生日期",dataIndex:"birthday",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"注册时间",dataIndex:"reg_time",width:120,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"积分",dataIndex:"point",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"余额",dataIndex:"balance",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"成长值",dataIndex:"growth",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"现金余额(可提现)",dataIndex:"balance_money",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"账户5",dataIndex:"account5",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"是否认证",dataIndex:"is_auth",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"最后一次签到时间",dataIndex:"sign_time",width:120,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"持续签到天数",dataIndex:"sign_days_series",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"付款后-消费金额",dataIndex:"order_money",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"订单完成-消费金额",dataIndex:"order_complete_money",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"付款后-消费次数",dataIndex:"order_num",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"订单完成-消费次数",dataIndex:"order_complete_num",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"提现中余额",dataIndex:"balance_withdraw_apply",width:100,defaultHidden:!1,slots:{customRender:"avatar"}},{title:"已提现余额",dataIndex:"balance_withdraw",width:100,defaultHidden:!1,slots:{customRender:"avatar"}}]}function a(){const t=[];for(let e=0;e<100;e++)t.push({title:`字段${e}`,dataIndex:`field${e}`,sorter:!0,width:80});return t}function n(){return[{title:"ID",dataIndex:"id",width:200},{title:"姓名",dataIndex:"name",width:120},{title:"地址",dataIndex:"address",sorter:!0,children:[{title:"编号",dataIndex:"no",width:120,filters:[{text:"Male",value:"male",children:[]},{text:"Female",value:"female",children:[]}]},{title:"开始时间",dataIndex:"beginTime",width:120},{title:"结束时间",dataIndex:"endTime",width:120}]}]}function i(){return[{title:"ID",dataIndex:"id",width:200},{dataIndex:"name",width:120,slots:{title:"customTitle"}},{dataIndex:"address",width:120,slots:{title:"customAddress"},sorter:!0},{title:"编号",dataIndex:"no",width:120,filters:[{text:"Male",value:"male",children:[]},{text:"Female",value:"female",children:[]}]},{title:"开始时间",dataIndex:"beginTime",width:120},{title:"结束时间",dataIndex:"endTime",width:120}]}const l=({text:t,index:e})=>{const d={children:t,attrs:{}};return 9===e&&(d.attrs.colSpan=0),d};function o(){return[{title:"ID",dataIndex:"id",width:300,customRender:l},{title:"姓名",dataIndex:"name",width:300,customRender:l},{title:"地址",dataIndex:"address",colSpan:2,width:120,sorter:!0,customRender:({text:t,index:e})=>{const d={children:t,attrs:{}};return 2===e&&(d.attrs.rowSpan=2),3===e&&(d.attrs.colSpan=0),d}},{title:"编号",dataIndex:"no",colSpan:0,filters:[{text:"Male",value:"male",children:[]},{text:"Female",value:"female",children:[]}],customRender:l},{title:"开始时间",dataIndex:"beginTime",width:200,customRender:l},{title:"结束时间",dataIndex:"endTime",width:200,customRender:l}]}const r=(t=6)=>{const e=[];for(let d=0;d<t;d++)e.push({field:`field${d}`,label:`字段${d}`,component:"Input",colProps:{xl:12,xxl:8}});return e};function s(){return{labelWidth:100,schemas:[...r(5),{field:"field11",label:"Select",component:"Select",colProps:{xl:12,xxl:8}}]}}function u(){return(()=>{const t=[];for(let e=0;e<40;e++)t.push({id:`${e}`,name:"John Brown",age:`1${e}`,no:`${e+10}`,address:"New York No. 1 Lake ParkNew York No. 1 Lake Park",beginTime:(new Date).toLocaleString(),endTime:(new Date).toLocaleString()});return t})()}function m(){return(()=>{const t=[];for(let e=0;e<40;e++)t.push({id:`${e}`,name:"John Brown",age:`1${e}`,no:`${e+10}`,address:"New York No. 1 Lake ParkNew York No. 1 Lake Park",beginTime:(new Date).toLocaleString(),endTime:(new Date).toLocaleString(),children:[{id:`l2-${e}`,name:"John Brown",age:`1${e}`,no:`${e+10}`,address:"New York No. 1 Lake ParkNew York No. 1 Lake Park",beginTime:(new Date).toLocaleString(),endTime:(new Date).toLocaleString()}]});return t})()}export{e as api,r as getAdvanceSchema,d as getBasicColumns,u as getBasicData,a as getBasicShortColumns,i as getCustomHeaderColumns,s as getFormConfig,o as getMergeHeaderColumns,n as getMultipleHeaderColumns,m as getTreeTableData};
