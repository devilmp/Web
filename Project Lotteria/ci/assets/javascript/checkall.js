$(document).ready(function() {
    $('.checkAllEmp').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkEmp').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkEmp').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});