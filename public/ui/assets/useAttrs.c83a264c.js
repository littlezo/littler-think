import{bX as s,Q as t,ak as e,af as a}from"./vendor.2a694682.js";const r=["class","style"],c=/^on[A-Z]/;function n(n={}){const o=a();if(!o)return{};const{excludeListeners:u=!1,excludeKeys:l=[]}=n,d=s({}),i=l.concat(r);return o.attrs=t(o.attrs),e((()=>{const s=(t=o.attrs,Object.keys(t).map((s=>[s,t[s]]))).reduce(((s,[t,e])=>(i.includes(t)||u&&c.test(t)||(s[t]=e),s)),{});var t;d.value=s})),d}export{n as u};
