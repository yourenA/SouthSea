/**
 * Created by Administrator on 2016/5/11.
 */
function checkSearch(form){
    if(form.search_input.value==""){
        alert("你搜索内容为空，请输入！");form.search_input.focus();return false;
    }

    form.submit();
}