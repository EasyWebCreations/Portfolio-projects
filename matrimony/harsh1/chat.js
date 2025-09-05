var chatArea = document.getElementById("messages");
var allProfiles = document.getElementById("profiles");
var filter = document.getElementById("filter");
//var window = window.innerWidth;
var filterissue = document.getElementById("filterissue");
var receiver = document.getElementById("receiver");
var textbox = document.getElementById("textbox");
var allpeople = document.getElementById("allpeople");
var alertArea = document.getElementById("alert");
var addfriend = document.getElementById("addfriend");

function addfriendbtn(){
    alert("Friend Request sent successfully!");
    addfriend.style.display = 'none';
}
function showReciever(){
    receiver.style.display = 'block';
    textbox.style.display = 'block';
    allpeople.style.display = 'none';
}

function showPeople(){
    receiver.style.display = 'none';
    textbox.style.display = 'none';
    allpeople.style.display = 'block';
}



function removerChatArea(){
    if(window.innerWidth > 700){
    chatArea.style.display = 'none';
    allProfiles.style.width = '100%';
    filter.style.display = 'inline-flex';
    filterissue.style.display = 'block';
    }else{
        chatArea.style.display = 'none';
        allProfiles.style.width = '100vw';
        allProfiles.style.visibility = 'visible';
    }
}
function removeProfiles(){
    if(window.innerWidth > 700){
    chatArea.style.display = 'block';
    allProfiles.style.width = '50%';
    filter.style.display = 'none';
    filterissue.style.display = 'none';
    alertArea.style.display = 'none';
    }else{
        chatArea.style.display = 'block';
    allProfiles.style.visibility = 'hidden';
    alertArea.style.display = 'none';
    }
}


var check = document.getElementById("vehicle1");
function test(){
if(check.checked){
    removerChatArea();
}else{
    removeProfiles();
}
}

function removeProfilesforalert(){
    if(window.innerWidth>700){
        allProfiles.style.width = '50%';
        filter.style.display = 'none';
        chatArea.style.display = 'none';
        filterissue.style.display = 'none';
    }else{
        allProfiles.style.visibility = 'hidden';
        chatArea.style.display = 'none';
    }
}
function removeAlert(){
    if(window.innerWidth > 700){
        alertArea.style.display = 'none';
        allProfiles.style.width = '100%';
        filter.style.display = 'inline-flex';
        filterissue.style.display = 'block';
        }else{
            alertArea.style.display = 'none';
            allProfiles.style.width = '100vw';
            allProfiles.style.visibility = 'visible';
        }
}

var check2 = document.getElementById("vehicle2");
function test1(){
    if(check2.checked){
        removeAlert();
    }else{
        alertArea.style.display = 'block';
        removeProfilesforalert();
    }
}