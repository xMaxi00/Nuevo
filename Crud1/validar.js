//alert("Bien")
function validar_nombre()
{
	var nomba=document.getElementById('nombagregar');
    if(nomba.value()==="")
	{
		alert("Falta Nombre")
		//document.fvalida.aviso.style.visibility="visible";
		//document.getElementById("errornombre").style.visibility= 'visible'
		//setTimeout(oculto,3000);
		//document.modalagregar.nombre.focus();
		return;
	}
}


function validar_run()
{
    var runx=document.getElementById("runagregar").value;
    var largo=runx.length;
    var digillego=parseInt(runx[largo-1]);
    largo=largo-3;
    var mult=2;
    var suma=0;
    for (var i=largo;i>=0;i--) 
    { 
        
        if(runx[i] != '.')
        {
                 suma=suma+(parseInt(runx[i]))*mult;
                 mult=mult+1;
                 if(mult==8)
                        mult=2;
            
        }
    }
var divi = suma % 11;
     var sale = 11 - divi;
     //alert(sale);
     if (sale == digillego)
        alert('Run Válido')
     else
        alert('Run Inválido')
    }
    
       

function oculto()
        {
            document.getElementById("errornombre").style.visibility = 'hidden';
            document.getElementById("erroredad1").style.visibility = 'hidden';
            document.getElementById("erroredad2").style.visibility = 'hidden';
        }