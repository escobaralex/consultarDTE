
var jsMain = function(){        
    function validacionesDeInputs(id, event){
        if((typeof id)!= 'undefined' ){
            var idElement = this.id;
            var isValido = true;
            var elemento = document.getElementById(id);  
                                
            if(existSubClassInClass('num',elemento.className)){
                var RegExPattern = /^(?:\+|-)?\d+$\b/;
                //var key = event.keyCode || event.which;
                var tecla = String.fromCharCode(event.which).toLowerCase();
                if ((tecla.match(RegExPattern)) == null){
                    isValido = false ; 
                }
                if(elemento.id == 'txtMtoNeto' && (isValido || event.keyCode == 8 || event.keyCode == 127 ) ){
                    sumaTotales(tecla,elemento.id);
                }
            }
            
            if(existSubClassInClass('alfa',elemento.className)){               
                var RegExPattern = /^[a-zA-Z0-9_-|\s]*$/;                                
                var tecla = String.fromCharCode(event.which).toLowerCase();
                if ((tecla.match(RegExPattern)) == null){
                    isValido = false ; 
                }
            }
            
            if(existSubClassInClass('rut',elemento.className)){
                var tecla = String.fromCharCode(event.which).toLowerCase();
                    var validos = "0123456789Kk-"
                    if (validos.indexOf(tecla) == -1) {
                        isValido = false ; 
                    } 
            }
            
            if(existSubClassInClass('date',elemento.className)){               
                var RegExPattern = /^[0-9-]*$/;                
                var tecla = String.fromCharCode(event.which).toLowerCase();
                if ((tecla.match(RegExPattern)) == null){
                    isValido = false ; 
                }
            }
            
            if(existSubClassInClass('decimal',elemento.className)){
                var RegExPattern = /^[0-9.,-]*$/;               
                var tecla = String.fromCharCode(event.which).toLowerCase();
                if ((tecla.match(RegExPattern)) == null){
                    isValido = false ; 
                }
            }
            
            if(existSubClassInClass('real',elemento.className)){
                var RegExPattern = /^-?[0-9.,]*$/;               
                var tecla = String.fromCharCode(event.which).toLowerCase();
                if ((tecla.match(RegExPattern)) == null){
                    isValido = false ; 
                }
            }
            
            if(existSubClassInClass('enteroNegativo',elemento.className)){
                var RegExPattern = /^-?[0-9]*$/;               
                var tecla = String.fromCharCode(event.which).toLowerCase();
                if ((tecla.match(RegExPattern)) == null){
                    isValido = false ; 
                }
            }
            
            if(existSubClassInClass('entero',elemento.className)){
                var RegExPattern = /^-?[0-9]*$/;                 
                var tecla = String.fromCharCode(event.which).toLowerCase();
                if ((tecla.match(RegExPattern)) == null){
                    isValido = false ; 
                }
            }            
        }
        return isValido;
    };

    function form(evento) {  
        evento = evento.toLowerCase();         
        var eventParameter = "";
        switch(evento){
        case "keypress": 
            eventParameter = "keypress";
            break;
        case "keydown":
            eventParameter = "keydown";
            break;
        case "change":
            eventParameter = "change";
            break;
        }               
         if(eventParameter != "")
         {   
             var elementsFormVCG = $(".form-vcg");
             for (i = 0; i < elementsFormVCG.length; i++)
             {
                if(elementsFormVCG[i].type == "text" || elementsFormVCG[i].type == "password")
                {
                    if(false/*navigator.sayswho ==  'IE<9'*/)
                    {
                        elementsFormVCG[i].attachEvent(eventParameter,function(){
                            var idElement = this.id;//$(this).attr('id');             
                            var bResult = validacionesDeInputs(idElement, event);
                            if (!bResult){
                                return false; 
                            }
                            else{
                                return true; 
                            } 
                         });                       
                    }
                    else{
                       try{
                            $("#"+elementsFormVCG[i].id).keypress(function(event){
                                var idElement = $(this).attr('id');             
                                var bResult = validacionesDeInputs(idElement, event);
                                if(!bResult)
                                    return false;
                                if(bResult)
                                    return true;
                             });
                             $("#"+elementsFormVCG[i].id).focusout(function(event){
                                var idElement = $(this).attr('id');             
                                var bResult = validaCampoRequerido(idElement, event);                                
                             });
                        elementsFormVCG[i].attachEvent(eventParameter, function (){
                            validacionesDeInputs(this.id,event);
                            });
                        }
                        catch(ex){}
                    }
                 }
             }
         }
     };
     function sumaTotales(valTecla, idTxt){
        var total = 0;
        var iva = 0;     
        var neto = 0;
        var exento= 0;         
        var elemNeto = document.getElementById(idTxt);

        exento = document.getElementById("txtMtoExento").value * 1 ;
        if(exento==''){
            exento = 0;
        }
        iva = document.getElementById("txtMtoIva").value;  
        neto = elemNeto.value * 1 + valTecla;                                
        
        if(neto==''){
            neto = 0;
        }
        document.getElementById("txtMtoIva").value = Math.round(neto * 0.19);          
        document.getElementById("txtMtoTotal").value =  Math.round((neto*1 + (neto * 0.19) + exento*1));                        
     }
        
        function validaCampoRequerido(id, event){
             if(typeof id != 'undefined' ){               
                var isValido = true;                
                var elemento = document.getElementById(id);
                if(existSubClassInClass('requerido',elemento.className)){
                    var result = true;                   
                    if(elemento.value.length == 0 ){
                        if(elemento.style.borderColor!="red"){                           
                            elemento.style.borderColor="red"; 
                            var padreElemento = elemento.parentNode;
                            /*var span = document.createElement("span");                           
                            var exclamacion = document.createTextNode("!");
                            span.appendChild(exclamacion);
                            elemento.parentNode.insertBefore(span, elemento.nextSibling);
                            span.style.color="red";
                            span.style.paddingBottom="2px";
                            span.style.fontSize = "1.5em";
                            span.style.margin = "0px";
                            //span.style.fontWeight="bold";
                            span.className = "exclamacion";*/
                        }
                        result = false;                
                    }
                    else{  
                        var padreElemento = elemento.parentNode;
                        if(elemento.style.borderColor=="red"){
                            if(elemento.nextSibling.nodeName === "SPAN"){
                                padreElemento.removeChild(elemento.nextSibling);

                            } 
                        }                                
                        elemento.style.borderColor="#cecece";                                                   
                    }                 
                    if(result){
                        reqResult = true;
                        valores = $(".requerido");
                        for (i = 1; i < valores.length; i++){
                            if(valores[i].value.length == 0){                
                                reqResult = false;                                    
                            }                               
                        }
                        if(!reqResult){
                        $(".btnGuardar").attr("disabled", true);
                            //result = true;
                        }else{
                            $(".btnGuardar").attr("disabled", false);
                        }
                    }
                    else{
                        $(".btnGuardar").attr("disabled", true);
                    }                    
                }
            }         
        }    
     return {
        init: function(){
            form("keypress");//Se deja fijo keypress por problemas teclado numerico         
            }     
     }        
}(window);
window._ = jsMain;  

/*---------------------------------------------------------------------
    FIN FRAMEWORK
-----------------------------------------------------------------------*/


/*---------------------------------------------------------------------
    INICIO METODOS COMUNES
-----------------------------------------------------------------------*/

//== Verifica si se encuentra una subclase en la clase de un elemento
function existSubClassInClass(nombreSubClase,nombreclase){            
var bResult = false;
try{
    var arrayClass = nombreclase.split(" ");
        for (var i = 0; i < arrayClass.length; i++){
            if(arrayClass[i] == nombreSubClase){
                bResult = true;
                break;
            }
        }
}catch(Error){
    return false;
}
return bResult;
}

//== Obtiene la opción seleccionada de un select recibiendo el id del elemento 'SELECT'
function getOptionSelected(idSelect){
    var vSelectedIndex = document.getElementById(idSelect).selectedIndex;
    var vOptions = document.getElementById(idSelect).options;
    return vOptions[vSelectedIndex].innerHTML;
};

function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}

Function.prototype.extiende = function(nombre, funcion) {
    if (!this.prototype[nombre]) {
        this.prototype[nombre] = funcion;
        return this;
    }
}
 
String.extiende('trim', function(){
    if(this == null || (typeof this) == 'undefined' )
        return '';
    else    
       return this.replace(/^\s+|\s+$/g, '');
});
/*
Object.extiende('removerClass', function(){
    if(this == null || (typeof this) == 'undefined' ){
    
        return this;
    }
    else{
       return this.replace(/^\s+|\s+$/g, '');
    }
});*/

function myAddClass(elem, addClass){
    
        if(elem == null || (typeof elem) == 'undefined' )
            return elem.className = addClass + " " + elem.className;
         
        
        return elem;
};
//- See more at: http://fernetjs.com/2012/01/extendiendo-javascript-string-trim/#sthash.yLZoAbFV.dpuf
//==Elimina Fila de una Grilla a partir de un link (<a>)
//==Se debe agregar así onclick="deleteRowFromLink(this, varGlcontadorFilas);"==//
//==Nodos deben ser de la forma: <tr><td><a>
function deleteRowFromLink(el, vContador){
    var td = el.parentNode;
    var tr = td.parentNode;                
    tr.parentNode.removeChild(tr);
    vContador = vContador - 1;
};
function deleteRow(el, vContador){
    var td = el.parentNode;
    var tr = td.parentNode;                
    tr.parentNode.removeChild(tr);
    vContador = vContador - 1;
};
//Elimina elementos en el cliente, recibe el elemento como argumento y un indice que indica los niveles 
//que subira por el arbol para eliminar.  El indice 0, indica que se elimina el elemento donde se genera el evento
function deleteElemFromIndexNode(el, indexNode){
    var NodePadre = el;
    if(indexNode==0){
        el.parentNode.removeChild(el);
    }else{
        
        while(indexNode>0){
            NodePadre = NodePadre.parentNode;
            indexNode = indexNode - 1;
        }
        NodePadre.parentNode.removeChild(NodePadre);
    }          
    contadorRowGridOtImp = contadorRowGridOtImp -1;                
};


function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) )
        return false;
    else
        return true;
}


function Navegador(){
    try{
        var nav = navigator.appVersion;
        if(navigator.appVersion.indexOf("MSIE 7") > 1){
            alert("Se recomienda actualizar su explorador de internet a una versión más reciente");
            return 7;
        }
        if(navigator.appVersion.indexOf("MSIE 8") > 1){
            //alert("IE 8");
            return 8;
        }
        if(navigator.appVersion.indexOf("MSIE 9") > 1){
            //alert("IE 9");
            return 9;
        }
        if(navigator.appVersion.indexOf("MSIE 10") > 1){
            return 10;
        }
        if(navigator.appVersion.indexOf("MSIE 11") > 1){
            //alert("IE 11");
            return 11;
        }
    }catch(Error){
    
    }
}
function addListener(element, eventName, handler) {
  if (element.addEventListener) {
    element.addEventListener(eventName, handler, false);
  }
  else if (element.attachEvent) {
    element.attachEvent('on' + eventName, handler);
  }
  else {
    element['on' + eventName] = handler;
  }
}

function removeListener(element, eventName, handler) {
  if (element.addEventListener) {
    element.removeEventListener(eventName, handler, false);
  }
  else if (element.detachEvent) {
    element.detachEvent('on' + eventName, handler);
  }
  else {
    element['on' + eventName] = null;
  }
}
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
/*---------------------------------------------------------------------
    FIN METODOS COMUNES
-----------------------------------------------------------------------*/



