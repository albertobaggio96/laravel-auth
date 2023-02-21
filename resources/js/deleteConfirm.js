const deleteElementConfirm = document.querySelectorAll("form.delete-element")

deleteElementConfirm.forEach((formElement)=>{
  formElement.addEventListener("submit", function(event){
    event.preventDefault();
    const formElementName= formElement.getAttribute("data-element-name");
    const ConfirmPopUP= window.confirm(`Confermi l'eliminazione del progetto ${formElementName}`)
    if(ConfirmPopUP) formElement.submit();
  })
})