<!-- Defining field only numbers -->
<script language='JavaScript'>
function number(e){
 var tecla=(window.event)?event.keyCode:e.which;
 if((tecla>45 && tecla<58)) {	
 return true;	 
 }
 else{
	 alert('Apenas teclas númericas');
 return false;
 }
}
<!--  Mask for number telephone  -->
</script>
<script language="JavaScript">
 function mascara(t, mask){
 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 if (texto.substring(0,1) != saida){
 t.value += texto.substring(0,1);
 }
 }
 </script>	