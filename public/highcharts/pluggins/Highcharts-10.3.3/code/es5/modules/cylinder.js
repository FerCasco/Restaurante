/*
 Highcharts JS v10.3.3 (2023-01-20)

 Highcharts cylinder module

 (c) 2010-2021 Kacper Madej

 License: www.highcharts.com/license
*/
(function(a){"object"===typeof module&&module.exports?(a["default"]=a,module.exports=a):"function"===typeof define&&define.amd?define("highcharts/modules/cylinder",["highcharts","highcharts/highcharts-3d"],function(h){a(h);a.Highcharts=h;return a}):a("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(a){function h(a,g,l,b){a.hasOwnProperty(g)||(a[g]=b.apply(null,l),"function"===typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:g,module:a[g]}})))}
a=a?a._modules:{};h(a,"Series/Cylinder/CylinderPoint.js",[a["Core/Series/SeriesRegistry.js"],a["Core/Utilities.js"]],function(a,g){var l=this&&this.__extends||function(){var a=function(b,d){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,b){a.__proto__=b}||function(a,b){for(var d in b)Object.prototype.hasOwnProperty.call(b,d)&&(a[d]=b[d])};return a(b,d)};return function(b,d){function g(){this.constructor=b}if("function"!==typeof d&&null!==d)throw new TypeError("Class extends value "+
String(d)+" is not a constructor or null");a(b,d);b.prototype=null===d?Object.create(d):(g.prototype=d.prototype,new g)}}();g=g.extend;a=function(a){function b(){var b=null!==a&&a.apply(this,arguments)||this;b.options=void 0;b.series=void 0;return b}l(b,a);return b}(a.seriesTypes.column.prototype.pointClass);g(a.prototype,{shapeType:"cylinder"});return a});h(a,"Series/Cylinder/CylinderComposition.js",[a["Core/Color/Color.js"],a["Core/Globals.js"],a["Core/Math3D.js"],a["Core/Renderer/RendererRegistry.js"],
a["Core/Utilities.js"]],function(a,g,l,b,h){var d=a.parse,m=g.charts,u=g.deg2rad,v=l.perspective;a=h.merge;var w=h.pick;b=b.getRendererType().prototype;var n=b.cuboidPath,p=function(c){return!c.some(function(c){return"C"===c[0]})};h=a(b.elements3d.cuboid,{parts:["top","bottom","front","back"],pathType:"cylinder",fillSetter:function(c){this.singleSetterForParts("fill",null,{front:c,back:c,top:d(c).brighten(.1).get(),bottom:d(c).brighten(-.1).get()});this.color=this.fill=c;return this}});b.elements3d.cylinder=
h;b.cylinder=function(c){return this.element3d("cylinder",c)};b.cylinderPath=function(c){var a=m[this.chartIndex],e=n.call(this,c),f=!e.isTop,b=!e.isFront,d=this.getCylinderEnd(a,c);c=this.getCylinderEnd(a,c,!0);return{front:this.getCylinderFront(d,c),back:this.getCylinderBack(d,c),top:d,bottom:c,zIndexes:{top:f?3:0,bottom:f?0:3,front:b?2:1,back:b?1:2,group:e.zIndexes.group}}};b.getCylinderFront=function(c,a){c=c.slice(0,3);if(p(a)){var e=a[0];"M"===e[0]&&(c.push(a[2]),c.push(a[1]),c.push(["L",e[1],
e[2]]))}else{e=a[0];var f=a[1];a=a[2];"M"===e[0]&&"C"===f[0]&&"C"===a[0]&&(c.push(["L",a[5],a[6]]),c.push(["C",a[3],a[4],a[1],a[2],f[5],f[6]]),c.push(["C",f[3],f[4],f[1],f[2],e[1],e[2]]))}c.push(["Z"]);return c};b.getCylinderBack=function(c,a){var e=[];if(p(c)){var f=c[0],b=c[2];"M"===f[0]&&"L"===b[0]&&(e.push(["M",b[1],b[2]]),e.push(c[3]),e.push(["L",f[1],f[2]]))}else"C"===c[2][0]&&e.push(["M",c[2][5],c[2][6]]),e.push(c[3],c[4]);p(a)?(f=a[0],"M"===f[0]&&(e.push(["L",f[1],f[2]]),e.push(a[3]),e.push(a[2]))):
(c=a[2],f=a[3],a=a[4],"C"===c[0]&&"C"===f[0]&&"C"===a[0]&&(e.push(["L",a[5],a[6]]),e.push(["C",a[3],a[4],a[1],a[2],f[5],f[6]]),e.push(["C",f[3],f[4],f[1],f[2],c[5],c[6]])));e.push(["Z"]);return e};b.getCylinderEnd=function(a,b,e){var c=b.width;c=void 0===c?0:c;var d=b.height,g=void 0===d?0:d;d=b.alphaCorrection;var h=void 0===d?0:d;d=w(b.depth,c,0);var k=Math.min(c,d)/2;h=u*(a.options.chart.options3d.beta-90+h);e=(b.y||0)+(e?g:0);g=.5519*k;var l=c/2+(b.x||0),p=d/2+(b.z||0),n=[{x:0,y:e,z:k},{x:g,y:e,
z:k},{x:k,y:e,z:g},{x:k,y:e,z:0},{x:k,y:e,z:-g},{x:g,y:e,z:-k},{x:0,y:e,z:-k},{x:-g,y:e,z:-k},{x:-k,y:e,z:-g},{x:-k,y:e,z:0},{x:-k,y:e,z:g},{x:-g,y:e,z:k},{x:0,y:e,z:k}],m=Math.cos(h),t=Math.sin(h),q,r;n.forEach(function(a,c){q=a.x;r=a.z;n[c].x=q*m-r*t+l;n[c].z=r*m+q*t+p});a=v(n,a,!0);return 2.5>Math.abs(a[3].y-a[9].y)&&2.5>Math.abs(a[0].y-a[6].y)?this.toLinePath([a[0],a[3],a[6],a[9]],!0):this.getCurvedPath(a)};b.getCurvedPath=function(a){var c=[["M",a[0].x,a[0].y]],b=a.length-2,f;for(f=1;f<b;f+=
3)c.push(["C",a[f].x,a[f].y,a[f+1].x,a[f+1].y,a[f+2].x,a[f+2].y]);return c}});h(a,"Series/Cylinder/CylinderSeries.js",[a["Series/Cylinder/CylinderPoint.js"],a["Core/Series/SeriesRegistry.js"],a["Core/Utilities.js"]],function(a,g,h){var b=this&&this.__extends||function(){var a=function(b,d){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,b){a.__proto__=b}||function(a,b){for(var c in b)Object.prototype.hasOwnProperty.call(b,c)&&(a[c]=b[c])};return a(b,d)};return function(b,d){function g(){this.constructor=
b}if("function"!==typeof d&&null!==d)throw new TypeError("Class extends value "+String(d)+" is not a constructor or null");a(b,d);b.prototype=null===d?Object.create(d):(g.prototype=d.prototype,new g)}}(),l=g.seriesTypes.column,d=h.extend,m=h.merge;h=function(a){function d(){var b=null!==a&&a.apply(this,arguments)||this;b.data=void 0;b.options=void 0;b.points=void 0;return b}b(d,a);d.defaultOptions=m(l.defaultOptions);return d}(l);d(h.prototype,{pointClass:a});g.registerSeriesType("cylinder",h);"";
return h});h(a,"masters/modules/cylinder.src.js",[],function(){})});
//# sourceMappingURL=cylinder.js.map