function openRoom(room) {
    var roomContent = document.getElementById(room + '-content');
    roomContent.style.display = 'block';
    document.getElementById('room-overlay').style.display = 'block';
  }
  
  function toggleLight(room) {
    console.log("light clicked")
    var roomContent = document.getElementById(room + '-content');
    if (roomContent) {
      var lightStatus = roomContent.querySelector('.light-status');
      if (lightStatus) {
        lightStatus.innerHTML = (lightStatus.innerHTML === 'Light On') ? 'Light Off' : 'Light On';
      }
    }
  }
  