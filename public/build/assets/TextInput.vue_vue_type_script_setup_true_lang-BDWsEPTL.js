import{d as l,j as d,m as c,g as t,b as m,t as i,o as a,r as _,C as f,l as v,s as g,D as h}from"./app-ClX_5kVW.js";const b={class:"text-sm text-red-600"},M=l({__name:"InputError",props:{message:{}},setup(u){return(e,n)=>d((a(),t("div",null,[m("p",b,i(e.message),1)],512)),[[c,e.message]])}}),k={class:"block font-medium text-sm text-gray-700"},x={key:0},y={key:1},$=l({__name:"InputLabel",props:{value:{}},setup(u){return(e,n)=>(a(),t("label",k,[e.value?(a(),t("span",x,i(e.value),1)):(a(),t("span",y,[_(e.$slots,"default")]))]))}}),w=l({__name:"TextInput",props:{modelValue:{required:!0},modelModifiers:{}},emits:["update:modelValue"],setup(u,{expose:e}){const n=f(u,"modelValue"),r=v(null);return g(()=>{var s,o;(s=r.value)!=null&&s.hasAttribute("autofocus")&&((o=r.value)==null||o.focus())}),e({focus:()=>{var s;return(s=r.value)==null?void 0:s.focus()}}),(s,o)=>d((a(),t("input",{class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm","onUpdate:modelValue":o[0]||(o[0]=p=>n.value=p),ref_key:"input",ref:r},null,512)),[[h,n.value]])}});export{$ as _,w as a,M as b};