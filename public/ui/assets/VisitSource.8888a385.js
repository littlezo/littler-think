import{Card as e}from"ant-design-vue";import{u as a}from"./useECharts.6e933e92.js";import{A as t,r as i,Q as n,Z as o,F as r,G as l,a1 as s,x as d}from"./vendor.ecc5e6ce.js";import"./index.85303d5a.js";var m=t({components:{Card:e},props:{loading:Boolean,width:{type:String,default:"100%"},height:{type:String,default:"300px"}},setup(e){const t=i(null),{setOptions:o}=a(t);return n((()=>e.loading),(()=>{e.loading||o({tooltip:{trigger:"item"},legend:{bottom:"1%",left:"center"},series:[{color:["#5ab1ef","#b6a2de","#67e0e3","#2ec7c9"],name:"访问来源",type:"pie",radius:["40%","70%"],avoidLabelOverlap:!1,itemStyle:{borderRadius:10,borderColor:"#fff",borderWidth:2},label:{show:!1,position:"center"},emphasis:{label:{show:!0,fontSize:"12",fontWeight:"bold"}},labelLine:{show:!1},data:[{value:1048,name:"搜索引擎"},{value:735,name:"直接访问"},{value:580,name:"邮件营销"},{value:484,name:"联盟广告"}],animationType:"scale",animationEasing:"exponentialInOut",animationDelay:function(){return 100*Math.random()}}]})}),{immediate:!0}),{chartRef:t}}});m.render=function(e,a,t,i,n,m){const u=o("Card");return r(),l(u,{title:"访问来源",loading:e.loading},{default:s((()=>[d("div",{ref:"chartRef",style:{width:e.width,height:e.height}},null,4)])),_:1},8,["loading"])};export{m as default};