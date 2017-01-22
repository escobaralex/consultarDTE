/// <reference name="MicrosoftAjax.js"/>
function validarRUT(rutDV)
{
    var DV = rutDV.charAt(rutDV.length-1);
    sRut = rutDV.substring(0, rutDV.length-2);
    var dv = getDigVerif(sRut);
    if (dv != DV.toLowerCase())  
    {   
      return false;
    }
    return true;
}
function getDigVerif(rut)
{
    var dvr = '0';
    suma = 0;
    mul  = 2;
    for(i=rut.length -1;i >= 0;i--) 
    { 
    suma = suma + rut.charAt(i) * mul;    
    if (mul == 7)
    {
      mul = 2;
    }   
    else
    {         
      mul++;
    } 
    }
    res = suma % 11;  
    if (res==1)
    {
    return 'k';
    } 
    else if(res==0)
    { 	  
    return '0';
    } 
    else  
    {   
    return 11-res;
    }
}
function ValidaFormatoRut(rutStr){
    var RegExPattern = /^\d[0-9]{0,1}?\d[0-9]{2}?\d[0-9]{2}?-[0-9kK]{?}*$/; 
    if ((rutStr.match(RegExPattern)) == null){
        return  false ; 
    }else{                
        return true;
    }
}