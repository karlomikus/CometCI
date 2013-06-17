function bytesToSize(e,t){var a=1024,i=1024*a,n=1024*i,c=1024*n;return e>=0&&a>e?e+" B":e>=a&&i>e?(e/a).toFixed(t)+" KB":e>=i&&n>e?(e/i).toFixed(t)+" MB":e>=n&&c>e?(e/n).toFixed(t)+" GB":e>=c?(e/c).toFixed(t)+" TB":e+" B"}$(document).ready(function(){function e(e){var t=e.element;return"<img src='"+baseUrl+"assets/games/"+$(t).data("icon")+"' /> "+e.text}function t(e){for(var t,a=e.target.files,i=0;t=a[i];i++)if(t.type.match("image.*")){var n=new FileReader;n.onload=function(e){return function(t){$(s).html(escape(e.name).trunc(35)+" <span>"+bytesToSize(e.size,0)+"</span>"),$("#screenshots ul").prepend('<li><a href="#"><img src="'+t.target.result+'" alt="" /></a></li>')}}(t),n.readAsDataURL(t)}}$(".tbl-custom tr").hover(function(){$(this).find(".action-icon").toggleClass("action-icon-active"),$(this).find(".action-list").toggle()}),$(".js_tooltip").tooltip(),$("#page-name").on("keyup",function(){var e=$(this).val().replace(/[^a-zA-Z0-9-]/g,"-").toLowerCase().replace(/--+/g,"-");$("#page-slug").val(e)}),null==$.cookie("activeTabGroup")&&$.cookie("activeTabGroup","#dashboard-tab",{expires:7,path:"/"}),$($.cookie("activeTabGroup")).addClass("active"),$(".sidebar-icon a").click(function(e){e.preventDefault(),$(this).tab("show"),$.cookie("activeTabGroup",$(this).attr("href"),{expires:7,path:"/"})}),$("#event-tabs a").click(function(e){e.preventDefault(),$(this).tab("show")}),$(".js_select").select2({width:"off"}),$(".js_select_no_search").select2({width:"off",minimumResultsForSearch:-1}),$(".js_select_game").select2({width:"off",formatResult:e,formatSelection:e,escapeMarkup:function(e){return e}}),$(".goback").click(function(){history.back()});var a=$("#admin-scores"),i=$("#admin-scores p").size()+1;$("#admin-scores-add").live("click",function(){var e='<p><input placeholder="Opponent score #'+i+'" class="reset-input input-large" type="text" name="opponentscore[]" /> <input placeholder="Team score #'+i+'" class="reset-input input-large" type="text" name="teamscore[]" /> <a href="#" class="admin-scores-remove btn btn-cms-orange"><i class="icon-minus"></i></a></p>';return $(e).appendTo(a),i++,!1}),$(".admin-scores-remove").live("click",function(){return i>2&&($(this).parents("p").remove(),i--),!1}),$(".ajax-load").ajaxStart(function(){$(this).show()}),$(".ajax-load").ajaxStop(function(){$(this).hide()});var n,c=$("input[name=csrf_comet]").val();$(".teamdropdown").on("change",function(){n=$(".teamdropdown").select2("data").id,$.ajax({url:baseUrl+"admin/matches/fetch_team_members",type:"POST",data:{id:n,csrf_comet:c},dataType:"json",cache:!1,success:function(e){$("#teamplayers").select2({data:e,multiple:!0})}})}),$(".cms-calendar td a").click(function(e){e.preventDefault();var t=$(this).attr("href").substr(1),a=$.cookie("csrf_cookie_comet");$.ajax({url:baseUrl+"admin/calendar/fetch_event",type:"POST",data:{date:t,csrf_comet:a},dataType:"html",cache:!1,success:function(e){$("#event-list").html(e)}})}),$("#layout-list").change(function(){var e=$(this).val();$.ajax({url:baseUrl+"admin/layouts/fetch_layout",type:"POST",data:{layout:e,csrf_comet:c},dataType:"html",cache:!1,success:function(e){$("#layout-edit").val(e)}})}),$(".addscreenshot").click(function(){$("#screenshots ul").children("li:not(:last):not(.safe)").remove(),$("#screenshotsfile").click()});var o="delete ";$(".safe img").toggle(function(){$(this).css("border","2px solid #D64644"),$(this).parent().find("input:hidden").val(function(e,t){return"delete "+t})},function(){$(this).css("border","2px solid transparent"),$(this).parent().find("input:hidden").val(function(e,t){return-1!=t.indexOf(o)?t.replace(o,""):t})});var s=".cms-upload p";$(".show-file-input").click(function(e){e.preventDefault();var a=$(this).attr("href"),i=$(this).parent().attr("id");null!=i&&(s="#"+i+" p"),$(a).click(),$(a).bind("change",t)}),$("#screenshotsfile").bind("change",t),$("#file-input").bind("change",t),$(".tbl-custom .confirm-delete").click(function(e){e.preventDefault();var t=$(this).attr("href");bootbox.dialog('<i class="icon-exclamation-sign icon-4x"></i><br />Are you sure you want to delete this data?',[{label:"OK","class":"btn-cms-orange",callback:function(){window.location=t}},{label:"Cancel","class":"btn-cms",callback:function(){bootbox.hideAll()}}])}),$(".inputip").on({"keyup focus":function(){this.value.length<=3?0==$(".tooltip").length&&$(this).tooltip("show"):0!=$(".tooltip").length&&$(this).tooltip("hide")},blur:function(){$(this).tooltip("hide")}}).tooltip({placement:"right",trigger:"manual"}),$("input").iCheck({checkboxClass:"icheckbox_square-blue",radioClass:"iradio_square-blue",increaseArea:"20%"}),$(".datepicker").pickadate({format:"yyyy-mm-dd"}),$(".timepicker").pickatime({format:"HH:i",interval:10})}),String.prototype.trunc=function(e){return this.substr(0,e-1)+(this.length>e?"&hellip;":"")};