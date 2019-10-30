
const alertaRetorno = (heading,text,icon,hideAfter,ajax) =>{
    
    let loaderBg;
    let bgColor;    

    if(icon == 'success'){
        loaderBg    = '#28A745';
        bgColor     = '#0B5D1E'; 
        

    }else if(icon == 'info'){
        loaderBg    = '#006BA6';
        bgColor     = '#007BFF'; 
           
    }else{
        loaderBg    = '#7D1128';
        bgColor     = '#dc3545'; 
        
    }

    $.toast({
        heading: heading,
        text: text,
        icon: icon,
        loaderBg: loaderBg,
        bgColor: bgColor,
        loader: true,
        hideAfter: hideAfter,
        showHideTransition: 'slide',
        position: 'top-right',

        afterShown: function () {
            
            if(ajax == true){
                $("#incrementar-barra").css("width", "100%");
            }

        },

        afterHidden: function () {
           
            if(ajax == true){
                $("#incrementar-barra").css("width", "0%");
                setTimeout(function(){ 
                    $('#progresso-carga').removeClass('d-block');
                    $('#progresso-carga').addClass('d-none');
                    location.reload();
                }, 1500);
            }

        }
    });

};