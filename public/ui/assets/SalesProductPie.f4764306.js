import{D as a,bV as e,r as t,T as n,a0 as i,H as r,J as o,a4 as s,z as d}from"./vendor.2a694682.js";/* empty css              *//* empty css              *//* empty css              */import{u as l}from"./useECharts.7d954a03.js";import"./index.886fff71.js";var u=a({components:{Card:e},props:{loading:Boolean,width:{type:String,default:"100%"},height:{type:String,default:"300px"}},setup(a){const e=t(null),{setOptions:i}=l(e);return n((()=>a.loading),(()=>{a.loading||i({tooltip:{trigger:"item"},series:[{name:"访问来源",type:"pie",radius:"80%",center:["50%","50%"],color:["#5ab1ef","#b6a2de","#67e0e3","#2ec7c9"],data:[{value:500,name:"电子产品"},{value:310,name:"服装"},{value:274,name:"化妆品"},{value:400,name:"家居"}].sort((function(a,e){return a.value-e.value})),roseType:"radius",animationType:"scale",animationEasing:"exponentialInOut",animationDelay:function(){return 400*Math.random()}}]})}),{immediate:!0}),{chartRef:e}}});u.render=function(a,e,t,n,l,u){const m=i("Card");return r(),o(m,{title:"成交占比",loading:a.loading},{default:s((()=>[d("div",{ref:"chartRef",style:{width:a.width,height:a.height}},null,4)])),_:1},8,["loading"])};export{u as default};