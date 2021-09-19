/*/ When the user clicks on the button, scroll down
function wc_scroll() {
    document.body.scrollTop = 900;
    document.documentElement.scrollTop = 900;
}*/

	function wc_scroll() {
if(window.scrollY!=0)
{
    setTimeout(function() {
       window.scrollTo(0,window.scrollY-30);
        TopscrollTo();
    }, 10);
   }
}