function redirect(id, course) {
    window.location.href=`class.php?id=${id}&course=${course}`
  }

  function redirectToAll(total) {
    window.location.href=`all.php?total=${total}`;
  }