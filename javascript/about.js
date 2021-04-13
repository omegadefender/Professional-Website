hider = () => {
    var me = document.getElementById("aboutme");
    var img = document.getElementById("mysteryme");
    var caption = document.getElementById("cap")
    if (me.style.display === "none") {
        me.style.display = "block";
        img.src = "../images/Profile.png";
        caption.innerHTML = "James Hastings";
    } else {
        me.style.display = "none";
        img.src = "../images/mysteryman.jpg";
        caption.innerHTML = "Click Image"
    }
}