(()=>{"use strict";var e,t={259:()=>{const e=window.wp.blocks,t=window.wp.element,o=(window.wp.i18n,window.wp.components),r=window.wp.blockEditor;(0,e.registerBlockType)("favorite-movie-quote/block",{title:"Favorite movie quote",category:"common",attributes:{quote:{type:"string",default:""}},edit:function(e){let{attributes:n,setAttributes:l}=e;const{quote:i}=n;return(0,t.createElement)(t.Fragment,null,(0,t.createElement)(r.InspectorControls,null,(0,t.createElement)("div",null,(0,t.createElement)(o.TextControl,{label:"Quote",value:i,onChange:e=>{l({quote:e})}}))),(0,t.createElement)("div",(0,r.useBlockProps)(),(0,t.createElement)("p",null,"Favorite Movie Quote: ",i)))},save:()=>null})}},o={};function r(e){var n=o[e];if(void 0!==n)return n.exports;var l=o[e]={exports:{}};return t[e](l,l.exports,r),l.exports}r.m=t,e=[],r.O=(t,o,n,l)=>{if(!o){var i=1/0;for(v=0;v<e.length;v++){for(var[o,n,l]=e[v],a=!0,u=0;u<o.length;u++)(!1&l||i>=l)&&Object.keys(r.O).every((e=>r.O[e](o[u])))?o.splice(u--,1):(a=!1,l<i&&(i=l));if(a){e.splice(v--,1);var s=n();void 0!==s&&(t=s)}}return t}l=l||0;for(var v=e.length;v>0&&e[v-1][2]>l;v--)e[v]=e[v-1];e[v]=[o,n,l]},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={826:0,431:0};r.O.j=t=>0===e[t];var t=(t,o)=>{var n,l,[i,a,u]=o,s=0;if(i.some((t=>0!==e[t]))){for(n in a)r.o(a,n)&&(r.m[n]=a[n]);if(u)var v=u(r)}for(t&&t(o);s<i.length;s++)l=i[s],r.o(e,l)&&e[l]&&e[l][0](),e[l]=0;return r.O(v)},o=globalThis.webpackChunkfavorite_movie_quote=globalThis.webpackChunkfavorite_movie_quote||[];o.forEach(t.bind(null,0)),o.push=t.bind(null,o.push.bind(o))})();var n=r.O(void 0,[431],(()=>r(259)));n=r.O(n)})();