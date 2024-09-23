(function(){var t,e,n,r,a,i,o,u,l,h,c,s,p,f,g,d,v,m,y,C,w,T,k,$,S,D=[].slice,x=[].indexOf||function(t){for(var e=0,n=this.length;e<n;e++)if(e in this&&this[e]===t)return e;return-1};(t=window.jQuery||window.Zepto||window.$).payment={},t.payment.fn={},t.fn.payment=function(){var e,n;return n=arguments[0],e=2<=arguments.length?D.call(arguments,1):[],t.payment.fn[n].apply(this,e)},a=/(\d{1,4})/g,t.payment.cards=r=[{type:"visaelectron",pattern:/^4(026|17500|405|508|844|91[37])/,format:a,length:[16],cvcLength:[3],luhn:!0},{type:"maestro",pattern:/^(5(018|0[23]|[68])|6(39|7))/,format:a,length:[12,13,14,15,16,17,18,19],cvcLength:[3],luhn:!0},{type:"forbrugsforeningen",pattern:/^600/,format:a,length:[16],cvcLength:[3],luhn:!0},{type:"dankort",pattern:/^5019/,format:a,length:[16],cvcLength:[3],luhn:!0},{type:"visa",pattern:/^4/,format:a,length:[13,16],cvcLength:[3],luhn:!0},{type:"mastercard",pattern:/^(5[0-5]|2[2-7])/,format:a,length:[16],cvcLength:[3],luhn:!0},{type:"amex",pattern:/^3[47]/,format:/(\d{1,4})(\d{1,6})?(\d{1,5})?/,length:[15],cvcLength:[3,4],luhn:!0},{type:"dinersclub",pattern:/^3[0689]/,format:/(\d{1,4})(\d{1,6})?(\d{1,4})?/,length:[14],cvcLength:[3],luhn:!0},{type:"discover",pattern:/^6([045]|22)/,format:a,length:[16],cvcLength:[3],luhn:!0},{type:"unionpay",pattern:/^(62|88)/,format:a,length:[16,17,18,19],cvcLength:[3],luhn:!1},{type:"jcb",pattern:/^35/,format:a,length:[16],cvcLength:[3],luhn:!0}],e=function(t){var e,n,a;for(t=(t+"").replace(/\D/g,""),n=0,a=r.length;n<a;n++)if((e=r[n]).pattern.test(t))return e},n=function(t){var e,n,a;for(n=0,a=r.length;n<a;n++)if((e=r[n]).type===t)return e},g=function(t){var e,n,r,a,i,o;for(r=!0,a=0,i=0,o=(n=(t+"").split("").reverse()).length;i<o;i++)e=n[i],e=parseInt(e,10),(r=!r)&&(e*=2),e>9&&(e-=9),a+=e;return a%10==0},f=function(t){var e;return null!=t.prop("selectionStart")&&t.prop("selectionStart")!==t.prop("selectionEnd")||!(null==("undefined"!=typeof document&&null!==document&&null!=(e=document.selection)?e.createRange:void 0)||!document.selection.createRange().text)},$=function(t,e){var n,r;try{n=e.prop("selectionStart")}catch(t){t,n=null}if(r=e.val(),e.val(t),null!==n&&e.is(":focus"))return n===r.length&&(n=t.length),e.prop("selectionStart",n),e.prop("selectionEnd",n)},y=function(e){return setTimeout(function(){var n,r;return n=t(e.currentTarget),r=n.val(),r=r.replace(/\D/g,""),$(r,n)})},v=function(e){return setTimeout(function(){var n,r;return n=t(e.currentTarget),r=n.val(),r=t.payment.formatCardNumber(r),$(r,n)})},u=function(n){var r,a,i,o,u,l,h;if(i=String.fromCharCode(n.which),/^\d+$/.test(i)&&(r=t(n.currentTarget),h=r.val(),a=e(h+i),o=(h.replace(/\D/g,"")+i).length,l=16,a&&(l=a.length[a.length.length-1]),!(o>=l||null!=r.prop("selectionStart")&&r.prop("selectionStart")!==h.length)))return u=a&&"amex"===a.type?/^(\d{4}|\d{4}\s\d{6})$/:/(?:^|\s)(\d{4})$/,u.test(h)?(n.preventDefault(),setTimeout(function(){return r.val(h+" "+i)})):u.test(h+i)?(n.preventDefault(),setTimeout(function(){return r.val(h+i+" ")})):void 0},i=function(e){var n,r;if(n=t(e.currentTarget),r=n.val(),8===e.which&&(null==n.prop("selectionStart")||n.prop("selectionStart")===r.length))return/\d\s$/.test(r)?(e.preventDefault(),setTimeout(function(){return n.val(r.replace(/\d\s$/,""))})):/\s\d?$/.test(r)?(e.preventDefault(),setTimeout(function(){return n.val(r.replace(/\d$/,""))})):void 0},m=function(e){return setTimeout(function(){var n,r;return n=t(e.currentTarget),r=n.val(),r=t.payment.formatExpiry(r),$(r,n)})},l=function(e){var n,r,a;if(r=String.fromCharCode(e.which),/^\d+$/.test(r))return n=t(e.currentTarget),a=n.val()+r,/^\d$/.test(a)&&"0"!==a&&"1"!==a?(e.preventDefault(),setTimeout(function(){return n.val("0"+a+" / ")})):/^\d\d$/.test(a)?(e.preventDefault(),setTimeout(function(){return n.val(a+" / ")})):void 0},h=function(e){var n,r,a;if(r=String.fromCharCode(e.which),/^\d+$/.test(r))return n=t(e.currentTarget),a=n.val(),/^\d\d$/.test(a)?n.val(a+" / "):void 0},c=function(e){var n,r,a;if("/"===(a=String.fromCharCode(e.which))||" "===a)return n=t(e.currentTarget),r=n.val(),/^\d$/.test(r)&&"0"!==r?n.val("0"+r+" / "):void 0},o=function(e){var n,r;if(n=t(e.currentTarget),r=n.val(),8===e.which&&(null==n.prop("selectionStart")||n.prop("selectionStart")===r.length))return/\d\s\/\s$/.test(r)?(e.preventDefault(),setTimeout(function(){return n.val(r.replace(/\d\s\/\s$/,""))})):void 0},d=function(e){return setTimeout(function(){var n,r;return n=t(e.currentTarget),r=n.val(),r=r.replace(/\D/g,"").slice(0,4),$(r,n)})},s=function(e){if(229===e.which)return t(e.currentTarget).data("ime",!0)},p=function(e){var n,r;if(n=t(e.currentTarget),r=String.fromCharCode(e.which),!0===n.data("ime"))return n.data("ime",!1),n.val(n.val()+r),n.trigger("input")},k=function(t){var e;return!(!t.metaKey&&!t.ctrlKey)||32!==t.which&&(0===t.which||(t.which<33||(e=String.fromCharCode(t.which),!!/[\d\s]/.test(e))))},w=function(n){var r,a,i,o;if(r=t(n.currentTarget),i=String.fromCharCode(n.which),/^\d+$/.test(i)&&!f(r))return o=(r.val()+i).replace(/\D/g,""),a=e(o),a?o.length<=a.length[a.length.length-1]:o.length<=16},T=function(e){var n,r,a;if(n=t(e.currentTarget),r=String.fromCharCode(e.which),/^\d+$/.test(r)&&!f(n))return a=n.val()+r,!((a=a.replace(/\D/g,"")).length>6)&&void 0},C=function(e){var n,r;if(n=t(e.currentTarget),r=String.fromCharCode(e.which),/^\d+$/.test(r)&&!f(n))return(n.val()+r).length<=4},S=function(e){var n,a,i,o,u;if(n=t(e.currentTarget),u=n.val(),o=t.payment.cardType(u)||"unknown",!n.hasClass(o))return a=function(){var t,e,n;for(n=[],t=0,e=r.length;t<e;t++)i=r[t],n.push(i.type);return n}(),n.removeClass("unknown"),n.removeClass(a.join(" ")),n.addClass(o),n.toggleClass("identified","unknown"!==o),n.trigger("payment.cardType",o)},t.payment.fn.formatCardCVC=function(){return this.on("keydown",s),this.on("keyup",p),this.on("keypress",k),this.on("keypress",C),this.on("paste",d),this.on("change",d),this.on("input",d),this},t.payment.fn.formatCardExpiry=function(){return this.on("keydown",s),this.on("keyup",p),this.on("keypress",k),this.on("keypress",T),this.on("keypress",l),this.on("keypress",c),this.on("keypress",h),this.on("keydown",o),this.on("change",m),this.on("input",m),this},t.payment.fn.formatCardNumber=function(){return this.on("keydown",s),this.on("keyup",p),this.on("keypress",k),this.on("keypress",w),this.on("keypress",u),this.on("keydown",i),this.on("keyup",S),this.on("paste",v),this.on("change",v),this.on("input",v),this.on("input",S),this},t.payment.fn.restrictNumeric=function(){return this.on("keydown",s),this.on("keyup",p),this.on("keypress",k),this.on("paste",y),this.on("change",y),this.on("input",y),this},t.payment.fn.cardExpiryVal=function(){return t.payment.cardExpiryVal(t(this).val())},t.payment.cardExpiryVal=function(t){var e,n,r;return r=t.split(/[\s\/]+/,2),e=r[0],n=r[1],2===(null!=n?n.length:void 0)&&/^\d+$/.test(n)&&(n=(new Date).getFullYear().toString().slice(0,2)+n),e=parseInt(e,10),n=parseInt(n,10),{month:e,year:n}},t.payment.validateCardNumber=function(t){var n,r;return t=(t+"").replace(/\s+|-/g,""),!!/^\d+$/.test(t)&&(!!(n=e(t))&&(r=t.length,x.call(n.length,r)>=0&&(!1===n.luhn||g(t))))},t.payment.validateCardExpiry=function(e,n){var r,a,i;return"object"==typeof e&&"month"in e&&(e=(i=e).month,n=i.year),!(!e||!n)&&(e=t.trim(e),n=t.trim(n),!!/^\d+$/.test(e)&&(!!/^\d+$/.test(n)&&(1<=e&&e<=12&&(2===n.length&&(n=n<70?"20"+n:"19"+n),4===n.length&&(a=new Date(n,e),r=new Date,a.setMonth(a.getMonth()-1),a.setMonth(a.getMonth()+1,1),a>r)))))},t.payment.validateCardCVC=function(e,r){var a,i;return e=t.trim(e),!!/^\d+$/.test(e)&&(a=n(r),null!=a?(i=e.length,x.call(a.cvcLength,i)>=0):e.length>=3&&e.length<=4)},t.payment.cardType=function(t){var n;return t?(null!=(n=e(t))?n.type:void 0)||null:null},t.payment.formatCardNumber=function(n){var r,a,i,o;return n=n.replace(/\D/g,""),(r=e(n))?(i=r.length[r.length.length-1],n=n.slice(0,i),r.format.global?null!=(o=n.match(r.format))?o.join(" "):void 0:null!=(a=r.format.exec(n))?(a.shift(),(a=t.grep(a,function(t){return t})).join(" ")):void 0):n},t.payment.formatExpiry=function(t){var e,n,r,a;return(n=t.match(/^\D*(\d{1,2})(\D+)?(\d{1,4})?/))?(e=n[1]||"",r=n[2]||"",a=n[3]||"",a.length>0?r=" / ":" /"===r?(e=e.substring(0,1),r=""):2===e.length||r.length>0?r=" / ":1===e.length&&"0"!==e&&"1"!==e&&(e="0"+e,r=" / "),e+r+a):""}}).call(this);