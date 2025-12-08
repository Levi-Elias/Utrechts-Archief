//Make the DIV element draggable:
// dragElement(document.getElementById("mydivheader"));
let hotspots = document.getElementsByClassName("map-item");
for (let i = 0; i < hotspots.length; i++) {
  dragElement(hotspots[i]);
}

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    document.onmouseup = null;
    document.onmousemove = null;

    // --- ALERT MET X EN Y POSITIE ---
    const x = elmnt.offsetLeft;
    const y = elmnt.offsetTop;
    let id = elmnt.getAttribute('data-id');
    alert("X: " + x + " | Y: " + y);


            let data = {
                id: id,
                x_coord: x,
                y_coord: y
              }
              let URL = 'cms/cms_opslaan_coordinaten.php';
              
              verstuurknop.addEventListener('click', verstuurData);
              async function verstuurData() {
              let verstuurknop = document.getElementById('verstuurknop');
                 const reponseData = await fetch(URL, {
                    method: 'post',
                    body: JSON.stringify(data)
                }).then(response => response.json());
                console.log(reponseData);
                document.getElementById('opgeslagen_data').innerText = 'de id is : ' + reponseData.id + ', de x coordinaat is : ' + reponseData.x_coordinaat + ', de y coordinaat is : ' + reponseData.y_coordinaat;
            }
    
  }
}