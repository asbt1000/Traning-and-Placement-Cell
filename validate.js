function validate()
{  	
   var letters = /^[a-zA-Z\s]+$/;
   if(document.c_register.cname.value.match(letters));
   else
     {
      alert( "Please provide a valid company name" );
     document.c_register.cname.focus() ;
     return false;
	 }
  if(document.c_register.name.value.match(letters));
   else
     {
      alert( "Please provide a valid name" );
     document.c_register.name.focus() ;
     return false;
	 }
	 if(document.c_register.des.value.match(letters));
   else
     {
      alert( "Please provide a valid designation" );
     document.c_register.des.focus() ;
     return false;
	 }
  
   if((isNaN( document.c_register.contact.value))||document.c_register.contact.value.length != 10 )
   {
     alert( "Please provide a valid Contact Number" );
     document.c_register.contact.focus() ;
     return false;
   }
   return true;
}