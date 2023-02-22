const deleteElementConfirm = document.querySelectorAll("form.delete-element")

deleteElementConfirm.forEach((formElement)=>{
  formElement.addEventListener("submit", function(event){
    event.preventDefault();
    const doubleConfirm = event.target.classList.contains("double-confirm")
    const formElementName= formElement.getAttribute("data-element-name")
    Swal.fire({
      title: `Are you sure to delrete ${formElementName}?`,
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          `Your project "${formElementName}" has been moved to trash.`,
          'success'
        )
        formElement.submit()
      }
    })
  })
})