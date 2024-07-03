setTimeout(function(){
    var alert_tb = document.getElementById('alert-tb');
    if(alert_tb){
        alert_tb.style.transition = 'opacity 0.5s ease';
        alert_tb.style.opacity = 0;
        setTimeout(function(){
            alert_tb.remove();
        },200)
    }
},1500);