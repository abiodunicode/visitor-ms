import{d as m,T as d,c as l,o as c,w as t,a,u as o,Z as p,b as e,e as f,n as u,f as _}from"./app-Xhz7-eY4.js";import{_ as w}from"./GuestLayout.vue_vue_type_script_setup_true_lang-B7qhk-0t.js";import{_ as b,a as x,b as g}from"./TextInput.vue_vue_type_script_setup_true_lang-XVcNl8rT.js";import{P as h}from"./PrimaryButton-CTdQFQIW.js";import"./ApplicationLogo-DwH5F3cN.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const y=e("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),C={class:"flex justify-end mt-4"},j=m({__name:"ConfirmPassword",setup(P){const s=d({password:""}),i=()=>{s.post(route("password.confirm"),{onFinish:()=>{s.reset()}})};return(V,r)=>(c(),l(w,null,{default:t(()=>[a(o(p),{title:"Confirm Password"}),y,e("form",{onSubmit:_(i,["prevent"])},[e("div",null,[a(b,{for:"password",value:"Password"}),a(x,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:o(s).password,"onUpdate:modelValue":r[0]||(r[0]=n=>o(s).password=n),required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),a(g,{class:"mt-2",message:o(s).errors.password},null,8,["message"])]),e("div",C,[a(h,{class:u(["ms-4",{"opacity-25":o(s).processing}]),disabled:o(s).processing},{default:t(()=>[f(" Confirm ")]),_:1},8,["class","disabled"])])],32)]),_:1}))}});export{j as default};