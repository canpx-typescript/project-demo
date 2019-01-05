$(document).ready(function(){

});
setTimeout(function(){
    $(".alert").slideDown();
}, 5000);
function xacnhanxoa(mes){
    if(window.confirm(mes)){
        return true;
    }else{
        return false;
    }
}