function clearSelection (name) {
    const radioBtns = document.querySelectorAll(
            "input[type='radio'][name='" + name + "']");
    radioBtns.forEach((radioBtn) => {
    if (radioBtn.checked === true)
        radioBtn.checked = false;
    });
};

function changeNote(element){ 
    var elementID=element.id // QUi correspond a la valeur de la note qui sera ensuite envoyée vers la BD
    var competenceID=element.parentNode.parentNode.id

    $.ajax({
        url:"/Model/changeNote.php",
        type:"POST",
        data:{
            noteValue:elementID,
            IDcomp: competenceID
        },
        // success:function(response){
        //     alert(response)
        // } 
    });

}