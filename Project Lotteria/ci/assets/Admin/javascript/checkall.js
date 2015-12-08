$(document).ready(function() {
    $('.checkAllEmp').change(function(event) {  //on click 
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
    $('.checkAllCus').change(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkCus').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkCus').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    $('.checkAllMeal').change(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkMeal').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkMeal').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    $('.checkAllOrders').change(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkOrder').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkOrder').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
});