(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[16],{30:function(e,t,a){"use strict";a.d(t,"a",(function(){return o}));var s=a(0),n=a(13),c=a.n(n);function o(e){const t=Object(s.useRef)(e);return c()(e,t.current)||(t.current=e),t.current}},305:function(e,t){},310:function(e,t,a){"use strict";a.d(t,"b",(function(){return r})),a.d(t,"a",(function(){return m}));var s=a(30),n=a(18),c=a(7),o=a(3);const i=function(){let e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];const{paymentMethodsInitialized:t,expressPaymentMethodsInitialized:a,availablePaymentMethods:i,availableExpressPaymentMethods:r}=Object(c.useSelect)(e=>{const t=e(o.PAYMENT_STORE_KEY);return{paymentMethodsInitialized:t.paymentMethodsInitialized(),expressPaymentMethodsInitialized:t.expressPaymentMethodsInitialized(),availableExpressPaymentMethods:t.getAvailableExpressPaymentMethods(),availablePaymentMethods:t.getAvailablePaymentMethods()}}),m=Object.values(i).map(e=>{let{name:t}=e;return t}),l=Object.values(r).map(e=>{let{name:t}=e;return t}),d=Object(n.getPaymentMethods)(),p=Object(n.getExpressPaymentMethods)(),u=Object.keys(d).reduce((e,t)=>(m.includes(t)&&(e[t]=d[t]),e),{}),y=Object.keys(p).reduce((e,t)=>(l.includes(t)&&(e[t]=p[t]),e),{}),h=Object(s.a)(u),b=Object(s.a)(y);return{paymentMethods:e?b:h,isInitialized:e?a:t}},r=()=>i(!1),m=()=>i(!0)},324:function(e,t,a){"use strict";var s=a(15),n=a.n(s),c=a(0),o=a(6),i=a.n(o);const r=e=>"wc-block-components-payment-method-icon wc-block-components-payment-method-icon--"+e;var m=e=>{let{id:t,src:a=null,alt:s=""}=e;return a?Object(c.createElement)("img",{className:r(t),src:a,alt:s}):null},l=a(37);const d=[{id:"alipay",alt:"Alipay",src:l.m+"payment-methods/alipay.svg"},{id:"amex",alt:"American Express",src:l.m+"payment-methods/amex.svg"},{id:"bancontact",alt:"Bancontact",src:l.m+"payment-methods/bancontact.svg"},{id:"diners",alt:"Diners Club",src:l.m+"payment-methods/diners.svg"},{id:"discover",alt:"Discover",src:l.m+"payment-methods/discover.svg"},{id:"eps",alt:"EPS",src:l.m+"payment-methods/eps.svg"},{id:"giropay",alt:"Giropay",src:l.m+"payment-methods/giropay.svg"},{id:"ideal",alt:"iDeal",src:l.m+"payment-methods/ideal.svg"},{id:"jcb",alt:"JCB",src:l.m+"payment-methods/jcb.svg"},{id:"laser",alt:"Laser",src:l.m+"payment-methods/laser.svg"},{id:"maestro",alt:"Maestro",src:l.m+"payment-methods/maestro.svg"},{id:"mastercard",alt:"Mastercard",src:l.m+"payment-methods/mastercard.svg"},{id:"multibanco",alt:"Multibanco",src:l.m+"payment-methods/multibanco.svg"},{id:"p24",alt:"Przelewy24",src:l.m+"payment-methods/p24.svg"},{id:"sepa",alt:"Sepa",src:l.m+"payment-methods/sepa.svg"},{id:"sofort",alt:"Sofort",src:l.m+"payment-methods/sofort.svg"},{id:"unionpay",alt:"Union Pay",src:l.m+"payment-methods/unionpay.svg"},{id:"visa",alt:"Visa",src:l.m+"payment-methods/visa.svg"},{id:"wechat",alt:"WeChat",src:l.m+"payment-methods/wechat.svg"}];var p=a(23);a(305),t.a=e=>{let{icons:t=[],align:a="center",className:s}=e;const o=(e=>{const t={};return e.forEach(e=>{let a={};"string"==typeof e&&(a={id:e,alt:e,src:null}),"object"==typeof e&&(a={id:e.id||"",alt:e.alt||"",src:e.src||null}),a.id&&Object(p.a)(a.id)&&!t[a.id]&&(t[a.id]=a)}),Object.values(t)})(t);if(0===o.length)return null;const r=i()("wc-block-components-payment-method-icons",{"wc-block-components-payment-method-icons--align-left":"left"===a,"wc-block-components-payment-method-icons--align-right":"right"===a},s);return Object(c.createElement)("div",{className:r},o.map(e=>{const t={...e,...(a=e.id,d.find(e=>e.id===a)||{})};var a;return Object(c.createElement)(m,n()({key:"payment-method-icon-"+e.id},t))}))}},438:function(e,t,a){"use strict";a.d(t,"a",(function(){return s}));const s=e=>Object.values(e).reduce((e,t)=>(null!==t.icons&&(e=e.concat(t.icons)),e),[])},516:function(e,t,a){"use strict";a.r(t);var s=a(0),n=a(324),c=a(310),o=a(438);t.default=e=>{let{className:t}=e;const{paymentMethods:a}=Object(c.b)();return Object(s.createElement)(n.a,{className:t,icons:Object(o.a)(a)})}}}]);