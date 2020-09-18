var jsonData={};var hideInactiveStreamers=true;fetchResults();setInterval(function(){fetchResults();},45000);function toggleInactiveStreamers(){hideInactiveStreamers=!hideInactiveStreamers;generateListContents();}
function fetchResults(){
  const httpRequest=new XMLHttpRequest()
  httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState==4&&httpRequest.status==200){
      jsonData=JSON.parse(httpRequest.responseText).data;
      generateListContents();
    }
  };
  httpRequest.open("POST","/streams",true);
  httpRequest.send();
}
function generateListContents(){const container=document.querySelector(".stream-container");const online=jsonData.online;const offline=jsonData.offline;var contents="";if(online.length>0){contents+="<div class='online-streamers'>";contents+="<span class='section-title'>LIVE</span>;";for(let i=0;i<online.length;i++){const id=online[i]._id;const url=online[i].url;const icon=online[i].avatar;const name=online[i].name;const videoTitle=online[i].title;const viewerCount=online[i].viewers.toLocaleString();const badgeType=online[i].badge;contents+="<div class='table-row online-row "+badgeType+"' streamer-id='"+id+"' url='"+url+"' onclick='clickStreamer()'>"
+"<img src='"+icon+"' alt='"+name+"' width='55' height='55' class='stream-icon'>"
+"<div class='stream-info'>"
+"<span class='name'>"+name+"</span>"
+"<span class='video-title'>"+videoTitle+"</span>"
+"</div>"
+"<div class='viewer-count'>"
+"<span>"+viewerCount+"</span>"
+"</div>"
+"</div>";contents+="</div>";}}
if(offline.length>0){contents+="<div class='offline-streamers'>";contents+="<span class='section-title'>OFFLINE</span>";var hasInactiveStreamers=false;for(let i=0;i<offline.length;i++){const id=offline[i]._id;const url=offline[i].url;const icon=offline[i].avatar;const name=offline[i].name;const lastOnline=offline[i].last_online;const badgeType=offline[i].badge;if(hideInactiveStreamers&&(lastOnline=="Not queried yet..."||lastOnline=="hidden time")){hasInactiveStreamers=true;continue;}
contents+="<div class='table-row offline-row "+badgeType+"' streamer-id='"+id+"' url='"+url+"' onclick='clickStreamer()'>"
+"<img src='"+icon+"' alt='' width='35' height='35' class='stream-icon'>"
+"<div class='stream-info'>"
+"<span class='offline-name'>"+name+"</span>"
+"</div>"
+"<div class='offline-time'>"
+"<span>"+lastOnline+"</span>"
+"</div>"
+"</div>";}
if(hideInactiveStreamers){contents+="<button class='unhide-btt' onclick='toggleInactiveStreamers();'>"+
"<span>Show All Streamers</span>"+
"</button>";}else{contents+="<button class='unhide-btt' onclick='toggleInactiveStreamers();'>"+
"<span>Hide Streamers</span>"+
"</button>";}
contents+="</div>";}
container.innerHTML=contents;}
function clickStreamer(){const elements=document.querySelectorAll(':hover');for(let i=0;i<elements.length;i++){if(elements[i].hasAttribute("url")){const link=elements[i].getAttribute("url");window.open(link,"_blank");}}}
