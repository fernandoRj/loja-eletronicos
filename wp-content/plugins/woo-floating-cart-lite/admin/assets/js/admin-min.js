!function($){"use strict";var e={};e.notices={init:function(){setTimeout(function(){$(".woofc-notice").each(function(){$(this).prependTo("#wpbody-content")})},10)}},e.license={init:function(){var e=this,i=function(){e.initLicenseForm($(this))};$(".woofc-license-activation").each(i)},initLicenseForm:function(e){function i(e){"valid"===e.code?o(e):"exists"===e.code?n(e):"revoked"===e.code?t(e):a(e)}function n(e){s.hide(),h.hide(),p.hide(),m.hide(),u.fadeIn(),u.find('input[name="purchase_code"]').val(e.license.purchase_code),v.html(e.license_summary).fadeIn()}function t(e){v.empty().hide(),c(),p.html(e.msg),p.fadeIn()}function c(){v.empty().hide(),u.hide(),h.hide(),p.hide(),m.hide(),s.fadeIn()}function o(e){u.hide(),s.hide(),p.hide(),m.hide(),h.fadeIn(),v.html(e.license_summary).fadeIn(),$(document).trigger("woofc-license-activated",[e.license,e.license_summary,v])}function a(){u.hide(),s.hide(),p.hide(),h.hide(),m.fadeIn();var e=3;w.html(e),e--;var i=setInterval(function(){0===e?(w.empty(),clearInterval(i),c()):(w.html(e),e--)},1e3)}var f=$(e).data("id"),d=$(e).data("homeurl"),l=$(e).data("ajaxurl"),r=$(e).find(".woofc-license-form"),s=$(e).find("#woofc-license-activation-form"),u=$(e).find("#woofc-license-revoke-form"),h=$(e).find("#woofc-license-activated"),m=$(e).find("#woofc-license-invalid"),v=$(e).find(".woofc-license-info"),p=$(e).find(".woofc-license-revoke-info"),w=$(e).find(".woofc-license-timer");r.each(function(){var e=$(this);e.find('input[type="submit"]').on("click",function(n){n.preventDefault();var t=e.find('input[name="action"]').val();if(t==="woofc_license_activation_"+f){var c=location.host.replace("www.",""),o=d;e.find('input[name="domain"]').val(c),e.find('input[name="installation_url"]').val(o)}var a=e.find(":input").serialize();$.ajax({cache:!1,url:l,type:"POST",data:a,dataType:"json"}).done(function(e){i(e)}).fail(function(e){alert("Something went wrong! Please try again later!")})})}),u.find(".woofc-license-revoke-cancel").on("click",function(e){e.preventDefault(),c()})}},$(document).ready(function(){e.notices.init(),e.license.init()})}(jQuery);