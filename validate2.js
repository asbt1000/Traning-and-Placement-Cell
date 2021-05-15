function validate()
{  	
   var letters = /^[a-zA-Z\s]+$/;
  
  if(document.s_register.name.value.match(letters));
   else
     {
      alert( "Please provide a valid name" );
     document.s_register.name.focus() ;
     return false;
	 }
	 if(document.s_register.des.value.match(letters));
   else
     {
      alert( "Please provide a valid department" );
     document.s_register.des.focus() ;
     return false;
	 }
  
   if((isNaN( document.s_register.contact.value))||document.s_register.contact.value.length != 10 )
   {
     alert( "Please provide a valid Contact Number" );
     document.s_register.contact.focus() ;
     return false;
   }
   return true;
}