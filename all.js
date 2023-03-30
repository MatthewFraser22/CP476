function showDiv(index) {
    document.getElementsByClassName('editForm')[index].style.visibility = "visible";
 
    document.getElementsByClassName('edit')[index].style.display = "none";
 }

 function limitDecimalPlaces(event) {
    this.value = parseFloat(this.value).toFixed(0);
  }

  function calculator(id)
  {
    
    for (let i = 0; i < id; i++) {
        var grade1=parseFloat(document.getElementById(`${i}test_1`).getAttribute('data-myValue') * 0.20);
        var grade2=parseFloat(document.getElementById(`${i}test_2`).getAttribute('data-myValue') *0.20);
        var grade3=parseFloat(document.getElementById(`${i}test_3`).getAttribute('data-myValue')*0.20);
        var grade4=parseFloat(document.getElementById(`${i}exam`).getAttribute('data-myValue')*0.40);
        var total= grade1+grade2+grade3+grade4;
     
        var rounded = Math.round(total * 10) / 10
        var display=document.getElementById(`${i}outputDiv`);
        console.log("hello", grade1,grade2,grade3,grade4, display);
        display.innerHTML='Your Final Grade Is: ' +rounded;
  }


  }
