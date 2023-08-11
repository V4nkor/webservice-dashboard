function pingIP(id,ip,type){
  disableAllPingBtn();
  icon = document.getElementById(id+type+'Icon');
  icon.classList.remove('grayStatus');
  icon.classList.remove('redStatus');
  icon.classList.remove('greenStatus');
  icon.classList.add('orangeStatus');
  span = document.getElementById(id+type+'Span');
  span.innerText = "Server status : Pinging";
  $.ajax({
    url: "ping.php",
    data: {
      ip: ip
    },
    success: function(res) {
      if(res == "0"){
        icon.classList.remove('orangeStatus');
        icon.classList.add('greenStatus');
        span.innerText = "Server Status : Running";
      }
      else{
        icon.classList.remove('orangeStatus');
        icon.classList.add('redStatus');
        span.innerText = "Server status : Stopped";
        /* alert(res); */
        console.log(res);
      }
      enableAllPingBtn();
    }
  });
}

function getHeaders(id,ip,type,port){
  disableAllPingBtn();
  icon = document.getElementById(id+type+'Icon');
  icon.classList.remove('grayStatus');
  icon.classList.remove('redStatus');
  icon.classList.remove('greenStatus');
  icon.classList.add('orangeStatus');
  span = document.getElementById(id+type+'Span');
  span.innerText = "Service status : Pinging";
  $.ajax({
    /* url: "getHttpResponse.php", */
    /* url: "getHeaders.php" , */
    url: "checkIfAvailable.php" ,
    data: {
      ip: ip
    },
    success: function(res) {
      if(res == true){
        icon.classList.remove('orangeStatus');
        icon.classList.add('greenStatus');
        span.innerText = "Service status : Running";
      }
      else{
        icon.classList.remove('orangeStatus');
        icon.classList.add('redStatus');
        span.innerText = "Service status : "+res  ;
        console.log(res);
      }
      enableAllPingBtn();
    }
  });
}

function disableAllPingBtn(){
  pingBtns = document.getElementsByClassName('pingBtn');
  for (let i = 0; i < pingBtns.length; i++) {
    pingBtns[i].disabled = true;
  }
}

function enableAllPingBtn(){
  pingBtns = document.getElementsByClassName('pingBtn');
  for (let i = 0; i < pingBtns.length; i++) {
    pingBtns[i].disabled = false;
  }
}