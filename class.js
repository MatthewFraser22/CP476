function redirect(id, course) {
    window.location.href=`marks.php?id=${id}&course=${course}`
  }

  function showDiv(index) {
    event.stopPropagation();
    document.getElementsByClassName('editForm')[index].style.visibility = "visible";
 
    document.getElementsByClassName('edit')[index].style.display = "none";
 }

